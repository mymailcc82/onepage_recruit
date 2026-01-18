<?php
//管理バー非表示
add_filter('show_admin_bar', '__return_false');

// functions.php の適当な場所に追加
function theme_vite_is_dev(): bool
{
    // 本番デプロイでは false にすること（WP_DEBUG ではなく本番判定を使うのが望ましい）
    //if (defined('WP_DEBUG') && WP_DEBUG) return true;
    $env = getenv('VITE_DEV') ?: ($_ENV['VITE_DEV'] ?? null);
    return filter_var($env, FILTER_VALIDATE_BOOLEAN);
}

function theme_vite_get_manifest(): ?array
{
    static $manifest;
    if (isset($manifest)) return $manifest;

    $paths = [
        get_theme_file_path('dist/manifest.json'),
        get_theme_file_path('dist/.vite/manifest.json'), // <- 追加
    ];

    foreach ($paths as $manifest_path) {
        if (file_exists($manifest_path)) {
            $json = file_get_contents($manifest_path);
            $manifest = json_decode($json, true);
            return $manifest;
        }
    }

    $manifest = null;
    return null;
}

function theme_vite_enqueue_assets()
{
    // 開発モードは dev server に接続（本番では false）
    if (theme_vite_is_dev()) {
        $dev = getenv('VITE_DEV_URL') ?: ($_ENV['VITE_DEV_URL'] ?? 'http://localhost:5173');
        echo '<script type="module" src="' . esc_url($dev) . '/@vite/client"></script>' . PHP_EOL;
        echo '<script type="module" src="' . esc_url($dev) . '/main.js"></script>' . PHP_EOL;
        return;
    }

    // production: manifest を読み込む
    $manifest = theme_vite_get_manifest();
    if (! is_array($manifest)) {
        // manifest が無ければ何もしない（デプロイ忘れに注意）
        return;
    }

    // 「main.js」に対応するメタ情報を見つける（エントリ名に合わせて調整可）
    $entryMeta = null;
    foreach ($manifest as $key => $meta) {
        if (strpos($key, 'main.js') !== false || (isset($meta['isEntry']) && $meta['isEntry'] === true)) {
            $entryMeta = $meta;
            break;
        }
    }
    if (! $entryMeta) {
        // fallback: 最初の JS エントリを使う
        foreach ($manifest as $meta) {
            if (isset($meta['file']) && preg_match('/\.js$/', $meta['file'])) {
                $entryMeta = $meta;
                break;
            }
        }
    }
    if (! $entryMeta) return;

    // スクリプト
    $script_url = get_theme_file_uri('dist/' . $entryMeta['file']);
    wp_enqueue_script('theme-main', $script_url, [], null, true);

    // CSS があれば enqueue
    if (! empty($entryMeta['css']) && is_array($entryMeta['css'])) {
        foreach ($entryMeta['css'] as $css) {
            $css_url = get_theme_file_uri('dist/' . $css);
            wp_enqueue_style('theme-' . md5($css), $css_url, [], null);
        }
    }
}
add_action('wp_enqueue_scripts', 'theme_vite_enqueue_assets', 1);
