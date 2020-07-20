<header>
    <div class="header-left">
    <h1>
        <a href="<?php echo home_url(); ?>">
            Cresta Design
        </a>
    </h1>
    </div>
    <div class="header-right">
        <nav>
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'mainmenu',
                    'container'      => '',
                    'menu_class'     => '',
                    'items_wrap'     => '<ul>%3$s</ul>'
                ));
            ?>
        </nav>
    </div>
    <!-- スマホ用 -->
    <div class="sp-menu-icon"></div>
</header>

<!-- ハンバーガーメニュー -->
<div class="humbergur">
    <div class="sp-menu">
        <div class="sp-close-icon"></div>
        <?php
            wp_nav_menu( array(
                'theme_location' => 'mainmenu',
                'container'      => '',
                'menu_class'     => '',
                'items_wrap'     => '<ul>%3$s</ul>'
            ));
        ?>
    </div>
</div>
