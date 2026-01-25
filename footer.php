<footer class="footer relative z-20">
    <div class="content-width">
        <div class="footer-wrap">
            <div class="footer-wrap-left">
                <h2 class="max-w-[256px] mb-2"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/com/logo.png" alt="ロゴ"></h2>
                <h3 class="mb-6 text-base font-bold color-main">-新卒採用 2026-</h3>
                <p class="text-sm leading-7 mb-6">
                    〒460-0002<br>
                    愛知県名古屋市中区丸の内2丁目14-16<br>
                    河合ビル6F<br>
                    MAIL：contact@onepage.co.jp<br>
                    TEL：052-223-0200
                </p>
                <div class="com-btn-sub com-btn-sub--small max-w-[314px]">
                    <a href="" class="text-base">コーポレートサイトを見る<i class="target"></i></a>
                </div>
                <ul>
                    <li>
                        <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-footer-instagram.svg" alt="Facebook"></a>
                    </li>
                    <li>
                        <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-footer-x.svg" alt="Facebook"></a>
                    </li>
                    <li>
                        <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-footer-facebook.svg" alt="Facebook"></a>
                    </li>
                    <li>
                        <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-footer-youtube.svg" alt="Facebook"></a>
                    </li>
                </ul>
            </div>
            <div class="footer-wrap-right">
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
                <ol>
                    <li>
                        <a href="">個人情報保護方針</a>
                    </li>
                    <li>
                        <a href="">Cookieポリシー</a>
                    </li>
                    <li>
                        <a href="">サイトマップ </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <p class="bg-main text-center text-white text-sm py-4 mt-8 mb-0">
        © Onepage,Inc All Rights Reserved.
    </p>

</footer>

<?php wp_footer(); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>


<script>
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