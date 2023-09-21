<?php 

session_start();
include './../enb.php';
$errors=[];


//validate name

$name = (trim($_REQUEST["name"]));
if(empty($name)){
    $errors["name_error"]= "enter name.";
}
else{
    if(strlen($name) > 100){
        $errors["name_error"]= "name must be 10 word.";
    }
}


//validate email

$email = (filter_var($_REQUEST["email"], FILTER_VALIDATE_EMAIL));

if(strlen($email) > 250){
    $errors["email_error"]= "invalid email";
}
    


//validate number

 $phone = $_REQUEST["phone"];

 if (empty($phone)){
    $errors["phone_error"]= "enter phone number.";
 } else if (!is_numeric($phone)){
       $errors["phone_error"]= "plz enter a number.";
 }else{
    if(!preg_match('/^[0-9]{11}+$/', $phone)){
        $errors["phone_error"]= "Invalid number";
    }
 }

// if(strlen($phone) > 13){
//     $errors["phone_error"]= "phone number must be 11 digit.";
// }else if (!is_numeric($phone)){
//     $errors["phone_error"]= "plz enter a number.";
// }else if(!preg_match("/^(?:\+88|88)?(01[3-9]\d{8})$/", $phone)){
//     $errors["phone_error"]= "Invalid number";
// }
// else{
//     if(empty($phone)){
//         $errors["phone_error"]= "enter phone number.";
//     }
// }


//password validate 
//Ananayna11

$pass = $_REQUEST["pass"];
if(!empty($pass) && ($pass == $_REQUEST["cpass"])) {

    if (strlen($pass) < 8) {
        $errors["pass_error"]= "Your Password Must Contain At Least 8 Characters!";
    }elseif(!preg_match("#[0-9]+#",$pass)) {
        $errors["pass_error"]= "Your Password Must Contain At Least 1 Number!";
    }elseif(!preg_match("#[A-Z]+#",$pass)) {
        $errors["pass_error"]= "Your Password Must Contain At Least 1 Capital Letter!";
    }elseif(!preg_match("#[a-z]+#",$pass)) {
        $errors["pass_error"]= "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
}else{
    $errors["pass_error"]= "password no match.";
}

// echo "<pre>";
//     print_r ($errors);
// echo "</pre>";
// echo $errors['phone_error'];

if (count($errors)>0){
    $_SESSION = $errors;
    header("location: ./../cl8hw.php");
}else{
    $query = "INSERT INTO login (name, email, phone, pass) 
     VALUES ('$name', '$email', '$phone', '$pass')";

     mysqli_query($conn,$query);
     header("location: ./../cl8hw.php");
}