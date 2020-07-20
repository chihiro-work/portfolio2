<?php
    $args = array(
    'posts_per_page' => 3, // 表示件数の指定
    'category_name' => 'service'
    );
    $posts = get_posts( $args );
    foreach ( $posts as $post ): // ループの開始
        setup_postdata( $post ); // 記事データの取得
    ?>
        <div class="service">
            <a href="<?php the_permalink();?>">
                <div class="service-img">
                    <img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" />
                </div>
                <div class="service-text"><?php the_title();?></div>
            </a>
        </div>
    <?php
        endforeach; //ループの終了
?>