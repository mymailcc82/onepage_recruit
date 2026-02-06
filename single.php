<?php get_header(); ?>
<main class="page-main news-main single-news">
    <div class="page-visual-simple bg-sub">
        <div class="content-width">
            <div class="page-visual-simple-title">
                <span class="text-white">NEWS / BLOG</span>
                <h1 class="h1-small">お知らせ・ブログ</h1>
            </div>
        </div>
        <div class="bg-clip-sub bg-main"></div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">TOP</a></li>
            <li><a href="<?php echo home_url(); ?>/archive/">お知らせ・ブログ</a></li>
            <li><span><?php the_title(); ?></span></li>
        </ul>
    </div>

    <div class="news-wrap">
        <div class="news-wrap-left">
            <?php while (have_posts()) : the_post(); ?>
                <?php $categories = get_the_category(); ?>

                <article class="article">
                    <div class="info">
                        <ul>
                            <?php if (!empty($categories)): ?>
                                <?php foreach ($categories as $category): ?>
                                    <li>
                                        <a href="<?php echo get_category_link($category->term_id); ?>">
                                            <?php echo esc_html($category->name); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                        <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
                    </div>
                    <h1><?php the_title(); ?></h1>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="thumb">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                    <div class="com-btn-sub mt-10 max-w-[400px] mx-auto">
                        <a href="<?php echo home_url(); ?>/archive/">一覧に戻る<i></i></a>
                    </div>

                </article>
            <?php endwhile; ?>
        </div>
        <div class="news-wrap-right">
            <h3>おすすめ記事</h3>
            <?php $args = array(
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID()),
            );
            $recommended_posts = get_posts($args);
            if ($recommended_posts) : ?>
                <ul class="recommended-posts">
                    <?php foreach ($recommended_posts as $post) : setup_postdata($post); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="thumb">
                                        <?php the_post_thumbnail('large'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="info">
                                    <?php $categories = get_the_category(); ?>
                                    <?php if (!empty($categories)): ?>
                                        <span><?php echo esc_html($categories[0]->name); ?></span>
                                    <?php endif; ?>
                                    <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
                                </div>
                                <h4><?php the_title(); ?></h4>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php get_template_part('inc/inc-aside'); ?>
<?php get_footer(); ?>