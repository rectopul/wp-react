<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;
?>
<main>
        <!--? slider Area Start-->
        <div class="slider-area ">
            <div class="slider-active">
                <div class="single-slider hero-overly2  slider-height2 d-flex align-items-center slider-bg2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-8 col-md-8">
                                <div class="hero__caption hero__caption2">
                                    <h1 data-animation="fadeInUp" data-delay=".4s" >Products</h1>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Products</a></li> 
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!--? Properties Start -->
        <section class="properties new-arrival fix">
            <div class="container">
                <!-- Section tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <h2>Popular products</h2>
                            <P>Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla.</P>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="properties__button text-center">
                            <!--Nav Button  -->
                            <nav>                         
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-Sofa-tab" data-toggle="tab" href="#nav-Sofa" role="tab" aria-controls="nav-Sofa" aria-selected="true">Sofa</a>
                                    <a class="nav-item nav-link" id="nav-Table-tab" data-toggle="tab" href="#nav-Table" role="tab" aria-controls="nav-Table" aria-selected="false">Table</a>
                                    <a class="nav-item nav-link" id="nav-Chair-tab" data-toggle="tab" href="#nav-Chair" role="tab" aria-controls="nav-Chair" aria-selected="false">Chair</a>

                                    <a class="nav-item nav-link" id="nav-Bed-tab" data-toggle="tab" href="#nav-Bed" role="tab" aria-controls="nav-Bed" aria-selected="false">Bed</a>
                                    <a class="nav-item nav-link" id="nav-Lightning-tab" data-toggle="tab" href="#nav-Lightning" role="tab" aria-controls="nav-Lightning" aria-selected="false">Lightning</a>
                                    <a class="nav-item nav-link" id="nav-Decore-tab" data-toggle="tab" href="#nav-Decore" role="tab" aria-controls="nav-Decore" aria-selected="false">Decore</a>
                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Nav Card -->
                    <div class="tab-content" id="nav-tabContent">
                        
                        <!-- card one -->
                        <div class="tab-pane fade show active" id="nav-Sofa" role="tabpanel" aria-labelledby="nav-Sofa-tab">
                            <div class="row">
                                <?php 
                                    woocommerce_product_loop_start(false);
                                    while ( have_posts() ) {
                                        the_post();
                                        $id = get_the_ID(); ?>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="single-new-arrival mb-50 text-center">
                                                <div class="popular-img">
                                                    <?php echo woocommerce_get_product_thumbnail('woocommerce_full_size'); ?>
                                                </div>
                                                <div class="popular-caption">
                                                    <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                                                    <span>$<?php echo $product->get_price(); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    woocommerce_product_loop_end(false);
                                ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular1.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular2.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular3.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular4.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular5.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular6.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular7.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular8.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular9.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card two -->
                        <div class="tab-pane fade" id="nav-Table" role="tabpanel" aria-labelledby="nav-Table-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular1.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular2.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular3.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular4.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular5.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular6.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular7.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular8.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular9.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card three -->
                        <div class="tab-pane fade" id="nav-Chair" role="tabpanel" aria-labelledby="nav-Chair-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular1.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular2.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular3.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular4.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular5.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular6.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular7.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular8.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular9.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card FOUR -->
                        <div class="tab-pane fade" id="nav-Bed" role="tabpanel" aria-labelledby="nav-Bed-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular1.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular2.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular3.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular4.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular5.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular6.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular7.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular8.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular9.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card FIVE -->
                        <div class="tab-pane fade" id="nav-Lightning" role="tabpanel" aria-labelledby="nav-Lightning-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular1.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular2.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular3.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular4.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular5.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular6.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular7.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular8.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular9.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card SIX -->
                        <div class="tab-pane fade" id="nav-Decore" role="tabpanel" aria-labelledby="nav-Decore-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular1.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular2.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular3.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular4.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular5.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular6.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular7.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular8.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="assets/img/gallery/popular9.png" alt="">
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="product_details.html">Bly Microfiber / Microsuede 56" Armless Loveseat</a></h3>
                                            <span>$367</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Nav Card -->
                </div>
                <!-- Button -->
                <div class="row justify-content-center">
                    <div class="room-btn">
                        <a href="product.html" class="border-btn">Discover More</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Properties End -->
        
        <!--? New Arrival End -->
        <!-- Popular Locations End -->
        <!--? Services Area Start -->
        <div class="categories-area section-padding40 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services1.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Fast & Free Delivery</h5>
                                <p>Free delivery on all orders</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services2.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Secure Payment</h5>
                                <p>Free delivery on all orders</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services3.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Money Back Guarantee</h5>
                                <p>Free delivery on all orders</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services4.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Online Support</h5>
                                <p>Free delivery on all orders</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--? Services Area End -->
    </main>