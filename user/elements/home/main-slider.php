<div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="navbar bg-light">
                     <ul class="navbar-nav">
                                <?php foreach ($cats as $sub) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?prefilter=<?php echo $sub['category_name']?>"></i>
                                    <?php echo $sub['category_name']?></a>
                                </li>
                        <?php } ?>
                        
                              
                                </ul>
                            
                        </nav>
                    </div>

                        <div class="col-md-6 mx-auto d-flex align-items-center">
        <div class="header-slider normal-slider">
            <?php foreach ($featuredProds as $sub) { 
                $image = $product->getAProdImage($sub['prod_ID'])[0]['img'];
            
                ?>
            <div class="header-slider-item d-flex justify-content-center align-items-center">
        <img style="width: 430px; height: 300px;" src="../images/<?php echo $image ?>" alt="Slider Image" />
        <div class="header-slider-caption "  style=" height: 100px;" >
                
            <a class="btn" href="../pages/product-details.php?id=<?php echo $sub['prod_ID'] ?>"><i class="fa fa-shopping-cart"></i>Shop Now</a>
        </div>
    </div>
            <?php } ?>
        </div>
    </div>
                 
                </div>
            </div>
        </div>
       