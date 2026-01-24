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