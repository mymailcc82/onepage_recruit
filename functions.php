<?php
//管理バー非表示
//アイキャッチ設定
add_theme_support('post-thumbnails');
//管理バー非表示
add_filter('show_admin_bar', '__return_false');

//postの表示数を6に変更
function custom_posts_per_page($query)
{
    if (!is_admin() && $query->is_main_query() && (is_archive() || is_home())) {
        $query->set('posts_per_page', 6);
    }
}
add_action('pre_get_posts', 'custom_posts_per_page');

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

    //tagを追加
    register_taxonomy('recruit_tag', 'recruit', array(
        'hierarchical' => false,
        'label' => '採用タグ',
        'singular_label' => '採用タグ',
        'public' => true,
        'show_admin_column' => true,
        'rewrite' => true,

    ));

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


//インタビューのカスタム投稿タイプ追加
function create_interview_post_type()
{
    $labels = array(
        'name' => 'インタビュー',
        'singular_name' => 'interview',
        'add_new' => '新規追加',
        'add_new_item' => 'インタビューを追加',
        'edit_item' => 'インタビューを編集',
        'new_item' => 'インタビュー情報',
        'view_item' => 'インタビューを表示',
        'search_items' => 'インタビューを検索',
        'not_found' => 'インタビューが見つかりませんでした。',
        'not_found_in_trash' => 'ゴミ箱にインタビューは見つかりませんでした。',
        'all_items' => 'すべてのインタビュー',
        'menu_name' => 'インタビュー',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'interview'),
    );

    register_post_type('interview', $args);

    //taxonomyのタグ追加
    register_taxonomy('interview_tag', 'interview', array(
        'hierarchical' => false,
        'label' => 'インタビュ―タグ',
        'singular_label' => 'インタビュ―タグ',
        'public' => true,
        'show_admin_column' => true,
        'rewrite' => true,
    ));
}
add_action('init', 'create_interview_post_type');

// ============================================================
// テーマカラー設定（管理画面から --color-main / --color-sub を変更）
// ============================================================

/**
 * 設定ページを「外観」メニューに追加
 */
function onepage_color_settings_menu()
{
    add_theme_page(
        'テーマカラー設定',
        'テーマカラー設定',
        'manage_options',
        'onepage-color-settings',
        'onepage_color_settings_page'
    );
}
add_action('admin_menu', 'onepage_color_settings_menu');

/**
 * 設定を登録
 */
function onepage_color_settings_init()
{
    register_setting('onepage_color_settings_group', 'onepage_color_main', [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#173ca0',
    ]);
    register_setting('onepage_color_settings_group', 'onepage_color_sub', [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#57c3d1',
    ]);
    register_setting('onepage_color_settings_group', 'onepage_color_header_entry_btn_bg', [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#57c3d1',
    ]);
    register_setting('onepage_color_settings_group', 'onepage_color_header_entry_btn_text', [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#ffffff',
    ]);
    register_setting('onepage_color_settings_group', 'onepage_color_header_intern_btn_bg', [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#173ca0',
    ]);
    register_setting('onepage_color_settings_group', 'onepage_color_header_intern_btn_text', [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#ffffff',
    ]);
    register_setting('onepage_color_settings_group', 'onepage_color_fixed_intern_btn_bg', [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#57c3d1',
    ]);
    register_setting('onepage_color_settings_group', 'onepage_color_fixed_intern_btn_text', [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#ffffff',
    ]);
    register_setting('onepage_color_settings_group', 'onepage_color_recruit_bg', [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#173ca0',
    ]);
}
add_action('admin_init', 'onepage_color_settings_init');

/**
 * カラーピッカー用のスクリプトを管理画面で読み込む
 */
function onepage_color_settings_enqueue_scripts($hook)
{
    if ($hook !== 'appearance_page_onepage-color-settings') {
        return;
    }
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_add_inline_script('wp-color-picker', "
        jQuery(document).ready(function($){
            $('.onepage-color-picker').wpColorPicker();
        });
    ");
}
add_action('admin_enqueue_scripts', 'onepage_color_settings_enqueue_scripts');

/**
 * 設定ページの HTML
 */
function onepage_color_settings_page()
{
    $color_main = get_option('onepage_color_main', '#173ca0');
    $color_sub  = get_option('onepage_color_sub', '#57c3d1');
    $color_header_entry_btn_bg  = get_option('onepage_color_header_entry_btn_bg', '#57c3d1');
    $color_header_entry_btn_text = get_option('onepage_color_header_entry_btn_text', '#ffffff');
    $color_header_intern_btn_bg = get_option('onepage_color_header_intern_btn_bg', '#173ca0');
    $color_header_intern_btn_text = get_option('onepage_color_header_intern_btn_text', '#ffffff');
    $color_fixed_intern_btn_bg = get_option('onepage_color_fixed_intern_btn_bg', '#57c3d1');
    $color_fixed_intern_btn_text = get_option('onepage_color_fixed_intern_btn_text', '#ffffff');
    $color_recruit_bg = get_option('onepage_color_recruit_bg', '#173ca0');


?>
    <div class="wrap">
        <h1>テーマカラー設定</h1>
        <form method="post" action="options.php">
            <?php settings_fields('onepage_color_settings_group'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">メインカラー（--color-main）</th>
                    <td>
                        <input type="text"
                            name="onepage_color_main"
                            value="<?php echo esc_attr($color_main); ?>"
                            class="onepage-color-picker"
                            data-default-color="#173ca0" />
                        <p class="description">デフォルト: #173ca0</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">サブカラー（--color-sub）</th>
                    <td>
                        <input type="text"
                            name="onepage_color_sub"
                            value="<?php echo esc_attr($color_sub); ?>"
                            class="onepage-color-picker"
                            data-default-color="#57c3d1" />
                        <p class="description">デフォルト: #57c3d1</p>
                    </td>
                </tr>
            </table>
            <h3>ヘッダー</h3>
            <table class="form-table">
                <tr>
                    <th scope="row">エントリーボタン背景色</th>
                    <td>
                        <input type="text"
                            name="onepage_color_header_entry_btn_bg"
                            value="<?php echo esc_attr($color_header_entry_btn_bg); ?>"
                            class="onepage-color-picker"
                            data-default-color="#57c3d1" />
                        <p class="description">デフォルト: #57c3d1</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">エントリーボタン文字色</th>
                    <td>
                        <input type="text"
                            name="onepage_color_header_entry_btn_text"
                            value="<?php echo esc_attr($color_header_entry_btn_text); ?>"
                            class="onepage-color-picker"
                            data-default-color="#ffffff" />
                        <p class="description">デフォルト: #ffffff</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">インターンボタン背景色</th>
                    <td>
                        <input type="text"
                            name="onepage_color_header_intern_btn_bg"
                            value="<?php echo esc_attr($color_header_intern_btn_bg); ?>"
                            class="onepage-color-picker"
                            data-default-color="#173ca0" />
                        <p class="description">デフォルト: #173ca0</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">インターンボタン文字色</th>
                    <td>
                        <input type="text"
                            name="onepage_color_header_intern_btn_text"
                            value="<?php echo esc_attr($color_header_intern_btn_text); ?>"
                            class="onepage-color-picker"
                            data-default-color="#ffffff" />
                        <p class="description">デフォルト: #ffffff</p>
                    </td>
                </tr>
            </table>
            <h3>固定ボタン</h3>
            <table class="form-table">
                <tr>
                    <th scope="row">インターン固定ボタン背景色</th>
                    <td>
                        <input type="text"
                            name="onepage_color_fixed_intern_btn_bg"
                            value="<?php echo esc_attr($color_fixed_intern_btn_bg); ?>"
                            class="onepage-color-picker"
                            data-default-color="#57c3d1" />
                        <p class="description">デフォルト: #57c3d1</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">インターン固定ボタン文字色</th>
                    <td>
                        <input type="text"
                            name="onepage_color_fixed_intern_btn_text"
                            value="<?php echo esc_attr($color_fixed_intern_btn_text); ?>"
                            class="onepage-color-picker"
                            data-default-color="#fff" />
                        <p class="description">デフォルト: #fff</p>
                    </td>
            </table>
            <h3>共通</h3>
            <table class="form-table">
                <tr>
                    <th scope="row">画像の上に重ねる背景色</th>
                    <td>
                        <input type="text"
                            name="onepage_color_recruit_bg"
                            value="<?php echo esc_attr($color_recruit_bg); ?>"
                            class="onepage-color-picker"
                            data-default-color="#173ca0" />
                        <p class="description">デフォルト: #173ca0</p>
                    </td>
                </tr>
            </table>

            <?php submit_button('設定を保存'); ?>
        </form>
    </div>
<?php
}

/**
 * フロントエンドの <head> にインラインCSSを出力して :root のカラー変数を上書き
 */
function onepage_output_custom_colors()
{
    $vars = [
        '--color-main'                  => get_option('onepage_color_main', '#173ca0'),
        '--color-sub'                   => get_option('onepage_color_sub', '#57c3d1'),
        '--color_header_entry_btn_bg'   => get_option('onepage_color_header_entry_btn_bg', '#57c3d1'),
        '--color_header_entry_btn_text' => get_option('onepage_color_header_entry_btn_text', '#ffffff'),
        '--color_header_intern_btn_bg'  => get_option('onepage_color_header_intern_btn_bg', '#173ca0'),
        '--color_header_intern_btn_text' => get_option('onepage_color_header_intern_btn_text', '#ffffff'),
        '--color_fixed_intern_btn_bg'   => get_option('onepage_color_fixed_intern_btn_bg', '#57c3d1'),
        '--color_fixed_intern_btn_text' => get_option('onepage_color_fixed_intern_btn_text', '#ffffff'),
        '--color_recruit_bg'            => get_option('onepage_color_recruit_bg', '#173ca0'),
    ];

    echo "<style id=\"onepage-custom-colors\">\nhtml:root {\n";
    foreach ($vars as $prop => $value) {
        if ($value) {
            echo "  " . $prop . ": " . esc_attr($value) . ";\n";
        }
    }
    echo "}\n</style>\n";
}
add_action('wp_head', 'onepage_output_custom_colors', 20);

// ============================================================
// フッター設定（管理画面サイドメニューに表示）
// ============================================================

function onepage_footer_settings_menu()
{
    add_menu_page(
        'フッター設定',
        'フッター設定',
        'manage_options',
        'onepage-footer-settings',
        'onepage_footer_settings_page',
        'dashicons-admin-links',
        61
    );
}
add_action('admin_menu', 'onepage_footer_settings_menu');

function onepage_footer_settings_init()
{
    $fields = [
        'onepage_footer_corporate_url',
        'onepage_footer_instagram_url',
        'onepage_footer_x_url',
        'onepage_footer_youtube_url',
        'onepage_footer_facebook_url',
    ];
    foreach ($fields as $field) {
        register_setting('onepage_footer_settings_group', $field, [
            'type' => 'string',
            'sanitize_callback' => 'esc_url_raw',
            'default' => '',
        ]);
    }
}
add_action('admin_init', 'onepage_footer_settings_init');

function onepage_footer_settings_page()
{
    $corporate = get_option('onepage_footer_corporate_url', '');
    $instagram = get_option('onepage_footer_instagram_url', '');
    $x         = get_option('onepage_footer_x_url', '');
    $youtube   = get_option('onepage_footer_youtube_url', '');
    $facebook  = get_option('onepage_footer_facebook_url', '');
?>
    <div class="wrap">
        <h1>フッター設定</h1>
        <form method="post" action="options.php">
            <?php settings_fields('onepage_footer_settings_group'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">コーポレートサイトURL</th>
                    <td>
                        <input type="url" name="onepage_footer_corporate_url"
                            value="<?php echo esc_attr($corporate); ?>"
                            class="regular-text" placeholder="https://example.com" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Instagram URL</th>
                    <td>
                        <input type="url" name="onepage_footer_instagram_url"
                            value="<?php echo esc_attr($instagram); ?>"
                            class="regular-text" placeholder="https://www.instagram.com/..." />
                    </td>
                </tr>
                <tr>
                    <th scope="row">X (Twitter) URL</th>
                    <td>
                        <input type="url" name="onepage_footer_x_url"
                            value="<?php echo esc_attr($x); ?>"
                            class="regular-text" placeholder="https://x.com/..." />
                    </td>
                </tr>
                <tr>
                    <th scope="row">YouTube URL</th>
                    <td>
                        <input type="url" name="onepage_footer_youtube_url"
                            value="<?php echo esc_attr($youtube); ?>"
                            class="regular-text" placeholder="https://www.youtube.com/..." />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Facebook URL</th>
                    <td>
                        <input type="url" name="onepage_footer_facebook_url"
                            value="<?php echo esc_attr($facebook); ?>"
                            class="regular-text" placeholder="https://www.facebook.com/..." />
                    </td>
                </tr>
            </table>
            <?php submit_button('設定を保存'); ?>
        </form>
    </div>
<?php
}

// ============================================================
// 共通設定（管理画面サイドメニューに表示）
// ============================================================

function onepage_general_settings_menu()
{
    add_menu_page(
        '共通設定',
        '共通設定',
        'manage_options',
        'onepage-general-settings',
        'onepage_general_settings_page',
        'dashicons-admin-settings',
        60
    );
}
add_action('admin_menu', 'onepage_general_settings_menu');

function onepage_general_settings_init()
{
    $fields = [
        'onepage_company_name',
        'onepage_company_zipcode',
        'onepage_company_address',
        'onepage_company_email',
        'onepage_company_tel',
    ];
    foreach ($fields as $field) {
        register_setting('onepage_general_settings_group', $field, [
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '',
        ]);
    }
}
add_action('admin_init', 'onepage_general_settings_init');

function onepage_general_settings_page()
{
    $company_name    = get_option('onepage_company_name', '');
    $company_zipcode = get_option('onepage_company_zipcode', '');
    $company_address = get_option('onepage_company_address', '');
    $company_email   = get_option('onepage_company_email', '');
    $company_tel     = get_option('onepage_company_tel', '');
?>
    <div class="wrap">
        <h1>共通設定</h1>
        <form method="post" action="options.php">
            <?php settings_fields('onepage_general_settings_group'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">社名</th>
                    <td>
                        <input type="text" name="onepage_company_name"
                            value="<?php echo esc_attr($company_name); ?>"
                            class="regular-text" placeholder="株式会社○○○" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">郵便番号</th>
                    <td>
                        <input type="text" name="onepage_company_zipcode"
                            value="<?php echo esc_attr($company_zipcode); ?>"
                            class="regular-text" placeholder="460-0002" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">住所</th>
                    <td>
                        <input type="text" name="onepage_company_address"
                            value="<?php echo esc_attr($company_address); ?>"
                            class="large-text" placeholder="愛知県名古屋市中区丸の内2丁目14-16 河合ビル6F" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">メールアドレス</th>
                    <td>
                        <input type="email" name="onepage_company_email"
                            value="<?php echo esc_attr($company_email); ?>"
                            class="regular-text" placeholder="contact@example.co.jp" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">電話番号</th>
                    <td>
                        <input type="tel" name="onepage_company_tel"
                            value="<?php echo esc_attr($company_tel); ?>"
                            class="regular-text" placeholder="052-223-0200" />
                    </td>
                </tr>
            </table>
            <?php submit_button('設定を保存'); ?>
        </form>
    </div>
<?php
}

//ページネーション設定
// ページネーション設定（#sec05 を付ける改良版）
function custom_pagination($the_query, $pages = '', $range = 1)
{
    $anchor = ''; // ここを変えれば別のアンカーにもできる
    $showitems = ($range * 2) + 1;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    if ($pages == '') {
        $pages = $the_query->max_num_pages;
        if (!$pages) $pages = 1;
    }

    // URL にアンカーを付ける小ヘルパー
    $add_anchor = function ($url) use ($anchor) {
        if (!$url) return $url;
        return (strpos($url, '#') === false) ? $url . $anchor : $url;
    };

    if (1 != $pages) {
        echo "<div class='pagination'>";

        // First
        if ($paged > 1) {
            $url = $add_anchor(get_pagenum_link(1));
            echo "<a href='" . esc_url($url) . "' class='first'><i class='fa-solid fa-angles-left'></i></a>";
        }

        // Previous
        if ($paged > 1) {
            $prev_url = $add_anchor(get_pagenum_link($paged - 1));
            echo "<a href='" . esc_url($prev_url) . "' class='previous'><i class='fa-solid fa-angle-left'></i></a>";
        } else {
            echo "<a href='#' class='previous no-link'><i class='fa-solid fa-angle-left'></i></a>";
        }

        // page numbers
        $start = max(1, $paged - $range);
        $end = min($pages, $paged + $range);

        if ($end - $start < 2) {
            if ($start == 1) {
                $end = min(3, $pages);
            } elseif ($end == $pages) {
                $start = max(1, $pages - 2);
            }
        }

        for ($i = $start; $i <= $end; $i++) {
            if ($paged == $i) {
                echo "<span class='current'>" . $i . "</span>";
            } else {
                $page_url = $add_anchor(get_pagenum_link($i));
                echo "<a href='" . esc_url($page_url) . "' class='inactive'>" . $i . "</a>";
            }
        }

        // Next
        if ($paged < $pages) {
            $next_url = $add_anchor(get_pagenum_link($paged + 1));
            echo "<a href='" . esc_url($next_url) . "' class='next'><i class='fa-solid fa-angle-right'></i></a>";
        } else {
            echo "<a href='#' class='next no-link'><i class='fa-solid fa-angle-right'></i></a>";
        }

        // Last
        if ($paged < $pages) {
            $last_url = $add_anchor(get_pagenum_link($pages));
            echo "<a href='" . esc_url($last_url) . "' class='last'><i class='fa-solid fa-angles-right'></i></a>";
        }

        echo "</div>\n";
    }
}
