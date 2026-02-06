<?php get_header(); ?>
<main class="page-main recruit-main">
    <div class="page-visual-simple bg-sub">
        <div class="content-width">
            <div class="page-visual-simple-title">
                <span class="text-white">RECRUIT</span>
                <h1 class="h1-small">募集要項</h1>
            </div>
        </div>
        <div class="bg-clip-sub bg-main"></div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><span>募集要項</span></li>
        </ul>
    </div>

    <article class="recruit-article">
        <div class="content-width content-width--mobile-full">
            <div class="recruit-article-wrap">
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
                <h1 class="mb-2"><?php the_title(); ?></h1>
                <div class="desc mb-6">
                    <?php the_content(); ?>
                </div>
                <div class="main-img">
                    <?php if (has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                    <?php else: ?>
                    <?php endif; ?>
                </div>

                <div class="main-tab-btn">
                    <ul>
                        <li><a href="javascript:void(0)" class="active">募集要項</a></li>
                        <li><a href="javascript:void(0)">1日のスケジュール例</a></li>
                    </ul>

                </div>
                <div class="main-tab-content">
                    <div class="main-tab-content-01 active">
                        <h2><span>募集要項</span></h2>
                        <div class="main-tab-content-dl">
                            <?php
                            $details_loop = get_field('details_loop');
                            if ($details_loop):
                                foreach ($details_loop as $detail):
                            ?>
                                    <dl>
                                        <dt>
                                            <?php echo nl2br($detail["title"]); ?>
                                        </dt>
                                        <dd>
                                            <?php echo nl2br($detail["content"]); ?>
                                        </dd>
                                    </dl>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>

                    </div>
                    <div class="main-tab-content-02 ">
                        <h2><span>1日のスケジュール例</span></h2>

                        <div class="main-tab-content-table">
                            <?php
                            $schedule_loop = get_field('schedule_loop');
                            if ($schedule_loop):
                                foreach ($schedule_loop as $detail):
                            ?>
                                    <dl>
                                        <dt><span><?php echo nl2br($detail["time"]); ?></span></dt>
                                        <dd>
                                            <h3><?php echo nl2br($detail["title"]); ?></h3>
                                            <p>
                                                <?php echo nl2br($detail["content"]); ?>
                                            </p>
                                            <?php if ($detail["img"]): ?>
                                                <div class="table-img">
                                                    <img src="<?php echo $detail["img"]; ?>" alt="募集要項画像1">
                                                </div>
                                            <?php endif; ?>
                                        </dd>
                                    </dl>
                            <?php
                                endforeach;
                            endif;
                            ?>

                        </div>
                    </div>
                </div>

                <div class="main-btn mt-10">
                    <div class="aside-wrap-col-full">
                        <a href="<?php echo home_url(); ?>/entry/?occupation=<?php echo urlencode(get_the_title()); ?>">
                            <span>ENTRY</span>
                            <h3>この職種に応募する！</h3>
                            <i></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-width">
            <div class="com-btn-black max-w-[399px] mx-auto mt-10 mb-16">
                <a href="<?php echo home_url(); ?>/recruit/">一覧に戻る<i></i></a>
            </div>
        </div>


    </article>
</main>
<?php get_template_part('inc/inc-aside'); ?>

<?php get_footer(); ?>