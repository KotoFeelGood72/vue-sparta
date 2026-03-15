<!--		        </div>-->
</div>
</div><!-- / site-content -->

<div class="site-footer">
    <footer id="footer">
        <?php if (post_type_exists('spareparts') && taxonomy_exists('brands')) : require('includes/block-brandlogo.php'); endif; ?>

        <div class="row column">
            <p>Основная деятельность компании "Спарт" - поставка двигателей, гидромолотов и других запчастей для
                спецтехники Atlas Copco, BobCat, Buhler, Case, Caterpillar, ChangLin, ChengGong, Cummins, Daewoo,
                Detroit Diesel, Deutz, Doosan, Eaton, FAW, Foton, Freightliner, Grove, Hely, Hino, Hitachi, Howo,
                Hyundai, Ingersoll Rand, International, Isuzu, JCB, John Deere, Kawasaki, Kobelco, Komatsu, Kubota,
                LiuGong, LongGong, LongKing, LuQing, Mercedes, Mitsuber, Monitowoc, MTU, Mustang, Navistar, New Holland,
                Parker, Perkins, Samsung, Sandvik, Sauer Danfoss, SDLG, SEM, Shantui, Shehwa, Takeuchi, Terex, TigerCat,
                Volvo, Waukesha, XCMG, XGMA, Yanmar, Zoomlion по всей России в течение 24-х часов!</p>
            <p>Осуществляем подбор запчастей для спецтехники по номеру или наименованию. Сроки поставки и цены на
                спецзапчасти под заказ Вы можете узнать у наших менеджеров.</p>
            <p class="copyright">© ООО «Спарт»</p>
        </div>
    </footer>
</div>

<div id="popup-window" style="display:none;">
    <div id="popup-close"><i class="fa fa-times" aria-hidden="true"></i>Закрыть</div>
    <?php require('includes/component-form-query-popup.php'); ?>
</div>

<script src="//code-ya.jivosite.com/widget/XuK8jnfuCN" async></script>

<?php /*
<!-- Begin LeadBack code {literal} -->
<script>
    var _emv = _emv || [];
    _emv['campaign'] = 'e129fb3798d317d0a402b7ba';
    _emv['lang'] = 'ru';

    (function () {
        var em = document.createElement('script');
        em.type = 'text/javascript';
        em.async = true;
        em.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'leadback.ru/js/leadback.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(em, s);
    })();
</script>
<!-- End LeadBack code {/literal} -->
*/ ?>

<?php wp_footer(); ?>

</body>
</html>