<?php get_header(); ?>
<main class="company">
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
            <span class="font-en">ABOUT COMPANY</span>
            <h1>どんな会社？</h1>
        </div>
        <div class="bg-clip-sub bg-sub"></div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><span>どんな会社？</span></li>
        </ul>
    </div>
    <?php
    $message_group = get_field('message_group');
    $about_group = get_field('about_group');
    $vision_group = get_field('vision_group');
    $person_group = get_field('person_group');
    $benefit_group = get_field('benefit_group');
    $gallery_group = get_field('gallery_group');
    $company_group = get_field('company_group');
    ?>
    <section class="sec01">
        <div class="content-width">
            <div class="page-com-title bg-main">
                <h2 class="color-accent">代表メッセージ</h2>
            </div>
            <div class="sec01-wrap flex flex-wrap">
                <div class="sec01-left">
                    <div class="sec01-left-img">
                        <span class="img-bg-main bg-main"></span>
                        <span class="img-bg-sub bg-sub"></span>
                        <div class="sec01-left-img-wrap">
                            <img src="<?php echo $message_group["img"]; ?>" alt="<?php echo $message_group["name"]; ?>">
                        </div>
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

    <section class="sec02">
        <div class="content-width">
            <div class="page-com-title bg-main">
                <h2 class="color-accent">どんな会社？</h2>
            </div>
            <div class="sec02-img">
                <img src="<?php echo $about_group["img"]; ?>" alt="どんな会社？">
            </div>
            <div class="sec02-wrap flex flex-wrap">
                <div class="sec02-wrap-left">
                    <h3><?php echo nl2br($about_group["title"]); ?></h3>
                </div>
                <div class="sec02-wrap-right">
                    <p>
                        <?php echo nl2br($about_group["content"]); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="sec03">
        <div class="content-width">
            <div class="page-com-title bg-main">
                <h2 class="color-accent">理念と価値観</h2>
            </div>
            <div class="sec03-wrap">
                <?php foreach ($vision_group as $vision_item): ?>
                    <div class="sec03-cms-list">
                        <div class="cms-list-txt">
                            <h3 class="color-sub"><?php echo nl2br($vision_item["sub_title"]); ?></h3>
                            <h4><?php echo nl2br($vision_item["title"]); ?></h4>
                            <p>
                                <?php echo nl2br($vision_item["content"]); ?>
                            </p>
                        </div>
                        <div class="cms-list-img"><img src="<?php echo $vision_item["img"]; ?>" alt="<?php echo $vision_item["title"]; ?>"></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="sec04">
        <div class="content-width">
            <div class="page-com-title bg-main">
                <h2 class="color-accent">求める人物像</h2>
            </div>
            <div class="sec04-wrap">
                <p class="sec04-txt">
                    <?php echo nl2br($person_group["content"]); ?>
                </p>
                <ul class="sec04-list flex flex-wrap">
                    <?php foreach ($person_group["loop"] as $person_item): ?>
                        <li>
                            <span class="sec04-list-icon"><img src="<?php echo $person_item["icon"]; ?>" alt=""></span>
                            <h3><?php echo nl2br($person_item["title"]); ?></h3>
                            <p>
                                <?php echo nl2br($person_item["content"]); ?>
                            </p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="sec05">
        <div class="content-width">
            <div class="page-com-title bg-main">
                <h2 class="color-accent">社内制度/福利厚生</h2>
            </div>
            <ul class="sec05-cms flex flex-wrap">
                <?php foreach ($benefit_group as $benefit_item): ?>
                    <li>
                        <h3 class="color-main"><?php echo nl2br($benefit_item["title"]); ?></h3>
                        <p>
                            <?php echo nl2br($benefit_item["content"]); ?>
                        </p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <section class="sec06">
        <div class="content-width">
            <div class="page-com-title bg-main">
                <h2 class="color-accent">オフィスギャラリー</h2>
            </div>
        </div>
        <div class="sec06-cms-list">
            <div class="swiper gallery-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($gallery_group as $gallery_item): ?>
                        <div class="swiper-slide">
                            <img src="<?php echo $gallery_item["img"]; ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-pagination gallery-pagination"></div>

                <button type="button" class="gallery-nav gallery-nav--prev gallery-prev" aria-label="Previous slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-slider-left.png" alt="">
                </button>

                <button type="button" class="gallery-nav gallery-nav--next gallery-next" aria-label="Next slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-slider-right.png" alt="">
                </button>
            </div>
        </div>

    </section>

    <section class="sec07">
        <div class="content-width">
            <div class="sec07-wrap">
                <div class="page-com-title bg-main">
                    <h2 class="color-accent">会社概要</h2>
                </div>
                <div class="sec07-cms-list">
                    <?php foreach ($company_group as $company_item): ?>
                        <dl>
                            <dt><?php echo nl2br($company_item["title"]); ?></dt>
                            <dd><?php echo nl2br($company_item["content"]); ?></dd>
                        </dl>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_template_part('inc/inc-aside'); ?>

<?php get_footer(); ?>