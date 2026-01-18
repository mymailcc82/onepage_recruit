<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Zen+Old+Mincho&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<header class="header">
    <div class="header-wrap flex w-[90%] mx-atuo py-4">
        <div class="header-wrap-logo">
            <a href="<?php echo home_url(); ?>" class="block">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/com/logo.png" alt="和幸">
            </a>
        </div>
        <nav class="header-wrap-list">
            <ul class="flex">
                <li><a href="<?php echo home_url(); ?>/about/">私たちについて</a></li>
                <li class="mr-4"><a href="<?php echo home_url(); ?>/about/">私たちについて</a></li>
                <li><a href="<?php echo home_url(); ?>/about/">私たちについて</a></li>
                <li><a href="<?php echo home_url(); ?>/about/">私たちについて</a></li>
                <li><a href="<?php echo home_url(); ?>/about/">私たちについて</a></li>
                <li><a href="<?php echo home_url(); ?>/about/">私たちについて</a></li>
                <li><a href="<?php echo home_url(); ?>/about/">aaa</a></li>
            </ul>

        </nav>
    </div>


</header>

<body>