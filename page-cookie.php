<?php
$company_name = get_option('onepage_company_name', '');
?>
<?php get_header(); ?>
<main class="page-main else">
    <div class="page-visual-simple bg-sub">
        <div class="content-width">
            <div class="page-visual-simple-title">
                <span class="text-white">COOKIE POLICY</span>
                <h1 class="h1-small">クッキーポリシー</h1>
            </div>
        </div>
        <div class="bg-clip-sub bg-main"></div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><span>クッキーポリシー</span></li>
        </ul>
    </div>
    <section class="else-sec">
        <div class="content-width-small">

            <p class="mb-4">
                <?php echo esc_html($company_name); ?>（以下「当社」といいます）は、当社の採用サイト（以下「当サイト」といいます）において、ユーザーの利便性向上およびサイトの改善のためにクッキー（Cookie）を使用しています。本ポリシーでは、当サイトにおけるクッキーの利用について説明します。
            </p>
            <ul>
                <li>
                    <h2>第1条（クッキーとは）</h2>
                    <p>
                        クッキーとは、ウェブサイトを訪問した際にブラウザを通じてお客様のデバイスに保存される小さなテキストファイルです。クッキーにより、ユーザーの過去の行動や設定が記録され、次回訪問時により便利に利用できるようになります。
                    </p>
                </li>
                <li>
                    <h2>第2条（クッキーの利用目的）</h2>
                    <p>
                        当社は以下の目的でクッキーを利用しています。<br><br>
                        1.ウェブサイトの利用状況の分析（例：アクセス数、閲覧ページ等の集計）<br>
                        2.サイトの利便性向上および機能改善<br>
                        3.サイトの表示内容や広告の最適化（※広告を使用している場合）<br><br>
                        ※当サイトではGoogle Analytics等の解析ツールを使用する場合があります。
                    </p>
                </li>
                <li>
                    <h2>第3条（第三者によるクッキー）</h2>
                    <p>
                        当サイトでは、Google LLCなど第三者によるクッキーを利用する場合があります。これらのクッキーは、第三者がユーザーの閲覧履歴を収集・分析するために使用されることがあります。
                        Google Analyticsのクッキー使用に関する詳細は、<a class="text-decoration color-sub" href="https://marketingplatform.google.com/about/analytics/terms/jp/" target="_blank" rel="noopener noreferrer">Googleのポリシー</a>をご覧ください。
                    </p>
                </li>
                <li>
                    <h2>第4条（クッキーの管理方法）</h2>
                    <p>ユーザーは、ブラウザの設定を変更することにより、クッキーの受け取りを拒否することや、既存のクッキーを削除することが可能です。ただし、クッキーを無効化すると、当サイトの一部機能が正しく動作しない場合があります。</p>
                </li>
                <li>
                    <h2>第5条（ポリシーの変更）</h2>
                    <p>本ポリシーの内容は、必要に応じて予告なく変更されることがあります。変更後は、当サイト上での公表をもって効力を生じるものとします。</p>
                </li>
            </ul>

        </div>

    </section>
    <?php get_template_part('inc/inc-aside'); ?>
</main>
<?php get_footer(); ?>