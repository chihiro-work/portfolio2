<!-- ヘッド部分 -->
<?php get_header(); ?>

<body id="_blogitem"<?php body_class(); ?>>

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
            <section class="blogitem-container common-container" id="_js_fv_height">
                <!-- 記事のループ -->
                <article class="article-list">
                    <?php if(have_posts()): ?> <!--投稿の有無を確認-->
                        <?php while(have_posts()):the_post(); ?> <!--固定ページなので本来はloopが必要ない。害がないので残しているだけ。-->

                        <article class="article-item">
                            <div class="article-head">
                                <?php
                                    $categories = get_the_category();
                                    foreach($categories as $category):
                                        $category_name = $category -> name;
                                        ?>
                                        <h3 class="category-label">
                                        <?php
                                            echo $category_name;
                                        ?>
                                        </h3>
                                    <?php endforeach; ?>
                                <span><?php the_time("Y年m月j日"); ?></span>
                                <h2 class="article-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </div>
                            <div class="article-body">
                                <?php the_content(); ?>
                            </div>
                        </article>

                        <?php endwhile; //end while have_post?>

                    <div class="pagenation">
                        <ul>
                            <li class="prev"><?php previous_post_link('%link', 'PREV'); ?></li>
                            <li class="next"><?php next_post_link('%link', 'NEXT'); ?></li>
                        </ul>
                    </div>
                    <?php else : ?>
                        <h2 class="title">記事が見つかりませんでした。</h2>
                        <p>検索で見つかるかもしれません。</p><br />
                        <?php get_search_form(); ?>　<!--検索フォームを表示。search.phpを表示-->
                    <?php endif; ?>
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