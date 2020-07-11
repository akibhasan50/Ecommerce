<?php 
include "../class/catclass.php" ;
?>

<?php include "lib/header.php" ;?>
  <div class="content pb-0">
  <?php 
  $catcls = new catacls();
   if(isset($_GET['editcat'])){
   $eid = $_GET['editcat'];
  
   }
  ?>
  <?php 
 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $caname =$_POST['catname'];
       $upcat = $catcls->updatecat($caname,$eid);
  }
  ?> 
         <div class="orders">
            <div class="row justify-content-center ">
               <div class="col-xl-8 ">
                   <div class="bg-dark text-light p-3 text-center">
                       <h2>Edit Catagory</h2>
                   </div>
                <form action="" method="post"  class="mt-4">
                  <div class="form-group">
                  <?php 
                    
                        $shocat = $catcls->shcata($eid);
                        foreach ($shocat as $key) { 
                  ?>
                   <label for="">Catagory Name</label>
                   <input type="text" name="catname"  class="form-control" value="<?php echo $key['catname']?>" aria-describedby="helpId">
                 
                 </div>
                  <?php } ;?>
                  
                 <input type="submit"  name="update" class="btn btn-success btn-block" >
                </form>
                   
                     <?php if(isset($upcat)){  ?>
                  <div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     <span class="sr-only">Close</span>
                  </button>
                  <strong><?php echo $upcat;?></strong> 
               </div>
                     <?php }  ?>
               
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
<?php include "lib/footer.php" ;?>