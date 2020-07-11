<?php 
include "../class/productcls.php" ;
include "../class/catclass.php" ;
?>


<?php include "lib/header.php" ;?>
  <div class="content pb-0">
  <?php 
   $prodcl = new productcls();
  $catcls = new catacls();
  ?>
  <?php 
  
   if(isset($_GET['proid'])){
   $proid = $_GET['proid'];
  
   }
  ?>
 <?php 
    if($_SERVER['REQUEST_METHOD']=='POST'){
       
        $insprodt =  $prodcl->updateproduct($_POST,$_FILES,$proid);
    }
       
 ?>
         <div class="orders">
            <div class="row justify-content-center ">
               <div class="col-xl-10">
                   <div class="bg-dark text-light p-3 text-center">
                       <h2>Edit Product</h2>
                   </div>
                <form action="" method="post"  class="mt-4" enctype="multipart/form-data">
                <?php 
                $showprod =  $prodcl->showproduct($proid);
                foreach ($showprod as $key) {

                ?>
                  <div class="form-group">
                   <label for="">Product Name</label>
                   <input type="text" name="pname" value="<?php echo $key['name']?>" class="form-control">
                 
                 </div>
                 <div class="form-group">
                     <label for="catagory">Catagory</label>
                     <select class="custom-select" name="catid">  
                         <option selected>Select Catagory</option>
                       <?php 
                        $showcat = $catcls->showcat();
                     foreach ($showcat as $data ) {
                     ?>
                         <option
                         <?php 
                            if($data['id'] == $key['catid']){ ?>
                                selected="selected"
                           <?php   } ?>
                         
                          value="<?php echo $data['id']?>">
                         
                         
                         <?php echo $data['catname']?></option>
                     <?php } ;?>
                     </select>
                 </div>
               
               <div class="form-group">
                 <label >Image</label>
                 <img src="<?php echo $key['image'];?>"  width="50px",height="50px">
               <input name="image" type="file" class="form-control"/>
               
               </div>
                <div class="form-group">
                  <label for="">Price</label>
                  <input type="text"
                    class="form-control" value="<?php echo $key['price']?>"  name="price">
                  
                </div>
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="text"
                    class="form-control" value="<?php echo $key['quantity']?>"  name="quantity">
                  
                </div>
                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" value=""  name="description" rows="3"><?php echo $key['description']?></textarea>
                  </div>
                    <div class="form-group">
                      <label for="">Meta title</label>
                      <input type="text"
                        class="form-control" value="<?php echo $key['meta_title']?>"  name="mtitle">
                     
                    </div>
                    <div class="form-group">
                      <label for="">Meta Key</label>
                      <input type="text"
                        class="form-control" value="<?php echo $key['meta_key']?>"  name="mkey">
                     
                    </div>
                

                 <input type="submit" name="submit" class="btn btn-success btn-block">
                </form>
                            <?php } ;?>
                     <?php if(isset($insprodt)){  ?>
                  <div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     <span class="sr-only">Close</span>
                  </button>
                  <strong><?php echo $insprodt;?></strong> 
               </div>
                     <?php }  ?>
               
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
<?php include "lib/footer.php" ;?>