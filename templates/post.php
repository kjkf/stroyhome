
<?php
$args = unserialize( stripslashes( $_POST['query'] ) );
$args['paged'] = $_POST['page'] + 1; // следующая страница
$args['post_status'] = 'publish';
$args['cat'] = 7;

// обычно лучше использовать WP_Query, но не здесь
query_posts( $args );
// если посты есть
if( have_posts() ) :?>
<div class="info-wrap">
<?// запускаем цикл
while( have_posts() ): the_post();

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


endwhile;?>
</div>
<?php endif;
die();