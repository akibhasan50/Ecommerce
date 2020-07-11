<?php 
$filepath= realpath(dirname(__FILE__));

?>

<?php include_once ($filepath."/../inc/database1.php") ;?>
<?php include_once ($filepath."/../inc/format.php") ;?>

<?php 

class productcls{
       private $db;
        private $fm;
    public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
    }


        public function showprod(){
         $sql = "SELECT * FROM tbl_product   order by id desc";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        $data= $value->fetchAll();
        return $data;
    }
    public function shownewprod(){
         $sql = "SELECT * FROM tbl_product where status='1'  order by id desc";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        $data= $value->fetchAll();
        return $data;
    }

     public function showproduct($proid){
        $sql = "SELECT * FROM tbl_product   where id='$proid'";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        $data= $value->fetchAll();
        return $data;
     }
     public function showprodbycat($catid){
        $sql = "SELECT * FROM tbl_product   where catid='$catid'";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        $data= $value->fetchAll();
        if($value->rowCount() > 0){
             return $data;
        }else{
            return false;
        }
       
     }

        public function activateprod($opr,$id){
         $opra = $this->fm->validate($opr);
         $id = $this->fm->validate($id);

         if($opra =="active"){
             $status = '0';
         }else{
               $status = '1';
         }
        $sql = "UPDATE tbl_product SET status='$status' where id='$id' ";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        
        return $value;
     }




      public function addproduct($data,$img){
        $pname = $this->fm->validate($data['pname']);
        $catid = $this->fm->validate($data['catid']);
        $mrp = $this->fm->validate($data['mrp']);
        $price = $this->fm->validate($data['price']);
        $quantity = $this->fm->validate($data['quantity']);
        $desc = $this->fm->validate($data['description']);
        $mtitle = $this->fm->validate($data['mtitle']);
        $mkey = $this->fm->validate($data['mkey']);
        
       

       $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name =$img['image']['name'];
        $file_size = $img['image']['size'];
        $file_temp = $img['image']['tmp_name'];

        $div = explode(".",$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;


         if($pname == "" || $catid == "" || $mrp == "" || $price == "" || $quantity == "" || $desc == "" || $file_name == "" || $mtitle == "" || $mkey == ""){
            $errmsg = "<span style='color:red;font-size:18px;'>field must not be empty!!! </span>";
            return $errmsg;

        }elseif($file_size >1048567) {
                $errmsg = "<span style='color:red;font-size:18px;'>Image Size should be less then 1MB!</span>";
                return $errmsg;
        } elseif (in_array($file_ext, $permited) === false) {
           $errmsg = "<span style='color:red;font-size:18px;'>You can upload only:-".implode(',', $permited)."</span>";
            return $errmsg;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
        $sql = "INSERT INTO   tbl_product (catid,name,mrp,price,quantity,image,description,meta_title,meta_key) value('$catid','$pname','$mrp','$price',' $quantity','$uploaded_image','$desc','$mtitle','$mkey')";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        if($value== TRUE){
            $errmsg = "<span style='color:green;font-size:18px;'>Product inserted successfully</span>";
            return $errmsg;
        }else{
              $errmsg = "<span style='color:red;font-size:18px;'>Product not inserted</span>";
            return $errmsg;
        }

    }
    }

     public function updateproduct($data,$file,$proid){
        $pname = $this->fm->validate($data['pname']);
        $catid = $this->fm->validate($data['catid']);
        $mrp = $this->fm->validate($data['mrp']);
        $price = $this->fm->validate($data['price']);
        $quantity = $this->fm->validate($data['quantity']);
        $desc = $this->fm->validate($data['description']);
        $mtitle = $this->fm->validate($data['mtitle']);
        $mkey = $this->fm->validate($data['mkey']);
        
       

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;
        
       if($pname == "" || $catid == "" || $mrp == "" || $price == "" || $quantity == "" || $desc == "" ||  $mtitle == "" || $mkey == ""){
            $errmsg = "<span style='color:red;font-size:18px;'>field must not be empty!!! </span>";
            return $errmsg;

        }else{
        
            if(!empty($file_name )){
                if ($file_size >1048567) {
                        $errmsg = "<span style='color:red;font-size:18px;'>Image Size should be less then 1MB!</span>";
                        return $errmsg;
                } elseif (in_array($file_ext, $permited) === false) {
                $errmsg = "<span style='color:red;font-size:18px;'>You can upload only:-".implode(',', $permited)."</span>";
                    return $errmsg;
                }else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $sql = "UPDATE tbl_product SET
                    catid='$catid',
                    name='$pname',
                    mrp='$mrp',
                    price='$price',
                    quantity='$quantity',
                    image='$uploaded_image',
                    description='$desc',
                    meta_title='$mtitle',
                    meta_key='$mkey'
                    WHERE id='$proid'
                    ";
                    $value = $this->db->conn->prepare($sql);
                    $value->execute();
                    if($value== TRUE){
                        $errmsg = "<span style='color:green;font-size:18px;'>Catagory updated successfully</span>";
                        return $errmsg;
                    }else{
                        $errmsg = "<span style='color:red;font-size:18px;'>Catagory not updated</span>";
                        return $errmsg;
                    }

                }
            }else{
                  $sql = "UPDATE tbl_product SET
                    catid='$catid',
                    name='$pname',
                     mrp='$mrp',
                    price='$price',
                    quantity='$quantity',                 
                    description='$desc',
                    meta_title='$mtitle',
                    meta_key='$mkey'
                    WHERE id='$proid'
                    ";
                    $value = $this->db->conn->prepare($sql);
                    $value->execute();
                    if($value== TRUE){
                        $errmsg = "<span style='color:green;font-size:18px;'>Catagory updated successfully</span>";
                        return $errmsg;
                    }else{
                        $errmsg = "<span style='color:red;font-size:18px;'>Catagory not updated</span>";
                        return $errmsg;
                    }

            }
        }
    }

        public function deleprod($delid){
            $sql = "SELECT * FROM tbl_product   where id='$delid'";
            $value = $this->db->conn->prepare($sql);
            $value->execute();
            $data= $value->fetch();
            if($value){
                $delimg = $data['image'];
				unlink($delimg);
            }
                $query="DELETE from tbl_product
                where id='$delid'
                ";
                $data = $this->db->conn->prepare($query);
                $data->execute();
                if($data){
                   header("Location:product.php");
                }else{
                    $errmsg = "<span style='color:red;font-size:18px;'>Product not inserted</span>";
                    return $errmsg;
                }

        }


}