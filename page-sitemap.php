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
                    <li><a href="">トップ</a></li>
                    <li><a href="">どんな会社？</a></li>
                    <li><a href="">仕事紹介</a></li>
                    <li><a href="">先輩インタビュー</a></li>
                    <li><a href="">保護者の方へ</a></li>
                </ul>
                <ul>
                    <li><a href="">お知らせ・ブログ</a></li>
                    <li><a href="">インターン情報</a></li>
                    <li><a href="">募集要項</a></li>
                    <li><a href="">エントリー</a></li>
                    <li><a href="">お問い合わせ</a></li>
                </ul>
                <ul>
                    <li><a href="">個人情報保護方針</a></li>
                    <li><a href="">Cookieポリシー </a></li>
                </ul>
            </div>

        </div>

    </section>
    <?php get_template_part('inc/inc-aside'); ?>
</main>
<?php get_footer(); ?>