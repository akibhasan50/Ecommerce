<?php include "lib/header.php" ;?>

        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Products</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  col-md-12  col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                    <select class="ht__select">
                                        <option>Default softing</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by average rating</option>
                                        <option>Sort by newness</option>
                                    </select>
                                </div>
                                
    
                            </div>
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                         <!-- Start Single Category -->
                            
                                <?php 
                                if(isset($_GET['cataid'])){
                                    $cataid=$_GET['cataid'];
                                }

                                if($cataid > 0){
                                $showlatprod =$prodcl->showprodbycat($cataid);
                                if($showlatprod){
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
                                <?php }}else{ ;?>

                                    <h1 class="text-center text-danger">No Product available</h1>
                                <?php } ;?>



                                    <?php 
                                    
                                }else{
                                   echo  "<script>window.location='index.php'</script>";
                                }
                                    
                                    ;?>


                            <!-- End Single Category -->            
                        </div>
                                  
                    </div>
                        
                </div>
                    
            </div>
        </div>
    </section>
        <!-- End Product Grid -->

    <?php include "lib/footer.php" ;?>    