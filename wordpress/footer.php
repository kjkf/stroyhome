<?php
$mainId = get_option( 'page_on_front' );
?>
<footer class="footer laurel-right-ic ">
    <div class="container">
        <div class="footer__in">
            <div class="footer-left">
                <a href="#" class="logo">Stroy<span>Home</span></a>
            </div>
            <div class="footer-ctr">


                <? wp_nav_menu(array(
                    'theme_locathion' => 'menu-footer',
                    'menu' => 'menu-footer',
                    'container' => 'nav',
                    'container_class' => 'nav br-btm'
                )); ?>

                <div class="address br-btm">
                    <h5>Адрес офиса:</h5>
                    <?php $address = get_field('adress', $mainId);?>
                    <div class="address__text"><span><?php echo $address['city']?>, </span><span><?php echo $address['street']?></span></div>
                </div>

                <div class="contacts">
                    <!--                    <a href="tel:+7 (495) 921-30-01" class="contact contact-phone">
                                            <span class="contact-ic contact-phone-ic"></span>
                                            <span>+7 (495) 921-30-01</span>
                                        </a>-->
                    <a href="tel:<?php echo str_replace(" ","",get_field('phone_num', $mainId));?>" class="contact contact-phone">
                        <span class="contact-phone-btn cbk-phone">
                                    <div class="contact-phone-ic"></div>
                                </span>
                        <span><?php the_field('phone_num', $mainId);?></span>
                    </a>
                    <a href="mailto:info@stroyhome.pro" class="contact contact-email">
                        <span class="contact-ic contact-email-ic"></span>
                        <span><?php the_field('email', $mainId);?></span>
                    </a>
                </div>
            </div>
            <div class="footer-right">
                <a href="#" class="footer-link private-privacy">ФЗ о персональных данных</a>
                <div class="develop-name">© Разработано в <span>SEQUOIA</span></div>
            </div>
        </div>
    </div>
</footer>

<ul class="callback fixed">
    <li class="callback__item phone-btn">
        <span class="prompt">Заказать звонок</span>
        <a href="#" class="btn callback__btn">
            <svg class="svg-wrap" viewBox="0 0 28 28" xmlns:xlink="http://www.w3.org/1999/xlink">
                <use class="svg-sym" xlink:href="#phone-ic" x="0" y="0" />
            </svg>
        </a>
    </li>
    <li class="callback__item whatsapp-btn">
        <span class="prompt">написать в watsapp</span>
        <a href="https://api.whatsapp.com/send?phone=<?php echo str_replace(" ","",get_field('whatsapp_num', $mainId));?>" class="btn callback__btn">
            <svg class="svg-wrap" viewBox="0 0 32 32" xmlns:xlink="http://www.w3.org/1999/xlink">
                <use class="svg-sym" xlink:href="#wa-ic" x="0" y="0" />
            </svg>
        </a>
    </li>
    <li class="callback__item calc-btn">
        <span class="prompt">калькулятор стоимости</span>
        <a href="#" class="btn callback__btn">
            <svg class="svg-wrap" viewBox="0 0 28 28" xmlns:xlink="http://www.w3.org/1999/xlink">
                <use class="svg-sym" xlink:href="#calc-ic" x="0" y="0" />
            </svg>
        </a>
    </li>
    <li class="callback__item download-btn">
        <span class="prompt">скачать прайс-лист</span>
        <a href="#" class="btn callback__btn">
            <svg class="svg-wrap" viewBox="0 0 28 30" xmlns:xlink="http://www.w3.org/1999/xlink">
                <use class="svg-sym" xlink:href="#pdf-ic" x="0" y="0" />
            </svg>
        </a>
    </li>
</ul>

<template id="modalPrivacy">
    <div class="modal-wrap modal-wrap--privacy">
        <div class="modal modal--privacy">
            <button class="btn btn-close" type="button"></button>
            <div class="modal__in">
                <h4 class="title"><?php the_field('page_title', $mainId)?></h4>

                <?php the_field('agreement', $mainId)?>
            </div>
        </div>
    </div>
</template>

<template id="modalTemplate">
    <!--<div class="modal-wrap-fixed">-->
    <div class="modal-wrap">
        <div class="modal modal--callback">
            <button class="btn btn-close" type="button"></button>
            <div class="modal__in">
                <span class="modal__subtitle">Звоните</span>
                <h4 class="title modal__title">
                    <a href="tel:<?php the_field('phone_num', $mainId);?>" class="contact-phone">
                        <div class="pulse pulse--sm">
                                <span class="phoneTransp-ic">
                                    <svg class="" viewBox="0 0 23 23" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <use class="svg-sym" xlink:href="#phoneTransp-ic" x="0" y="0" />
                                    </svg>
                                </span>
                            <svg class="svg-pulse">
                                <defs>
                                    <linearGradient id="gradient" x1= "95%" y1="55%" x2="0%" y2="100%">
                                        <stop offset="0%" stop-color="#BBA182" stop-opacity="0" />
                                        <stop offset="50%" stop-color="#BBA182" />
                                    </linearGradient>
                                </defs>
                                <circle  class="circle circle-frst"/>
                                <circle  class="circle circle-secd"/>
                            </svg>
                        </div>
                        <span><?php the_field('phone_num', $mainId);?></span>
                    </a>
                </h4>
                <span class="modal__subtitle secd">или оставьте заявку, </span>
                <span>и с вами свяжется наш менеджер</span>
                <form action="#" class="form">
                    <!-- Hidden Required Fields -->
                    <input type="hidden" name="project_name" value="Site Name">
                    <input type="hidden" name="admin_email" value="lolau@yandex.ru">
                    <input type="hidden" name="form_subject" value="Form Subject">
                    <!-- END Hidden Required Fields -->
                    <div class="form-row">
                        <!--<input type="tel" class="form-field phone-num" placeholder="+7 (777) 777-77-77" required>-->
                        <input type="tel" name="tel[]" class="form-field phone-num masked-phone" data-phonemask="+7 (___)___-__-__" placeholder="Ваш телефон" required>
                    </div>
                    <div class="form-row">

                        <button type="submit" class="btn btn-light btn-submit">Оставить заявку</button>
                    </div>
                    <div class="form-row form-check-wrap">
                        <label for="agree_cond" class="form-check">
                            <input type="checkbox" id="agree_cond">
                            <span class="form-check__btn"></span>
                            <div>Вы соглашаетесь с условиями <a href="<?php echo get_page_link( get_page_by_title( 'Политика конфиденциальности' )->ID ); ?>" class="link">обработки персональных данных</a></div>
                        </label>
                    </div>
                    <input type="hidden" id="isDownload">
                    <a href="<?php the_field('pricelist', $mainId);?>" id="downloadLink" download style="display: none">Download</a>
                </form>
            </div>
        </div>
    </div>
    <!--</div>-->
</template>

<template id="successModal">
    <!--<div class="modal-wrap-fixed">-->
        <div class="modal-wrap">
            <div class="modal modal--success">
                <button class="btn btn-close" type="button"></button>
                <div class="modal__in">
                    <div class="success-ic"></div>
                    <span class="modal__subtitle">
                    <span>Ваша заявка</span>
                    <span>была успешно отправлена!</span>
                </span>
                </div>
            </div>
        </div>
    <!--</div>-->
</template>

<svg style="display: none;" class="svg-ic">
    <symbol class="" id="phone-ic">
        <path d="M22.3045 18.7181C21.1187 18.0303 19.9113 18.4584 19.412 19.1341L18.3678 20.488C17.8373 21.1757 16.8459 21.0843 16.8459 21.0843C9.61083 19.1678 7.67605 11.5833 7.67605 11.5833C7.67605 11.5833 7.58723 10.5564 8.24976 10.0058L9.55562 8.92363C10.2086 8.40421 10.6214 7.15375 9.9565 5.92493C8.18015 2.70981 6.98711 1.60123 6.37979 0.749961C5.74127 -0.0508131 4.78108 -0.231168 3.78248 0.309896H3.76088C1.68446 1.52669 -0.588785 3.80396 0.138559 6.14857C1.3796 8.62063 3.66005 16.5009 10.9287 22.455C14.3446 25.271 19.7504 28.1566 22.0453 28.8228L22.0669 28.8564C24.3281 29.6115 26.527 27.2453 27.7008 25.1026V25.0858C28.2217 24.0494 28.0489 23.0682 27.2879 22.4262C25.9389 21.1084 23.9033 19.6535 22.3045 18.7181Z"/>
    </symbol>
    <symbol class="" id="wa-ic">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M27.3377 4.6503C24.3296 1.65312 20.329 0.00168461 16.0668 0C7.28468 0 0.13711 7.11286 0.133596 15.8557C0.132424 18.6504 0.866139 21.3784 2.26037 23.783L0 32L8.44643 29.795C10.7736 31.0582 13.3938 31.7239 16.0604 31.7251H16.067C24.8482 31.7251 31.9964 24.6113 32 15.8684C32.0017 11.6315 30.346 7.64748 27.3377 4.6503ZM16.067 29.0469H16.0616C13.6853 29.046 11.3546 28.4107 9.32134 27.2099L8.83772 26.9242L3.82555 28.2327L5.16342 23.3693L4.8485 22.8707C3.52287 20.7723 2.8227 18.3469 2.82374 15.8567C2.82664 8.59 8.76747 2.6781 16.0722 2.6781C19.6094 2.67944 22.9344 4.05214 25.4348 6.54329C27.9351 9.03444 29.3112 12.3458 29.3099 15.8673C29.3069 23.1346 23.3661 29.0469 16.067 29.0469ZM23.331 19.1762C22.9329 18.9779 20.9756 18.0194 20.6106 17.8872C20.2457 17.7549 19.9804 17.6888 19.7149 18.0855C19.4495 18.4821 18.6866 19.3746 18.4543 19.639C18.2221 19.9034 17.9899 19.9365 17.5917 19.7382C17.1936 19.5398 15.9109 19.1215 14.3902 17.7717C13.2068 16.7211 12.4077 15.4236 12.1755 15.0269C11.9433 14.6303 12.1508 14.4158 12.3501 14.2183C12.5292 14.0408 12.7482 13.7556 12.9473 13.5242C13.1463 13.2928 13.2126 13.1276 13.3453 12.8632C13.478 12.5987 13.4117 12.3673 13.3122 12.169C13.2126 11.9707 12.4165 10.0205 12.0847 9.22726C11.7616 8.45467 11.4333 8.5592 11.1889 8.54711C10.957 8.53562 10.6913 8.53316 10.4259 8.53316C10.1605 8.53316 9.72924 8.63233 9.36429 9.02895C8.99939 9.42561 7.97097 10.3842 7.97097 12.3343C7.97097 14.2844 9.39748 16.1684 9.59656 16.4329C9.79558 16.6973 12.4038 20.6993 16.3974 22.4155C17.3473 22.8237 18.0889 23.0674 18.667 23.2501C19.6208 23.5516 20.4886 23.509 21.1746 23.4071C21.9395 23.2933 23.53 22.4486 23.8618 21.5231C24.1936 20.5976 24.1936 19.8043 24.094 19.639C23.9945 19.4738 23.7291 19.3746 23.331 19.1762Z"/>
    </symbol>
    <symbol class="" id="calc-ic">
        <path d="M3.20891 0C1.43676 0 0.000610352 1.43619 0.000610352 3.20838V13.4169H13.4172V0H3.20891ZM8.45886 7.87512H7.29221V9.04181C7.29221 9.52481 6.90021 9.91682 6.41722 9.91682C5.93422 9.91682 5.54222 9.52481 5.54222 9.04181V7.87512H4.37557C3.89257 7.87512 3.50058 7.48312 3.50058 7.00011C3.50058 6.5171 3.89257 6.12509 4.37557 6.12509H5.54222V4.95841C5.54222 4.4754 5.93422 4.0834 6.41722 4.0834C6.90021 4.0834 7.29221 4.4754 7.29221 4.95841V6.12509H8.45886C8.94186 6.12509 9.33386 6.5171 9.33386 7.00011C9.33386 7.48312 8.94186 7.87512 8.45886 7.87512Z"/>
        <path d="M6.10352e-05 14.583V24.7915C6.10352e-05 26.5636 1.43621 27.9998 3.20836 27.9998H13.4166V14.583H6.10352e-05ZM8.78498 22.1314C9.12681 22.4733 9.12681 23.0274 8.78498 23.3693C8.61465 23.5396 8.39065 23.6248 8.16665 23.6248C7.94265 23.6248 7.71865 23.5396 7.54832 23.3681L6.70833 22.5281L5.86834 23.3681C5.69801 23.5384 5.47401 23.6248 5.25001 23.6248C5.02601 23.6248 4.80202 23.5396 4.63168 23.3681C4.28985 23.0263 4.28985 22.4721 4.63168 22.1303L5.47168 21.2903L4.63168 20.4502C4.28985 20.1084 4.28985 19.5542 4.63168 19.2124C4.97351 18.8706 5.52768 18.8706 5.86951 19.2124L6.7095 20.0524L7.54949 19.2124C7.89132 18.8706 8.44548 18.8706 8.78731 19.2124C9.12914 19.5542 9.12914 20.1084 8.78731 20.4502L7.94732 21.2903L8.78498 22.1314Z"/>
        <path d="M24.7915 0.000488281H14.5833V13.4174H27.9998V3.20887C27.9998 1.43668 26.5636 0.000488281 24.7915 0.000488281ZM24.2082 7.58394H18.9582C18.4752 7.58394 18.0832 7.19193 18.0832 6.70892C18.0832 6.22592 18.4752 5.83391 18.9582 5.83391H24.2082C24.6912 5.83391 25.0832 6.22592 25.0832 6.70892C25.0832 7.19193 24.6912 7.58394 24.2082 7.58394Z"/>
        <path d="M14.5835 14.583V27.9998H24.7917C26.5639 27.9998 28 26.5636 28 24.7915V14.583H14.5835ZM23.9167 23.9164H18.6668C18.1838 23.9164 17.7918 23.5244 17.7918 23.0414C17.7918 22.5584 18.1838 22.1664 18.6668 22.1664H23.9167C24.3997 22.1664 24.7917 22.5584 24.7917 23.0414C24.7917 23.5244 24.3997 23.9164 23.9167 23.9164ZM23.9167 20.4164H18.6668C18.1838 20.4164 17.7918 20.0244 17.7918 19.5414C17.7918 19.0584 18.1838 18.6664 18.6668 18.6664H23.9167C24.3997 18.6664 24.7917 19.0584 24.7917 19.5414C24.7917 20.0244 24.3997 20.4164 23.9167 20.4164Z"/>
    </symbol>
    <symbol class="" id="pdf-ic">
        <path d="M25.4494 8.7085H2.55061C1.1442 8.7085 0 9.8527 0 11.2591V21.4615C0 22.8679 1.1442 24.0121 2.55061 24.0121H25.4494C26.8558 24.0121 28 22.8679 28 21.4615V11.2591C28 9.8527 26.8558 8.7085 25.4494 8.7085ZM6.73026 17.6831C6.51289 17.6831 6.14152 17.6847 5.7939 17.6864V19.6474C5.7939 20.1169 5.41324 20.4976 4.9437 20.4976C4.47416 20.4976 4.0935 20.1169 4.0935 19.6474L4.08097 13.189C4.08024 12.963 4.16951 12.7461 4.329 12.586C4.4885 12.4259 4.70525 12.336 4.93117 12.336H6.73026C8.22412 12.336 9.43951 13.5354 9.43951 15.0096C9.43951 16.4838 8.22412 17.6831 6.73026 17.6831ZM14.0289 20.2926C13.5225 20.3014 12.2558 20.3062 12.2022 20.3064C12.2011 20.3064 12.2 20.3064 12.1989 20.3064C11.9746 20.3064 11.7593 20.2178 11.6 20.0597C11.4399 19.9008 11.3496 19.6848 11.3487 19.4593C11.3487 19.4366 11.336 13.1879 11.336 13.1879C11.3356 12.9621 11.425 12.7454 11.5845 12.5856C11.744 12.4259 11.9605 12.336 12.1862 12.336H13.962C15.9851 12.336 17.3442 13.9376 17.3442 16.3213C17.3442 18.5888 15.9499 20.259 14.0289 20.2926ZM22.7412 15.4166C23.2108 15.4166 23.5914 15.7973 23.5914 16.2668C23.5914 16.7363 23.2108 17.117 22.7412 17.117H21.1984V19.5344C21.1984 20.0039 20.8177 20.3846 20.3482 20.3846C19.8786 20.3846 19.498 20.0039 19.498 19.5344V13.1206C19.498 12.6511 19.8786 12.2704 20.3482 12.2704H22.9477C23.4172 12.2704 23.7979 12.6511 23.7979 13.1206C23.7979 13.5901 23.4172 13.9708 22.9477 13.9708H21.1984V15.4166H22.7412Z" />
        <path d="M13.962 14.0361H13.038C13.0393 14.8036 13.0439 17.8628 13.0463 18.6013C13.4001 18.5991 13.7789 18.5959 13.9991 18.5921C15.1353 18.5722 15.6439 17.4371 15.6439 16.321C15.6438 15.7849 15.5226 14.0361 13.962 14.0361Z" />
        <path d="M6.73027 14.0361H5.78394C5.78496 14.4145 5.78592 14.817 5.78592 15.0093C5.78592 15.234 5.78751 15.6238 5.78932 15.9858C6.13824 15.984 6.51097 15.9824 6.73032 15.9824C7.27717 15.9824 7.73917 15.5368 7.73917 15.0093C7.73917 14.4818 7.27712 14.0361 6.73027 14.0361Z" />
        <path d="M24.5683 7.00796C24.3712 6.4678 24.0651 5.96856 23.6599 5.54108L20.1284 1.81601C19.3293 0.973171 18.2049 0.489746 17.0434 0.489746H5.72468C4.31827 0.489746 3.17407 1.63395 3.17407 3.04035V7.00796H24.5683Z" />
        <path d="M3.17407 25.7124V26.9594C3.17407 28.3658 4.31827 29.51 5.72468 29.51H22.2753C23.6817 29.51 24.8259 28.3658 24.8259 26.9594V25.7124H3.17407Z" />
    </symbol>
    <symbol class="" id="mouse-ic">
        <path d="M10.9829 0C7.41463 0 4.51172 2.90291 4.51172 6.47116V15.5288C4.51172 19.0971 7.41463 22 10.9829 22C14.5511 22 17.454 19.0971 17.454 15.5288V6.47116C17.454 2.90291 14.5511 0 10.9829 0ZM16.1341 15.5288C16.1341 18.3691 13.8232 20.6801 10.9829 20.6801C8.14258 20.6801 5.83167 18.3691 5.83167 15.5288V6.47116C5.83167 3.63086 8.14258 1.31995 10.9829 1.31995C13.8232 1.31995 16.1341 3.63086 16.1341 6.47116V15.5288Z"/>
    </symbol>
    <symbol class="" id="mouse-ic-btn">
        <path d="M10.983 4.37646C10.6185 4.37646 10.3231 4.67187 10.3231 5.03644V8.07413C10.3231 8.43852 10.6185 8.7341 10.983 8.7341C11.3474 8.7341 11.643 8.43852 11.643 8.07413V5.03644C11.643 4.67187 11.3476 4.37646 10.983 4.37646Z"/>
    </symbol>
    <symbol class="" id="telegram-ic">
        <path d="M0.529889 12.4669L7.4425 15.0351L10.1181 23.6002C10.2893 24.1488 10.9632 24.3516 11.4105 23.9875L15.2637 20.8608C15.6676 20.5332 16.2429 20.5169 16.665 20.8218L23.6148 25.8444C24.0933 26.1906 24.7712 25.9296 24.8912 25.354L29.9823 0.977435C30.1133 0.348737 29.4927 -0.175743 28.8913 0.0557888L0.521789 10.9496C-0.178312 11.2184 -0.172212 12.205 0.529889 12.4669ZM9.6869 13.668L23.1967 5.38549C23.4395 5.23707 23.6893 5.56387 23.4808 5.75638L12.3313 16.0728C11.9394 16.4359 11.6866 16.9218 11.615 17.4493L11.2352 20.251C11.1849 20.6251 10.657 20.6622 10.5533 20.3002L9.0926 15.1912C8.9253 14.6085 9.1691 13.9861 9.6869 13.668Z" fill="white"/>
    </symbol>
    <symbol class="" id="viber-ic">
        <path d="M28.7068 18.1916C29.6409 10.328 28.2579 5.36357 25.7633 3.11814L25.7646 3.11683C21.7382 -0.717749 8.1404 -1.2853 3.32336 3.28906C1.16013 5.52666 0.398167 8.81065 0.314665 12.8762C0.231163 16.943 0.132004 24.5613 7.231 26.6279H7.23753L7.231 29.7841C7.231 29.7841 7.18273 31.0627 7.99949 31.3197C8.93367 31.6224 9.3564 31.0288 12.262 27.5582C17.1208 27.9796 20.8523 27.0141 21.2763 26.8732C22.2575 26.5444 27.8091 25.8099 28.7068 18.1916ZM12.7408 25.3376C12.7408 25.3376 9.66562 29.1722 8.70925 30.1677C8.39612 30.4912 8.05298 30.4612 8.0582 29.8193C8.0582 29.3979 8.08168 24.5795 8.08168 24.5795C2.06299 22.8547 2.41788 16.3676 2.48312 12.974C2.54835 9.57913 3.1694 6.79876 5.00123 4.92648C9.22723 0.964039 21.1485 1.84995 24.1859 4.70468C27.8991 7.9965 26.5774 17.2966 26.5853 17.6136C25.822 23.9728 21.3233 24.376 20.4961 24.6513C20.1425 24.7687 16.8612 25.6129 12.7408 25.3376Z" fill="#1A1821"/>
        <path d="M14.4422 5.67139C13.9399 5.67139 13.9399 6.45422 14.4422 6.46074C18.3394 6.49075 21.549 9.20719 21.5842 14.1899C21.5842 14.7157 22.354 14.7092 22.3475 14.1834H22.3462C22.3044 8.81447 18.7999 5.7014 14.4422 5.67139Z" fill="#1A1821"/>
        <path d="M19.5685 13.364C19.5567 13.8833 20.3252 13.9081 20.3317 13.3823C20.3957 10.4219 18.5704 7.98336 15.1402 7.72633C14.6379 7.6898 14.5857 8.47915 15.0868 8.51568C18.0615 8.7414 19.6285 10.7716 19.5685 13.364Z" fill="#1A1821"/>
        <path d="M18.7465 16.7315C18.102 16.3583 17.4457 16.5906 17.1743 16.9572L16.6068 17.6918C16.3184 18.0649 15.7796 18.0153 15.7796 18.0153C11.8472 16.9755 10.7956 12.8604 10.7956 12.8604C10.7956 12.8604 10.7473 12.3032 11.1074 12.0045L11.8172 11.4173C12.172 11.1355 12.3965 10.4571 12.035 9.79035C11.0695 8.04594 10.4211 7.44446 10.091 6.98259C9.74395 6.54811 9.22206 6.45026 8.67929 6.74382H8.66755C7.53897 7.40401 6.30339 8.63959 6.69872 9.91169C7.37327 11.2529 8.61275 15.5285 12.5635 18.759C14.4201 20.2869 17.3583 21.8525 18.6056 22.2139L18.6174 22.2322C19.8464 22.6419 21.0415 21.358 21.6796 20.1955V20.1864C21.9627 19.6241 21.8687 19.0917 21.4551 18.7434C20.7219 18.0284 19.6155 17.239 18.7465 16.7315Z" fill="#1A1821"/>
        <path d="M15.6778 10.6383C16.9316 10.7114 17.5396 11.3664 17.6048 12.7115C17.6283 13.2373 18.3916 13.2008 18.3681 12.675C18.2846 10.9189 17.3687 9.94031 15.7195 9.84898C15.2172 9.81897 15.1702 10.6083 15.6778 10.6383Z" fill="#1A1821"/>
    </symbol>
    <symbol class="" id="inst-ic">
        <path d="M23.1685 0H9.83027C4.4095 0 -0.000610352 4.41011 -0.000610352 9.83088V23.1691C-0.000610352 28.5899 4.4095 33 9.83027 33H23.1685C28.5893 33 32.9994 28.5899 32.9994 23.1691V9.83088C32.9993 4.41011 28.5892 0 23.1685 0ZM29.6796 23.1691C29.6796 26.7651 26.7645 29.6802 23.1685 29.6802H9.83027C6.23433 29.6802 3.31919 26.7651 3.31919 23.1691V9.83088C3.31919 6.23488 6.23433 3.3198 9.83027 3.3198H23.1685C26.7645 3.3198 29.6796 6.23488 29.6796 9.83088V23.1691Z" />
        <path d="M16.4993 7.96509C11.7931 7.96509 7.96436 11.7939 7.96436 16.5C7.96436 21.2061 11.7931 25.035 16.4993 25.035C21.2055 25.035 25.0343 21.2062 25.0343 16.5C25.0343 11.7938 21.2055 7.96509 16.4993 7.96509ZM16.4993 21.7152C13.619 21.7152 11.2842 19.3803 11.2842 16.5001C11.2842 13.6198 13.6191 11.2849 16.4993 11.2849C19.3796 11.2849 21.7145 13.6198 21.7145 16.5001C21.7145 19.3803 19.3796 21.7152 16.4993 21.7152Z" />
        <path d="M25.0508 10.0742C26.1803 10.0742 27.096 9.15855 27.096 8.02904C27.096 6.89953 26.1803 5.98389 25.0508 5.98389C23.9213 5.98389 23.0057 6.89953 23.0057 8.02904C23.0057 9.15855 23.9213 10.0742 25.0508 10.0742Z" />
    </symbol>
    <symbol id="play-ic">
        <path d="M21.2005 12.1327C21.8692 12.5172 21.8692 13.482 21.2005 13.8665L2.68896 24.5107C2.02229 24.894 1.19049 24.4128 1.19049 23.6438L1.19049 2.35549C1.19049 1.58647 2.02229 1.10525 2.68896 1.48858L21.2005 12.1327Z"/>
    </symbol>
    <symbol id="phoneTransp-ic">
        <path d="M18.8661 21.0466L18.8761 21.0367L21.9176 18.0162C21.9177 18.0161 21.9179 18.0159 21.9181 18.0157C22.0672 17.8662 22.1176 17.7184 22.0979 17.536C22.0665 17.4004 21.9782 17.262 21.7602 17.1258L17.4673 14.5884H17.4425L17.3237 14.517C17.2767 14.4888 17.1711 14.451 16.9634 14.451C16.7255 14.451 16.5268 14.5246 16.3463 14.6808L15.0552 15.9955L15.0521 15.9986C14.9414 16.1093 14.8065 16.1667 14.7081 16.1995L14.7078 16.1996C14.6392 16.2225 14.5207 16.2596 14.4009 16.2596H14.3514L14.3027 16.2499L14.0172 16.1927C14.0171 16.1927 14.0169 16.1927 14.0168 16.1926C13.7549 16.1403 13.4291 16.0024 13.0639 15.8158C12.6721 15.6155 12.2018 15.3121 11.6585 14.9161L11.6584 14.916C11.0952 14.5054 10.4649 13.9402 9.769 13.2285C9.05816 12.5324 8.49655 11.9051 8.09334 11.3483C7.70524 10.8124 7.40631 10.3424 7.20618 9.9426C6.97984 9.50528 6.82161 9.0929 6.74879 8.71039L6.73997 8.66406V8.61689C6.73997 8.49553 6.76873 8.3808 6.79992 8.28717C6.83279 8.1885 6.89013 8.05359 7.0007 7.94295L8.12176 6.82116C8.24755 6.69528 8.33285 6.53979 8.37508 6.33906C8.4127 6.16023 8.38835 6.01779 8.31412 5.88573L8.30743 5.87383L8.30759 5.87374L5.86988 1.2459C5.79627 1.13388 5.71061 1.04302 5.61288 0.96968C5.55055 0.922897 5.48145 0.898071 5.3868 0.898071C5.25885 0.898071 5.13844 0.941844 5.00835 1.07202L1.96547 4.11688L1.95618 4.12618L1.94641 4.13498C1.85061 4.22126 1.7572 4.34457 1.6732 4.5187C1.59051 4.6901 1.54 4.8498 1.51587 4.9988C1.51305 5.0769 1.50495 5.22977 1.49331 5.4395C1.48097 5.66169 1.50517 5.99862 1.57942 6.46668C1.65035 6.91386 1.78754 7.45996 1.99628 8.10895C2.19883 8.73874 2.50645 9.45217 2.92428 10.251L2.92429 10.251C3.33714 11.0403 3.88717 11.9081 4.57816 12.8551C5.2604 13.7901 6.12616 14.777 7.17931 15.8158L7.18389 15.8203L7.18386 15.8204C8.50911 17.1616 9.74786 18.2049 10.8998 18.9585L10.6261 19.3769L10.8998 18.9585C12.073 19.726 13.1086 20.2928 14.0093 20.6664L13.8177 21.1283L14.0093 20.6664C14.928 21.0476 15.6797 21.2759 16.2727 21.3666C16.9191 21.4656 17.3555 21.5097 17.6042 21.5097C17.7176 21.5097 17.7985 21.506 17.8517 21.5007L18.8661 21.0466ZM18.8661 21.0466L18.8567 21.0571C18.7704 21.1531 18.6472 21.2465 18.4735 21.3303L18.4733 21.3304C18.3001 21.4141 18.139 21.4648 17.989 21.4886C17.9462 21.4913 17.8954 21.4964 17.8522 21.5007L17.8519 21.5007L18.8661 21.0466Z"/>
    </symbol>
</svg>


<?php wp_footer();?>
</body>
</html>
