<?php

// ---- ERROR CODE--------
/*
700 - connection Failure
701 - Success
702 - Failed
703 - id not set
705 - already a user
706 - security token failed


707 - bycount exceeded
708 - tocount exceeded

800 - Already An User
801 - Not An User
*/
require 'dbcon.php';
require 'login.php';
require 'security.php';
require 'traders.php';
if ($conn->connect_error) {
    die("700");
}

if (!isset($_REQUEST["id"])){
    die("703");
}
$id = $_REQUEST["id"];

function getRequestData($string){
    if (isset($_REQUEST[$string])){
        return $_REQUEST[$string];
    }
    return "";
}
function getRequestDataWithOptional($string,$default){
    if (isset($_REQUEST[$string])){
        return $_REQUEST[$string];
    }
    return $default;
}

//$security = new AppSecurity("284662124938-kocnn2hdf2ehfhtvb730pq9d7bag73f1.apps.googleusercontent.com",getRequestData("token_id"),$conn);
$security = new AppSecurity($conn);
$login = new Login($conn);
$traders = new Traders($conn);

if($id == 0){

   echo "1.0";   
}

//Sign Up 
if($id == 1){
    if($security->checkUserAlreadyExistsUsingMobile(getRequestData("mobile_no")) == "1"){
        echo "800";
    }
    else if($security->checkUserAlreadyExistsUsingMobileNoOtpCheck(getRequestData("mobile_no")) == "1"){
        $login->sendOtp(getRequestData("mobile_no"));
        echo "701";
    }else {
        if($login->signUpToApp(getRequestData("mobile_no")) == "1"){
            echo "701";
        }else {
            echo "702";
        }
    }

}

//login
if($id == 2){

    /*
    0 - Default or Not Varified
    1 - Verified but user info not added
    2 - Not verfied but user info added
    3 - Verfified and user info added. This is also ok
    */
    if($security->checkUserAlreadyExists(getRequestData("mobile_no"),getRequestDataWithOptional("user_password","bla")) == "1"){
        $output = $login->loginToApp(getRequestData("mobile_no"),getRequestData("user_password"));
        if($output == "-1"){
            echo "702";
        }else {
            echo "$output";
        }
    }
    else if($security->checkUserAlreadyExistsUsingMobile(getRequestData("mobile_no")) == "1"){
        $output = $login->loginToAppWithMobile(getRequestData("mobile_no"));
        if($output == "-1"){
            echo "702";
        }else {
            echo "$output";
        }
    }
    else {
        echo "801";
    }    
}

if($id == 3){

    if($security->checkUserAlreadyExistsUsingMobileNoOtpCheck(getRequestData("mobile_no")) == "1"){
        $output = $login->verifyOtp(getRequestData("mobile_no"),getRequestData("otp"));
        if($output == "1"){
            echo "701";
        }else {
            echo "702";
        }
    }else {
        echo "801";
    }    
}


if($id == 4){

    if($security->checkUserAlreadyExistsUsingMobile(getRequestData("mobile_no"),getRequestData("user_password")) == "1"){
        $output = $login->updateUserInfo(getRequestData("mobile_no"),getRequestData("user_password"),getRequestData("full_name"),getRequestData("email_id"));
        if($output == "1"){
            echo "701";
        }else {
            echo "702";
        }
    }else {
        echo "801";
    }    
}
if($id == 5){

    if($security->checkUserAlreadyExistsFinal(getRequestData("mobile_no"),getRequestData("user_password")) == "1"){
        $output = $login->updateLocationInfo(getRequestData("mobile_no"),getRequestData("x_cord"),getRequestData("y_cord"),getRequestData("user_password"));
        if($output == "1"){
            echo "701";
        }else {
            echo "702";
        }
    }else {
        echo "801";
    }    
}

if($id == 6){
    if($security->checkUserAlreadyExistsFinal(getRequestData("mobile_no"),getRequestData("user_password")) == "1"){
       // ($product_name, $min_cost, $max_cost, $status, $root_cat_id)
        $output = $traders->getRootCategory(getRequestData("product_name"),getRequestData("min_cost"),getRequestData("max_cost"),getRequestData("status"),getRequestData("root_cat_id"));
        if($output == "0"){
            echo "702";
        }else {
            echo $output;
        }
    }else {
        echo "801";
    }    
}

if($id == 7){
    if($security->checkUserAlreadyExistsFinal(getRequestData("mobile_no"),getRequestData("user_password")) == "1"){
       // ($product_name, $min_cost, $max_cost, $status, $root_cat_id)
        $output = $traders->getSubRootCategory(getRequestData("product_name"),getRequestData("min_cost"),getRequestData("max_cost"),getRequestData("status"),getRequestData("root_cat_id"),getRequestData("subroot_cat_id"));
        if($output == "0"){
            echo "702";
        }else {
            echo $output;
        }
    }else {
        echo "801";
    }    
}

if($id == 8){
    if($security->checkUserAlreadyExistsFinal(getRequestData("mobile_no"),getRequestData("user_password")) == "1"){
       // ($product_name, $min_cost, $max_cost, $status, $root_cat_id)
        $output = $traders->getChildCategory(getRequestData("product_name"),getRequestData("min_cost"),getRequestData("max_cost"),getRequestData("status"),getRequestData("subroot_cat_id"),getRequestData("child_cat_id"));
        if($output == "0"){
            echo "702";
        }else {
            echo $output;
        }
    }else {
        echo "801";
    }    
}

//update
if($id == 9){
    if($security->checkUserAlreadyExistsFinal(getRequestData("mobile_no"),getRequestData("user_password")) == "1"){
       // ($product_name, $min_cost, $max_cost, $status, $root_cat_id)
        $output = $traders->getUserAddress(getRequestData("auto_id"),getRequestData("mobile_no"),getRequestData("address"),getRequestData("landmark"),getRequestData("city"),getRequestData("location_x"),getRequestData("location_y"),getRequestData("pincode"));
        if($output == "0"){
            echo "702 ";
        }else {
            echo $output;
        }
    }else {
        echo "801";
    }    
}

if($id == 10){
    if($security->checkUserAlreadyExistsFinal(getRequestData("mobile_no"),getRequestData("user_password")) == "1"){
        $output = $traders->putUserAddress(getRequestData("mobile_no"),getRequestData("address"),getRequestData("landmark"),getRequestData("city"),getRequestData("location_x"),getRequestData("location_y"),getRequestData("pincode"));
        if($output == "0"){
            echo "702 ";
            header("location: error.html");
        }else {
            echo $output;
        }
    }else {
        echo "801";
    }    
}

if($id == 11){
    if($security->checkUserAlreadyExistsFinal(getRequestData("mobile_no"),getRequestData("user_password")) == "1"){
       // for your_orders
        $output = $traders->putYourOrders(getRequestData("mobile_no"),getRequestData("product_name"),getRequestData("cost"),getRequestData("quantity"),getRequestData("image_url"),getRequestData("status"),getRequestData("childElement"),getRequestData("cat_id"),getRequestData("user_address_id"),getRequestData("order_status"),getRequestData("isPaid"),getRequestData("amountPaidStatus"));
        if($output == "0"){
            echo "702 ";
            header("location: error.html");
        }else {
            echo $output;
        }
    }else {
        echo "801";
    }    
}

?>