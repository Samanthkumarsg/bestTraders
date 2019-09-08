<?php
class AppSecurity{
 
   
    var $conn;
    function __construct($con) {
       
        $this->conn = $con;
     }

    function checkUserAlreadyExists($mobile_no,$user_password){
        $sql = "SELECT mobile_no FROM user_login  WHERE mobile_no='$mobile_no' AND user_password='$user_password'";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              if($row["mobile_no"] == $mobile_no){
                  return "1";
              }else {
                  return "0";
              }
            }
        } else {
            return "0";
        }
    }

    function checkUserAlreadyExistsUsingMobile($mobile_no){
        $sql = "SELECT mobile_no FROM user_login  WHERE mobile_no='$mobile_no' AND user_status != 0";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              if($row["mobile_no"] == $mobile_no){
                  return "1";
              }else {
                  return "0";
              }
            }
        } else {
            return "0";
        }
    }

    function checkUserAlreadyExistsUsingMobileNoOtpCheck($mobile_no){
        $sql = "SELECT mobile_no FROM user_login  WHERE mobile_no='$mobile_no'";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              if($row["mobile_no"] == $mobile_no){
                  return "1";
              }else {
                  return "0";
              }
            }
        } else {
            return "0";
        }
    }

    function checkUserAlreadyExistsFinal($mobile_no,$user_password){
        $sql = "SELECT mobile_no FROM user_login  WHERE mobile_no='$mobile_no' AND user_password='$user_password'  AND user_status = 3";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              if($row["mobile_no"] == $mobile_no){
                  return "1";
              }else {
                  return "0";
              }
            }
        } else {
            return "0";
        }
    }
  
}
?>