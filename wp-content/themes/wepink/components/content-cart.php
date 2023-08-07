<div id="cart-react"></div>

<div class="cart_summary">
    <div class="row d-flex">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h3 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg> carrinho - <?php echo WC()->cart->get_cart_contents_count(); ?> items</h3>
                    <span class="cart-close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </span>
                </div>
                <div class="card-body cart-items">
                    <!-- Single item -->
                    <?php
                    foreach (WC()->cart->get_cart() as $key => $cart_item) {
                        $product = wc_get_product($cart_item['product_id']);
                        $data = $cart_item['data']->get_attributes();
                        $quantity = $cart_item['quantity'];
                        $getProductDetail = wc_get_product($cart_item['product_id']);
                    ?>
                        <div class="row cart-item" data-id="<? echo $cart_item['product_id']; ?>">
                            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                <!-- Image -->
                                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                    <?php echo $getProductDetail->get_image(null, ['class' => 'w-100']); ?>
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                    </a>
                                </div>
                                <!-- Image -->
                            </div>

                            <div class="col">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-4 mb-lg-0">
                                        <div class="row">
                                            <div class="col">
                                                <!-- Data -->
                                                <p>
                                                    <strong class="cart_item_title">
                                                        <?php echo $product->get_title(); ?>
                                                    </strong>
                                                </p>
                                                <?php
                                                if (isset($data)) {
                                                    foreach ($data as $key => $value) {
                                                        echo '<p>' . wc_attribute_label($key) . ': ' . str_replace('-', ' ', $value) . '</p>';
                                                    }
                                                }
                                                ?>
                                                <!-- Data -->
                                            </div>

                                            <div class="col-lg-2 col-md-2 mb-4 mb-lg-0">
                                                <button class="remove_item_cart" data-id="<? echo $key; ?>"><i></i></button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-12 col-md-6 mb-4 mb-lg-0">
                                        <div class="row">
                                            <div class="col-lg col-md-5 mb-4 mb-lg-0">
                                                <!-- Quantity -->
                                                <div class="d-flex mb-4 quantity-container">
                                                    <button class="btn btn-item cartItemChangeValue px-3 me-2 minus" data-id="<?php echo $key; ?>">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                    <div class="form-outline">
                                                        <input id="form1" min="0" name="quantity" value="<?php echo $quantity; ?>" type="text" class="form-control" />
                                                    </div>

                                                    <button class="btn btn-item cartItemChangeValue px-3 ms-2 plus" data-id="<?php echo $key; ?>">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <!-- Quantity -->
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-4 mb-lg-0 ps-0 quantities ">
                                                <!-- Price -->
                                                <p class="text-end text-md-right prices">
                                                    <strong><?php $price = get_post_meta($cart_item['product_id'], '_price', true);
                                                            echo wc_price($price); ?></strong>
                                                </p>
                                                <!-- Price -->
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <hr class="my-4" />
                    <?php }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="mb-0">Summary</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Frete
                            <span>Gratis</span>
                        </li>
                        <li class="list-group-item d-flex cart_totals_container justify-content-between align-items-center border-0 px-0 mb-3">
                            <div>
                                <strong>Total</strong>
                            </div>
                            <span>
                                <strong>
                                    <?php
                                        $value = max( 0, apply_filters( 'woocommerce_calculated_total', round( WC()->cart->cart_contents_total + WC()->cart->fee_total + WC()->cart->tax_total, WC()->cart->dp ), WC()->cart ) );

                                        echo wc_price($value);
                                    ?>
                                </strong>
                            </span>
                        </li>
                    </ul>

                    <a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-lg btn-block btn-gotocheckout">
                        Finalizar compra
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>