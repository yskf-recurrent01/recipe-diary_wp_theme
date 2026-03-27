<?php get_header(); ?> <main>
  <div class="breadcrumbs-wrapper wrapper">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if (function_exists('bcn_display')) bcn_display_list() ?>
    </div>
  </div>
  <div class="wrapper contact-wrapper">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <div class="contact-header">
          <h1 class="title" data-en="<?php echo $post->post_name; ?>"><?php the_title() ?></h1>
          <p>
            フォームからお問い合わせください。<br />
            通常、2～3営業日以内にご返信いたします。
          </p>
        </div>
    <?php endwhile;
    endif; ?>
    <!-- Contact Form 7 の読み込み -->
    <?php echo apply_shortcodes('[contact-form-7 id="bb289ab" title="お問い合わせ"]') ?>
  </div>
</main>
<?php get_footer(); ?>