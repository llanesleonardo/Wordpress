<?php
/**
 *  Footer Default Page: footer.php
 * 
 */
?>
<!-- main sections  -->
        </div>
    </div>

    <section id="footer-social" class="container-fluid py-2" role="site-footer-social">
                <?php get_template_part( "template-parts/content/content","social" );  ?>
                </section>
<footer>
<div id="footer-backtop" class="container-fluid py-2" role="site-footer-backtop">
                <?php get_template_part( "template-parts/utils/content","back_top" );  ?>
                </div>
<div id="footer-fourcol" class="container-fluid py-2" role="site-info-footer-fourcol">
                <?php get_template_part( "template-parts/footer/content","footer_fourcol" );  ?>
                </div>
<div id="footer-siteinfo" class="container-fluid py-4" role="site-footer-siteinfo">
                <?php
                get_template_part( "template-parts/footer/content","footer_siteinfo" ); 
                ?>
            </div>

</footer>
    </div> <!-- site -->
     <?php wp_footer(); ?>
</body>
</html>