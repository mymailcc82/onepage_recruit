<?php get_header(); ?>
<main class="guardian">
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
            <span class="font-en">FOR PRENTS AND GUARDIANS</span>
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
    <?php
    $message_group = get_field('message_group');
    ?>
    <?php if ($message_group): ?>
        <section class="sec01">
            <div class="content-width">
                <div class="sec01-wrap flex flex-wrap">
                    <div class="sec01-left">
                        <div class="sec01-left-img">
                            <span class="img-bg-main bg-main"></span>
                            <span class="img-bg-sub bg-sub"></span>
                            <div class="sec01-left-img-wrap"><img src="<?php echo $message_group["img"]; ?>" alt="代表取締役 河合駿耀"></div>
                        </div>
                    </div>

                    <div class="sec01-right">
                        <h3><?php echo nl2br($message_group["title"]); ?></h3>
                        <p>
                            <?php echo nl2br($message_group["content"]); ?>
                        </p>
                        <h4><span><?php echo nl2br($message_group["post"]); ?></span><br><?php echo nl2br($message_group["name"]); ?></h4>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <section class="sec02">
        <div class="content-width">
            <div class="page-com-title bg-main">
                <h2 class="color-accent">ワンページで働く<br class="hidden-sm">3つのメリット</h2>
            </div>
            <ul class="flex flex-wrap">
                <?php $merit_group = get_field('merit_group'); ?>
                <?php if ($merit_group): ?>
                    <?php foreach ($merit_group as $item): ?>
                        <li>
                            <span><img src="<?php echo esc_url($item["img"]); ?>" alt=""></span>
                            <h3><?php echo nl2br($item["title"]); ?></h3>
                            <p>
                                <?php echo nl2br($item["content"]); ?>
                            </p>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </section>
</main>
<?php get_template_part('inc/inc-aside'); ?>
<?php get_footer(); ?>