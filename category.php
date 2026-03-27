<?php get_header(); ?>
<main>
  <div class="breadcrumbs-wrapper wrapper">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if (function_exists('bcn_display')) bcn_display_list(); ?>
    </div>
  </div>
  <div class="wrapper">
    <?php if (is_category()): $queried_obj = get_queried_object(); ?>
      <h1 class="title" data-en="<?php echo $queried_obj->slug; ?>"><?php echo $queried_obj->name; ?></h1>
    <?php endif; ?>
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <ul class="news-list page-news-list">
          <?php get_template_part('template-parts/newslist'); ?>
        </ul>
      <?php endwhile;
    else: ?>
      <p>お知らせはありません。</p>
    <?php endif; ?>
    <!-- Pagination -->
    <ol class="pagination">
      <li class="pagination-prev"><a href="#"><span>前へ</span></a></li>
      <li class="pagination-item current"><span>1</span></li>
      <li class="pagination-item"><a href="#"><span>2</span></a></li>
      <li class="pagination-item"><a href="#"><span>3</span></a></li>
      <li class="pagination-next"><a href="#"><span>次へ</span></a></li>
    </ol>
  </div>
  <div class="button-wrapper">
    <?php get_template_part('template-parts/linkbutton', '', array('home')); ?>
  </div>
</main>
<?php get_footer(); ?>