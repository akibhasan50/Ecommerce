
<?php 
$filepath= realpath(dirname(__FILE__));

?>
<?php 
include_once ("../inc/session.php") ;
session::init();

?>
<?php include_once ($filepath."/../inc/database1.php") ;?>
<?php include_once ($filepath."/../inc/format.php") ;?>

<?php 

class adminlogin{
       private $db;
        private $fm;
    public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
    }

    public function adminlog($uname,$pass){
        $uname =$this->fm->validate($uname);
        $pass =$this->fm->validate($pass);

         if($uname== "" || $pass ==""){
            $errmsg = "<span>field must not be empty!!! </span>";
            return $errmsg;

        }else{
        $sql = "SELECT * FROM tbl_admin  where username='$uname' AND password='$pass'";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        $data= $value->fetch();

        if($value->rowCount()> 0){
            session::set("login",true);
            session::set("id",$data['id']);
            session::set("username",$data['username']);
            session::set("password",$data['password']);
            
            header("Location:index.php");
        }else{
              $errmsg = "<span>data not found</span>";
            return $errmsg;
        }

    }
    }
}








;?>