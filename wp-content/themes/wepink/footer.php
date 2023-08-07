<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package auaha
 */

?>

<?php
/**
 * Title: Default Footer
 * Slug: twentytwentythree/footer-default
 * Categories: footer
 * Block Types: core/template-part/footer
 */
?>


<footer class="footer-main" id="contact-anchor">
<div class="footer-wrapper">
	<!-- Footer Start-->
	<div class="footer-area footer-padding">
		<div class="container ">
			<div class="row justify-content-between">
				<div class="col-xl-4 col-lg-3 col-md-8 col-sm-8">
					<div class="single-footer-caption mb-50">
						<div class="single-footer-caption mb-30">
							<!-- logo -->
							<div class="footer-logo mb-35">
								<a href="/">
									<?php echo wp_get_attachment_image(get_theme_mod('logo_theme'), 'view_large'); ?>
								</a>
							</div>
							<div class="footer-tittle">
								<div class="footer-pera">
									<p><?php bloginfo( 'description' ); ?></p>
								</div>
							</div>
							<!-- social -->
							<div class="footer-social">
								<a href="<?php echo get_theme_mod('instagram_link'); ?>" style="display: flex; justify-content: center; align-items: center;">
									<svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display: block; margin: auto; height: 16px; width: auto;" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M12.004 5.838a6.157 6.157 0 0 0-6.158 6.158 6.157 6.157 0 0 0 6.158 6.158 6.157 6.157 0 0 0 6.158-6.158 6.157 6.157 0 0 0-6.158-6.158zm0 10.155a3.996 3.996 0 1 1 3.997-3.997 3.995 3.995 0 0 1-3.997 3.997z" fill="#ffffff" data-original="#000000" class=""></path><path d="M16.948.076c-2.208-.103-7.677-.098-9.887 0-1.942.091-3.655.56-5.036 1.941C-.283 4.325.012 7.435.012 11.996c0 4.668-.26 7.706 2.013 9.979 2.317 2.316 5.472 2.013 9.979 2.013 4.624 0 6.22.003 7.855-.63 2.223-.863 3.901-2.85 4.065-6.419.104-2.209.098-7.677 0-9.887-.198-4.213-2.459-6.768-6.976-6.976zm3.495 20.372c-1.513 1.513-3.612 1.378-8.468 1.378-5 0-7.005.074-8.468-1.393-1.685-1.677-1.38-4.37-1.38-8.453 0-5.525-.567-9.504 4.978-9.788 1.274-.045 1.649-.06 4.856-.06l.045.03c5.329 0 9.51-.558 9.761 4.986.057 1.265.07 1.645.07 4.847-.001 4.942.093 6.959-1.394 8.453z" fill="#ffffff" data-original="#000000" class=""></path><circle cx="18.406" cy="5.595" r="1.439" fill="#ffffff" data-original="#000000" class=""></circle></g></svg>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
					<div class="single-footer-caption mb-50">
						<div class="footer-tittle">
							<h4>Links Rápidos</h4>
							<ul>
								<li><a href="#">Quem somos</a></li>
								<li><a href="#">Polícia de privacidade</a></li>
								<li><a href="#">Trocas e divulgação</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
					<div class="single-footer-caption mb-50">
						<div class="footer-tittle">
							<h4>Categorias</h4>
							<ul>
							<?php

								$taxonomy     = 'product_cat';
								$orderby      = 'name';  
								$show_count   = 0;      // 1 for yes, 0 for no
								$pad_counts   = 0;      // 1 for yes, 0 for no
								$hierarchical = 1;      // 1 for yes, 0 for no  
								$title        = '';  

								$args = array(
									'taxonomy'     => $taxonomy,
									'orderby'      => $orderby,
									'show_count'   => $show_count,
									'pad_counts'   => $pad_counts,
									'hierarchical' => $hierarchical,
									'title_li'     => $title,
									'hide_empty'   => true,
									'parent'    => 0
								);

								$all_categories = get_categories( $args );
								foreach ($all_categories as $key=>$cat) {
									$category_id = $cat->term_id;       

									printf(
										'<li><a href="%s">%s</a></li>',
										get_term_link($category_id, 'product_cat'),
										$cat->name
									);      
								}
								?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
					<div class="single-footer-caption mb-50">
						<div class="footer-tittle">
							<h4>DÚVIDAS? FALE CONOSCO!</h4>
							<ul>
								<li>
									<a href="<?php 
										
										$number = nl2br(get_theme_mod('phone_number')); 

										echo 'https://wa.me/'.substr($number, -13);
									?>">
										<?php echo get_theme_mod('phone_number'); ?>
									</a>
								</li>
								<li><a href="mail:<?php echo get_bloginfo('admin_email'); ?>"><?php echo get_bloginfo('admin_email'); ?></a></li>
								<li><a href="#">Polícia de privacidade</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- footer-bottom area -->
	<div class="footer-bottom-area">
		<div class="container">
			<div class="footer-border">
				<div class="row d-flex align-items-center">
					<div class="col-xl-12 ">
						<div class="footer-copy-right text-center">
							<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;
								<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados |
								e desenvolvimento <i class="fa fa-heart" aria-hidden="true"></i> por <a
									href="https://colorlib.com" target="_blank"><?php echo get_bloginfo('name'); ?></a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer End-->
</div>
</footer>
 <!-- Scroll Up -->
 <div id="back-top">
	<a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>
<?php wp_footer(); ?>

</body>

</html>