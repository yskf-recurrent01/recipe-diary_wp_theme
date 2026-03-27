<?php get_header(); ?>
<main>
  <div class="breadcrumbs-wrapper wrapper">
    <ol class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if (function_exists('bcn_display')) bcn_display_list(); ?>
    </ol>
  </div>
  <div class="wrapper">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <article class="news-detail">
          <header class="news-detail-header">
            <h1 class="news-detail-title"><?php the_title(); ?></h1>
            <div class="news-meta">
              <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time>
              <?php get_template_part('template-parts/newscats', '', array(true)); ?>
            </div>
          </header>
          <div class="news-detail-content">
            <?php the_content(); ?>
          </div>
        </article>
    <?php
      endwhile;
    endif;
    ?>
  </div>
  <div class="button-wrapper">
    <?php get_template_part('template-parts/linkbutton', '', array('news')); ?>
  </div>
</main>

<?php get_footer(); ?>