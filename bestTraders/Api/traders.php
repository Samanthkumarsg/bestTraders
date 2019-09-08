<?php

 class Traders {
    /* Member variables */
    var $conn;
    
    function __construct($con) {
        $this->conn = $con;
     }

     function whereCreator($product_name,$min_cost,$max_cost,$status,$root_cat_id){
        $were = "";
        if(trim($min_cost) != "" && trim($max_cost) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            if(trim($min_cost) == trim($max_cost)){
                 $were = $were . "  `cost` <= $min_cost ";
            }else{
                $were = $were . "  `cost` >= $min_cost and `cost` <= $max_cost ";
            }

        }
        if(trim($status) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " `status`=$status ";
            
        }
        if(trim($root_cat_id) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " `root_cat_id`>= $root_cat_id ";
            
        }else{
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " `root_cat_id`>=0 ";
        }
        if(trim($product_name) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " `product_name` LIKE '%$product_name%' ";   
        }
        return $were;
     }

     function whereCreatorSubRoot($product_name,$min_cost,$max_cost,$status,$root_cat_id){
        $were = "";
        if(trim($min_cost) != "" && trim($max_cost) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            if(trim($min_cost) == trim($max_cost)){
                 $were = $were . "  `cost` <= $min_cost ";
            }else{
                $were = $were . "  `cost` >= $min_cost and `cost` <= $max_cost ";
            }

        }
        if(trim($status) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " `status`=$status ";
            
        }
        if(trim($root_cat_id) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " `subroot_cat_id`>= $root_cat_id ";
            
        }else{
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " `subroot_cat_id`>=0 ";
        }
        if(trim($product_name) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " product_name LIKE '%$product_name%' ";   
        }
        return $were;
     }

// sam update
     function whereUserlogin($mobile_no){
        $were = "";
        if(trim($mobile_no) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " mobile_no LIKE '%$mobile_no%' ";   
        }

        if(trim($mobile_no) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " mobile_no LIKE '%$mobile_no%' ";   
        }
        return $were;
     }


//-------
     function whereCreatorChild($product_name,$min_cost,$max_cost,$status,$root_cat_id){
        $were = "";
        if(trim($min_cost) != "" && trim($max_cost) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            if(trim($min_cost) == trim($max_cost)){
                 $were = $were . "  `cost` <= $min_cost ";
            }else{
                $were = $were . "  `cost` >= $min_cost and `cost` <= $max_cost ";
            }

        }
        if(trim($status) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " `status`=$status ";
            
        }
        if(trim($root_cat_id) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " `child_cat_id`>= $root_cat_id ";
            
        }else{
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " `child_cat_id`>=0 ";
        }
        if(trim($product_name) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " product_name LIKE '%$product_name%' ";   
        }
        return $were;
     }

     
    function getRootCategory($product_name,$min_cost,$max_cost,$status,$root_cat_id){
        $were = $this->whereCreator($product_name,$min_cost,$max_cost,$status,$root_cat_id);
        $sql = "SELECT * FROM `root_cat`$were LIMIT 20";
        $result = $this->conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return json_encode($rows);
        } else {
            return "0";
        }
    }
    function getSubRootCategory($product_name,$min_cost,$max_cost,$status,$root_cat_id,$subroot_cat_id){
        $were = $this->whereCreatorSubRoot($product_name,$min_cost,$max_cost,$status,$subroot_cat_id);
        if(trim($root_cat_id) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " `root_cat_id`=$root_cat_id ";
            
        }
        $sql = "SELECT * FROM `subroot_cat`$were LIMIT 20";
        $result = $this->conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return json_encode($rows);
        } else {
            return "0";
        }
    }

    //new updates

    function getUserAddress($auto_id,$mobile_no,$address,$landmark,$city,$location_x,$location_y,$pincode){
        $were = $this->whereUserlogin($auto_id,$mobile_no,$address,$landmark,$city,$location_x,$location_y,$pincode);
        if(trim($auto_id) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " `auto_id`=$auto_id ";
            
        }

        if(trim($mobile_no) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " `mobile_no`=$mobile_no ";
            
        }

        $sql = "SELECT * FROM `user_address`$were LIMIT 20";
        $result = $this->conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return json_encode($rows);
        } else {
            return "0";
        }
    }
//------

    function getChildCategory($product_name,$min_cost,$max_cost,$status,$subroot_cat_id,$child_cat_id){
        $were = $this->whereCreatorChild($product_name,$min_cost,$max_cost,$status,$child_cat_id);
        if(trim($subroot_cat_id) != ""){
            if($were == ""){
                $were = " where ";
            }
            else{
                $were = $were . " and ";
            }
            
                $were = $were . " `subroot_cat_id`=$subroot_cat_id ";
            
        }
        $sql = "SELECT * FROM `child_cat`$were LIMIT 20";
        $result = $this->conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return json_encode($rows);
        } else {
            return "0";
        }
    }

// update 

function putUserAddress($mobile_no,$address,$landmark,$city,$location_x,$location_y,$pincode){
    $sql = "INSERT INTO `user_address`(`mobile_no`, `address`, `landmark`, `city`, `location_x`, `location_y`, `pincode`) 
    VALUES ('$mobile_no','$address','$landmark','$city','$location_x','$location_y',$pincode)";
       
       if ($this->conn->query($sql) === TRUE) {
          
           return "1";
       } else {
           return "0";
       }
}

function putYourOrders($mobile_no,$product_name,$cost,$quantity,$image_url,$status,$childElement,$cat_id,$user_address_id,$order_status,$isPaid,$amountPaidStatus){
    $sql = "INSERT INTO `your_orders`(`mobile_no`, `product_name`, `cost`, `quantity`, `image_url`, `status`, `childElement`,`cat_id`,`user_address_id`,`order_status`,`isPaid`,`amountPaidStatus`) 
    VALUES ('$mobile_no','$product_name',$cost,$quantity,'$image_url','$status',$childElement,$cat_id,$user_address_id,$order_status,'$isPaid','$amountPaidStatus')";
       
       if ($this->conn->query($sql) === TRUE) {
          
           return "1";
       } else {
           return "0";
       }
}


//-----


    function putRootCategory($product_name,$cost,$quantity,$image_url,$status,$hasChildElement,$rating){
        $sql = "INSERT INTO `root_cat`(`root_cat_id`, `product_name`, `cost`, `quantity`, `image_url`, `status`, `hasChildElement`, `rating`) 
        VALUES (1,'$product_name',$cost,$quantity,'$image_url',$status,$hasChildElement,$rating)";
           
           if ($this->conn->query($sql) === TRUE) {
              
               return "1";
           } else {
               return "0";
           }
    }

    function putSubRootCategory($product_name,$cost,$quantity,$image_url,$status,$hasChildElement,$rating,$root_cat_id){
       
        $sql = "INSERT INTO `subroot_cat`(`subroot_cat_id`,`root_cat_id`, `product_name`, `cost`, `quantity`, `image_url`, `status`, `hasChildElement`, `rating`) 
        VALUES (1,$root_cat_id,'$product_name',$cost,$quantity,'$image_url',$status,$hasChildElement,$rating)";
           
           if ($this->conn->query($sql) === TRUE) {
              
               return "1";
           } else {
               return "0";
           }
    }
    function putChildCatCategory($product_name,$cost,$quantity,$image_url,$status,$hasChildElement,$rating,$subroot_cat_id){
       
        $sql = "INSERT INTO `child_cat`(`child_cat_id`,`subroot_cat_id`, `product_name`, `cost`, `quantity`, `image_url`, `status`, `hasChildElement`, `rating`) 
        VALUES (1,$subroot_cat_id,'$product_name',$cost,$quantity,'$image_url',$status,$hasChildElement,$rating)";
           
           if ($this->conn->query($sql) === TRUE) {
              
               return "1";
           } else {
               return "0";
           }
    }
 }

 
?>