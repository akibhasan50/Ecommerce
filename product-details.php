<?php include "lib/header.php";


?>


            <?php 
            if(isset($_GET['proid']) && $_GET['proid']!= ''){
                $proid= $_GET['proid'];
            }
            ?>


            <?php 
            if(($_SERVER['REQUEST_METHOD']=="POST")){
                 $qty= $_POST['quantity'];
                $addcrt = $ctcls->addtocrt($proid,$qty);
            }

            ?>
                     <?php 
                        $singlpro = $prodcl->showproduct($proid);
                    
                        foreach ($singlpro as $key) {

                    ?>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a class="breadcrumb-item" href="product-grid.php">Products</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><?php echo $key['name']?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
               
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="Admin/<?php echo $key['image']?>" alt="full-image">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                        <form action="" method="post">
                            <div class="ht__product__dtl">
                                <h2><?php echo $key['name']?></h2>
                                <ul  class="pro__prize">
                                    <li class="old__prize"><del> $<?php echo $key['mrp']?></del></li>
                                    <li>$<?php echo $key['price']?></li>
                                </ul>
                                
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <p><span>Availability:</span><?php echo $key['quantity']?></p>
                                    </div>
                                    <div class="sin__desc">
                                        <p><span>Quantity:</span></p>
                                            
                                          <select name="quantity">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#">
                                            <?php  
                                            
                                            $cat = $key['catid'];
                                            $catname = $catcls->shcata($cat);  
                                            foreach ($catname  as $value) {
                                                echo $value['catname'];
                                            }
                                            ?>
                                            </a></li>
                                        </ul>
                                    </div>
                                     
                                    <button class="btn btn-danger pt-2" name="cart">Add to cart</button>

                                    
                                    </div>
                                </div>
                            
                            
                            </div>
                       </form>

                        </div>
                    </div>
                        <?php } ;?>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area -->
        <!-- Start Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                     <p class="pro__info"> <?php echo $key['description']?></p>
 
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->
        <!-- Start Product Area -->
         <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <!-- Start Single Category -->
                                <?php 
                                $showlatprod =$prodcl->shownewprod();
                                foreach ($showlatprod as $key) {
                                ?>
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">

                                    <div class="ht__cat__thumb">
                                        <a href="product-details.php?proid=<?php echo $key['id']?>">
                                            <img src="Admin/<?php echo $key['image']?>" alt="product images">
                                        </a>
                                    </div>
                                    
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.php?proid=<?php echo $key['id']?>"><?php echo $key['name']?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize "><del>$<?php echo $key['mrp']?></del> </li>
                                            <li>$<?php echo $key['price']?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                <?php } ;?>
                            <!-- End Single Category -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->
        <!-- End Banner Area -->
 <?php include "lib/footer.php" ;?> 