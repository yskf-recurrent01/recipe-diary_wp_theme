<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon" />
  <?php wp_head(); ?>
</head>

<body <?php wp_body_open(); ?>>
  <header>
    <div class="header-inner wrapper">
      <p class="logo">
        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg" alt="Recipe Diary" /></a>
      </p>
      <nav>
        <ul>
          <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
          <li><a href="<?php echo esc_url(home_url('/')); ?>about/">About</a></li>
          <li><a href="<?php echo esc_url(home_url('/')); ?>recipe/">Recipe</a></li>
          <li><a href="<?php echo esc_url(home_url('/')); ?>news/">News</a></li>
        </ul>
      </nav>
      <button class="ham-btn" id="js-ham-btn">
        <span class="ham-line"><span class="visually-hidden">メニューを開く</span></span>
      </button>
    </div>
  </header>
