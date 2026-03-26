<?php
// カスタム投稿タイプ「レシピ」とカスタムタクソノミー「レシピカテゴリー」の登録
function register_custom_post_type()
{
    // 1. カスタムタクソノミーの登録
    $taxonomy_args = [
        'labels' => [
            'name' => 'レシピカテゴリー', // 管理画面に表示する名前(複数形)
            'singular_name' => 'レシピカテゴリー' //管理画面に表示する名前(単数形)
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
            'name' => 'レシピ', // 管理画面に表示する名前(複数形)
            'singular_name' => 'レシピ', //管理画面に表示する名前(単数形)
            'add_new_item' => 'レシピを追加',
            'not_found' => 'レシピが見つかりませんでした。'
        ],
        'public' => true, // 公開するかどうか
        'has_archive' => true, // アーカイブを有効にするかどうか
        'menu_position' => 5, // 管理画面のメニューの表示位置
        'menu_icon' => 'dashicons-food', // 管理画面のメニューのアイコンの種類
        'supports' => [ // 編集画面で利用できる機能
            'title','editor','thumbnail'
        ],
        'taxonomies' => ['recipe_category'], // 利用するタクソノミー
        'show_in_rest' => true, // ブロックエディタを利用するかどうか
    ];
    // register_post_type('カスタム投稿タイプ名','カスタム投稿タイプの設定');
    register_post_type('recipe', $post_args);
}
// 3. 関数の実行
add_action('init','register_custom_post_type');