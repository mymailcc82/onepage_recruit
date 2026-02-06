<?php get_header(); ?>
<main class="page-main interview-main">
    <div class="page-visual">
        <div class="bg-clip-main bg-main"></div>
        <div class="page-visual-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/company/company-visual.jpg" alt=""></div>
        <div class="page-visual-title">
            <span class="font-en">INTERVIEW</span>
            <h1>先輩インタビュー</h1>
        </div>
        <div class="bg-clip-sub bg-sub"></div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><span>先輩インタビュー</span></li>
        </ul>
    </div>

    <section class="interview-sec">
        <div class="content-width">
            <div class="interview-sec-txt">
                <h2>私たちの仲間を紹介します！</h2>
            </div>
            <div class="interview-sec-list flex flex-wrap">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post(); ?>
                        <div class="interview-sec-list-col">
                            <?php $hover_img = get_field('hover_img'); ?>
                            <?php if ($hover_img) {
                                $active = "active";
                            } else {
                                $active = "";
                            } ?>
                            <a href="<?php the_permalink(); ?>" class="<?php echo esc_attr($active); ?>">
                                <div class="col-img">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="インタビュー画像" class="col-img-img">
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/com/noimage.jpg" alt="インタビュー画像">
                                    <?php endif; ?>

                                    <?php if ($hover_img): ?>
                                        <div class="col-img-bg">
                                            <img src="<?php echo esc_url($hover_img); ?>" alt="インタビュー画像ホバー">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-txt">
                                    <h3><?php the_title(); ?></h3>
                                    <ul class="day">
                                        <li><?php the_field('join_year'); ?></li>
                                        <li><?php the_field('join_method'); ?></li>
                                    </ul>
                                    <ul class="category">
                                        <?php
                                        $categories = get_the_terms(get_the_ID(), 'interview_tag');
                                        if ($categories && !is_wp_error($categories)) :
                                            foreach ($categories as $category) : ?>
                                                <li>#<?php echo esc_html($category->name); ?></li>
                                        <?php endforeach;
                                        endif; ?>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    <?php endwhile;
                else : ?>
                    <p>インタビュー記事が見つかりませんでした。</p>
                <?php endif; ?>
            </div>
        </div>
    </section>


</main>
<?php get_template_part('inc/inc-aside'); ?>
<?php get_footer(); ?>