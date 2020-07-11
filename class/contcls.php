<?php 
$filepath= realpath(dirname(__FILE__));

?>

<?php include_once ($filepath."/../inc/database1.php") ;?>
<?php include_once ($filepath."/../inc/format.php") ;?>

<?php 

      












class contactcls{
       private $db;
        private $fm;
    public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
    }


        public function showmsg(){
         $sql = "SELECT * FROM tbl_contact order by id desc";
        $value = $this->db->conn->prepare($sql);
        $value->execute();
        $data= $value->fetchAll();
        return $data;
     }
    
       public function contactmsg($data){
        $name = $this->fm->validate($data['name']);
        $email = $this->fm->validate($data['email']);
        $phone = $this->fm->validate($data['phone']);
        $message = $this->fm->validate($data['message']);

        if( $name == "" || $email == "" || $phone == "" || $message == ""){
             $errmsg = "<span style='color:red;font-size:18px;'>field must not be empty</span>";
            return $errmsg;
        }else{
            $sql = "INSERT INTO   tbl_contact (name,email,phone,message) values('$name','$email','$phone','$message')";
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

?>