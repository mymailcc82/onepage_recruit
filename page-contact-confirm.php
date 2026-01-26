<?php
/*
Template Name: お問い合わせ確認
*/
?>
<?php get_header(); ?>
<main class="page-main contact">
    <div class="page-visual-simple bg-sub">
        <div class="content-width">
            <div class="page-visual-simple-title">
                <span class="text-white">CONTACT</span>
                <h1 class="h1-small">お問い合わせ</h1>
            </div>
        </div>
        <div class="bg-clip-sub bg-main"></div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><a href="<?php echo home_url(); ?>/contact/">お問い合わせ</a></li>
            <li><span>お問い合わせ確認</span></li>
        </ul>
    </div>

    <section class="contact-sec">
        <div class="contact-wrap flex flex-wrap">
            <div class="contact-wrap-left">
                <ul>
                    <li class="active step1"><span>入力</span></li>
                    <li class="active step2"><span>内容確認</span></li>
                    <li class="step3"><span>送信完了</span></li>
                </ul>
                <p class="mb-10">
                    ご入力いただいた内容をご確認の上、送信ボタンを押してください。
                </p>
            </div>
            <div class="contact-wrap-right h-adr">
                <?php //ショートコード[contact-form-7 id="9d7709b" title="お問い合わせ"]
                //echo do_shortcode('[contact-form-7 id="9" title="お問い合わせ"]');
                //echo do_shortcode('[mwform_formkey key="25" html_class="h-adr"]'); 
                echo do_shortcode('[mwform_formkey key="39"]');
                ?>

            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>