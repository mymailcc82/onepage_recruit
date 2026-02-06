<?php if (is_singular('recruit')): ?>
    <div class="footer-fixed">
        <a href="<?php echo home_url(); ?>/entry/?occupation=<?php echo urlencode(get_the_title()); ?>">
            <p>
                <i></i>
                <span>この職種に<br>応募する</span>
            </p>
        </a>
    </div>
<?php elseif (is_page("entry") || is_page("intern") || is_page("contact") || is_page("confirm") || is_page("thanks")): ?>
<?php else: ?>
    <div class="footer-fixed">
        <a href="<?php echo home_url(); ?>/intern/">
            <p>
                <i></i>
                <span>インターン<br>募集中！</span>
            </p>
        </a>
    </div>
<?php endif; ?>


<footer class="footer relative z-20">
    <div class="content-width">
        <div class="footer-wrap">
            <div class="footer-wrap-left">
                <h2 class="max-w-[256px] mb-2"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/com/logo.png" alt="ロゴ"></h2>
                <h3 class="mb-6 text-base font-bold color-main">-新卒採用 2026-</h3>
                <p class="text-sm leading-7 mb-6">
                    〒<?php echo esc_html(get_option('onepage_company_zipcode', '')); ?><br>
                    <?php echo esc_html(get_option('onepage_company_address', '')); ?><br>
                    MAIL：<?php echo esc_html(get_option('onepage_company_email', '')); ?><br>
                    TEL：<?php echo esc_html(get_option('onepage_company_tel', '')); ?>
                </p>
                <?php $corporate_url = get_option('onepage_footer_corporate_url', ''); ?>
                <?php if ($corporate_url): ?>
                    <div class="com-btn-sub com-btn-sub--small max-w-[314px]">
                        <a href="<?php echo esc_url($corporate_url); ?>" target="_blank" rel="noopener noreferrer" class="text-base">コーポレートサイトを見る<i class="target"></i></a>
                    </div>
                <?php endif; ?>
                <ul>
                    <?php if ($instagram_url = get_option('onepage_footer_instagram_url', '')): ?>
                        <li>
                            <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-footer-instagram.svg" alt="Instagram"></a>
                        </li>
                    <?php endif; ?>
                    <?php if ($x_url = get_option('onepage_footer_x_url', '')): ?>
                        <li>
                            <a href="<?php echo esc_url($x_url); ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-footer-x.svg" alt="X"></a>
                        </li>
                    <?php endif; ?>
                    <?php if ($facebook_url = get_option('onepage_footer_facebook_url', '')): ?>
                        <li>
                            <a href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-footer-facebook.svg" alt="Facebook"></a>
                        </li>
                    <?php endif; ?>
                    <?php if ($youtube_url = get_option('onepage_footer_youtube_url', '')): ?>
                        <li>
                            <a href="<?php echo esc_url($youtube_url); ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-footer-youtube.svg" alt="YouTube"></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="footer-wrap-right">
                <ul class="hidden-mobile">
                    <li><a href="<?php echo home_url(); ?>/">トップ</a></li>
                    <li><a href="<?php echo home_url(); ?>/company/">どんな会社？</a></li>
                    <li><a href="<?php echo home_url(); ?>/job/">仕事紹介</a></li>
                    <li><a href="<?php echo home_url(); ?>/interview/">先輩インタビュー</a></li>
                    <li><a href="<?php echo home_url(); ?>/guardian/">保護者の方へ</a></li>
                </ul>
                <ul class="hidden-mobile">
                    <li><a href="<?php echo home_url(); ?>/archive/">お知らせ・ブログ</a></li>
                    <li><a href="<?php echo home_url(); ?>/intern/">インターン情報</a></li>
                    <li><a href="<?php echo home_url(); ?>/recruit/">募集要項</a></li>
                    <li><a href="<?php echo home_url(); ?>/entry/">エントリー</a></li>
                    <li><a href="<?php echo home_url(); ?>/contact/">お問い合わせ</a></li>
                </ul>
                <ol>
                    <li>
                        <a href="<?php echo home_url(); ?>/privacy/">個人情報保護方針</a>
                    </li>
                    <li>
                        <a href="<?php echo home_url(); ?>/cookie/">Cookieポリシー</a>
                    </li>
                    <li>
                        <a href="<?php echo home_url(); ?>/sitemap/">サイトマップ </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <p class="bg-main text-center text-white text-xs sm:text-sm py-2 sm:py-4 mt-8 mb-0">
        © Onepage,Inc All Rights Reserved.
    </p>

</footer>

<?php wp_footer(); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const textarea = document.querySelector('textarea[name="others_message"]');
        const counter = document.getElementById("text_count");
        const maxLength = 1000;

        function updateCount() {
            const currentLength = textarea.value.length;
            const remaining = maxLength - currentLength;
            counter.textContent = remaining;
        }

        // 初期表示用
        updateCount();

        // 入力があるたびに更新
        textarea.addEventListener("input", updateCount);
    });
</script>
<script>
    $(document).on('change', '.upload-1', function() {
        var file = $(this).prop('files')[0];
        var $box = $(this).closest('.upload-box');

        if (file) {
            // ファイル名表示
            $box.find('.js-upload-filename-1').text(file.name);

            // 画像プレビュー
            if (file.type.startsWith('image/')) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    console.log(e.target.result);
                    $('#image_preview').html(
                        `<img src="${e.target.result}" style="max-width:200px;">`
                    );
                    $('input[name="image_preview_url"]').val(e.target.result);
                };
                reader.readAsDataURL(file);
            }
        } else {
            // ファイル未選択時
            $box.find('.js-upload-filename-1').text('選択されていません');
            $box.find('.preview').empty(); // プレビューも消す
        }
    });
    <?php if (is_page("confirm")): ?>
        //name=image_preview_urlにあるなら、$('#image_preview').html(`<img src="${e.target.result}" style="max-width:200px;">`);
        $(document).ready(function() {
            var previewUrl = $('input[name="image_preview_url"]').val();
            if (previewUrl) {
                $('#image_preview').html(`<img src="${previewUrl}" style="max-width:200px;">`);
            } else {
                //$('#image_preview').html('画像が選択されていません');
            }
        });

    <?php endif; ?>
</script>
<script>
    //エントリーで誕生日自動付与
    const input = document.getElementById('dateInput');
    //typeをtextから数字に変更
    input.type = 'tel';
</script>
<script>
    $(document).ready(function() {
        var val = $('.mw-wp-form_file input[name="upload_01"]').val();
        if (val) {
            //valの最初のupload-を削除
            //val = val.replace(/upload-/, '');
            $(".js-upload-filename-1").text(val);
            //$(".preview").css("display", "block");

        } else {
            $(".js-upload-filename-1").text('選択されていません');
        }
    });
    $(document).on('change', '.upload-1', function() {
        var file = $(this).prop('files')[0];
        if (file) {
            $(this).closest('.upload-box').find('.js-upload-filename-1').text(file.name);
            //$(".preview").css("display", "block");
        } else {
            $(this).closest('.upload-box').find('.js-upload-filename-1').text('選択されていません');
        }
    });

    //.mwform-checkbox-fieldの.mwform-checkbox-field-textに<a href="/privacy" target="_blank" class="contact_inner_form-link">個人情報保護方針</a>に同意する'を追加
    $(document).ready(function() {
        // .mwform-checkbox-field の中の .mwform-checkbox-field-text を探す
        $('.mwform-checkbox-field .mwform-checkbox-field-text').html(
            '<a href="/privacy" target="_blank" class="contact_inner_form-link">個人情報保護方針</a>に同意する'
        );
    });
</script>
<script>
    if (document.getElementById('datepicker')) {
        const picker = new easepick.create({
            element: document.getElementById('datepicker'),
            lang: 'ja-JP',
            css: [
                'https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css',
            ],
            plugins: ['AmpPlugin'],
            AmpPlugin: {
                dropdown: {
                    months: true,
                    years: true,
                    minYear: 1920,
                    maxYear: new Date().getFullYear(),
                },
            },
            setup(calendar) {
                calendar.on('view', () => {
                    // Processing when calendar is displayed.
                })

                calendar.on('click', () => {
                    // Processing when clicked.
                })

                calendar.on('select', (event) => {
                    const selectedDate = event.detail.date.format('YYYY-MM-DD');
                    document.querySelector('.start-date').value = selectedDate;
                })
            }
        });
    }




    document.addEventListener('DOMContentLoaded', () => {
        const slideCount = document.querySelectorAll('.gallery-swiper .swiper-slide').length;

        const gallerySwiper = new Swiper('.gallery-swiper', {
            loop: true,
            speed: 600,
            centeredSlides: true,
            slidesPerView: 'auto',
            spaceBetween: 90,

            // ✅ 3枚でもループ破綻しにくくする設定
            //loopedSlides: slideCount, // v7で効く
            //loopAdditionalSlides: slideCount * 2, // クローンを多めに作る

            grabCursor: true,


            navigation: {
                nextEl: '.gallery-next',
                prevEl: '.gallery-prev',
            },
            pagination: {
                el: '.gallery-pagination',
                clickable: true,
            },
        });
    });
</script>
</body>

</html>