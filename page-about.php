<?php get_header(); ?>
<main>
  <div class="breadcrumbs-wrapper wrapper">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if (function_exists('bcn_display')) bcn_display_list(); ?>
    </div>
  </div>
  <div class="wrapper">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <h1 class="title" data-en="<?php echo $post->post_name; ?>"><?php the_title(); ?></h1>
        <article class="about-wrapper">
          <div class="about-content">
            <?php the_content(); ?>
        <?php
      endwhile;
    endif;
        ?>
        <?php echo wp_get_attachment_image(SCF::get('about_img'), 'full', false, array('class' => 'about-img mt-4')); ?>
        <h2 class="mt-4">私たちの3つのこだわり</h2>
        <dl class="about-list">
          <?php
          $about_list = SCF::get('about_list');
          if ($about_list):
            foreach ($about_list as $item):
          ?>
              <div>
                <dt><?php echo $item['about_list_title']; ?></dt>
                <dd><?php echo $item['about_list_text']; ?></dd>
              </div>
          <?php
            endforeach;
          endif;
          ?>
        </dl>

        <h2 class="mt-4">サイト運営者</h2>
        <div class="profile">
          <?php
          $about_profile_title = SCF::get('about_profile_title');
          $about_profile_text = SCF::get('about_profile_text');
          ?>
          <p><strong><?php echo $about_profile_title ?></strong></p>
          <p><?php echo nl2br($about_profile_text); ?></p>
        </div>
          </div>
        </article>
  </div>
  <div class="button-wrapper">
    <?php get_template_part('template-parts/linkbutton', '', array('home')); ?>
  </div>
</main>
<?php get_footer(); ?>