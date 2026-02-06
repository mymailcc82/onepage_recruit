<?php get_header(); ?>
<?php
$check_flg = false;
$check_flg = get_field('check_flg');
?>
<main class="page-main recruit-main">
    <div class="page-visual-simple bg-sub">
        <div class="content-width">
            <div class="page-visual-simple-title">
                <span class="text-white">INTERN</span>
                <h1 class="h1-small"><?php the_title(); ?></h1>
            </div>
        </div>
        <div class="bg-clip-sub bg-main"></div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><span><?php the_title(); ?></span></li>
        </ul>
    </div>

    <article class="recruit-article">
        <div class="content-width content-width--mobile-full">
            <?php if ($check_flg): ?>
                <?php $info_group = get_field('info_group'); ?>

                <div class="recruit-article-wrap">
                    <?php if ($info_group): ?>
                        <h1 class="mb-2"><?php echo nl2br($info_group["title"]); ?></h1>
                        <p class="desc mb-6">
                            <?php echo nl2br($info_group["content"]); ?>
                        </p>
                        <div class="main-img">
                            <img src="<?php echo $info_group["img"] ?>" alt="インターン募集画像">
                        </div>
                    <?php endif; ?>


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
                                                <?php echo $detail["title"]; ?>
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
                    </div>

                    <div class="main-btn mt-10">
                        <div class="aside-wrap-col-full">
                            <a href="<?php echo home_url(); ?>/entry/">
                                <span>ENTRY</span>
                                <h3>インターンに申し込む！</h3>
                                <i></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <h2 class="text-center font-bold text-base sm:text-2xl leading-relaxed">
                    現在募集しておりません。<br>
                    募集開始まで今しばらくお待ちください。
                </h2>
            <?php endif; ?>
        </div>


    </article>
</main>
<?php get_template_part('inc/inc-aside'); ?>

<?php get_footer(); ?>