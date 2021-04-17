
<?php get_header();?>

<section class="article">
    <div class="container">
        <div class="article-in">
            <ul class="breadcrumb">
                <li><a href="#">Главная</a></li>
                <li>Статья на тему: Ремонт ПК и Ноутбуков</li>
            </ul>
            <h2 class="title article__title"><?php the_title(); ?></h2>
            <div class="article__img">
                <?php the_post_thumbnail()?>
            </div>
            <div class="article__info">
                <?$postId = get_the_ID();
                $post_id = get_post( $postId );
                $content = $post_id->post_content;
                ?>
                <?php echo $content; ?>
                <!--               --><?php /*echo "1234";
$value = get_field( 'calcBtn_title', 5 );
echo "===============".$value;
*/?>
            </div>
        </div>
    </div>
</section>
<section class="info bg-white infoInArticle">
    <div class="container">
        <div class="info-in">
            <?php $block09_title = get_field('block09_title');?>
            <h2 class="title title--shadow title-anim title--long">
                <span class="<?php echo $block09_title['first_color']?> first" data-text="<?php echo $block09_title['first']?>"><?php echo $block09_title['first']?></span>
                <span class="<?php echo $block09_title['second_color']?> second" data-text="<?php echo $block09_title['second']?>"><?php echo $block09_title['second']?></span>
            </h2>

            <div class="info-wrap">
                <?php
                // параметры по умолчанию
                $args = array(
                    'numberposts' => 0,
                    'category'    => 7,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'post_type'   => 'post',
                    //'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                );

                // ваш запрос и код вывода с пагинацией
                $wp_query = new WP_Query( $args );
                while ( $wp_query->have_posts() ) {
                    $wp_query->the_post();

                    ?>
                    <div class="info-item">
                        <div class="info-item__img">
                            <!--<img src="assets/images/content/info_img.jpg" alt="Полезная информация">-->
                            <?php the_post_thumbnail()?>
                        </div>
                        <div class="info-item-descr">
                            <h5 class="title info-item-descr__title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
                            <div class="info-item-descr-btm">
                                <a href="<?php the_permalink();?>" class="info-item-descr__more">Подробнее</a>
                                <span class="info-item-descr__date"><?php the_time('d.m.Y'); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                }

                // вернем global $wp_query
                wp_reset_postdata();
                ?>
            </div>
            <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                <script>
                    var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                    var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                    var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                    var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                </script>
                <div class="form-row">
                    <button type="submit"id="true_loadmore"  class="btn btn-light btn-submit">Показать ещё</button>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>

<div class="menu-main-wrap">
    <div class="container">
        <h2 class="title accent">Меню</h2>
        <ul class="menu-main">
            <li class="menu-main__item"><a href="#">Главная</a></li>
            <li class="menu-main__item"><a href="#about">Проекты</a></li>
            <li class="menu-main__item"><a href="#">Расчет стоимости</a></li>
            <li class="menu-main__item"><a href="#">Наши преимущества</a></li>
            <li class="menu-main__item"><a href="#">Контакты</a></li>
        </ul>
    </div>
</div>

<?php get_footer('single');?>
