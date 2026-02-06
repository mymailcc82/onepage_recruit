<?php get_header(); ?>
<main class="page-main recruit-main">
    <div class="page-visual">
        <div class="bg-clip-main bg-main"></div>
        <div class="page-visual-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/company/company-visual.jpg" alt="どんな会社？"></div>
        <div class="page-visual-title">
            <span class="font-en">RECRUIT</span>
            <h1>募集要項</h1>
        </div>
        <div class="bg-clip-sub bg-sub"></div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><span>募集要項</span></li>
        </ul>
    </div>

    <section class="recruit-sec">
        <div class="content-width">
            <div class="recruit-wrap">
                <?php /* ここに募集要項のループを入れる */ ?>
                <?php // The Loop
                if (have_posts()) :
                    while (have_posts()) : the_post(); ?>


                        <div class="recruit-wrap-col">
                            <a href="<?php the_permalink(); ?>">
                                <div class="recruit-wrap-col-img mb-2">
                                    <?php if (has_post_thumbnail()): ?>
                                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/com/dummy.jpg" alt="募集要項画像1">
                                    <?php endif; ?>
                                </div>
                                <div class="recruit-wrap-col-txt">
                                    <ul>
                                        <?php
                                        $recruit_tags = get_field('recruit_tags');
                                        if ($recruit_tags):
                                            foreach ($recruit_tags as $tag):
                                        ?>
                                                <li>#<?php echo esc_html($tag); ?></li>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </ul>
                                    <h3><?php the_title(); ?></h3>
                                    <?php
                                    $salary = get_field('salary');
                                    $adress = get_field('adress');
                                    ?>
                                    <?php if ($salary): ?>
                                        <dl>
                                            <dt>給与</dt>
                                            <dd><?php echo esc_html($salary); ?></dd>
                                        </dl>
                                    <?php endif; ?>
                                    <?php if ($adress): ?>
                                        <dl>
                                            <dt>勤務地</dt>
                                            <dd><?php echo esc_html($adress); ?></dd>
                                        </dl>
                                    <?php endif; ?>
                                    <div class="com-btn-sub mt-4 com-btn-sub--small">
                                        <span>詳しく見る<i></i></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php
                    endwhile;
                else :
                    echo '<p>募集要項が見つかりませんでした。</p>';
                endif;
                ?>
            </div>
        </div>
    </section>


</main>
<?php get_template_part('inc/inc-aside'); ?>
<?php get_footer(); ?>