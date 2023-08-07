<?php get_header(); ?>
<main>
    <div class="container-slide">
        <div class="row">
            <div class="col-12">
                <a href="<?php echo get_theme_mod('text__title_slider_1'); ?>">
                    <div 
                        class="single-slider hero-overly1 slider-height d-flex align-items-center slider-bg1" 
                        <?php echo 'style="background-image: url(' . wp_get_attachment_image_src(get_theme_mod('banner_theme_1'), 'view_large')[0] . ');"'; ?>></div>
                </a>
            </div>
        </div>
    </div>
    <!--? slider Area Start-->
    <!-- slider Area End-->

    <!--? Properties Start -->
    <section class="properties new-arrival fix">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <h2>queridinhos da wepink</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Nav Card -->
                <div class="product-lists queridinhos">
                <?php
                    $params = [
                        'posts_per_page' => 8,
                        'post_type' => 'product',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => 'queridinhos',
                                'operator' => 'IN',
                            ),
                        ),
                    ];
                    $wc_query = new WP_Query($params); 
                    ?>
                    <?php if ($wc_query->have_posts()) :
                        while ($wc_query->have_posts()) : 
                            $wc_query->the_post(); 
                            $product = wc_get_product(get_the_ID());

                            
                    ?>

                            <div class="product-item">
                                <div class="single-new-arrival mb-50 text-center">
                                    <div class="popular-img">
                                        <?php echo woocommerce_get_product_thumbnail('woocommerce_full_size'); ?>
                                    </div>
                                    <div class="popular-caption">
                                        <h3>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        <?php echo the_excerpt(); ?>

                                        <?php if($product->is_on_sale()): ?>
                                            <span class="regular_price">R$ <?php echo $product->get_regular_price(); ?></span>
                                            <span class="sale_price"><?php echo wc_price($product->get_sale_price()); ?>
                                                <span class="installment">ou 10X de <?php get_installment($product); ?></span>
                                            </span>
                                        <?php else: ?>
                                            <span class="sale_price">
                                                <?php echo wc_price($product->get_regular_price()); ?>
                                                <span class="installment">ou 10X de <?php get_installment($product); ?></span>
                                            </span>
                                        <?php endif; ?>

                                        <div class="button_payment">
                                            <button class="buy" data-product="<?php echo get_the_ID(); ?>">Comprar</button>
                                            <button class="add_to_cart" data-product="<?php echo get_the_ID(); ?>"><div class="loading"></div></button>
                                            <button class="add_to_cart" data-product="<?php echo get_the_ID(); ?>">+ <i></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); // (5) 
                        ?>
                    <?php else :  ?>
                        <p>
                            <?php _e('No Products'); // (6) 
                            ?>
                        </p>
                    <?php endif; ?>
                </div>
                    
            </div>
        </div>
    </section>
    <!-- Properties End -->

    <!-- Destaque -->

    <div class="product_destaque">
        <?php 

            $params = [
                'posts_per_page' => 1,
                'post_type' => 'product',
                'tax_query' => [
                    [
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => 'queridinhos',
                        'operator' => 'IN',
                    ],
                    [
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                        'operator' => 'IN', // or 'NOT IN' to exclude feature products
                    ]
                ]
            ];
            $wc_query = new WP_Query($params); 

            if ($wc_query->have_posts()) :
                while ($wc_query->have_posts()) : 
                    $wc_query->the_post(); 
                    $product = wc_get_product(get_the_ID());

        ?>
        <figure>
            <?php echo woocommerce_get_product_thumbnail('woocommerce_full_size'); ?>
        </figure>
        <article>
            <h5>#destaque do mês</h5>
            <h2><?php the_title(); ?></h2>
            <?php echo the_excerpt(); ?>
            <?php if($product->is_on_sale()): ?>
                <span class="regular_price">R$ <?php echo $product->get_regular_price(); ?></span>
                <span class="sale_price">R$ <?php echo $product->get_sale_price(); ?>
                    <span class="installment">ou 10X de <?php get_installment($product); ?></span>
                </span>
            <?php else: ?>
                <span class="sale_price"><span class="off">R$ <?php echo $product->get_price(); ?></span>
                    <span class="installment">ou 10X de <?php get_installment($product); ?></span>
                </span>
            <?php endif; ?>
            <p></p>
            <footer>
                <a href="<?php the_permalink(); ?>">
                    eu quero
                </a>
            </footer>
        </article>
        <?php  
        
            endwhile; 
        endif;
        
        ?>
    </div>

    <!--? Properties Start -->
    <section class="properties new-arrival fix">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <h2>uma linha completa pra você</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Nav Card -->
                <div class="product-lists product-rows">
                <?php
                    $params = [
                        'posts_per_page' => 8,
                        'post_type' => 'product',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => 'make',
                                'operator' => 'IN',
                            ),
                        ),
                    ];
                    $wc_query = new WP_Query($params); 
                    ?>
                    <?php if ($wc_query->have_posts()) :
                        while ($wc_query->have_posts()) : 
                            $wc_query->the_post(); 
                            $product = wc_get_product(get_the_ID());

                            
                    ?>

                            <div class="product-item">
                                <div class="single-new-arrival mb-50 text-center">
                                    <div class="popular-img">
                                        <?php echo woocommerce_get_product_thumbnail('woocommerce_full_size'); ?>
                                    </div>
                                    <div class="popular-caption">
                                        <h3>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        <?php echo the_excerpt(); ?>

                                        <?php if($product->is_on_sale()): ?>
                                            <span class="regular_price">R$ <?php echo $product->get_regular_price(); ?></span>
                                            <span class="sale_price">R$ <?php echo $product->get_sale_price(); ?>
                                                <span class="installment">ou 10X de <?php get_installment($product); ?></span>
                                            </span>
                                        <?php else: ?>
                                            <span class="sale_price">R$ <?php echo $product->get_price(); ?>
                                                <span class="installment">ou 10X de <?php get_installment($product); ?></span>
                                            </span>
                                        <?php endif; ?>

                                        <div class="button_payment">
                                            <button class="buy">Comprar</button>
                                            <button class="add_to_cart">+ <i></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); // (5) 
                        ?>
                    <?php else :  ?>
                        <p>
                            <?php _e('No Products'); // (6) 
                            ?>
                        </p>
                    <?php endif; ?>
                </div>
                    
            </div>
        </div>
    </section>
    <!-- Properties End -->

    <!--? newsletter Start -->
    <div class="news-container">
        <div class="container text-center">
            <header>
                <h3>receba dicas e novidades toda semana no seu e-mail</h3>
            </header>
            <article><?php echo do_shortcode('[contact-form-7 id="43" title="Formulário de contato 1"]') ?></article>
        </div>
    </div>
    <!--? newsletter End -->

    <!--? instagram-social start -->
    <div class="blog-container">
        <div class="container">
            <div class="row"><h2>Blog</h2></div>

            <div class="row">
                <?php  
                    $params = [
                        'posts_per_page' => 3,
                        'post_type' => 'post'
                    ];
                    $wc_query = new WP_Query($params); 
                    ?>
                    <?php if ($wc_query->have_posts()) :
                        while ($wc_query->have_posts()) : 
                            $wc_query->the_post(); 
                            $product = wc_get_product(get_the_ID());

                            
                    ?>
                
                <div class="col-md-4">
                    <div class="post-container">
                        <figure><?php the_post_thumbnail(); ?></figure>
                        <div class="categories"><?php the_category(); ?></div>
                        <h3><?php the_title(); ?></h3>
                        <?php the_excerpt(); ?>
                    </div>
                </div>
                <?php endwhile; ?>
                        <?php wp_reset_postdata(); // (5) 
                        ?>
                    <?php else :  ?>
                        <p>
                            <?php _e('No Products'); // (6) 
                            ?>
                        </p>
                <?php endif; ?>
            </div>
        </div>
        
    </div>
    <!-- instagram-social End -->

</main>

<?php get_footer(); ?>