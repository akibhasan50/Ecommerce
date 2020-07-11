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
                                  <span class="breadcrumb-item active">Login</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Login</h2>
								</div>
							</div>
							<div class="col-xs-12">
                            <?php 
                            if(isset($_POST['login'])){
                                $loguser = $usercls->userlogin($_POST);
                            }
                            
                            
                            ?>
								<form id="contact-form-log" action="#" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="email" placeholder="Your Email*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="pass" placeholder="Your Password*" style="width:100%">
										</div>
									</div>
									
									<div class="contact-btn">
										<button type="submit" name="login" class="fv-btn">Login</button>
									</div>
								</form>
								<div class="form-output">
									<?php 
                            		if(isset($loguser)){?>
                               
                               <div>
                                   <h1 class="text-danger"><?php echo $loguser; ?></h1>
                               </div>
                               
                              
                          <?php }  ?>
								</div>
							</div>
						</div> 
                
				</div>
				

					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Register</h2>
								</div>
							</div>
							<div class="col-xs-12">
                               <?php 
                            if(isset($_POST['register'])){
                               // $reguser = $usercls->userreg($_POST);
                            }
                           
                            
                            
                            ?>
								<form id="contact-form" action="#" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name"  id="name" placeholder="Your Name*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="email" id="email" placeholder="Your Email*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="phone" id="phone" placeholder="Your Mobile*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="password"  id="password" placeholder="Your Password*" style="width:100%">
										</div>
									</div>
									
									<div class="contact-btn">
									<button type="submit" name="register" id="register" class="fv-btn" >Register</button>
									
									</div>
								</form>
								<div id="err-msg"></div>
                                   
                          
								<div class="form-output">
									<?php 
                            if(isset($reguser)){?>
                               
                               <div>
                                   <h1 class="text-danger"><?php echo $reguser; ?></h1>
                               </div>
                               
                              
                          <?php }  ?>
								</div>
							</div>
					</div> 
                
				</div>
					
            </div>
        </section>
        <!-- End Contact Area -->
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