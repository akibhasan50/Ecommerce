<?php 
include "../class/catclass.php" ;
?>

<?php include "lib/header.php" ;?>
  <div class="content pb-0">
  <?php 
  $catcls = new catacls();
  
  ?>
  <?php 
    if(isset($_POST['submit'])){
       $insetcat = $catcls->insertcata($_POST);
  }

  ?> 
         <div class="orders">
            <div class="row justify-content-center ">
               <div class="col-xl-8 ">
                   <div class="bg-dark text-light p-3 text-center">
                       <h2>Add/Edit Catagory</h2>
                   </div>
                <form action="" method="post"  class=" mt-4 ">
                  <div class="form-group">

                   <label for="">Catagory Name</label>
                   <input type="text" name="catname" id="" class="form-control"  aria-describedby="helpId">
                 
                 </div>
                        
                 <input type="submit" name="submit" class="btn btn-success btn-block">
                </form>
                     <?php if(isset($insetcat)){  ?>
                  <div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     <span class="sr-only">Close</span>
                  </button>
                  <strong><?php echo $insetcat;?></strong> 
               </div>
                     <?php }  ?>
               
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
<?php include "lib/footer.php" ;?>