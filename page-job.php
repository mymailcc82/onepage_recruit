<?php get_header(); ?>
<main class="job">
    <div class="page-visual">
        <div class="bg-clip-main bg-main"></div>
        <div class="page-visual-img">
            <?php
            $img_main = get_field('main_img'); ?>
            <?php if ($img_main): ?>
                <img src="<?php echo esc_url($img_main); ?>" alt="">
            <?php else: ?>
            <?php endif; ?>

        </div>

        <div class="page-visual-title">
            <span class="font-en">ABOUT JOB</span>
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="bg-clip-sub bg-sub"></div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><span><?php the_title(); ?></span></li>
        </ul>
    </div>
    <section class="sec01">
        <div class="content-width">
            <div class="sec01-txt">
                <?php the_content(); ?>
            </div>

            <div class="sec01-list">
                <?php
                $job = get_field('job');
                ?>
                <?php if (!$job) $job = array(); ?>
                <?php foreach ($job as $job_item): ?>
                    <?php
                    $class = 'sec01-list-wrap-left';
                    if ($job_item === reset($job) || $job_item === end($job)) {
                        $class = 'sec01-list-wrap-right';
                    }
                    ?>

                    <div class="sec01-list-wrap <?php echo $class; ?> flex flex-wrap">
                        <div class="sec01-list-wrap-img hidden-mobile">
                            <img src="<?php echo $job_item["img"]; ?>" alt="制作部門">
                        </div>
                        <div class="sec01-list-wrap-txt">
                            <div class="sec01-list-wrap-txt-col">
                                <h2 class="color-main"><?php echo nl2br($job_item["title"]); ?></h2>
                                <div class="sec01-list-wrap-img hidden-sm"><img src="<?php echo $job_item["img"]; ?>" alt="制作部門"></div>
                                <p>
                                    <?php echo nl2br($job_item["content"]); ?>
                                </p>
                            </div>
                            <div class="com-btn-sub">
                                <a href="<?php echo $job_item["link"]; ?>">詳しく見る<i></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<?php get_template_part('inc/inc-aside'); ?>
<?php get_footer(); ?>