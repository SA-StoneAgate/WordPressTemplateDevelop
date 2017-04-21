<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SAVoiceServer
 */
?>

</div><!-- #content -->
</div><!-- #page -->
</div><!-- .container -->
</div><!-- .container-fluid -->

<hr>
<div class="container-fluid site-footer">
  <footer id="colophon" role="contentinfo">
    <div class="site-info">
      <span class="sep"> <br> </span>
      <span class="sep"> <br> </span>
      <?php printf(esc_html__('&copy; Copyright: %s', 'savoiceserver'), 'SAVoiceServer, 2016 - ' . date(Y)); ?></a>
      <span class="sep"> <br> </span>
      <?php printf(esc_html__('Theme: %1$s by %2$s.', 'savoiceserver'), 'SAVoiceServer', '<a href="https://vk.com/stoneagate" rel="designer">StoneAgate | Petros R. Melikyan</a>'); ?>
      <span class="sep"> <br> </span>
        <?php printf(esc_html__('Website promotion: %2$s.', 'savoiceserver'), 'SAVoiceServer', '<a href="https://vk.com/stoneagate" rel="designer">StoneAgate | Petros R. Melikyan</a>'); ?>
    </div><!-- .site-info -->
  </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


<!-- Изменение шрифта Названии сайта в зависимости от размера открытого окна -->
<script type="text/javascript">

  $('.site-title').flowtype({
    minFont: 12,
    fontRatio: 10
  });

</script>
<!-- Конец - Изменение шрифта Названии сайта в зависимости от размера открытого окна -->

</body>
</html>
