<?php
/*
Template Name: 仕事紹介-総務部門
*/
?>
<?php get_header(); ?>
<main class="job-details">
    <div class="page-visual-simple bg-main">
        <div class="content-width">
            <div class="page-visual-simple-title">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
        <div class="bg-clip-sub bg-sub"></div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><a href="<?php echo home_url(); ?>/job/">仕事紹介</a></li>
            <li><span><?php the_title(); ?></span></li>
        </ul>
    </div>
    <section class="sec01">
        <div class="content-width">
            <div class="sec01-wrap">
                <p>
                    <?php the_content(); ?>
                </p>
                <?php
                $job_main_img = get_field('job_main_img');
                $job_sub_img = get_field('job_sub_img');
                $loop = get_field('loop');
                ?>
                <div class="sec01-wrap-img"><img src="<?php echo esc_url($job_main_img); ?>" alt="<?php the_title(); ?>"></div>
            </div>
            <div class="sec01-col flex flex-wrap">
                <div class="sec01-col-right">
                    <div class="sec01-col-right-img">
                        <img src="<?php echo esc_url($job_sub_img); ?>" alt="<?php the_title(); ?>">
                    </div>
                </div>
                <div class="sec01-col-left">
                    <?php if ($loop): ?>
                        <?php foreach ($loop as $item): ?>
                            <div class="sec01-col-left-txt">
                                <h2><?php echo esc_html($item['title']); ?></h2>
                                <p>
                                    <?php echo nl2br(esc_html($item['content'])); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php $older_group = get_field('older_group'); ?>
    <section class="sec02">
        <div class="sec02-interview">
            <div class="content-width-small">
                <div class="sec02-interview-wrap">
                    <span class="hukidashi"><span class="hukidashi-txt">先輩の声</span></span>
                    <div class="sec02-interview-wrap-txt-pc hidden-mobile">
                        <div class="sec02-interview-wrap-txt-pc-flex">
                            <h3>
                                <?php echo nl2br($older_group['title']); ?>
                            </h3>
                            <p>
                                <?php echo nl2br($older_group['content']); ?>
                            </p>
                        </div>
                        <h4>
                            <?php echo nl2br($older_group['name']); ?>
                        </h4>
                    </div>
                    <div class="sec02-interview-wrap-img"><img src="<?php echo esc_url($older_group['img']); ?>" alt=""></div>
                </div>

                <div class="sec02-interview-wrap-txt-sp hidden-sm">
                    <h3><?php echo nl2br($older_group['title']); ?></h3>
                    <p>
                        <?php echo nl2br($older_group['content']); ?>
                    </p>
                    <h4><?php echo nl2br($older_group['name']); ?></h4>
                </div>

                <div class="sec02-interview-btn flex">
                    <div class="com-btn-sub">
                        <a href="<?php echo home_url(); ?>/job/">部門一覧に戻る<i></i></a>
                    </div>
                    <div class="com-btn-sub">
                        <a href="<?php echo home_url(); ?>/interview/">インタビュー一覧を見る<i></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_template_part('inc/inc-aside'); ?>
<?php get_footer(); ?>