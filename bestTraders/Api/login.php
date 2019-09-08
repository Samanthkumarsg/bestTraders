<?php

 class Login {
    /* Member variables */
    var $conn;
    
    function __construct($con) {
        $this->conn = $con;
     }

    /* Member functions */
    function signUpToApp($mobile_no){
        $sql = "INSERT INTO `user_login`(`mobile_no`, `user_password`, `otp_dig`, `otp_expiredate`, `full_name`, `email_id`, `user_location_x`, `user_location_y`, `user_status`)
         VALUES ('$mobile_no','','','','','',0,0,0)";
            
            if ($this->conn->query($sql) === TRUE) {
                $this->sendOtp($mobile_no);
                return "1";
            } else {
                return "0";
            }
    }

     function updateStatus($mobile_no){
        $sql = "UPDATE  `user_login` SET `user_status`=1 WHERE `mobile_no`='$mobile_no'";
           
        if ($this->conn->query($sql) === TRUE) {
            
           
        } else {
           
        }
    }
    function updateUserInfo($mobile_no,$user_password,$full_name,$email_id){
        $sql = "UPDATE  `user_login` SET `user_status`=3,`user_password`='$user_password', `full_name`='$full_name', `email_id`='$email_id' WHERE `mobile_no`='$mobile_no' AND user_status != 0";
           
        if ($this->conn->query($sql) === TRUE) {
            
            return "1";
        } else {
            return "0";
        }
    }
    function updateLocationInfo($mobile_no,$x_cord,$y_cord,$user_password){
        $sql = "UPDATE  `user_login` SET `user_location_x`=$x_cord, `user_location_y`=$y_cord WHERE `mobile_no`='$mobile_no' AND user_password = '$user_password'";
           
        if ($this->conn->query($sql) === TRUE) {
            
            return "1";
        } else {
            return "0";
        }
    }
    function verifyOtp($mobile_no,$otp){
        $sql = "SELECT mobile_no FROM user_login  WHERE mobile_no='$mobile_no' AND otp_dig='$otp'";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $this->updateStatus($mobile_no);
                return "1" ;
            }
        } else {
            return "0";
        }
    }
     function sendOtp($mobile_no){
        $otp =  mt_rand(100000, 999999);
        $sql = "UPDATE  `user_login` SET `otp_dig`='$otp' WHERE `mobile_no`='$mobile_no'";
           
           if ($this->conn->query($sql) === TRUE) {
               
              
           } else {
              
           }
    }
    function loginToApp($mobile_no,$user_password){
        $sql = "SELECT user_status FROM user_login  WHERE mobile_no='$mobile_no' AND user_password='$user_password'";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo $row["user_status"] ;
            }
        } else {
            return "-1";
        }
    }

    function loginToAppWithMobile($mobile_no){
        $sql = "SELECT user_status FROM user_login  WHERE mobile_no='$mobile_no'";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo $row["user_status"] ;
            }
        } else {
            return "-1";
        }
    }


  
 }

 
?>