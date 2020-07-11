<?php 
$filepath= realpath(dirname(__FILE__));

?>

<?php include_once ($filepath."/../inc/database1.php") ;?>
<?php include_once ($filepath."/../inc/format.php") ;?>
<?php 

class userdatacls{
            private $db;
            private $fm;



        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function showuser(){
            $sql="SELECT * from tbl_user order by id desc ";
            $value = $this->db->conn->prepare($sql);
            $value->execute();
            $data= $value->fetchAll();
            return $data;
        }


         public function userreg($data){
            $name = $this->fm->validate($data['name']);
            $email = $this->fm->validate($data['email']);
            $phone = $this->fm->validate($data['phone']);
            $password = $this->fm->validate($data['password']);





            if( $name == "" || $email == "" || $phone == "" || $password == ""){
                $errmsg = "<span style='color:red;font-size:18px;'>field must not be empty</span>";
                return $errmsg;
            }else{

                $query="SELECT * from tbl_user where email='$email'";
                $value = $this->db->conn->prepare($query);
                $value->execute();
                $data= $value->fetchAll();
                if($value->rowCount() > 0){
                     $errmsg = "<span style='color:red;font-size:18px;'>Email already exist</span>";
                return $errmsg;
                }else{

                    
                    $sql = "INSERT INTO   tbl_user (name,email,phone,password) values('$name','$email','$phone','$password')";
                    $value = $this->db->conn->prepare($sql);
                    $data = $value->execute();
                    if($data == TRUE){
                        $errmsg = "<span style='color:green;font-size:18px;'>message send successfully</span>";
                        return $errmsg;
                    }else{
                        $errmsg = "<span style='color:red;font-size:18px;'>message not send</span>";
                        return $errmsg;
                    }

                }

            }

        }


          public function userlogin($data){
               $email =$this->fm->validate($data['email']);
               $pass =$this->fm->validate($data['pass']);
                

         if($email== "" || $pass ==""){
            $errmsg = "<span>field must not be empty!!! </span>";
            return $errmsg;

        }else{
        $sql = "SELECT * FROM tbl_user  where email='$email' AND password='$pass'";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        $data= $value->fetch();

        if($value->rowCount()> 0){
            session::set("login",true);
            session::set("id",$data['id']);
            session::set("uname",$data['name']);
            session::set("upassword",$data['password']);
            //header('Location: '.$_SERVER['PHP_SELF']);  
           echo "<script>window.location.href = window.location.href;</script>";
        }else{
              $errmsg = "<span>Invalid Email or Password</span>";
            return $errmsg;
        }

    }
          }
}

?>