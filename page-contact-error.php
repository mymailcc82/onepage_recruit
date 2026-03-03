<?php
/*
Template Name: お問い合わせエラー
*/
?>
<?php get_header(); ?>
<main class="page-main page-main-bg">
    <div class="page-bg">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/page/404.jpg" alt="">
    </div>
    <div class="page-content">
        <div class="content-width">
            <h1 class="text-white">ERROR..</h1>
            <p class="text-white mb-8">
                <?php //ショートコード[contact-form-7 id="9d7709b" title="お問い合わせ"]
                //echo do_shortcode('[contact-form-7 id="9" title="お問い合わせ"]');
                //echo do_shortcode('[mwform_formkey key="25" html_class="h-adr"]'); 
                echo do_shortcode('[mwform_formkey key="39"]');
                ?>
            </p>
            <div class="com-btn-white com-btn-white-thanks max-w-[399px] mx-auto">
                <a href="<?php echo home_url(); ?>/">トップページへ戻る<i></i></a>
            </div>

        </div>


    </div>
</main>

<?php get_footer(); ?>