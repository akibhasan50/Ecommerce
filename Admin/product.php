<?php 
include "../class/productcls.php" ;

?>

<?php include "lib/header.php" ;?>
  <div class="content pb-0">
  <?php 
  $procls = new productcls();


if(isset($_GET['type']) && $_GET['type'] != ""){
      $type = $_GET['type'];
      if($type =="status"){
          $opr = $_GET['operation'];
          $id =$_GET['id'];
           $activcat = $procls->activateprod($opr,$id);
      
      }
  }

  if(isset($_GET['delid'])){
     $delid = $_GET['delid'];

     $delpro = $procls->deleprod($delid);
  }
  ?>



         <div class="orders">
            <div class="row">
               <div class="col-xl-12">
                  <div class="card">
                     <div class="card-body bg-dark text-light">
                        <h2 class="box-title text-center tit">Products</h2>
                         <a href="addproduct.php" class="h5 btn btn-outline-danger">Add Products</a>
                     </div>
                     <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                           <table class="table "> 
                      
                              <thead class="">

                                 <tr>
                                    <th class="serial">serial</th>
                                    <th>ID</th>
                                    <th>Catagory</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Quantity</th>  
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                              <?php 
                               $showpro = $procls->showprod();
                               
                                $i = 0;
                                foreach ($showpro as $key) {
                                    $i++;
                              ?>
                                 <tr>
                                    <td class="serial"><?php echo $i; ?></td>
                                    <td> <?php echo $key['id'] ;?> </td>
                                    <td> <span class=""><?php echo $key['catid'] ;?></span> </td>
                                    <td> <span class=""><?php echo $key['name'] ;?></span> </td>
                                    <td> <img src="<?php echo $key['image'];?>"  width="50px",height="50px"> </td>
                                    <td> <span class=""><?php echo $key['price'] ;?></span> </td>
                                    <td> <span class=""><?php echo $key['quantity'] ;?></span> </td>
                                    <td>
                                      <?php
                                            if($key['status'] == 1){ ?>
                                             <a class="btn btn-success" href="?type=status&operation=active&id=<?php echo $key['id'] ;?>">Active</a>
                                        <?php }else{?>
                                         <a class="btn btn-danger" href="?type=status&operation=deactive&id=<?php echo $key['id'] ;?>">Deative</a>
                                       
                                        <?php } ;?>                          
                               
                                  <a href="?delid=<?php echo $key['id'] ;?>" onclick="return confirm('Are you sure to delete???')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <a href="editproduct.php?proid=<?php echo $key['id'] ;?>" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>
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