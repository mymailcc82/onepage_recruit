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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js"></script>


    <?php wp_head(); ?>
</head>

<header class="header bg-white fixed w-full top-0 left-0 z-50">
    <div class="header-wrap flex w-[90%] md:w-[95%] mx-auto py-4">
        <div class="header-wrap-logo flex items-center">
            <a href="<?php echo home_url(); ?>" class="block w-[134px] md:w-[170px]">
                <picture>
                    <source media="(max-width: 640px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/com/logo-white.png">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/com/logo.png" alt="">
                </picture>
            </a>
            <p class="ml-4 text-base sm:font-bold">
                -新卒採用 2026-
            </p>
        </div>


        <nav class="header-wrap-list flex">
            <ul class="flex">
                <li><a href="<?php echo home_url(); ?>/company/">どんな会社？</a></li>
                <li><a href="<?php echo home_url(); ?>/job/">仕事紹介</a></li>
                <li><a href="<?php echo home_url(); ?>/interview/">先輩インタビュー</a></li>
                <li><a href="<?php echo home_url(); ?>/archive/">お知らせ・ブログ</a></li>
                <li><a href="<?php echo home_url(); ?>/guardian/">保護者の方へ</a></li>
            </ul>
            <ol class="flex ml-4 hidden-middle">
                <li class="mr-2">
                    <a class="btn-intern px-10 py-2 rounded font-bold text-xl" href="<?php echo home_url(); ?>/intern/">INTERN</a>
                </li>
                <li>
                    <a class="btn-entry px-10 py-2 rounded font-bold text-xl" href="<?php echo home_url(); ?>/entry/">ENTRY</a>
                </li>
            </ol>
            <button class="header-button">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </div>
</header>

<div class="drawer">
    <div class="drawer-wrap">
        <div class="content-width">
            <ol class="flex justify-center mb-8">
                <li class="">
                    <a class="color-main bg-white px-10 py-2 rounded font-bold text-xl" href="<?php echo home_url(); ?>/intern/">INTERN</a>
                </li>
                <li>
                    <a class="bg-sub text-white px-10 py-2 rounded font-bold text-xl" href="<?php echo home_url(); ?>/entry/">ENTRY</a>
                </li>
            </ol>
            <ul class="">
                <li><a href="<?php echo home_url(); ?>/company/">どんな会社？</a></li>
                <li><a href="<?php echo home_url(); ?>/job/">仕事紹介</a></li>
                <li><a href="<?php echo home_url(); ?>/interview/">先輩インタビュー</a></li>
                <li><a href="<?php echo home_url(); ?>/archive/">お知らせ・ブログ</a></li>
                <li><a href="<?php echo home_url(); ?>/guardian/">保護者の方へ</a></li>
            </ul>
        </div>

    </div>
</div>

<body <?php body_class(); ?>>