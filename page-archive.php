<?php get_header(); ?>
<main class="page-main news-main">
    <div class="page-visual">
        <div class="bg-clip-main bg-main"></div>
        <div class="page-visual-img">
            <?php
            $img_main = get_field('main_img'); ?>
            <?php if ($img_main): ?>
                <img src="<?php echo esc_url($img_main); ?>" alt="">
            <?php else: ?>
            <?php endif; ?>
        </div>
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
                <?php
                // カテゴリー一覧を取得
                $categories = get_categories(array(
                    'orderby' => 'name',
                    'order'   => 'ASC',
                    'hide_empty' => false,
                ));
                foreach ($categories as $category) :
                ?>
                    <li><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo esc_html($category->name); ?></a></li>
                <?php endforeach; ?>
            </ul>

            <?php
            //postの総件数を取得
            $total_posts = wp_count_posts()->publish;
            ?>

            <div class="number flex">
                <h3>すべての記事</h3><span><?php echo $total_posts; ?>件</span>
            </div>

            <div class="news-main-list flex flex-wrap">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <div class="news-main-list-wrap">
                            <a href="<?php the_permalink(); ?>">
                                <div class="news-main-list-wrap-img">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/com/noimage.jpg" alt="サムネイル画像なし">
                                    <?php endif; ?>
                                </div>
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) : ?>
                                    <span><?php echo esc_html($categories[0]->name); ?></span>
                                <?php endif; ?>
                                <time><?php echo get_the_date('Y.m.d'); ?></time>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </a>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p>記事が見つかりませんでした。</p>
                <?php endif; ?>
            </div>
            <?php custom_pagination($the_query); ?>

        </div>
    </div>
</main>
<?php get_template_part('inc/inc-aside'); ?>
<?php get_footer(); ?>