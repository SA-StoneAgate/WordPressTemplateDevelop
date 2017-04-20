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

<hr>
<div class="container-fluid">
  <footer id="colophon" class="site-footer text-center" role="contentinfo">
    <div class="site-info">
      <?php printf(esc_html__('&copy; Copyright: %s', 'savoiceserver'), 'SAVoiceServer, 2016 - ' . date(Y)); ?></a>
      <span class="sep"> <br> </span>
      <?php printf(esc_html__('Theme: %1$s by %2$s.', 'savoiceserver'), 'SAVoiceServer', '<a href="https://vk.com/stoneagate" rel="designer">StoneAgate | Petros R. Melikyan</a>'); ?>
      <span class="sep"> <br> </span>
        <?php printf(esc_html__('Website promotion: %2$s.', 'savoiceserver'), 'SAVoiceServer', '<a href="https://vk.com/stoneagate" rel="designer">StoneAgate | Petros R. Melikyan</a>'); ?>
    </div><!-- .site-info -->
  </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
