<?php
/*
Template Name: ホーム
*/
?>
<?php
$first_group = get_field('first_group');
$sec01_group = get_field('sec01_group');
$sec02_group = get_field('sec02_group');
$job_group = get_field('job_group');
?>
<?php get_header(); ?>
<main class="top">

    <div class="top-visual left-0 top-0 w-full h-screen z-0">
        <div class="top-visual-yoko-top">
            <ul>
                <li>Graduate Recruitment Graduate Recruitment</li>
                <li>Graduate Recruitment Graduate Recruitment</li>
            </ul>
        </div>
        <div class="top-visual-yoko-bottom">
            <ul>
                <li>Graduate Recruitment Graduate Recruitment</li>
                <li>Graduate Recruitment Graduate Recruitment</li>
            </ul>
        </div>

        <div class="top-visual-img">
            <picture>
                <source media="(max-width: 600px)" srcset="<?php echo $first_group["img_sp"]; ?>">
                <img src="<?php echo $first_group["img"]; ?>" alt="トップビジュアル">
            </picture>
        </div>
        <div class="top-visual-txt">
            <h1>
                <?php
                $lines = preg_split('/\r\n|\r|\n/', $first_group["title"]);
                echo implode('<br>', array_map(function ($line) {
                    return '<span>' . esc_html($line) . '</span>';
                }, $lines));
                ?>
            </h1>
        </div>
    </div>
    <section class="sec01 relative">
        <div class="sec01-bg-main"></div>
        <div class="sec01-bg-sub"></div>
        <div class="content-width">
            <div class="sec01-content">
                <div class="sec01-title mb-7">
                    <h2 class="bg-main text-white"><?php echo nl2br($sec01_group["title"]); ?></h2>
                </div>
                <div class="hidden-sm">
                    <div class="sec01-img-mobile mb-5">
                        <img src="<?php echo $sec01_group["img_loop"][0]["img"]; ?>" alt="セクション画像01">
                    </div>
                </div>
                <p class="text-sm md:text-lg max-w-[350px] md:max-w-[650px] ">
                    <?php echo nl2br($sec01_group["content"]); ?>
                </p>
            </div>
        </div>
        <div class="sec01-img">
            <ul>
                <li class="w-[30%] right-[20px]">
                    <img src="<?php echo $sec01_group["img_loop"][0]["img"]; ?>" alt="セクション画像01">
                </li>
                <li class="w-[24%]">
                    <img src="<?php echo $sec01_group["img_loop"][1]["img"]; ?>" alt="セクション画像01">
                </li>
                <li class="w-[16%]">
                    <img src="<?php echo $sec01_group["img_loop"][2]["img"]; ?>" alt="セクション画像01">
                </li>
            </ul>
        </div>
    </section>

    <section class="sec02 relative z-10">
        <div class="content-width">
            <div class="sec02-wrap">
                <div class="sec02-wrap-left">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/sec02-img-01.jpg" alt="">
                </div>
                <div class="sec02-wrap-right">
                    <div class="sec02-title">
                        <span class="text-white">ABOUT<br>COMPANY</span>
                        <h2 class="text-white">どんな会社？</h2>
                    </div>
                    <div class="hidden-sm sec02-wrap-right-img mb-4">
                        <img src="<?php echo $sec02_group["img"]; ?>" alt="">
                    </div>
                    <h3 class="mb-2 sm:mb-2"><?php echo nl2br($sec02_group["title"]); ?></h3>
                    <p class="mb-10">
                        <?php echo nl2br($sec02_group["content"]); ?>
                    </p>
                    <div class="com-btn-sub">
                        <a href="<?php echo home_url(); ?>/company/">会社を知る<i></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="sec03 relative z-20">
        <div class="sec03-bg">
            <img src="<?php echo $job_group["img"]; ?>" alt="セクション背景画像">
        </div>
        <div class="content-width">
            <div class="sec03-wrap">
                <div class="sec03-title mb-7">
                    <span class="text-white">ABOUT JOB</span>
                    <h2 class="text-white">仕事を知る</h2>
                </div>
                <h3 class="text-white font-bold mb-4"><?php echo nl2br($job_group["title"]); ?></h3>
                <p class="max-w-[485px] text-white">
                    <?php echo nl2br($job_group["content"]); ?>
                </p>
                <div class="com-btn-sub mt-10 max-w-[400px]">
                    <a href="<?php echo home_url(); ?>/job/">仕事を知る<i></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="sec04 relative z-10">
        <div class="content-width">
            <div class="sec04-title mb-10">
                <span>INTERVIEW</span>
                <h2 class="text-center color-sub text-xl mt-2 font-bold">人を知る</h2>
            </div>
        </div>
        <div class="swiper swiper-interview">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
            <div class="sec04-wrap swiper-wrapper">
                <?php
                $args = array(
                    'post_type' => 'interview',
                    'posts_per_page' => 3,
                );
                $interview_query = new WP_Query($args);
                if ($interview_query->have_posts()) :
                    while ($interview_query->have_posts()) : $interview_query->the_post();
                ?>
                        <div class="sec04-wrap-col swiper-slide">
                            <?php $hover_img = get_field('hover_img'); ?>
                            <?php if ($hover_img) {
                                $active = "active";
                            } else {
                                $active = "";
                            } ?>
                            <a href="<?php the_permalink(); ?>" class="<?php echo esc_attr($active); ?>">
                                <i></i>
                                <div class="sec04-wrap-colp-img">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="インタビュー画像" class="sec04-wrap-colp-img-img">
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/com/noimage.jpg" alt="インタビュー画像">
                                    <?php endif; ?>

                                    <?php if ($hover_img): ?>
                                        <div class="sec04-wrap-colp-img-bg">
                                            <img src="<?php echo esc_url($hover_img); ?>" alt="インタビュー画像ホバー">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="sec04-wrap-col-txt">
                                    <h3><?php the_title(); ?></h3>
                                    <?php
                                    $join_year = "";
                                    $join_method = "";
                                    $join_year = get_post_meta(get_the_ID(), 'join_year', true);
                                    $join_method = get_post_meta(get_the_ID(), 'join_method', true);
                                    ?>
                                    <p>
                                        <?php echo esc_html($join_year); ?> | <?php echo esc_html($join_method); ?><br>
                                    </p>
                                    <?php
                                    $tags = get_the_terms(get_the_ID(), 'interview_tag');
                                    if ($tags && !is_wp_error($tags)) : ?>
                                        <ul>
                                            <?php foreach ($tags as $tag) : ?>
                                                <li>#<?php echo esc_html($tag->name); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </a>

                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>
    <section class="sec05 relative z-10">
        <div class="content-width">
            <div class="sec05-title mb-4 sm:mb-10">
                <span>NEWS / BLOG</span>
                <h2 class="sm:text-center color-sub text-xl mt-2 font-bold">お知らせ・ブログ</h2>
            </div>
            <h3 class="mb-6 sm:mb-4">大事なお知らせやイベント情報、スタッフブログなどを発信します！</h3>
            <div class="sec05-wrap flex">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                );
                $news_query = new WP_Query($args);
                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                ?>
                        <div class="sec05-wrap-col">
                            <a href="<?php the_permalink(); ?>">
                                <div class="sec05-wrap-col-img">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large'); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/com/noimage.jpg" alt="お知らせ画像">
                                    <?php endif; ?>
                                </div>
                                <div class="sec05-wrap-col-txt">
                                    <div class="sec05-wrap-col-txt-info">
                                        <?php
                                        $cats = get_the_category();
                                        $cat_name = '';
                                        if (!empty($cats)) {
                                            $cat_name = $cats[0]->name;
                                        }
                                        ?>
                                        <span><?php echo esc_html($cat_name); ?></span>
                                        <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
                                    </div>
                                    <h4><?php the_title(); ?></h4>
                                </div>
                            </a>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <div class="com-btn-sub mt-2 sm:mt-10 max-w-[400px] mx-auto">
                <a href="<?php echo home_url(); ?>/archive/">もっと見る<i></i></a>
            </div>
        </div>
    </section>


    <?php get_template_part('inc/inc-aside'); ?>
</main>
<script>
    //swiper-interview実装（599px以下のみ）
    let swiperInterview = null;

    function initInterviewSwiper() {
        if (window.innerWidth <= 599 && !swiperInterview) {
            swiperInterview = new Swiper('.swiper-interview', {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        } else if (window.innerWidth > 599 && swiperInterview) {
            swiperInterview.destroy(true, true);
            swiperInterview = null;
        }
    }

    initInterviewSwiper();
    window.addEventListener('resize', initInterviewSwiper);
</script>
<?php get_footer(); ?>