<?php
// カスタム投稿タイプ「レシピ」とカスタムタクソノミー「レシピカテゴリー」の登録
function register_custom_post_type()
{
    $post_type_name = 'レシピ';
    // 1. カスタムタクソノミーの登録
    $taxonomy_args = [
        'labels' => [
            'name' => $post_type_name . 'カテゴリー', // 管理画面に表示する名前(複数形)
            'singular_name' => $post_type_name . 'カテゴリー' //管理画面に表示する名前(単数形)
        ],
        'hierarchical' => true, // 階層構造にするかどうか
        'show_admin_column' => true, // 一覧画面に表示するかどうか
        'show_in_rest' => true // ブロックエディタで選択可能か
    ];
    // register_taxonomy('カスタムタクソノミーの名称','カスタムタクソノミーを使用するオブジェクトタイプ','カスタムタクソノミーの設定');
    register_taxonomy('recipe_category', 'recipe', $taxonomy_args); // カスタムタクソノミーの登録

    // 2. カスタム投稿タイプの登録
    $post_args = [
        'labels' => [
            'name' => $post_type_name, // 管理画面に表示する名前(複数形)
            'singular_name' => $post_type_name, //管理画面に表示する名前(単数形)
            'add_new_item' => $post_type_name . 'を追加',
            'not_found' => $post_type_name . 'が見つかりませんでした。'
        ],
        'public' => true, // 公開するかどうか
        'has_archive' => true, // アーカイブを有効にするかどうか
        'menu_position' => 5, // 管理画面のメニューの表示位置
        'menu_icon' => 'dashicons-food', // 管理画面のメニューのアイコンの種類
        'supports' => [ // 編集画面で利用できる機能
            'title',
            'editor',
            'thumbnail'
        ],
        'taxonomies' => ['recipe_category'], // 利用するタクソノミー
        'show_in_rest' => true, // ブロックエディタを利用するかどうか
    ];
    // register_post_type('カスタム投稿タイプ名','カスタム投稿タイプの設定');
    register_post_type('recipe', $post_args);
}
// 3. 関数の実行
add_action('init', 'register_custom_post_type');

// 外部ファイルの読み込み
function add_files()
{
    // リセットCSS
    wp_enqueue_style('reset_style', 'https://unpkg.com/ress/dist/ress.min.css');
    // Google Fonts
    wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Zen+Kaku+Gothic+Antique&display=swap', array('reset_style'), null);
    // オリジナルCSS
    wp_enqueue_style('base_style', get_stylesheet_directory_uri() . '/style.css', array('reset_style', 'google_fonts'));

    // メインJS
    wp_enqueue_script('main_js', get_stylesheet_directory_uri() . '/js/script.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'add_files');

// Contact Form 7で自動挿入されるPタグ、brタグを削除
function wpcf7_autop_return_false()
{
    return false;
}
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
