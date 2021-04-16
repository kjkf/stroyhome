<?php
/**
 * Created by IntelliJ IDEA.
 * User: yakjk
 * Date: 01.03.2021
 * Time: 15:42
 */
?>
<?php get_header();?>

<section class="bl bl-top news bl-info" id="news">
    <div class="container">
        <h2 class="title"><?php the_title(); ?></h2>
        <div class="news-block">
            <div class="info-item">
                <div class="info-item__img">
                    <?php the_post_thumbnail()?>
                </div>
                <div class="info-item-descr">
                    <h5 class="title info-item-descr__title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
                   <div>
                       <?php the_content(); ?>
                   </div>
                </div>
            </div>

        </div>
    </div>
</section>



<?php get_footer();?>
