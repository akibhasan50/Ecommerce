<?php 

include "inc/database1.php";
$db = new Database();


        $name = $_POST['cname'];
       
        $email = $_POST['cemail'];
        
        $phone = $_POST['cphone'];
         
        $password =$_POST['cpassword'];
 
        $sql = "INSERT INTO   tbl_user (name,email,phone,password) values('$name','$email','$phone','$password')";
        $value = $db->conn->prepare($sql);
        $data = $value->execute();
        if($data == TRUE){
            echo "successfully register";
        }else{
            echo "not sent";
        }





?>