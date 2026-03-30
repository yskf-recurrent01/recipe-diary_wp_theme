<?php get_header(); ?>
<main>
  <div class="breadcrumbs-wrapper wrapper">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <ol typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if (function_exists('bcn_display')) bcn_display_list(); ?>
      </ol>
    </nav>
  </div>
  <div class="wrapper">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <article class="recipe-wrapper">
          <div class="eyecatch">
            <?php if (has_post_thumbnail()): ?>
              <img src="./img/recipe4.jpg" alt="" />
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
              <h2 class="recipe-data-title">材料(2人分)</h2>
              <dl class="ingredients-list">
                <div class="ingredients-item">
                  <dt>アボカド</dt>
                  <dd>1個</dd>
                </div>
                <div class="ingredients-item">
                  <dt>レンズ豆</dt>
                  <dd>200g</dd>
                </div>
                <div class="ingredients-item">
                  <dt>トマト</dt>
                  <dd>2個</dd>
                </div>
                <div class="ingredients-item">
                  <dt>ライム果汁</dt>
                  <dd>大さじ1</dd>
                </div>
                <div class="ingredients-item">
                  <dt>塩</dt>
                  <dd>少々</dd>
                </div>
                <div class="ingredients-item">
                  <dt>トルティーヤ</dt>
                  <dd>適量</dd>
                </div>
              </dl>
            </div>
            <div class="recipe-data-wrapper">
              <h2 class="recipe-data-title">作り方</h2>
              <ol class="steps-list">
                <li>テキストテキストテキストテキスト</li>
                <li>テキストテキストテキストテキスト</li>
                <li>テキストテキストテキストテキスト</li>
                <li>テキストテキストテキストテキスト</li>
                <li>テキストテキストテキストテキスト</li>
              </ol>
            </div>
          </div>
        </article>
    <?php
      endwhile;
    endif;
    ?>
  </div>
  <div class="button-wrapper"><a class="button" href="./recipe-list.html">レシピ一覧に戻る</a></div>
</main>
<?php get_footer(); ?>