<div class="col-lg-12">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <?php 
                                        $images=$product->getProdImages($productID);
                                        foreach ($images as $sub) { ?>
                                        <img src="../images/<?php echo $sub['img'] ?>" alt="Product Image">
                                        
                                        <?php } ?>
                                    </div>
                                  
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title"><h1><?php echo $prod[0]['prod_title'] ?></h1></div>
                                                
                                        <div class="price">
                                            <h4>Material:</h4>
                                            <p><?php echo $prod[0]['material'] ?></p>
                                        </div>

                                        <div class="price">
                                            <h4>Price: </h4>
                                            <p>$    <?php echo $prod[0]['price'] ?></p>
                                        </div>

                                        <div class="price">
                                            <h4>Weight: </h4>
                                            <p>g    <?php echo $prod[0]['weight'] ?></p>
                                        </div>
                                        <!-- <div class="quantity">
                                            <h4>Quantity:</h4>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="0" min="0" max="5" id='quantity'>
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div> -->
                                        <!-- <div class="p-size">
                                            <h4>Size:</h4>
                                            <div class="btn-group btn-group-sm">
                                            <//?php //if($prod[0]['s_quantity']>0){ ?>

                                                <button type="button" class="size-btn" value=0>S</button>
                                                <?//php// } ?>

                                            <//?php// if($prod[0]['m_quantity']>0){ ?>

                                                <button type="button" class="size-btn" value=1>M</button>

                                                <//?php //} ?>

                                            <//?php //if($prod[0]['l_quantity']>0){ ?>

                                                <button type="button" class="size-btn" value=2>L</button>

                                                    <//?php //} ?>
                                              
                                            </div> 
                                        </div>
                                        <div class="p-color">
                                            <h4>Color:</h4>
                                            <div class="btn-group btn-group-sm">
                                               <p><//? //$prod['color'] ?> </p>
                                            </div> //
                                        </div>  
                                        <div class="p-color">
                                            <h4>Color:</h4>
                                            <div class="btn-group btn-group-sm">
                                               <p><? //$prod['weight'] ?> </p>
                                            </div> 
                                        </div> -->
                                        <div class="action">
                                            <a class="btn"  id='addToCart' data-product-id='<?php echo $productID?>'><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                   
                        
