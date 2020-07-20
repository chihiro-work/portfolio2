<?php
/*
Template Name: Contact ～コンタクトページ～
*/
?>

<!-- ヘッド部分 -->
<?php get_header(); ?>

<body id="_contact" <?php body_class(); ?>>

<!-- ヘッダー -->
<?php get_template_part('content', 'menu-contact'); ?>

    <main>
        <div class="main-img">
            <h2><?php echo get_the_title(); ?></h2>
            <span class="bg-text"><?php echo get_the_title(); ?> us</span>
        </div>

        <!-- contact -->
        <section class="contact-container common-container" id="_js_fv_height">

            <?php if(is_page('contact')):
                if (have_posts()):
                    while ( have_posts() ) : the_post(); ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php the_content(''); ?>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="post">
                        <h2>記事はありません</h2>
                        <p>お探しの記事は見つかりませんでした。</p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </section>
    </main>
    <!-- footer -->
    <?php get_footer(); ?>

    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <!-- swiper -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
</body>
</html>