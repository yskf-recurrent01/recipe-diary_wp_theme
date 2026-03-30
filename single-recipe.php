<?php get_header(); ?>
<main>
  <div class="breadcrumbs-wrapper wrapper">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if (function_exists('bcn_display')) bcn_display_list(); ?>
    </div>
  </div>
  <div class="wrapper">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <article class="recipe-wrapper">
          <div class="eyecatch">
            <?php if (has_post_thumbnail()): ?>
              <?php the_post_thumbnail('large'); ?>
            <?php endif; ?>
          </div>

          <div class="recipe-text">
            <header class="recipe-header">
              <h1 class="recipe-name"><?php the_title(); ?></h1>
              <?php
              // カスタム投稿のカテゴリを取得するときはget_the_terms()を使う
              $cats = get_the_terms(get_the_ID(), 'recipe_category');
              if ($cats && !is_wp_error($cats)):
              ?>
                <ul class="recipe-category">
                  <?php foreach ($cats as $cat): ?>
                    <li><a href="<?php echo esc_url(home_url('/') . 'recipe_category/' . $cat->slug); ?>"><?php echo $cat->name; ?></a></li>
                  <?php endforeach; ?>
                <?php endif; ?>
                </ul>
                <?php the_content(); ?>
            </header>
            <div class="recipe-data-wrapper">
              <h2 class="recipe-data-title">材料(<?php echo SCF::get('ingredients_people'); ?>人分)</h2>
              <dl class="ingredients-list">
                <?php
                $ingredients_item_list = SCF::get('ingredients_item_list');
                foreach ($ingredients_item_list as $item):
                ?>
                  <div class="ingredients-item">
                    <dt><?php echo $item['ingredients_item_name']; ?></dt>
                    <dd><?php echo $item['ingredients_item_qty']; ?></dd>
                  </div>
                <?php endforeach; ?>
              </dl>
            </div>
            <div class="recipe-data-wrapper">
              <h2 class="recipe-data-title">作り方</h2>
              <ol class="steps-list">
                <?php
                $steps_item_list = SCF::get('steps_item_list');
                foreach ($steps_item_list as $item):
                ?>
                  <li><?php echo $item['steps_item']; ?></li>
                <?php endforeach; ?>
              </ol>
            </div>
          </div>
        </article>
    <?php
      endwhile;
    endif;
    ?>
  </div>
  <div class="button-wrapper">
    <?php get_template_part('template-parts/linkbutton', '', array('recipe')); ?>  </div>
</main>
<?php get_footer(); ?>