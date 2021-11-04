<?php


$error = '';
$email = '';
$phone = '';
$county = '';
$password = '';
$cpassword = '';
$gender = '';
$username = '';
$category = '';

function clean_text($string)
{
    $string = trim($string);
    $string = stripcslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if (isset($_POST['submit']))
 { 
     //email
    if (empty($_POST['email'])){
        $error .= '<p><label class="text-danger"> Please Enter Your valid Email Address</label></p>';
    }
    else {
        $email = clean_text($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= '<p><label class="text-danger"> Please Enter Your valid Email Address</label></p>';
        }
    }

    //username

    if (empty($_POST['username'])){
        $error .= '<p><label class="text-danger"> Please Enter Your name</label></p>';
    }
    else {
        $username = clean_text($_POST['username']);
       // if (!preg_match("/^[a-zA-Z]*$/" .$username)) 
       {
            $error .= '<p><label class="text-danger"> You name can only contain Letters</label></p>';
        }

    }
    //county

          if (empty($_POST['county'])){
        $error .= '<p><label class="text-danger"> Please Enter Your name</label></p>';
    }
    else {
        $county = clean_text($_POST['county']);
      //  if (!preg_match("/^[a-zA-Z]*$/" .$county)) 
      {
            $error .= '<p><label class="text-danger"> County Not Found</label></p>';
        } 
    }

    //gender

    if (empty($_POST['gender'])){
        $error .= '<p><label class="text-danger"> Please Enter Your name</label></p>';
    }
    else {
        $gender = clean_text($_POST['gender']);
       // if (!preg_match("/^[a-zA-Z]*$/" .$gender))
         {
            $error .= '<p><label class="text-danger"> Gender can only contain Letters</label></p>';
        }
    }

    //category

    if (empty($_POST['category'])){
        $error .= '<p><label class="text-danger"> Please Enter Your name</label></p>';
    }
    else {
        $gender = clean_text($_POST['category']);
       // if (!preg_match("/^[a-zA-Z]*$/" .$category)) 
       {
            $error .= '<p><label class="text-danger"> Select category</label></p>';
        }
    }

}

    if ($error == '') {
        $servername ="localhost";
        $username ="localhost";
        $password ="localhost";
        $category ="localhost";
        $db ="somoireart";
    }



    //connection

    $conn = mysqli_connect($servername,$username,$password, $category, $db);

    //check connection

    if ($conn)
    {
        die('Connection failed' .mysqli_connect_error());
    }
    $sql = "INSERT INTO online-site( email, username, gender, password, phone, category) VALUES('$email','$username', '$gender', '$password', '$phone', '$category')";

   // if(mysqli_query($conn, $sql))
     {

    }
    //else
    {
      //  echo "error: ".sqli. "<br>".mysqli_error($conn);
    }
    $mysqli_close($conn);

    $error = '<label class="text-success"> Account Successfully Created</label>';
    $email= '';
    $username= '';
    $gender= '';
    $password= '';
    $phone= '';
    $category= '';


 

?>