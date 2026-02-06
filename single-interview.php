<?php get_header(); ?>
<?php
$name_en = '';
$name_en = get_field('name_en');
$intervew_main_img = get_field('intervew_main_img');
$faq_group = get_field('faq_group');
?>
<main class="page-main interview-sub">
    <div class="interview-sub-visual flex flex-wrap">
        <div class="clip-sub bg-sub">
            <div class="breadcrumb">
                <ul>
                    <li><a href="<?php echo home_url(); ?>">TOP</a></li>
                    <li>
                    <li><a href="<?php echo home_url(); ?>/interview/">先輩インタビュー</a></li>
                    <li><span><?php echo esc_html($name_en); ?></span></li>
                </ul>
            </div>
        </div>
        <div class="interview-sub-visual-img">
            <?php if ($intervew_main_img): ?>
                <img src="<?php echo esc_url($intervew_main_img); ?>" alt="">
            <?php else: ?>
            <?php endif; ?>
        </div>
        <div class="interview-sub-visual-txt">
            <div class="interview-sub-visual-txt-wrap">
                <h1><?php the_title(); ?></h1>
                <span class="name"><?php echo esc_html($name_en); ?></span>
                <ul class="category flex">
                    <?php
                    $categories = get_the_terms(get_the_ID(), 'interview_tag');
                    if ($categories && !is_wp_error($categories)) :
                        foreach ($categories as $category) : ?>
                            <li>#<?php echo esc_html($category->name); ?></li>
                    <?php endforeach;
                    endif; ?>
                </ul>
                <ul class="day flex">
                    <li><?php the_field('join_year'); ?></li>
                    <li><?php the_field('join_method'); ?></li>
                </ul>
                <h2 class="color-main">PROFILE</h2>
                <p>
                    <?php the_field('profile'); ?>
                </p>
            </div>
            <div class="clip-main bg-main"></div>
        </div>
    </div>

    <section class="sec01">
        <div class="interview-sub-col">
            <div class="content-width-small">
                <?php if ($faq_group): ?>
                    <?php foreach ($faq_group as $item): ?>
                        <div class="interview-sub-col-txt">
                            <h3><?php echo esc_html($item['question']); ?></h3>
                            <p>
                                <?php echo nl2br(esc_html($item['answer'])); ?>
                            </p>
                        </div>
                        <?php if ($item["img_01"] && $item["img_02"]): ?>
                            <div class="interview-sub-col-img-1 flex">
                                <span class="interview-sub-col-img-1-1"><img src="<?php echo esc_url($item['img_01']); ?>" alt=""></span>
                                <span class="interview-sub-col-img-1-2"><img src="<?php echo esc_url($item['img_02']); ?>" alt=""></span>
                            </div>
                        <?php elseif ($item["img_01"] || $item["img_02"]): ?>
                            <div class="interview-sub-col-img-2">
                                <?php if ($item["img_01"]): ?>
                                    <img src="<?php echo esc_url($item['img_01']); ?>" alt="">
                                <?php elseif ($item["img_02"]): ?>
                                    <img src="<?php echo esc_url($item['img_02']); ?>" alt="">
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php
                $my_favorite = get_field('my_favorite');
                ?>
                <?php if ($my_favorite): ?>
                    <div class="interview-sub-favorite">
                        <div class="interview-sub-favorite-wrap">
                            <span class="hukidashi"><span class="hukidashi-txt">MY Favorite</span></span>
                            <div class="interview-sub-favorite-txt-pc hidden-mobile">
                                <div class="interview-sub-favorite-txt-pc-flex">
                                    <h3><?php echo esc_html($my_favorite['title']); ?></h3>
                                    <p>
                                        <?php echo nl2br(esc_html($my_favorite['content'])); ?>
                                    </p>
                                    </p>
                                </div>
                            </div>
                            <div class="interview-sub-favorite-img"><img src="<?php echo esc_url($my_favorite['img']); ?>" alt=""></div>
                        </div>
                        <div class="interview-sub-favorite-txt-sp hidden-sm">
                            <h3><?php echo esc_html($my_favorite['title']); ?></h3>
                            <p>
                                <?php echo nl2br(esc_html($my_favorite['content'])); ?>
                            </p>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="sec02">
        <div class="content-width">
            <div class="others-title">
                <span class="color-sub">OTHERS</span>
                <h2 class="color-sub">他のインタビューを見る</h2>
            </div>
            <div class="interview-sec-list flex flex-wrap">
                <?php $args = array(
                    'post_type' => 'interview',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $the_query = new WP_Query($args);
                ?> <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
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
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p>他のインタビュー記事が見つかりませんでした。</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<?php get_template_part('inc/inc-aside'); ?>
<?php get_footer(); ?>