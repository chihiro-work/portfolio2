<?php
    $args = array(
    'posts_per_page' => 3, // 表示件数
    'category_name' => 'works'
    );
    $posts = get_posts( $args );
    foreach ( $posts as $post ): // ループの開始
        setup_postdata( $post ); // 記事データ取得
?>
        <div class="work">
            <a href="<?php the_permalink();?>">
                <div class="work-text">
                    <h2><?php the_title();?></h2>
                    <?php the_content('全文を表示'); ?>
                    <span class="post-date"><?php the_time("Y年m月j日"); ?></span>
                </div>
            </a>
        </div>

<?php
    endforeach; //ループの終了
?>

