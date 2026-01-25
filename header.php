<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Zen+Old+Mincho&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <?php wp_head(); ?>
</head>

<header class="header bg-white fixed w-full top-0 left-0 z-50">
    <div class="header-wrap flex w-[90%] mx-auto py-4">
        <div class="header-wrap-logo flex items-center">
            <a href="<?php echo home_url(); ?>" class="block w-[170px]">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/com/logo.png" alt="和幸">
            </a>
            <p class="ml-4 text-base font-bold">
                -新卒採用 2026-
            </p>
        </div>


        <nav class="header-wrap-list flex">
            <ul class="flex">
                <li><a href="<?php echo home_url(); ?>/about/">どんな会社？</a></li>
                <li><a href="<?php echo home_url(); ?>/about/">仕事紹介</a></li>
                <li class="mr-4"><a href="<?php echo home_url(); ?>/about/">先輩インタビュー</a></li>
                <li><a href="<?php echo home_url(); ?>/about/">お知らせ・ブログ</a></li>
                <li><a href="<?php echo home_url(); ?>/about/">保護者の方へ</a></li>
            </ul>
            <ol class="flex ml-4">
                <li class="mr-2">
                    <a class="bg-main text-white px-10 py-2 rounded font-bold text-xl" href="">INTERN</a>
                </li>
                <li>
                    <a class="bg-sub text-white px-10 py-2 rounded font-bold text-xl" href="">ENTRY</a>
                </li>
            </ol>

        </nav>
    </div>


</header>

<body <?php body_class(); ?>>