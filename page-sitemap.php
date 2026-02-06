<?php get_header(); ?>
<main class="page-main sitemap">
    <div class="page-visual-simple bg-sub">
        <div class="content-width">
            <div class="page-visual-simple-title">
                <span class="text-white">SITE MAP</span>
                <h1 class="h1-small">サイトマップ</h1>
            </div>
        </div>
        <div class="bg-clip-sub bg-main"></div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><span>サイトマップ</span></li>
        </ul>
    </div>
    <section class="sitemap-sec">
        <div class="content-width-xs">
            <div class="flex flex-wrap sitemap-wrap">
                <ul>
                    <li><a href="<?php echo home_url(); ?>/">トップ</a></li>
                    <li><a href="<?php echo home_url(); ?>/company/">どんな会社？</a></li>
                    <li><a href="<?php echo home_url(); ?>/job/">仕事紹介</a></li>
                    <li><a href="<?php echo home_url(); ?>/interview/">先輩インタビュー</a></li>
                    <li><a href="<?php echo home_url(); ?>/guardian/">保護者の方へ</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo home_url(); ?>/archive/">お知らせ・ブログ</a></li>
                    <li><a href="<?php echo home_url(); ?>/intern/">インターン情報</a></li>
                    <li><a href="<?php echo home_url(); ?>/recruit/">募集要項</a></li>
                    <li><a href="<?php echo home_url(); ?>/entry/">エントリー</a></li>
                    <li><a href="<?php echo home_url(); ?>/contact/">お問い合わせ</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo home_url(); ?>/privacy/">個人情報保護方針</a></li>
                    <li><a href="<?php echo home_url(); ?>/cookie/">Cookieポリシー</a></li>
                </ul>
            </div>

        </div>

    </section>
    <?php get_template_part('inc/inc-aside'); ?>
</main>
<?php get_footer(); ?>