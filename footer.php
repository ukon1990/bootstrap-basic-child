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
        <div class="col-md-6 footer-left">
            <div class="footer-address">
                <address>
                    <span><strong>Daglig leder</strong>: Jan Ivar Melby</span></br>
                    <span><strong>E-post</strong>: <a href="mailto:info@hjelleseter.no"">info@hjelleseter.no</a></span></br>
                    <span><strong>Tlf</strong>: 61 24 16 95</span></br>
                    <span><strong>Mobil</strong>: 41 54 24 80</span></br>
                    <span><strong>Adresse</strong>: Dovre, 2660 Dombås</span></br>
                </address
            </div>
            <?php
            if (!dynamic_sidebar('footer-left')) {
                printf(__('<p>Powered by %s', 'bootstrap-basic'), 'WordPress');
                echo ' | ';
                printf(__('Theme: %s', 'bootstrap-basic'), 'Hjelle seter</p>');
            }
            ?>
        </div>
        <div class="col-md-6 footer-right text-right">
            <?php dynamic_sidebar('footer-right'); ?>
        </div>
    </div>
</footer>
</div><!--.container page-container-->


<!--wordpress footer-->
<?php wp_footer(); ?>
</body>
</html>