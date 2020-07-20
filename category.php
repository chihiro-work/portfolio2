<!-- ヘッド部分 -->
<?php get_header(); ?>

<body id="_bloglist" <?php body_class(); ?>>

<!-- ヘッダー -->
<?php get_template_part('content', 'menu-other'); ?>

    <!-- メイン画像 -->
    <div class="main-img">
        <h2>Blog</h2>
        <span class="bg-text">Our Blog</span>
    </div>

    <section class="main-container">
        <main>
            <!-- blog -->
            <section class="bloglist-container common-container" id="_js_fv_height">
                <!-- 記事のループ -->
                <article class="article-list">
                    <?php get_template_part('loop_blog'); ?>
                    <?php if (function_exists("pagination")) pagination($wp_query->max_num_pages); ?>
                </article>
            </section>
        </main>

        <!-- サイドバー -->
        <?php include('sidebar.php'); ?>
    </section>

    <!-- トップに戻るボタン -->
    <div class="btn-top"><span>PAGE<br />TOP</span></div>

    <!-- footer -->
    <?php get_footer(); ?>

    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
</body>
</html>