<?php

/*============================================
カスタムメニュー
============================================*/
register_nav_menu('mainmenu', 'メインメニュー');

/*============================================
カスタムウィジェット
============================================*/

//ウィジェットエリアを作成する関数の登録
add_action('widgets_init', 'my_widgets_area');

//ウィジェットを作成する関数の登録
add_action('widgets_init', function() {
    return "'" . register_widget("my_widgets_slider"). "'";
});

//ウィジェットエリアを作成
function my_widgets_area() {

    /*========== スライダー ==========*/
    register_sidebar( array(
        'name' => 'スライダーエリア',
        'id' => 'widget_silder',
        'before_widget' => '<div>',
        'after_widget' => '</div>'
    ));

    /*========== サイドバー ==========*/
    register_sidebar( array(
        'name' => '右側サイドバー',
        'id' => 'my_sidebar',
        'before_widget' => '<div class="sidebar-item">',
        'after_widget' => '</div>',
        'befor_title' => '<h2 class="rounded">',
        'after_title' => '</h2>'
    ));

}

//ウィジェットを作成
class my_widgets_slider extends WP_Widget {

    //管理画面で表示するウィジェット名を設定
    function __construct() {
        parent::__construct(false, $name = 'スライダーウィジェット');
    }

    //ウィジェットの入力項目を作成
    function form($instance) {
        //サニタイズ
        $img_src = esc_attr($instance['img_src']);
        $img_alt = esc_attr($instance['img_alt']);
        $title = esc_attr($instance['title']);
        $sub_title = esc_attr($instance['sub_title']);
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('img_src'); ?>">
                <?php echo '画像パス:'; ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('img_src'); ?>" name="<?php echo $this->get_field_name('img_src'); ?>" type="text" value="<?php echo $img_src; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('img_alt'); ?>">
                <?php echo '画像の説明:'; ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('img_alt'); ?>" name="<?php echo $this->get_field_name('img_alt'); ?>" type="text" value="<?php echo $img_alt; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php echo 'タイトル:'; ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('sub_title'); ?>">
                <?php echo 'サブタイトル：'; ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('sub_title'); ?>" name="<?php echo $this->get_field_name('sub_title'); ?>" type="text" value="<?php echo $sub_title; ?>" />
        </p>
    <?php
    }

    //ウィジェットに入力された情報を保存
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        //サニタイズ
        $instance['img_src'] = strip_tags($new_instance['img_src']);
        $instance['img_alt'] = strip_tags($new_instance['img_alt']);
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['sub_title'] = trim($new_instance['sub_title']);

        return $instance;

    }

    //管理画面から入力されたウィジェットを画面に表示
    function widget($args, $instance) {

        //ウィジェットから入力された情報を取得
        $img_src = $instance['img_src'];
        $img_alt = $instance['img_alt'];
        $title = $instance['title'];
        $sub_title = $instance['sub_title'];

        //ウィジェットから入力された情報がある場合、 htmlを表示する
        if($img_src) {
?>
            <div class="swiper-slide">
                <div class="s-content">
                    <img src="<?php echo $img_src; ?>" alt="<?php echo $img_alt; ?>">
                    <div class="s-text">
                        <h2><?php echo $title; ?></h2>
                        <h3><?php echo $sub_title; ?></h3>
                    </div>
                </div>
            </div>
<?php
        }
    }
}

/*============================================
投稿記事にある最初の画像を取得する
============================================*/
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

if(empty($first_img)){ //Defines a default image
        $first_img = "";
    }
    return $first_img;
}

/*============================================
ページネーション
============================================*/
function pagination($pages = '', $range = 2)
{
    $showitems = ($range * 2)+1; //表示するページ数(5ページを表示)

    global $paged; //現在のページ数
    if(empty($paged)) $paged = 1; //デフォルトのページ

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;//全ページ数を取得
        if(!$pages)//全ページ数が空の場合は、1とする
        {
            $pages = 1;
        }
    }

    if(1 != $pages) //全ページが1でない場合はページネーションを表示する
    {
        echo "<div class=\"pagenation\">\n";
        echo "<ul>\n";

        //Prev:現在のページ値が１より大きい場合は表示
        if($paged > 1) 
        echo "<li class=\"prev\"><a href=\"".get_pagenum_link($paged - 1)."\">Prev</a></li>\n";
        {
            for($i=1; $i <= $pages; $i++)
            {
                if(1 !=$pages && ( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems))
                {
                    //参考演算子での条件分岐
                    echo ($paged == $i)? "<li class=\"active\">".$i."</li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";

                }
            }
        }

        //Next:総ページ数より現在のページ値が小さい場合は表示
        if($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">Next</a></li>\n";
        {
            echo "</ul>\n";
            echo "</div>\n";
        }
    }
}
/*============================================
カテゴリーリンク取得
============================================*/
function cat_link($catid){
    $categories = get_the_category();
    foreach($categories as $category):
        if ( $category->term_id === $catid ) {
            $link = get_category_link( $category->term_id );
            echo $link;
        }
    endforeach;
}
/*============================================
続きを読むを付与
============================================*/
function twpp_change_excerpt_more( $more ) {
    $html = '<a href="' . esc_url( get_permalink() ) . '">[...続きを読む]</a>';
    return $html;
  }
  
  add_filter( 'excerpt_more', 'twpp_change_excerpt_more' );