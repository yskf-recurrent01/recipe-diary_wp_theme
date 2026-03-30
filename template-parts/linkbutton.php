<?php
$slug = $args[0];
$link = '';
$btn_data = array();

if ($slug === 'recipe') {
    $btn_data = [
        'title' => 'レシピ一覧',
        'link' => get_post_type_archive_link($args[0]),
    ];
} elseif ($slug === 'home') {
    $btn_data = [
        'title' => 'ホーム',
        'link' => home_url('/'),
    ];
} else {
    $to = get_page_by_path($args[0], OBJECT, 'page');
    $slug = $to->post_name;
    $btn_data = [
        'title' => $to->post_title,
        'link' =>     $link = home_url('/') . $slug,
    ];
}

?>
<a class="button" href="<?php echo esc_url($btn_data['link']); ?>"><?php echo $btn_data['title']; ?>に戻る</a>