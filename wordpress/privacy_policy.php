<?php
/*
 * Template Name: Политика конфиденциальности
 * */
?>

<?php get_header('single');
$mainId = get_option( 'page_on_front' );
?>

<div class="modal-wrap modal-wrap--privacy">
    <div class="modal modal--privacy">
        <button class="btn btn-close" type="button"></button>
        <div class="modal__in">
            <h4 class="title"><?php the_field('page_title')?></h4>

            <?php the_field('agreement')?>
        </div>
    </div>
</div>

<?php get_footer('single');?>
