<?php
    /* 各ページのタイトル・説明文・キーワードの設定 */
    $description="ポートフォリオ2作品目です";
    $keywords="ポートフォリオ,2作品目,オシャレな家具屋風サイト";
    $title="ポートフォリオ2";
?>
<!-- head -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?=$description?>">
    <meta name="keywords" content="<?=$keywords?>">

    <link rel="stylesheet" href="css/reset.css">
    <!--swiper-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?=$title?></title>
</head>


<!-- トップページ -->
<body id="_top">

    <!-- ヘッダー -->
    <?php get_header(); ?>

    <!-- ハンバーガーメニュー -->
    <?php include("php_inc/humbergur-menu.php"); ?>

    <main>
        <!-- スライダー -->
        <?php include("php_inc/slider.php"); ?>

        <!-- concept -->
        <?php include("php_inc/concept.php"); ?>

        <!-- works -->
        <?php include("php_inc/works.php"); ?>

        <!-- service -->
        <?php include("php_inc/service.php"); ?>

        <!-- contact -->
        <?php include("php_inc/contact.php"); ?>
    </main>

    <!-- footer -->
    <?php get_footer(); ?>

    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <!-- swiper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        <?php include("php_inc/slider_js.php"); ?>
    </script>
</body>
</html>