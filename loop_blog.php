<?php
//表示件数の調整
 //query_posts('posts_per_page=3');
?>

<?php if(have_posts()): ?>
    <?php while(have_posts()):the_post(); ?>
    <article class="article-item">
        <div class="item-head">
            <?php
                $categories = get_the_category();

                foreach($categories as $category):
                    $category_name = $category -> name;
                    ?>
                    <h3 class="category-label">
                        <?php echo $category_name; ?>
                    </h3>
            <?php endforeach; ?>
            <span><?php the_time("Y年m月j日"); ?></span>
        </div>
        <div class="item-body">
            <div class="img-wrap">
                <a href="<?php the_permalink();?>">
                    <img src="<?php echo catch_that_image();?>" alt="<?php the_title();?>">
                </a>
            </div>
            <div class="text-wrap">
                <h2 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                <p class="text"><?php echo get_the_excerpt(); ?></p>
            </div>
        </div>
    </article>
    <?php endwhile; //end while have_post?>

<?php endif; //end have_post?>

<?php if(function_exists("pagination")) //pagination($additional_loop->max_num_pages); ?>

