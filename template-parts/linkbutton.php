<?php
$link = '';
if (!$args[0] === 'recipe') {
    $to = get_page_by_path($args[0], OBJECT, 'page');
    $title = $to->post_title;
    $slug = $to->post_name;
    $link = home_url('/') . $slug;
} else {
    $link = get_post_type_archive_link($args[0]);
    $title = 'レシピ';
}


?>
<a class="button" href="<?php echo esc_url($link); ?>"><?php echo $title; ?>に戻る</a>