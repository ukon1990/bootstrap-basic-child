<?php
/**
 * The theme footer
 *
 * @package bootstrap-basic
 */
?>

</div><!--.site-content-->


<footer id="site-footer" role="contentinfo">
    <div id="footer-row" class="row site-footer">
        <div id="foot-left" class="col-md-6 footer-left"">
            <address id="address-left"">
                <span><strong>Daglig leder</strong>: Jan Ivar Melby</span></br>
                <span><strong>Mobil</strong>: 41 54 24 80</span>
            </address>
        </div>
        <div id="foot-right" class="col-md-6 footer-right text-right">
            <address id="address-right">
                <span><strong>E-post</strong>: <a href="mailto:info@hjelleseter.no"">info@hjelleseter.no</a></span></br>
                <span><strong>Tlf</strong>: 61 24 16 95</span></br>
                <span><strong>Adresse</strong>: Dovre, 2660 Dombås</span></br>
            </address
            <?php dynamic_sidebar('footer-right'); ?>
        </div>
    </div>
</footer>
</div><!--.container page-container-->


<!--wordpress footer-->
<?php wp_footer(); ?>
</body>
</html>