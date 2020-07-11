<?php 
$filepath= realpath(dirname(__FILE__));

?>

<?php include_once ($filepath."/../inc/database1.php") ;?>
<?php include_once ($filepath."/../inc/format.php") ;?>

<?php 

class cartcls{
       private $db;
        private $fm;
    public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
    }

    public function addtocrt($id,$qty){
            $sesid= session_id();

            $sql="SELECT * from tbl_product where id='$id'
            ";
            $value = $this->db->conn->prepare($sql);
            $value->execute();
            $data= $value->fetch();

            $name=$data['name'];
            $price=$data['price'];
            $image=$data['image'];

            $sqlqu="SELECT * from tbl_cart where sesid='$sesid' and proid='$id' ";
            $valuen = $this->db->conn->prepare($sqlqu);
            $valuen->execute();
            $datav = $valuen->fetch();
            $oldqu = $datav['quantity'];
              $totQuan = $qty + $oldqu;
            if($valuen->rowCount() > 0){

            $upque="UPDATE  tbl_cart set quantity='$totQuan' where sesid='$sesid' and proid='$id' ";
            $resu = $this->db->conn->prepare($upque);
            $resu->execute();
            if($resu== TRUE){
                return true;
        }
        }else{
            $query = "INSERT INTO   tbl_cart (sesid,proid,pname,quantity,price,image) values('$sesid','$id','$name','$qty','$price','$image')";
            $value = $this->db->conn->prepare($query);
            $value->execute();
           
    }
}


    public function showallcrt(){
        $sql="SELECT * from tbl_cart order by cartid desc
            ";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        $data= $value->fetchAll();
        return $data;
    }

    public function chkempty(){
        $sql="SELECT * from tbl_cart ";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        $data =$value->rowCount() ;
        if($data == 0){
           
            echo " <script>window.location='index.php'</script>";
        }
      
    }


    public function delfromcrt($delid){
        	$sql="DELETE FROM tbl_cart  WHERE cartid='$delid' ";
			$value = $this->db->conn->prepare($sql);
            $value->execute();
    }


     public function updaprodqty($upqnty,$cartid){
         	$sql="UPDATE  tbl_cart SET quantity='$upqnty' WHERE cartid='$cartid' ";
			$value = $this->db->conn->prepare($sql);
            $value->execute();
    }
}