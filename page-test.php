<?php get_header(); ?>
<main class="page-main news-main">
    <div class="page-visual">
        <div class="bg-clip-main bg-main"></div>
        <div class="page-visual-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/company/company-visual.jpg" alt="どんな会社？"></div>
        <div class="page-visual-title">
            <span class="font-en">NEWS / BLOG</span>
            <h1>お知らせ・ブログ</h1>
        </div>
        <div class="bg-clip-sub bg-sub"></div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><span>お知らせ・ブログ</span></li>
        </ul>
    </div>

    <div class="content-width">
        <div class="news-main-wrap">
            <ul class="flex flex-wrap js-tab-list">
                <li class="active"><span>すべての記事</span></li>
                <li><span>お知らせ</span></li>
                <li><span>ブログ</span></li>
                <li><span>イベント情報</span></li>
            </ul>

            <div class="number flex">
                <h3>すべての記事</h3><span>30件</span>
            </div>

            <div class="news-main-list flex flex-wrap">
                <div class="news-main-list-wrap">
                    <div class="news-main-list-wrap-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/guardian/img01.jpg" alt=""></div>
                    <span>お知らせ</span>
                    <time>2024.01.29</time>
                    <h3>採用サイトをオープンしました。</h3>
                </div>

                <div class="news-main-list-wrap">
                    <div class="news-main-list-wrap-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/guardian/img01.jpg" alt=""></div>
                    <span>お知らせ</span>
                    <time>2024.01.29</time>
                    <h3>採用サイトをオープンしました。</h3>
                </div>

                <div class="news-main-list-wrap">
                    <div class="news-main-list-wrap-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/guardian/img01.jpg" alt=""></div>
                    <span>お知らせ</span>
                    <time>2024.01.29</time>
                    <h3>採用サイトをオープンしました。</h3>
                </div>

                <div class="news-main-list-wrap">
                    <div class="news-main-list-wrap-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/guardian/img01.jpg" alt=""></div>
                    <span>お知らせ</span>
                    <time>2024.01.29</time>
                    <h3>採用サイトをオープンしました。</h3>
                </div>

                <div class="news-main-list-wrap">
                    <div class="news-main-list-wrap-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/guardian/img01.jpg" alt=""></div>
                    <span>お知らせ</span>
                    <time>2024.01.29</time>
                    <h3>採用サイトをオープンしました。</h3>
                </div>

                <div class="news-main-list-wrap">
                    <div class="news-main-list-wrap-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/guardian/img01.jpg" alt=""></div>
                    <span>お知らせ</span>
                    <time>2024.01.29</time>
                    <h3>採用サイトをオープンしました。</h3>
                </div>
            </div>

        </div>
    </div>
</main>

<?php get_footer(); ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const list = document.querySelector('.js-tab-list');
        const items = list.querySelectorAll('li');

        items.forEach(item => {
            item.addEventListener('click', () => {
                items.forEach(el => el.classList.remove('active'));
                item.classList.add('active');
            });
        });
    });
</script>