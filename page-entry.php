<?php get_header(); ?>
<?php
if (isset($_GET['occupation'])) {
    $occupation = $_GET['occupation'];
    $occupation = preg_replace('/<br\s*\/?>/i', '', $occupation); // <br>タグを削除
}
?>
<main class="page-main contact entry">
    <div class="page-visual-simple bg-sub">
        <div class="content-width">
            <div class="page-visual-simple-title">
                <span class="text-white">ENTRY</span>
                <h1 class="h1-small">エントリー</h1>
            </div>
        </div>
        <div class="bg-clip-sub bg-main"></div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><span>エントリー</span></li>
        </ul>
    </div>

    <section class="contact-sec">
        <div class="contact-wrap flex flex-wrap">
            <div class="contact-wrap-left">
                <ul>
                    <li class="active step1"><span>入力</span></li>
                    <li class="step2"><span>内容確認</span></li>
                    <li class="step3"><span>送信完了</span></li>
                </ul>
                <p class="mb-4 sm:mb-10">
                    弊社に興味をお持ちいただきありがとうございます。<br>
                    お送りいただいた内容を確認後、採用担当よりご連絡させていただきます。<br>
                    必要事項をご入力のうえ、確認ボタンを押してください。
                </p>
            </div>
            <div class="contact-wrap-right h-adr">
                <?php //ショートコード[contact-form-7 id="9d7709b" title="お問い合わせ"]
                //echo do_shortcode('[contact-form-7 id="9" title="お問い合わせ"]');
                //echo do_shortcode('[mwform_formkey key="25" html_class="h-adr"]'); 
                echo do_shortcode('[mwform_formkey key="29"]');
                ?>

            </div>
        </div>
    </section>
</main>
<script>
    var occupation = "<?php echo isset($occupation) ? esc_js($occupation) : ''; ?>";

    document.addEventListener('DOMContentLoaded', function() {
        if (occupation) {
            var selectBox = document.querySelector('select[name="occupatation"]');
            if (selectBox) {
                var options = selectBox.options;
                for (var i = 0; i < options.length; i++) {
                    if (options[i].text === occupation) {
                        options[i].selected = true;
                        break;
                    }
                }
            }
        }
    });
</script>

<?php get_footer(); ?>