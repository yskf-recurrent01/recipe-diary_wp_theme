<?php 
$to = get_page_by_path($args[0],OBJECT,'page');
$title = $to->post_title;
$slug = $to->post_name;
?>
<a class="button" href="<?php echo esc_url(home_url('/')).$slug ?>"><?php echo $title; ?>に戻る</a>