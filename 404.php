<?php get_header(); ?>
<main class="page-main page-main-bg">
    <div class="page-bg">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/page/404.jpg" alt="">
    </div>
    <div class="page-content">
        <div class="content-width">
            <h1 class="text-white">404</h1>
            <h2 class="text-white mb-4 sm:mb-2">お探しのページは<br>見つかりませんでした</h2>
            <p class="text-white mb-8">
                URLが間違っているか、<br>すでに削除されたページの<br class="hidden-sm">可能性がございます。
            </p>
            <div class="com-btn-white max-w-[399px] mx-auto">
                <a href="<?php echo home_url(); ?>/">トップページへ戻る<i class="small"></i></a>
            </div>

        </div>


    </div>
</main>
<?php get_footer(); ?>