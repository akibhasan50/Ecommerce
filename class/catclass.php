<?php 
$filepath= realpath(dirname(__FILE__));

?>

<?php include_once ($filepath."/../inc/database1.php") ;?>
<?php include_once ($filepath."/../inc/format.php") ;?>

<?php 

class catacls{
       private $db;
        private $fm;
    public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
    }

    public function showcat(){
         $sql = "SELECT * FROM tbl_catagory order by id desc";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        $data= $value->fetchAll();
        return $data;
    }
     public function showcatagorybyid(){
         $sql = "SELECT * FROM tbl_catagory where status='1'";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        $data= $value->fetchAll();
        return $data;
    }

     public function activatecat($opr,$id){
         $opra = $this->fm->validate($opr);
         $id = $this->fm->validate($id);

         if($opra =="active"){
             $status = '0';
         }else{
               $status = '1';
         }
        $sql = "UPDATE tbl_catagory SET status='$status' where id='$id' ";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        
        return $value;
     }
     public function delecat($delid){
         $sql = "DELETE FROM tbl_catagory  where id='$delid' ";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
     }
       public function insertcata($data){
        $cat = $this->fm->validate($data['catname']);
           
        $sql = "SELECT * FROM tbl_catagory where catname='$cat'";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        if($value->rowCount() > 0){
            $errmsg = "<span style='color:red;font-size:18px;'>Catagory Already exist!!! </span>";
            return $errmsg;
        }



        if($cat== ""){
        $errmsg = "<span>field must not be empty!!! </span>";
        return $errmsg;

        }else{
        $sql = "INSERT INTO tbl_catagory (catname)   VALUES('$cat')";
        $value = $this->db->conn->prepare($sql);
        $res = $value->execute();
            if($res == true){
            $errmsg = "<span color:green;font-size:18px;>Data inserted successfully </span>";
            return $errmsg;
            }
        }


    }
    public function shcata($id){
        $sql = "SELECT * FROM tbl_catagory where id='$id'";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        $data = $value->fetchAll();
        return $data;
    }
     public function  updatecat($caname,$id){
         $name= $caname;

        $quer = "SELECT * FROM tbl_catagory where catname='$name'";
        $value = $this->db->conn->prepare($quer);
        $value->execute();
        if($value->rowCount() > 0){
            $errmsg = "<span style='color:red;font-size:18px;'>Catagory Already exist!!! </span>";
            return $errmsg;
        }



         if($name== ""){
             $errmsg = "<span>field must not be empty!!! </span>";
        return $errmsg;
         }else{
        $sql = "UPDATE tbl_catagory SET catname='$name' where id='$id' ";
        $value = $this->db->conn->prepare($sql);
        $res = $value->execute();

         if($res == true){
            $errmsg = "<span color:green;font-size:18px;>Catagory Updated successfully </span>";
            return $errmsg;
            }
     }
    }
}