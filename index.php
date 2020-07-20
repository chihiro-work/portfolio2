<?php
/*
Template Name: Home ～トップページ～
*/
?>

<!-- ヘッド部分 -->
<?php get_header(); ?>

<body id="_top" <?php body_class(); ?>>

<!-- ヘッダー -->
<?php get_template_part('content', 'menu'); ?>

<main>
    <!-- スライダー -->
    <section class="swiper-container">
        <div class="swiper-wrapper">
            <?php dynamic_sidebar('スライダーエリア'); ?>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- concept -->
    <section class="concept-container common-container" id="concept">
        <div class="headline-wrap">
            <h2>CONCEPT</h2>
            <hr>
        </div>
        <h3>“働きたくなる空間”をデザインすることで<br />人々を幸せにする。</h3>
        <div class="concept-content">
            <div class="concept-text">
                私たちは、オフィスに特化した空間デザイン専門としております。その理由は、「働きたくなる空間で仕事ができれば多くの人を幸せにできるのではないか」と考えるためです。そんな想いの株式会社Cresta Designだからこそできる空間デザインを提供させていただきます。
            </div>
            <div class="concept-img">
                <img src="<?php echo get_template_directory_uri(); ?>/img/concept-image@2x.jpg" alt="">
            </div>
        </div>
        <span class="bg-text">Our Concept</span>
    </section>

    <!-- works -->
    <section class="works-container common-container" id="works">
        <div class="headline-wrap">
            <h2>Works</h2>
            <hr>
        </div>
        <div class="works">
            <?php // dynamic_sidebar('worksエリア'); ?>

            <!-- 記事のループ -->
            <?php get_template_part('loop_works'); ?>

        </div>
        <div class="btn-wrap">
            <a class="common-btn" href="<?php cat_link(4); ?>">View more</a>
        </div>
        <span class="bg-text">Our Works</span>
    </section>

    <!-- service -->
    <section class="service-container common-container" id="service">
        <div class="headline-wrap">
            <h2>Service</h2>
            <hr>
        </div>
        <div class="services">
            <?php // dynamic_sidebar('serviceエリア'); ?>

            <!-- 記事のループ -->
            <?php get_template_part('loop_service'); ?>

        </div>
        <div class="btn-wrap">
            <a class="common-btn" href="<?php cat_link(3); ?>">View more</a>
        </div>
        <span class="bg-text">Our Service</span>
    </section>

    <!-- contact -->
    <section class="contact-container common-container" id="contact">
        <div class="headline-wrap">
            <h2>Contact</h2>
            <hr>
        </div>
        <p>お気軽にご相談ください。</p>
        <div class="btn-wrap">
            <a class="common-btn" href="<?php echo get_page_link(9); ?>">View more</a>
        </div>
        <span class="bg-text">Contact us</span>
    </section>
</main>
<!-- footer -->
<?php get_footer(); ?>

<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<!-- swiper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/swiper.js"></script>
</body>
</html>