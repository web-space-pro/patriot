<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package patriot
 */

?>

<?php
if (function_exists('get_field')) {
    $address = get_field('o_address', 'options');
    $email = get_field('o_email', 'options');
    $small_text = get_field('o_small_text', 'options');
    $phone = get_field('o_phone', 'options');
    $wts= get_field('o_wts', 'options');
    $tg = get_field('o_tg', 'options');
    $o_feedback = get_field('o_feedback', 'options');

    $feedback_form  = $o_feedback['form'];
    $feedback_title = $o_feedback['title'];
    $feedback_text = $o_feedback['text'];

    $popup_request = get_field('popup_request', 'options');
    $popup_services = get_field('popup_services', 'options');

}

?>
	<footer class="footer" id="contacts">
      <div class="container">
          <div class="footer__top">
              <div class="footer__contacts">
                  <div>
                      <h2>Контакты</h2>
                      <div class="footer__contacts--inner">
                          <div class="footer__contacts-phone">
                              <a href="tel:<?=$phone?>"><?=$phone?></a>
                              <span><?=$small_text?></span>
                          </div>
                          <ul class="footer__contacts-social">
                                  <?php if(!empty($tg)) : ?>
                                      <li>
                                          <a class="icon" href="<?=$tg?>" target="_blank">
                                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                  <path d="M4.10355 10.968C4.10355 10.968 12.0645 7.45574 14.8255 6.21897C15.8839 5.72431 19.4733 4.14124 19.4733 4.14124C19.4733 4.14124 21.1299 3.44871 20.9918 5.13064C20.9458 5.82324 20.5777 8.2472 20.2095 10.8691C19.6573 14.5793 19.0591 18.6358 19.0591 18.6358C19.0591 18.6358 18.9671 19.7736 18.1848 19.9715C17.4025 20.1694 16.114 19.279 15.8839 19.081C15.6998 18.9327 12.4326 16.7065 11.2362 15.6182C10.9141 15.3214 10.5459 14.7278 11.2822 14.0352C12.9388 12.4027 14.9175 10.3744 16.114 9.08824C16.6662 8.49457 17.2184 7.10944 14.9175 8.79137C11.6504 11.2154 8.42916 13.491 8.42916 13.491C8.42916 13.491 7.69287 13.9857 6.31237 13.5404C4.93181 13.0953 3.32121 12.5016 3.32121 12.5016C3.32121 12.5016 2.21686 11.7596 4.10355 10.968Z" fill="#34AADF" />
                                              </svg>
                                          </a>
                                      </li>
                                  <?php endif; ?>

                                  <?php if(!empty($wts)) : ?>
                                      <li>
                                          <a class="icon" href="<?=$wts?>" target="_blank">
                                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                  <path d="M4 20L5.14889 15.7354C4.22234 14.0741 3.92796 12.1355 4.31978 10.2754C4.71161 8.41525 5.76334 6.75832 7.28199 5.60865C8.80064 4.45899 10.6843 3.8937 12.5874 4.01652C14.4905 4.13933 16.2853 4.94202 17.6425 6.27729C18.9997 7.61256 19.8283 9.39083 19.9761 11.2858C20.124 13.1808 19.5812 15.0653 18.4474 16.5936C17.3137 18.122 15.6649 19.1915 13.8037 19.6061C11.9426 20.0206 9.99384 19.7523 8.31512 18.8505L4 20ZM8.52319 17.2546L8.79006 17.4124C10.006 18.1307 11.4262 18.4279 12.8293 18.2578C14.2324 18.0877 15.5397 17.4597 16.5473 16.4718C17.555 15.4839 18.2064 14.1915 18.4002 12.7961C18.5939 11.4006 18.3191 9.98052 17.6184 8.75702C16.9178 7.53352 15.8308 6.57537 14.5267 6.03189C13.2227 5.48841 11.7749 5.39013 10.4089 5.75236C9.04298 6.11458 7.83563 6.91697 6.97501 8.03449C6.1144 9.152 5.64887 10.5219 5.65097 11.9306C5.64982 13.0987 5.97395 14.2441 6.58727 15.2395L6.75462 15.5145L6.11233 17.8947L8.52319 17.2546Z" fill="#00D95F" />
                                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M14.9914 13.0257C14.8351 12.8999 14.652 12.8114 14.4562 12.7668C14.2604 12.7223 14.057 12.723 13.8615 12.7687C13.5677 12.8904 13.3779 13.3502 13.1881 13.5801C13.1481 13.6353 13.0893 13.6739 13.0227 13.6889C12.9561 13.7038 12.8864 13.694 12.8265 13.6613C11.751 13.2411 10.8495 12.4706 10.2685 11.4749C10.2189 11.4128 10.1955 11.3339 10.203 11.2548C10.2106 11.1758 10.2487 11.1028 10.3092 11.0511C10.5209 10.8421 10.6763 10.5831 10.7611 10.2983C10.7799 9.98408 10.7078 9.6711 10.5532 9.39668C10.4337 9.01194 10.2063 8.66936 9.89787 8.40942C9.73879 8.33805 9.56239 8.31412 9.38998 8.34052C9.21756 8.36691 9.05648 8.44251 8.92617 8.55818C8.69996 8.75286 8.5204 8.99567 8.40073 9.26873C8.28105 9.5418 8.22431 9.83816 8.23468 10.136C8.23538 10.3033 8.25663 10.4698 8.29796 10.6319C8.4029 11.0213 8.5643 11.3934 8.77703 11.7364C8.93051 11.999 9.09797 12.2534 9.2787 12.4982C9.86603 13.3024 10.6043 13.9853 11.4526 14.5088C11.8783 14.7748 12.3332 14.9911 12.8085 15.1535C13.3021 15.3767 13.8472 15.4623 14.3858 15.4014C14.6926 15.3551 14.9834 15.2342 15.2324 15.0495C15.4815 14.8648 15.6812 14.6218 15.814 14.342C15.892 14.173 15.9157 13.984 15.8817 13.801C15.8004 13.4269 15.2987 13.206 14.9914 13.0257Z" fill="#00D95F" />
                                              </svg>
                                          </a>
                                      </li>
                                  <?php endif; ?>

                              </ul>
                      </div>
                      <div class="footer__contacts--info">
                          <address><?=$address?></address>
                          <a href="mailto:<?=$email?>"><?=$email?></a>
                      </div>
                  </div>
              </div>

              <div class="footer__form">
                  <?php if(!empty($feedback_text) || !empty($feedback_title) ): ?>
                      <div class="footer__form-heading">
                          <h3><?=$feedback_title?></h3>
                          <p><?=$feedback_text?></p>
                      </div>
                  <?php endif;?>

                  <?php if(!empty($feedback_form)): ?>
                      <div>
                          <?= do_shortcode('[contact-form-7 id="'.$feedback_form.'"]'); ?>
                      </div>
                  <?php endif;?>
              </div>
          </div>

          <div class="footer__bottom">
            <div class="footer__copyright">© Патриот. 2014–<?= date("Y")?></div>
            <div class="footer__develop">Разработано в <a href="https://web-space.pro">web-space.pro</a></div>
          </div>

      </div>
	</footer>

<!-- Любое количество модальных окон -->
<div id="contact-modal" class="modal-window contact__modal">
    <div class="modal-backdrop"></div>
    <div class="modal">
        <button class="modal-close" aria-label="Закрыть">&times;</button>
        <div>
            <?php if(!empty($popup_request['title'])): ?>
                <h3><?=$popup_request['title']?></h3>
            <?php endif;?>

            <?php if(!empty($popup_request['form'])): ?>
                <div>
                    <div>
                        <?= do_shortcode('[contact-form-7 id="'.$popup_request['form'].'"]'); ?>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>
<div id="services-modal" class="modal-window services__modal">
    <div class="modal-backdrop"></div>
    <div class="modal">
        <button class="modal-close" aria-label="Закрыть"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.19526 6.19526C6.45561 5.93491 6.87772 5.93491 7.13807 6.19526L12 11.0572L16.8619 6.19526C17.1223 5.93491 17.5444 5.93491 17.8047 6.19526C18.0651 6.45561 18.0651 6.87772 17.8047 7.13807L12.9428 12L17.8047 16.8619C18.0651 17.1223 18.0651 17.5444 17.8047 17.8047C17.5444 18.0651 17.1223 18.0651 16.8619 17.8047L12 12.9428L7.13807 17.8047C6.87772 18.0651 6.45561 18.0651 6.19526 17.8047C5.93491 17.5444 5.93491 17.1223 6.19526 16.8619L11.0572 12L6.19526 7.13807C5.93491 6.87772 5.93491 6.45561 6.19526 6.19526Z" fill="#AAAAAA" /></svg></button>
        <div>
            <h3 class="services__modal--title"></h3>
            <div class="services__modal--content"></div>
            <div class="services__modal--footer">
                <div>
                    <?php if(!empty($popup_services['price_label'])): ?>
                        <h4><?=$popup_services['price_label']?></h4>
                    <?php endif;?>
                    <span class="price"></span>
                </div>

                <?php if(!empty($popup_services['label_btn'])): ?>
                    <div>
                        <a class="btn btn-modal-open" data-modal="contact-modal" href="#"><?=$popup_services['label_btn']?></a>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>

</body>
</html>
