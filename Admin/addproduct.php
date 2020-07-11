<?php 
include "../class/productcls.php" ;
include "../class/catclass.php" ;
?>


<?php include "lib/header.php" ;?>
  <div class="content pb-0">
  <?php 
  
  $catcls = new catacls();
  ?>
 <?php 
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $prodcl = new productcls();
        $insprodt =  $prodcl->addproduct($_POST,$_FILES);
    }
       
 ?>
         <div class="orders">
            <div class="row justify-content-center ">
               <div class="col-xl-10">
                   <div class="bg-dark text-light p-3 text-center">
                       <h2>Add Product</h2>
                   </div>
                <form action="" method="post"  class="mt-4" enctype="multipart/form-data">
                  <div class="form-group">

                   <label for="">Product Name</label>
                   <input type="text" name="pname" id="" class="form-control">
                 
                 </div>
                 <div class="form-group">
                     <label for="catagory">Catagory</label>
                     <select class="custom-select" name="catid" id="">  
                         <option selected>Select Catagory</option>
                       <?php 
                        $showcat = $catcls->showcat();
                     foreach ($showcat as $key ) {
                     ?>
                         <option value="<?php echo $key['id']?>"><?php echo $key['catname']?></option>
                     <?php } ;?>
                     </select>
                 </div>
               
               <div class="form-group">
                 <label >Image</label>
               <input name="image" type="file"   class="form-control"/>
               
               </div>
                <div class="form-group">
                  <label for="">MRP</label>
                  <input type="text"
                    class="form-control" name="mrp" id="" >
                  
                </div>
                <div class="form-group">
                  <label for="">Price</label>
                  <input type="text"
                    class="form-control" name="price" id="" >
                  
                </div>
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="text"
                    class="form-control" name="quantity" id="" >
                  
                </div>
                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                  </div>
                    <div class="form-group">
                      <label for="">Meta title</label>
                      <input type="text"
                        class="form-control" name="mtitle" id="">
                     
                    </div>
                    <div class="form-group">
                      <label for="">Meta Key</label>
                      <input type="text"
                        class="form-control" name="mkey" id="">
                     
                    </div>
                

                 <input type="submit" name="submit" class="btn btn-success btn-block">
                </form>
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