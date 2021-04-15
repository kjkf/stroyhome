<?php get_header();?>

<?php
$isBannerHidden = get_field('isBannerHidden');
if ( !$isBannerHidden) : ?>
    <section class="fullscreen top " style="padding-top: 6.29vh; background-image: url('<?php the_field('bg_img');?>')">
        <div class="container">
            <div class="top-in">

                <div class="banner">
                    <div class="banner-main">
                        <?php $medals = get_field('medals');?>
                        <div class="progress">
                            <div class="progress-item laurel-ic">
                                <div class="progress-count"><?php echo $medals['completed_count']?></div>
                                <div class="progress-title"><?php echo $medals['completed_title']?></div>
                                <div class="progress-subtitle"><?php echo $medals['completed_subtitle']?></div>
                            </div>
                            <div class="progress-item laurel-ic">
                                <div class="progress-count"><?php echo $medals['experts_count']?></div>
                                <div class="progress-title"><?php echo $medals['experts_title']?></div>
                                <div class="progress-subtitle"><?php echo $medals['experts_subtitle']?></div>
                            </div>
                            <div class="progress-item laurel-ic">
                                <div class="progress-count"><?php echo $medals['medal3_count']?></div>
                                <div class="progress-title"><?php echo $medals['medal3_title']?></div>
                                <div class="progress-subtitle"><?php echo $medals['medal3_subtitle']?></div>
                            </div>
                        </div>
                        <h1 class="title title-anim fade_in"><?php the_field('main_title');?></h1>
                        <p class="subtitle"><?php the_field('main_subtitle'); ?></p>
                        <button class="btn btn-light btn-anim" id="showCalc"><?php the_field('calcBtn_title'); ?></button>
                    </div>
                    <a href="#" class="btn btn-play ">
                    <span class="btn-round callbackkiller cbk-phone cbk-phone-waves">
                        <div class="cbk-phone-bgr btn-play-ic"></div>
                        <div class="cbk-phone-circle"></div>
                        <div class="cbk-phone-second_circle"></div>
                        <div class="cbk-phone-third_circle"></div>
                    </span>
                        <span>Смотреть видео</span>
                    </a>
                    <a href="#" class="btn btn-btm">
                    <span class="mouse-ic">
                        <svg class="svg-wrap" viewBox="0 0 22 22" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <use class="svg-sym" xlink:href="#mouse-ic" x="0" y="0" />
                            <use class="svg-sym mouse-ic-btn" xlink:href="#mouse-ic-btn" x="0" y="0" />
                        </svg>
                    </span>
                        <span>Листайте вниз</span>
                    </a>
                    <span class="section-index-wrapper">
                    <span class="section-index" data-index="01"></span>
            </span>
                </div>
            </div>

        </div>
    </section>
<?php endif;?>

<?php
$isBlock02Hidden = get_field('isBlock02Hidden');
if ( !$isBlock02Hidden ):
    ?>
    <section class="about fullscreen" id="about" >
        <div class="container">
            <?php $block02_title = get_field('block02_title');?>
            <h2 class="title title--shadow title-anim">
                <span class="<?php echo $block02_title['first_color']?> first" data-text="<?php echo $block02_title['first']?>"><?php echo $block02_title['first']?></span>
                <span class="<?php echo $block02_title['second_color']?> second" data-text="<?php echo $block02_title['second']?>"><?php echo $block02_title['second']?></span>
            </h2>
            <div class="content about-content">
                <div class="about-tabs tabs">
                    <div class="tabs__body">
                        <?php
                        $houses = get_field('houses');
                        if( $houses ):
                            $count = 1;
                            $nav = array();
                            $isSetActive = 0;
                            foreach( $houses as $house ):
                                $house_title = get_the_title($house->ID);
                                $house_id ='tab_0'.$count++;
                                $house_descr = get_field('house_descr', $house->ID);
                                $house_img = get_field('house_img', $house->ID);
                                $house_img_mobile = get_field('house_img_mobile', $house->ID);
                                $house_icon = get_field('house_icon', $house->ID);
                                $house_isActive = get_field('isActive', $house->ID);
                                $addClass = '';
                                $isActive = '';
                                if (!$isSetActive && $house_isActive == 1) {
                                    $isActive = 'active';
                                    $isSetActive = 1;
                                }
                                if ( strcasecmp($house_title, 'Кирпичный') == 0 ) {
                                    $addClass = 'house__descr--brick';
                                }

                                if ( strcasecmp($house_title, 'газобетон') == 0 ) {
                                    $addClass = 'house__descr--concrete';
                                }

                                $info['title'] = $house_title;
                                $info['a_class'] = $isActive;
                                $info['id'] = $house_id;
                                $nav[] = $info;
                                ?>

                                <div id="<?php echo esc_html($house_id)?>" class="tabs__block <?php echo esc_html($isActive)?>">
                                    <div class="house">
                                        <div class="house__descr <?php echo $addClass;?>" style="background-image: url('<?php echo esc_url($house_icon)?>')">
                                            <h3><?php echo esc_html($house_title)?></h3>
                                            <p class="house__descr-text">
                                                <?php echo esc_html($house_descr)?>
                                            </p>
                                        </div>
                                        <div class="house__img" >

                                            <img src="<?php echo esc_url($house_img_mobile)?>" alt="<?php echo esc_html($house_title)?>">
                                        </div>
                                    </div>
                                </div>


                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <nav class="tabs__items">
                        <?php if($nav): ?>
                            <?php foreach ( $nav as $item ): ?>
                                <a href="#" data-tab="<?php echo $item['id']?>" class="tabs__item <?php echo $item['a_class']?>"><?php echo $item['title']?></a>
                            <?endforeach;?>
                        <?endif;?>
                    </nav>

                </div>
            </div>
            <span class="section-index-wrapper">
            <span class="section-index" data-index="02"></span>
        </span>

        </div>
    </section>
<?php endif;?>

<?php
$isBlock03Hidden = get_field('isBlock03Hidden');
if ( !$isBlock03Hidden ):?>
    <section class="calculate bg-white" id="calculate">
        <div class="container container-calculate">
            <?php $block03_title = get_field('block03_title');?>
            <h2 class="title title--shadow title-anim title--long">
                <span class="<?php echo $block03_title['first_color']?> first" data-text="<?php echo $block03_title['first']?>"><?php echo $block03_title['first']?></span>
                <span class="<?php echo $block03_title['second_color']?> second" data-text="<?php echo $block03_title['second']?>"><?php echo $block03_title['second']?></span>
            </h2>
            <div class="content">
                <div class="quiz step-1">
                    <div class="quiz__header">
                        <h3>Вопрос <span class="quiz-current">1</span> из <span class="quiz-all">6</span></h3>
                        <div class="steps">
                            <span class="quiz-step completed"></span>
                            <span class="quiz-step"></span>
                            <span class="quiz-step"></span>
                            <span class="quiz-step"></span>
                            <span class="quiz-step"></span>
                            <span class="quiz-step"></span>
                        </div>
                    </div>
                    <form action="" class="form" name="quizForm">
                        <div class="quiz-items">
                            <?php $questions = get_field('questions');?>
                            <div class="quiz-item">
                                <?php $step1_q = $questions['step1_q'];?>
                                <h4 class="quiz-item-title"><?php echo $step1_q?></h4>
                                <div class="quiz-item-options options options--flex">
                                    <?php $step1_a = $questions['step1_a'];
                                    $step1_ans1 = $step1_a['step1_ans1'];
                                    $step1_img1 = $step1_a['step1_img1'];
                                    $step1_img1_m = $step1_a['step1_img1_m'];
                                    ?>
                                    <div class="quiz-item-option mr20">
                                        <label for="karkas" class="form-label options__label">
                                        <span class="img-wrapper">
                                            <picture>
                                                <source srcset="<?php echo $step1_img1_m;?>" media="(max-width: 768px)">
                                                <img src="<?php echo $step1_img1;?>" alt="<?php echo $step1_ans1;?>">
                                            </picture>
                                        </span>
                                            <input type="radio" name="house-projects" class="option-radio" id="karkas" value="<?php echo $step1_ans1;?>">
                                            <label for="karkas">
                                                <span class="option-icon"></span>
                                                <span><?php echo $step1_ans1;?></span>
                                            </label>
                                        </label>
                                    </div>
                                    <div class="quiz-item-option">
                                        <?php
                                        $step1_ans2 = $step1_a['step1_ans2'];
                                        $step1_img2 = $step1_a['step1_img2'];
                                        $step1_img2_m = $step1_a['step1_img2_m'];
                                        ?>
                                        <label for="aerated" class="form-label options__label">
                                        <span class="img-wrapper">
                                            <picture>
                                                <source srcset="<?php echo $step1_img2_m;?>" media="(max-width: 768px)">
                                                <img src="<?php echo $step1_img2;?>" alt="<?php echo $step1_ans2;?>">
                                            </picture>
                                        </span>
                                            <input type="radio" name="house-projects" class="option-radio" id="aerated" value="<?php echo $step1_ans2;?>">
                                            <label for="aerated">
                                                <span class="option-icon"></span>
                                                <span><?php echo $step1_ans2;?></span>
                                            </label>
                                        </label>
                                    </div>
                                    <div class="quiz-item-option">
                                        <?php
                                        $step1_ans3 = $step1_a['step1_ans3'];
                                        $step1_img3 = $step1_a['step1_img3'];
                                        $step1_img3_m = $step1_a['step1_img3_m'];
                                        ?>
                                        <label for="brick" class="form-label options__label">
                                        <span class="img-wrapper">
                                            <picture>
                                                <source srcset="<?php echo $step1_img3_m;?>" media="(max-width: 768px)">
                                                <img src="<?php echo $step1_img3;?>" alt="<?php echo $step1_ans3;?>">
                                            </picture>
                                        </span>
                                            <input type="radio" name="house-projects" class="option-radio" id="brick" value="<?php echo $step1_ans3;?>">
                                            <label for="brick">
                                                <span class="option-icon"></span>
                                                <span><?php echo $step1_ans3;?></span>
                                            </label>
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="quiz-item hide">
                                <?php $step2_q = $questions['step2_q'];?>
                                <h4 class="quiz-item-title mb130"><?php echo $step2_q; ?></h4>
                                <div class="quiz-item-options options options--block">
                                    <div class="quiz-item-option">
                                        <?php $step2_a = $questions['step2_a'];?>
                                        <div class="rangecontainer">
                                            <input type="range" min="<?php echo $step2_a['range_min']?>"
                                                   max="<?php echo $step2_a['range_max']?>"
                                                   value="<?php echo $step2_a['range_val']?>"
                                                   step="<?php echo $step2_a['range_step']?>"
                                                   class="range" id="area" >
                                            <output class="bubble">
                                                <span id="rangeValue"></span>
                                                м<sup>2</sup>
                                            </output>
                                            <span class="rangeLabel rangeLabel--min">
                                            <?php echo $step2_a['range_min']?> м<sup>2</sup>
                                        </span>
                                            <span class="rangeLabel rangeLabel--max">
                                            <?php echo $step2_a['range_max']?> м<sup>2</sup>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="quiz-item hide">
                                <?php $step3_q = $questions['step3_q'];?>
                                <h4 class="quiz-item-title mb90"><?php echo $step3_q;?></h4>
                                <div class="quiz-item-options options options--flex fd-column">
                                    <?php $step3_a = $questions['step3_a'];?>
                                    <div class="quiz-item-option">
                                        <input type="radio" name="house-land" class="option-radio" id="land_yes" value="<?php echo $step3_a['step3_ans1'];?>">
                                        <label for="land_yes" class="form-label options__label options__label--btn">
                                            <?php echo $step3_a['step3_ans1'];?>
                                        </label>
                                    </div>
                                    <div class="quiz-item-option">
                                        <input type="radio" name="house-land" class="option-radio" id="land_no" value="<?php echo $step3_a['step3_ans2'];?>">
                                        <label for="land_no" class="form-label options__label options__label--btn">
                                            <?php echo $step3_a['step3_ans2'];?>
                                        </label>
                                    </div>
                                    <div class="quiz-item-option">
                                        <input type="radio" name="house-land" class="option-radio" id="land_chosing" value="<?php echo $step3_a['step3_ans3'];?>">
                                        <label for="land_chosing" class="form-label options__label options__label--btn">
                                            <?php echo $step3_a['step3_ans3'];?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="quiz-item hide">
                                <?php $step4_q = $questions['step4_q'];?>
                                <h4 class="quiz-item-title mb90"><?php echo $step4_q;?></h4>
                                <div class="quiz-item-options options options--flex fd-column">
                                    <?php $step4_a = $questions['step4_a'];?>
                                    <div class="quiz-item-option">
                                        <input type="radio" name="has-project" class="option-radio" id="project_yes" value="<?php echo $step4_a['step4_ans1'];?>">
                                        <label for="project_yes" class="form-label options__label options__label--btn">
                                            <?php echo $step4_a['step4_ans1'];?>
                                        </label>
                                    </div>
                                    <div class="quiz-item-option">
                                        <input type="radio" name="has-project" class="option-radio" id="project_no" value="<?php echo $step4_a['step4_ans2'];?>">
                                        <label for="project_no" class="form-label options__label options__label--btn">
                                            <?php echo $step4_a['step4_ans2'];?>
                                        </label>
                                    </div>
                                    <div class="quiz-item-option">
                                        <input type="radio" name="has-project" class="option-radio" id="project_need" value="<?php echo $step4_a['step4_ans3'];?>">
                                        <label for="project_need" class="form-label options__label options__label--btn">
                                            <?php echo $step4_a['step4_ans3'];?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="quiz-item hide max-w942">
                                <?php $step5_q = $questions['step5_q'];?>
                                <h4 class="quiz-item-title mb50"><?php echo $step5_q;?></h4>
                                <div class="quiz-item-options options options--flex options--wrap fd-column">
                                    <?php $step5_a = $questions['step5_a'];?>
                                    <div class="quiz-item-option">
                                        <input type="radio" name="project-money" class="option-radio" id="money_to15mln" value="<?php echo $step5_a['step5_ans1'];?>">
                                        <label for="money_to15mln" class="form-label options__label options__label--btn">
                                            <?php echo $step5_a['step5_ans1'];?>
                                        </label>
                                    </div>
                                    <div class="quiz-item-option">
                                        <input type="radio" name="project-money" class="option-radio" id="money_to30mln" value="<?php echo $step5_a['step5_ans2'];?>">
                                        <label for="money_to30mln" class="form-label options__label options__label--btn">
                                            <?php echo $step5_a['step5_ans2'];?>
                                        </label>
                                    </div>
                                    <div class="quiz-item-option">
                                        <input type="radio" name="project-money" class="option-radio" id="money_to60mln" value="<?php echo $step5_a['step5_ans3'];?>.">
                                        <label for="money_to60mln" class="form-label options__label options__label--btn">
                                            <?php echo $step5_a['step5_ans3'];?>
                                        </label>
                                    </div>

                                    <div class="quiz-item-option">
                                        <input type="radio" name="project-money" class="option-radio" id="money_more60mln" value="<?php echo $step5_a['step5_ans4'];?>">
                                        <label for="money_more60mln" class="form-label options__label options__label--btn">
                                            <?php echo $step5_a['step5_ans4'];?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="quiz-item hide">
                                <?php $step6_q = $questions['step6_q'];?>
                                <h4 class="quiz-item-title mb90"><?php echo $step6_q;?></h4>
                                <div class="quiz-item-options options options--flex fd-column">
                                    <?php $step6_a = $questions['step6_a'];?>
                                    <div class="quiz-item-option">
                                        <input type="radio" name="start-project" class="option-radio" id="project_start1" value="<?php echo $step6_a['step6_ans1'];?>">
                                        <label for="project_start1" class="form-label options__label options__label--btn">
                                            <?php echo $step6_a['step6_ans1'];?>
                                        </label>
                                    </div>
                                    <div class="quiz-item-option">
                                        <input type="radio" name="start-project" class="option-radio" id="project_start3_6" value="<?php echo $step6_a['step6_ans2'];?>">
                                        <label for="project_start3_6" class="form-label options__label options__label--padding-small options__label--btn">
                                            <?php echo $step6_a['step6_ans2'];?>
                                        </label>
                                    </div>
                                    <div class="quiz-item-option">
                                        <input type="radio" name="start-project" class="option-radio" id="project_start_more6" value="<?php echo $step6_a['step6_ans3'];?>">
                                        <label for="project_start_more6" class="form-label options__label options__label--btn">
                                            <?php echo $step6_a['step6_ans3'];?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <input type="hidden" class="" id="answer" value="">
                        <input type="hidden" class="quiz-step-result" id="step01" value="">
                        <input type="hidden" class="quiz-step-result" id="step02" value="">
                        <input type="hidden" class="quiz-step-result" id="step03" value="">
                        <input type="hidden" class="quiz-step-result" id="step04" value="">
                        <input type="hidden" class="quiz-step-result" id="step05" value="">
                        <input type="hidden" class="quiz-step-result" id="step06" value="">
                    </form>
                    <div class="quiz-item-footer">
                        <button type="button" class="btn btn-dark hide" id="prevBtn">Назад</button>
                        <button type="button" class="btn btn-light btn-anim" id="nextBtn">Далее</button>
                    </div>
                </div>
                <div class="quiz quiz-result hide">
                    <div class="quiz__header">
                        <span id="quizResult">Расчет</span>
                    </div>
                    <form action="" class="form quiz-result">
                        <div class="quiz-item">
                            <h4 class="quiz-item-title">Куда направить Вам расчет?</h4>
                            <div class="quiz-row icons">
                                <ul class="callback">
                                    <li class="callback__item phone-btn">
                                        <a href="#" class="btn callback__btn">
                                            <svg class="svg-wrap" viewBox="0 0 28 28" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <use class="svg-sym" xlink:href="#phone-ic" x="0" y="0"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="callback__item telegram-btn">
                                        <a href="#" class="btn callback__btn ">
                                            <svg class="svg-wrap" width="30" height="26" viewBox="0 0 30 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <use class="svg-sym" xlink:href="#telegram-ic" x="0" y="0"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="callback__item viber-btn">
                                        <a href="#" class="btn callback__btn">
                                            <svg class="svg-wrap" width="29" height="32" viewBox="0 0 29 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <use class="svg-sym" xlink:href="#viber-ic" x="0" y="0"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="callback__item whatsapp-btn">
                                        <a href="#" class="btn callback__btn ">
                                            <svg class="svg-wrap" viewBox="0 0 32 32" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <use class="svg-sym" xlink:href="#wa-ic" x="0" y="0"></use>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="quiz-row">
                                <input type="text" class="form-field name" placeholder="Ваше имя" required>
                            </div>

                            <div class="quiz-row">
                                <input type="tel" class="form-field phone-num" placeholder="Ваш телефон" required>
                            </div>

                            <div class="quiz-row">
                                <button type="submit" class="btn btn-light btn-submit btn-anim">Отправить расчет</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="descr">Мы – профессиональная строительная компания, предоставляющая услуги
                    по строительству каркасных и брусчатых домов, возведению фундамента,
                    а так же внутренней отделке. Мы – профессиональная строительная компания, предоставляющая услуги
                    по строительству каркасных и брусчатых домов, возведению фундамента,
                    а так же внутренней отделке.</div>
            </div>

            <span class="section-index-wrapper">
            <span class="section-index section-index--dark" data-index="03"></span>
        </span>
        </div>
    </section>
<?php endif;?>

<?php
$isBlock04Hidden = get_field('isBlock04Hidden');
if ( !$isBlock04Hidden ):?>
    <section class="principle"  id="principle">
        <div class="container">
            <div class="principle-in">
                <?php $block04_title = get_field('block04_title');?>
                <h2 class="title title--shadow title-anim">
                    <span class="<?php echo $block04_title['first_color']?> first" data-text="<?php echo $block04_title['first']?>"><?php echo $block04_title['first']?></span>
                    <span class="<?php echo $block04_title['second_color']?> second" data-text="<?php echo $block04_title['second']?>"><?php echo $block04_title['second']?></span>
                </h2>
                <div class="principles">
                    <?php $principles = get_field('principles');?>
                    <div class="principle-item" data-num="<?php echo $principles['pr01_count']?>">
                        <h5 class="principle-item__title"><?php echo $principles['pr01_title']?></h5>
                        <p class="principle-item__descr"><?php echo $principles['pr01_descr']?></p>
                    </div>
                    <div class="principle-item principle-item--cntr laurel-right-ic">
                        <?php $chief = get_field('chief');?>
                        <div class="principle-item__img">
                            <div class="mask-wrap">
                                <svg width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  preserveAspectRatio="xMinYMin slice" >
                                    <defs>
                                        <clipPath id="cut-off-bottom">
                                            <rect class="clip_path_rect"></rect>
                                        </clipPath>
                                    </defs>
                                    <defs>
                                        <mask id="mask_img">
                                            <circle  fill="white" clip-path="url(#cut-off-bottom)" class="mask_circle"></circle>
                                            <rect fill="white" class="mask_rect"></rect>
                                        </mask>
                                    </defs>
                                    <image mask="url(#mask_img)" fill="blue" class="masked_img" xlink:href="<?php echo $chief['photo']?>" pointer-events="fill" preserveAspectRatio="xMinYMin slice"></image>
                                </svg>
                                </svg>
                            </div>
                        </div>

                        <h5 class="principle-item__title"><?php echo $chief['fullname']?></h5>
                        <div class="principle-item__descr"><?php echo $chief['position']?></div>
                    </div>

                    <div class="principle-item" data-num="<?php echo $principles['pr03_count']?>">
                        <h5 class="principle-item__title"><?php echo $principles['pr03_title']?></h5>
                        <p class="principle-item__descr"><?php echo $principles['pr03_descr']?></p>
                    </div>
                    <div class="principle-item" data-num="<?php echo $principles['pr02_count']?>">
                        <h5 class="principle-item__title"><?php echo $principles['pr02_title']?></h5>
                        <p class="principle-item__descr"><?php echo $principles['pr02_descr']?></p>
                    </div>
                    <div class="principle-item" data-num="<?php echo $principles['pr04_count']?>">
                        <h5 class="principle-item__title"><?php echo $principles['pr04_title']?></h5>
                        <p class="principle-item__descr"><?php echo $principles['pr04_descr']?></p>
                    </div>
                </div>
                <div class="btn-wrap"><button type="submit" class="btn btn-light btn-submit btn-anim">Оставить заявку</button></div>
                <span class="section-index-wrapper">
                <span class="section-index" data-index="04"></span>
            </span>
            </div>
        </div>
    </section>
<?php endif;?>

<?php
$isBlock06Hidden = get_field('isBlock06Hidden');
if ( !$isBlock06Hidden ):?>
    <section class="schema">
        <div class="container">
            <div class="schema-in">
                <div class="img-wrap">
                    <img src="<?php the_field('house_schema');?>" alt="">

                    <div class="schema-collapse-wrapper" data-top="22" data-left="67">
                        <div class="schema-collapse">
                    <span class="schema-collapse__btn cbk-phone-waves callbackkiller cbk-phone">
                        <div class="cbk-phone-circle"></div>
                        <div class="cbk-phone-second_circle"></div>
                        <div class="cbk-phone-third_circle"></div>
                    </span>
                            <div class="schema-collapse__descr hide">
                                <h5 class="schema-collapse__title">Кирпичный</h5>
                                <p class="schema-collapse__text">
                                    Мы – профессиональная строительная
                                    компания, предоставляющая услуги
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="schema-collapse-wrapper" data-top="64" data-left="73">
                        <div class="schema-collapse">
                    <span class="schema-collapse__btn cbk-phone-waves callbackkiller cbk-phone">
                        <div class="cbk-phone-circle"></div>
                        <div class="cbk-phone-second_circle"></div>
                        <div class="cbk-phone-third_circle"></div>
                    </span>
                            <div class="schema-collapse__descr hide">
                                <h5 class="schema-collapse__title">Кирпичный</h5>
                                <p class="schema-collapse__text">
                                    Мы – профессиональная строительная
                                    компания, предоставляющая услуги
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="schema-collapse-wrapper" data-top="32" data-left="38">
                        <div class="schema-collapse">
                    <span class="schema-collapse__btn cbk-phone-waves callbackkiller cbk-phone">
                        <div class="cbk-phone-circle"></div>
                        <div class="cbk-phone-second_circle"></div>
                        <div class="cbk-phone-third_circle"></div>
                    </span>
                            <div class="schema-collapse__descr hide">
                                <h5 class="schema-collapse__title">Кирпичный</h5>
                                <p class="schema-collapse__text">
                                    Мы – профессиональная строительная
                                    компания, предоставляющая услуги
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="schema-collapse-wrapper" data-top="44" data-left="67">
                        <div class="schema-collapse">
                    <span class="schema-collapse__btn cbk-phone-waves callbackkiller cbk-phone">
                        <div class="cbk-phone-circle"></div>
                        <div class="cbk-phone-second_circle"></div>
                        <div class="cbk-phone-third_circle"></div>
                    </span>
                            <div class="schema-collapse__descr hide">
                                <h5 class="schema-collapse__title">Кирпичный</h5>
                                <p class="schema-collapse__text">
                                    Мы – профессиональная строительная
                                    компания, предоставляющая услуги
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="schema-collapse-wrapper" data-top="80" data-left="29">
                        <div class="schema-collapse">
                    <span class="schema-collapse__btn cbk-phone-waves callbackkiller cbk-phone">
                        <div class="cbk-phone-circle"></div>
                        <div class="cbk-phone-second_circle"></div>
                        <div class="cbk-phone-third_circle"></div>
                    </span>
                            <div class="schema-collapse__descr hide">
                                <h5 class="schema-collapse__title">Кирпичный</h5>
                                <p class="schema-collapse__text">
                                    Мы – профессиональная строительная
                                    компания, предоставляющая услуги
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="schema-collapse-wrapper" data-top="50" data-left="15">
                        <div class="schema-collapse">
                    <span class="schema-collapse__btn cbk-phone-waves callbackkiller cbk-phone">
                        <div class="cbk-phone-circle"></div>
                        <div class="cbk-phone-second_circle"></div>
                        <div class="cbk-phone-third_circle"></div>
                    </span>
                            <div class="schema-collapse__descr hide">
                                <h5 class="schema-collapse__title">Кирпичный</h5>
                                <p class="schema-collapse__text">
                                    Мы – профессиональная строительная
                                    компания, предоставляющая услуги
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <span class="section-index-wrapper">
            <span class="section-index" data-index="05"></span>
        </span>
        </div>
    </section>
<?php endif;?>

<?php
$isBlock06Hidden = get_field('isBlock06Hidden');
if ( !$isBlock06Hidden ):?>
    <section class="types bg-white">
        <div class="container">
            <div class="types-in">
                <div class="types-wrap">
                    <div class="types-item">
                        <?php $block06_title = get_field('block06_title');?>
                        <h2 class="title title--shadow title-anim">
                            <span class="<?php echo $block06_title['first_color']?> first" data-text="<?php echo $block06_title['first']?>"><?php echo $block06_title['first']?></span>
                            <span class="<?php echo $block06_title['second_color']?> second" data-text=""><?php echo $block06_title['second']?></span>
                        </h2>
                        <button type="submit" class="btn btn-light btn-anim"><span class="ic-download"></span><span>Скачать каталог</span></button>
                    </div>
                    <?php
                    $projects = get_field('types');
                    if( $projects ):
                        $count = 0;
                        $bigClassName = "types-item--big";
                        foreach( $projects as $project ):
                            $project_title = get_the_title($project->ID);
                            $project_area = get_field('project_area', $project->ID);
                            $project_rooms = get_field('project_rooms', $project->ID);
                            $project_material = get_field('project_material', $project->ID);
                            $project_time = get_field('project_time', $project->ID);
                            $project_price = get_field('project_price', $project->ID);
                            $project_photo = get_field('project_photo', $project->ID);

                            if($count > 0) $bigClassName = "";
                            ?>

                            <div class="types-item <?php echo esc_html($bigClassName)?>">
                                <div class="types-item__in">
                                    <div class="types-item__img">
                                        <img src="<?php echo esc_url($project_photo)?>" alt="Топ типовых проектов">
                                    </div>
                                    <div class="types-item__descr">
                                        <div class="types-item__col">
                                            <h4 class="title types-item__title"><?php echo esc_html($project_title)?></h4>
                                            <div class="project-size">
                                                <span class="project-size__ic area-ic"><?php echo esc_html($project_area)?> м<sub>2</sub></span>
                                                <span class="project-size__ic bed-ic"><?php echo esc_html($project_rooms)?> спальни</span>
                                            </div>
                                        </div>
                                        <?php if ($count > 0):?>
                                            <div class="types-item__row">
                                                <div class="types-item__left">Материал для стен:</div>
                                                <div class="types-item__right"><?php echo esc_html($project_material)?></div>
                                            </div>
                                            <div class="types-item__row">
                                                <div class="types-item__left">Срок строительства:</div>
                                                <div class="types-item__right"><?php echo esc_html($project_time)?></div>
                                            </div>
                                        <?php endif;?>
                                        <div class="types-item__price">
                                            <span class="price-sm">от</span>
                                            <span><?php echo esc_html($project_price)?></span>
                                            <span class="price-md">р.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                        $count = $count + 1;
                        endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>

<?php
$isBlock08Hidden = get_field('isBlock08Hidden');
if ( !$isBlock08Hidden ):?>
    <section class="turnkey ">
        <div class="container">
            <div class="turnkey-in">
                <h2 class="title title-anim">
                    <span class="white first">выполняем</span>
                    <span class="accent second">под ключ</span>
                </h2>
                <div class="content ">
                    <div class=" tabs">

                        <nav class="tabs__items">
                            <a href="#" data-tab="turnkey_tab_01" class="tabs__item">Архитектурный проект</a>
                            <a href="#" data-tab="turnkey_tab_02" class="tabs__item">Дизайнерский проект</a>
                            <a href="#" data-tab="turnkey_tab_03" class="tabs__item active">Ландшафтный проект</a>
                        </nav>
                        <div class="tabs__body">
                            <div id="turnkey_tab_01" class="tabs__block tab_01">
                                <div class="tab">
                                    <div class="tab__img">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/content/turnkey-design.png" alt="design">
                                    </div>
                                    <div class="tab__descr tab__descr--arch">
                                        <h3>Архитектурный проект</h3>
                                        <p class="tab__descr-text">
                                            Мы – профессиональная строительная компания, предоставляющая услуги
                                            по строительству каркасных и брусчатых домов, возведению фундамента,
                                            а так же внутренней отделке. Мы – профессиональная строительная компания, предоставляющая услуги
                                            по строительству каркасных и брусчатых домов, возведению фундамента,
                                            а так же внутренней отделке.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div id="turnkey_tab_02" class="tabs__block tab_02">
                                <div class="tab">
                                    <div class="tab__img">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/content/turnkey-design.png" alt="design">
                                    </div>
                                    <div class="tab__descr tab__descr--design">
                                        <h3>Дизайнерский проект</h3>
                                        <p class="tab__descr-text">
                                            Мы – профессиональная строительная компания, предоставляющая услуги
                                            по строительству каркасных и брусчатых домов, возведению фундамента,
                                            а так же внутренней отделке. Мы – профессиональная строительная компания, предоставляющая услуги
                                            по строительству каркасных и брусчатых домов, возведению фундамента,
                                            а так же внутренней отделке.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div id="turnkey_tab_03" class="tabs__block active tab_03">
                                <div class="tab">
                                    <div class="tab__img">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/content/turnkey-design.png" alt="design">
                                    </div>
                                    <div class="tab__descr tab__descr--landsc">
                                        <h3>Ландшафтный проект</h3>
                                        <p class="tab__descr-text">
                                            Мы – профессиональная строительная компания, предоставляющая услуги
                                            по строительству каркасных и брусчатых домов, возведению фундамента,
                                            а так же внутренней отделке. Мы – профессиональная строительная компания, предоставляющая услуги
                                            по строительству каркасных и брусчатых домов, возведению фундамента,
                                            а так же внутренней отделке.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post"><span class="post__fio">Наталья Красавина</span>Главная дизайнер</div>
                </div>
                <span class="section-index-wrapper">
                <span class="section-index" data-index="08"></span>
            </span>
                <div class="application">
                    <h3 class="title">
                        <div>ОСТАЛИСЬ ВОПРОСЫ? <span class="accent">ОСТАВЬТЕ ЗАЯВКУ</span></div>
                        <div>И МЫ ПЕРЕЗВОНИМ ВАМ ЧЕРЕЗ 10 МИНУТ!</div>
                    </h3>
                    <form action="#" class="form form--column">
                        <div class="form-in">
                            <div class="form-col">
                                <input type="tel" class="form-field phone-num" placeholder="Ваш телефон" required>
                            </div>
                            <div class="form-col">
                                <input type="text" class="form-field" placeholder="Ваше имя" required>
                            </div>
                            <div class="form-col">
                                <button type="submit" class="btn btn-light btn-anim btn-submit">Оставить заявку</button>
                                <div class="form-check-wrap">
                                    <label for="agree_cond1" class="form-check">
                                        <input type="checkbox" id="agree_cond1">
                                        <span class="form-check__btn"></span>
                                        <div>Вы соглашаетесь с условиями <a href="#" class="link">обработки персональных данных</a></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>


<div class="menu-main-wrap">
    <div class="container">
        <h2 class="title accent">Меню</h2>
        <? wp_nav_menu(array(
            'theme_locathion' => 'menu-main',
            'menu' => 'menu-main',
            'menu_class' => 'menu-main'
        )); ?>
    </div>
</div>

<?php get_footer();?>