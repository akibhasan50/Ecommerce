<?php include "lib/header.php" ;

if(!isset($_GET['id'])){
	echo "<meta http-equiv='refresh' content='0;url=cart.php?id=dfkghkd'>";
}

?>
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
                                  <span class="breadcrumb-item active">shopping cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                    <?php 
                    
                    if(isset($_GET['delcrt'])){
                        $delid = $_GET['delcrt'];
                   
                      $delcrt =  $ctcls->delfromcrt($delid);
                    }
                    ?>
                <?php 
                    if($_SERVER["REQUEST_METHOD"]== "POST"){
                        $upqnty = $_POST['quantity'];                    
                        $cartid = $_POST['cartid'];
                        $updateqty = $ctcls->updaprodqty($upqnty,$cartid);

                    }   
                ?> 


           
                        <form action="" method="post">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $showcrt =  $ctcls->showallcrt();
                                    $qty = 0;
                                    $stot=0;
                                    foreach ($showcrt as $key ) {

                                    ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="Admin/<?php echo $key['image']?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo $key['pname']?></a>
                                                
                                            </td>
                                            <td class="product-price"><span class="amount">$<?php echo $key['price']?></span></td>
                                            
                                            <td class="product-quantity">
                                            <form action="" method="post">  
                                                
                                                <input type="number" name="quantity" id="quantity" value="<?php echo $key['quantity']?>" />
                                                <input type="hidden" name="cartid" value="<?php echo $key['cartid']?>">
                                                  <input type="submit" value="update"  name="update">

                                                </td>

                                            </form>
                                                
                                                
                                               
                                
                                            <td class="product-subtotal">
                                            <?php 
                                                $total = ($key['quantity'] * $key['price']);
                                                echo $total;
                                            ?>
                                            
                                           </td>
                                            <td class="product-remove"><a onclick="return confirm('Are you sure to delete??')" href="?delcrt=<?php echo $key['cartid']?>"><i class="icon-trash icons"></i></a></td>
                                        </tr>
                                        <?php 
									$qty = $qty + $key['quantity'];
									session::set("qty","$qty");
									$stot+= $total;
									session::set("totprice","$stot");
								?>

                                    <?php } ;?>

                                
                                    </tbody>
                                </table>
                            </div>
                   
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                         
                                    <div class="buttons-cart--inner">

                                        <div class="buttons-cart">
                                            <a href="index.php">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                        
                                            <a href="checkout.php">checkout</a>
                                      
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- End Banner Area -->
        <?php include "lib/footer.php" ;?>

    <script>

 $(function(){

      $("#register").on("click",function(e){
           
        e.preventDefault();

           var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var password = $("#password").val();
           
             if( name == "" || email == "" || phone == "" || password == ""){
              alert("all field required");
             }else{
                  
            $.ajax({ 
                url: "ajax.php",
                type: "POST",
                data:{cname:name,cemail:email,cphone:phone,cpassword:password},
                success: function (result) {
                    alert(result);
                    $("#contact-form").trigger("reset");
            }
        });
    }
    });
   

}); 
   
</script> 