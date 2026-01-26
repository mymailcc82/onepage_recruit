<?php get_header(); ?>
<main class="page-main recruit-main">
    <div class="page-visual-simple bg-sub">
        <div class="content-width">
            <div class="page-visual-simple-title">
                <span class="text-white">RECRUIT</span>
                <h1 class="h1-small">募集要項</h1>
            </div>
        </div>
        <div class="bg-clip-sub bg-main"></div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><span>募集要項</span></li>
        </ul>
    </div>

    <article class="recruit-article">
        <div class="content-width">
            <div class="recruit-article-wrap">
                <ul>
                    <li>#制作</li>
                    <li>#制作</li>
                </ul>
                <h1 class="mb-2">Webディレクター</h1>
                <p class="desc mb-6">
                    あなたの企画・提案が、企業の未来を変える。
                    WEBディレクターとしてサイト制作の進行管理だけでなく、課題発見から解決の提案まで一貫して携われる環境です。
                    採用サイトやブランドサイト、パンフレットやロゴなど、多彩な案件に挑戦可能。常に新しい表現・新しい解決策を追求する方にとって、成長のチャンスが広がっています。
                </p>
                <div class="main-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/page/recruit-img.jpg" alt="募集要項画像1">
                </div>

                <div class="main-tab-btn">
                    <ul>
                        <li><a href="javascript:void(0)" class="active">募集要項</a></li>
                        <li><a href="javascript:void(0)">1日のスケジュール例</a></li>
                    </ul>

                </div>
                <div class="main-tab-content">
                    <div class="main-tab-content-01 ">
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
                    <div class="main-tab-content-02 active">
                        <h2><span>1日のスケジュール例</span></h2>

                        <div class="main-tab-content-table">
                            <dl>
                                <dt><span>9:30</span></dt>
                                <dd>
                                    <h3>出社・メール確認</h3>
                                    <p>
                                        月曜日のみ朝礼があり、それ以外の曜日は出社後すぐに業務に取り掛かります。
                                    </p>
                                    <div class="table-img">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/page/recruit-img.jpg" alt="募集要項画像1">
                                    </div>
                                </dd>
                            </dl>
                            <dl>
                                <dt><span>9:30</span></dt>
                                <dd>
                                    <h3>出社・メール確認</h3>
                                    <p>
                                        月曜日のみ朝礼があり、それ以外の曜日は出社後すぐに業務に取り掛かります。
                                    </p>
                                    <div class="table-img">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/page/recruit-img.jpg" alt="募集要項画像1">
                                    </div>
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