<?php get_header(); ?> <main>
  <div class="breadcrumbs-wrapper wrapper">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if (function_exists('bcn_display')) bcn_display_list(); ?>
    </div>
  </div>
  <div class="wrapper">
    <?php if (have_posts()):
      $the_query = get_queried_object();
      $page_title = $the_query->name;
      $slug = $the_query->slug;
    ?>
      <h1 class="title" data-en="<?php echo $the_query->slug ?>"><?php echo $the_query->name; ?></h1>
      <ul class="recipe-list">
        <?php while (have_posts()): the_post(); ?>
          <?php get_template_part('template-parts/recipelist','',array($the_query)); ?>
        <?php endwhile; ?>
      </ul>
    <?php else: ?>
      <p>レシピはありません</p>
    <?php endif; ?>
  </div>
  <!-- Pagination -->
  <?php get_template_part('template-parts/pagination');    ?>
  <div class="button-wrapper">
    <?php get_template_part('template-parts/linkbutton', '', array('home')); ?> 
  </div>
</main>
<?php get_footer(); ?>