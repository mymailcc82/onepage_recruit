<?php
/*
Template Name: お問い合わせ完了
*/
?>
<?php get_header(); ?>
<main class="page-main page-main-bg">
    <div class="page-bg">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/page/404.jpg" alt="">
    </div>
    <div class="page-content">
        <div class="content-width">
            <h1 class="text-white">THANKS YOU!</h1>
            <h2 class="text-white mb-4 sm:mb-2">お問い合わせ・お申し込みありがとうございました</h2>
            <p class="text-white mb-8">
                受付完了の自動メールを送信しました。<br>
                お送りいただいた内容を確認後、担当よりご連絡させていただきます。
            </p>
            <div class="com-btn-white max-w-[399px] mx-auto">
                <a href="<?php echo home_url(); ?>/">トップページへ戻る<i></i></a>
            </div>
        </div>


    </div>
</main>

<?php get_footer(); ?>