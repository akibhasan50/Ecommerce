<?php 
include "../class/catclass.php" ;
?>

<?php include "lib/header.php" ;?>
  <div class="content pb-0">
  <?php 
  $catcls = new catacls();

  ?>

<?php 
  if(isset($_GET['type']) && $_GET['type'] != ""){
      $type = $_GET['type'];
      if($type =="status"){
          $opr = $_GET['operation'];
          $id =$_GET['id'];
           $activcat = $catcls->activatecat($opr,$id);
      
      }
  }
  if(isset($_GET['delid'])){
      $delid =$_GET['delid'];
       $delat = $catcls->delecat($delid);
  }

  ?>   

         <div class="orders">
            <div class="row">
               <div class="col-xl-12">
                  <div class="card">
                     <div class="card-body bg-dark text-light">
                        <h2 class="box-title text-center tit">Catagory </h2>
                        <a href="addcat.php" class="h5 btn btn-outline-danger">Add Catagory</a>
                     </div>
                     <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                           <table class="table "> 
                      
                              <thead class="">

                                 <tr>
                                    <th class="serial">serial</th>
                                    <th>ID</th>
                                    <th>Catagory</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                              <?php 
                           
                                $showcat = $catcls->showcat();
                                $i = 0;
                                foreach ($showcat as $key) {
                                    $i++;
                              ?>
                                 <tr>
                                    <td class="serial"><?php echo $i; ;?></td>
                                    <td> <?php echo $key['id'] ;?> </td>
                                    <td> <span class="name"><?php echo $key['catname'] ;?></span> </td>
                                    <td>
                                        <?php 
                                            if($key['status'] == 1){ ?>
                                             <a class="btn btn-success" href="?type=status&operation=active&id=<?php echo $key['id'] ;?>">Active</a>
                                        <?php }else{?>
                                         <a class="btn btn-danger" href="?type=status&operation=deactive&id=<?php echo $key['id'] ;?>">Deative</a>
                                       
                                        <?php } ;?>                          
                               
                                  
                                  <a href="?delid=<?php echo $key['id'] ;?>" onclick="return confirm('Are you sure to delete???')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <a href="editcat.php?editcat=<?php echo $key['id'] ;?>" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                  </td>
                                    
                                 </tr>
                                <?php } ;?>                          
                               
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
<?php include "lib/footer.php" ;?>