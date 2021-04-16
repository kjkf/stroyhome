
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
                $posts = get_posts( array(
                    'numberposts' => 5,
                    'category'    => 7,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'post_type'   => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );

                foreach( $posts as $post ){
                    setup_postdata($post);
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

                wp_reset_postdata(); // сброс?>

            </div>
            <div class="form-row">
                <button type="submit" class="btn btn-light btn-submit">Показать еще</button>
            </div>
        </div>
    </div>
</section>



<?php get_footer();?>
