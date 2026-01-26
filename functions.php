<?php
//管理バー非表示
//アイキャッチ設定
add_theme_support('post-thumbnails');
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



//採用情報のカスタム投稿タイプ追加

//採用情報のカスタム投稿タイプ追加
function create_recruit_post_type()
{
    $labels = array(
        'name' => '採用情報',
        'singular_name' => 'recruit',
        'add_new' => '新規追加',
        'add_new_item' => '新規採用情報を追加',
        'edit_item' => '採用情報を編集',
        'new_item' => '新規採用情報',
        'view_item' => '採用情報を表示',
        'search_items' => '採用情報を検索',
        'not_found' => '採用情報が見つかりませんでした。',
        'not_found_in_trash' => 'ゴミ箱に採用情報は見つかりませんでした。',
        'all_items' => 'すべての採用情報',
        'menu_name' => '採用情報',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'recruit'),
    );

    register_post_type('recruit', $args);
}
add_action('init', 'create_recruit_post_type');



//エントリーの募集職種にカスタム投稿のタイトルを追加
add_filter('mwform_choices_mw-wp-form-29', function ($choices, $atts) {
    // フォーム内の特定のname属性を確認
    if ($atts['name'] === 'occupatation') {
        // recruit投稿タイプの投稿を取得
        $posts = get_posts([
            'post_type' => 'recruit',
            'posts_per_page' => -1, // すべての投稿を取得
            'post_status' => 'publish', // 公開済みのみ
            //recruit_categoryのタクソノミーを取得
        ]);

        // 投稿タイトルをchoicesに追加
        $choices = [];
        foreach ($posts as $post) {
            $choices[] = $post->post_title;
        }
    }
    return $choices;
}, 10, 2);
