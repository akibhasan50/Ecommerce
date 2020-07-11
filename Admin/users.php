<?php 
include "../class/usercls.php" ;
?>

<?php include "lib/header.php" ;?>
  <div class="content pb-0">
  <?php 
  $usercls = new userdatacls();

  ?>

         <div class="orders">
            <div class="row">
               <div class="col-xl-12">
                  <div class="card">
                     <div class="card-body bg-dark text-light">
                        <h2 class="box-title text-center tit">User Details </h2>
                      
                     </div>
                     <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                           <table class="table "> 
                      
                              <thead class="">

                                 <tr>
                                    <th class="serial">serial</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>                                  
                                    <th>Date</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                              <?php 
                           
                                $showusr = $usercls->showuser();
                                $i = 0;
                                foreach ($showusr as $key) {
                                    $i++;
                              ?>
                                 <tr>
                                    <td class="serial"><?php echo $i; ;?></td>
                                    <td> <?php echo $key['id'] ;?> </td>
                                    <td> <span class="name"><?php echo $key['name'] ;?></span> </td>
                                    <td> <span class="email"><?php echo $key['email'] ;?></span> </td>
                                    <td> <span class="phone"><?php echo $key['phone'] ;?></span> </td>                                  
                                    <td> <span class="date"><?php echo $key['added_on'] ;?></span> </td>
                                    <td>
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