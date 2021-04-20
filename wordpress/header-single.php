<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title><?php bloginfo('name')?></title>
    <?php wp_head(); ?>

</head>
<body>
<?php $mainId = 5;

?>
<header class="header header--static">
    <div class="container">
        <div class="header-in">
            <div class="header-left">
                <a href="<?php bloginfo('url')?>" class="logo">Stroy<span>Home</span></a>
                <span class="logo-text"><?php bloginfo('description')?></span>
            </div>
            <? wp_nav_menu(array(
                'theme_locathion' => 'menu-header',
                'menu' => 'menu-header',
                'container' => 'nav',
                'container_class' => 'nav',
                'menu_class' => 'nav__menu'
            )); ?>

            <div class="header-right">
                <a href="tel:<?php echo str_replace(" ","",get_field('phone_num', $mainId));?>" class="contact contact-phone">
                    <span class="contact__text">Звоните</span>
                    <div class="pulse pulse--sm">

                        <span class="phoneTransp-ic">
                            <svg class="" viewBox="0 0 23 23" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <use class="svg-sym" xlink:href="#phoneTransp-ic" x="0" y="0" />
                            </svg>
                        </span>

                        <svg class="svg-pulse">
                            <circle  class="circle circle-frst" r="19.79167vw"/>
                            <circle  class="circle circle-secd" r="19.79167vw"/>
                        </svg>
                    </div>
                    <span><?php the_field('phone_num', $mainId);?></span>
                </a>
                <a href="https://api.whatsapp.com/send?phone=<?php echo str_replace(" ","",get_field('whatsapp_num', $mainId));?>" class="whatsapp">
                        <span class="whatsapp-ic">
                            <svg class="svg-wrap" viewBox="0 0 32 32" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <use class="svg-sym" xlink:href="#wa-ic" x="0" y="0" />
                            </svg>
                        </span>
                    <span>WhatsApp</span>
                </a>
                <a href="#" class="btn-menu">
                    <span class="btn-menu__burger "></span>
                </a>
            </div>
        </div>
    </div>
</header>