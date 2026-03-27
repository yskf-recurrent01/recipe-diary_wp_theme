<li>
    <div class="news-meta">
        <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time>
        <?php get_template_part('template-parts/newscats', '', array(true)); ?>
    </div>
    <p class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></p>
</li>