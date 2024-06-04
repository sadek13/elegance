

<div class="featured-product product">
            <div class="container-fluid">
                
                <div class="section-header">
                    <h1>Featured Product</h1>
                </div>

                <div class="row align-items-center product-slider product-slider-4">
                    <?php foreach ($featuredProds as $sub) { 
                     $image=$product->getProdImages($sub['prod_ID'])[0]['img'];?>
                    <div class="col-lg-3">
                        <div class="product-item" style='width:200px;height:200px'>
                            <div class="product-title">
                                <a href="#"><?php $sub['prod_title'] ?></a>
                                
                            </div>
                            <div class="product-image">
                                <a href="../../pages/products/details.php/<?php $sub['prod_ID']?>">
                                    <img src="../images/<?php echo $image ?>"  alt="Product Image">
                                </a>
                                <div class="product-action">
                                  
                                    <a href="../pages/product-details.php?id=<?php echo $sub['prod_ID']?>">View</a>
                                </div>
                            </div>
                         
                            <div class="product-price">
                                <h3><span>$</span><?php echo $sub['price'] ?></h3>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
                    