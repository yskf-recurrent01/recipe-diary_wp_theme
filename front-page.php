<?php get_header(); ?>
<main>
  <!-- New Recipes Section -->
  <section class="new-recipes-section wrapper">
    <h2 class="title" data-en="New Recipes">新着レシピ</h2>
    <?php
    $new_recipe_args = array(
      'post_type' => 'recipe',
      'posts_per_page' => 4,
      'post_status' => 'publish'
    );
    $the_query = new WP_Query($new_recipe_args);
    if ($the_query->have_posts()):
    ?>
      <ul class="recipe-list">
        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
          <?php get_template_part('template-parts/recipelist', '', array($the_query)); ?>

        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
    <div class="button-wrapper">
      <?php get_template_part('template-parts/linkbutton', '', array('recipe')); ?>
    </div>
  </section>

  <!-- News Section -->
  <section class="news-section wrapper">
    <h2 class="title" data-en="News">お知らせ</h2>
    <?php
    $news_args = array(
      'post_type' => 'post',
      'posts_per_page' => 3,
      'post_status' => 'publish'
    );
    $the_query = new WP_Query($news_args);
    if ($the_query->have_posts()):
    ?>
      <ul class="news-list">
        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
          <?php get_template_part('template-parts/newslist'); ?>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
    <div class="news-button-wrapper">
      <?php get_template_part('template-parts/linkbutton', '', array('news')); ?>    </div>
  </section>
</main>
<?php get_footer(); ?>