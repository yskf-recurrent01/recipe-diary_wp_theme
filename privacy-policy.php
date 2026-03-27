<?php get_header(); ?>
<main>
  <div class="breadcrumbs-wrapper wrapper">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <span><a href="./index.html">Home</a></span> &gt; <span aria-current="page">プライバシーポリシー</span>
    </div>
  </div>
  <div class="wrapper">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <h1 class="title" data-en="Privacy Policy"><?php the_title(); ?></h1>
        <article class="about-wrapper">
          <div class="about-content">
            <p>Recipe Diary（以下、「当サイト」）は、ユーザーの個人情報の取扱いについて、以下の通りプライバシーポリシーを定めます。</p>

            <h2 class="mt-4">個人情報の収集と利用目的</h2>
            <p>当サイトでは、お問い合わせの際にお名前、メールアドレス等の個人情報をご登録いただく場合がございます。<br>
              これらの個人情報は、質問に対する回答や必要な情報をご連絡する場合に利用させていただくものであり、それ以外の目的では利用いたしません。</p>

            <h2 class="mt-4">個人情報の第三者への開示</h2>
            <p>当サイトでは、個人情報は適切に管理し、以下に該当する場合を除いて第三者に開示することはありません。</p>
            <ul style="list-style-type: disc; margin-left: 20px; line-height: 1.8;">
              <li>本人のご了解がある場合</li>
              <li>法令等への協力のため、開示が必要となる場合</li>
            </ul>

            <h2 class="mt-4">免責事項</h2>
            <p>当サイトのコンテンツや情報につきまして、可能な限り正確な情報を掲載するよう努めておりますが、誤情報が入り込んだり、情報が古くなっていることもございます。<br>
              当サイトに掲載された内容によって生じた損害等の一切の責任を負いかねますので、あらかじめご了承ください。</p>

            <br>
            <p>策定日：2024年4月1日</p>
          </div>
        </article>
    <?php endwhile;
    endif; ?>
  </div>
  <div class="button-wrapper"><a class="button" href="<?php echo esc_url(home_url('/')); ?>/index.html">トップに戻る</a></div>
</main>
<?php get_footer(); ?>