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