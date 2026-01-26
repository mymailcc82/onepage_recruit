<?php get_header(); ?>
<main class="page-main recruit-main">
    <div class="page-visual-simple bg-sub">
        <div class="content-width">
            <div class="page-visual-simple-title">
                <span class="text-white">INTERN</span>
                <h1 class="h1-small">インターン</h1>
            </div>
        </div>
        <div class="bg-clip-sub bg-main"></div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><span>インターン</span></li>
        </ul>
    </div>

    <article class="recruit-article">
        <div class="content-width">
            <div class="recruit-article-wrap">
                <h1 class="mb-2">インターン募集中！</h1>
                <p class="desc mb-6">
                    ワンページでは、制作・営業・カスタマーなど、各分野のインターンを実施しています。
                    「どの仕事が自分に合っているかわからない」そんな方でも大丈夫。実際の業務に触れながら、仕事の違いやチームの雰囲気を体験できます。未経験の方も歓迎。社員がサポートしながら進めるので、初めてのインターンでも安心して参加できます。
                </p>
                <div class="main-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/page/recruit-img.jpg" alt="募集要項画像1">
                </div>

                <div class="main-tab-content">
                    <div class="main-tab-content-01 active">
                        <h2><span>募集要項</span></h2>
                        <div class="main-tab-content-dl">
                            <dl>
                                <dt>
                                    職種
                                </dt>
                                <dd>
                                    企業サイト・採用サイトなどのWEB制作ディレクター
                                </dd>
                            </dl>
                            <dl>
                                <dt>雇用形態</dt>
                                <dd>
                                    正社員<br><br>
                                    正社員（試用期間：3ヶ月）<br>
                                    ◎試用期間中の給与・待遇は変わりません。
                                </dd>
                            </dl>
                        </div>

                    </div>
                </div>

                <div class="main-btn mt-10">
                    <div class="aside-wrap-col-full">
                        <a href="">
                            <span>ENTRY</span>
                            <h3>この職種に応募する！</h3>
                            <i></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="com-btn-black max-w-[399px] mx-auto mt-10 mb-16">
                <a href="<?php echo home_url(); ?>/entry/">一覧に戻る<i></i></a>
            </div>

        </div>


    </article>
</main>
<?php get_template_part('inc/inc-aside'); ?>

<?php get_footer(); ?>