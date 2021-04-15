<?php
  // Start the session
  session_start();

  // Define variables and initialize with empty values
  $fName = $lName = $email = $password = $confirm = $new_password = "";
  $error = array('fName' => '', 'lName' => '', 'email' => '', 'password' => '', 'confirm' => '', 'new_password' => '');
  $_SESSION['show'] = "valid" ;
//connect to the file File system


//register user
if (isset($_POST['submit'])) {


if (empty($_POST['fName'])){
  $error['fName'] = 'Enter your first name';
  }else {
  $fName = trim($_POST['fName']);
}


if (empty($_POST['lName'])){
  $error['lName'] = 'Enter your last name';
  }else {
  $lName = trim($_POST['lName']);
}

if (empty($_POST['email'])){
    $error['email'] = 'Enter your email address';
    }else {
    
    $data = file_get_contents('files/user.json');

    $data = json_decode($data, true);

    for ($i = 0; $i < count($data); $i ++){

         $data_count = $data[$i]['email'];

      if ($_POST['email'] == $data_count ){
        
        $error['email'] = 'Email already in use';
        
        break;
        
      }else{

        $email = trim($_POST['email']);
        
      }   
  }

  }



if (empty($_POST['password'])){
    $error['password'] = 'Enter your password';
    }else {
    $password = $_POST['password'];
}

if ((!empty($password)) && (empty($_POST['confirm']))){
    $error['confirm'] = 'Confirm your password';
  }else {
    $confirm = $_POST['confirm'];
    if ($confirm !== $password) {
      $error['confirm'] = 'The two passwords do not match';
    }
}


if (array_filter($error)){

}else {
  
  // file_put_contents("files/users.json", json_encode($array_users), JSON_PRETTY_PRINT, FILE_APPEND);


  if(file_exists('files/user.json'))  
  {  
       $current_data = file_get_contents('files/user.json');  
       $array_data = json_decode($current_data);  

       $extra = array( 
        'first_name' => $fName,
        'last_name' => $lName,
        'email' => $email,
        'password' => $password,
        'confirm_password' => $confirm 
        );  

       $array_data[] = $extra;  

       $final_data = json_encode($array_data, JSON_PRETTY_PRINT);  

       file_put_contents('files/user.json', $final_data);

       $_SESSION['username'] = $fName;

      $_SESSION['success'] = "You are now Registered!";

        
      header('Location: welcome.php');
           
    
  }  
  else  
  {  
    $error['email'] = 'User records missing';
  }  
  
}

}

// file_put_contents("files/users.json", json_encode($array_users), JSON_PRETTY_PRINT, FILE_APPEND);


// login
if (isset($_POST['login'])){

  $email = $_POST['email'];

  $password = $_POST['password'];

  $data = file_get_contents('files/user.json');

  $data = json_decode($data, true);

  for ($i = 0; $i < count($data); $i ++){

     $data_email = $data[$i]['email'];

     $data_password = $data[$i]['password'];

    if (empty($email)){
    
     $error['email'] = 'Enter a registered email';
  

    }elseif ($email !== $data_email ){
    
    $error['email'] = 'User is not registered';

    // }elseif ($email == $data_email ){
    
    // $error['email'] = 'Valid email but wrong password';

    }elseif (($email == $data_email ) && ($password !== $data_password )){
    
      $error['email'] = 'Valid email but wrong password';
      
      $error['password'] = 'Wrong password entered';
    
     }elseif (($email == $data_email ) && ($password == $data_password )){

    $_SESSION['username'] = $data[$i]['first_name'];

    $_SESSION['success'] = "You are now Logged in!";
        
    header('Location: welcome.php');
    
  }else{

    $error['email'] = 'Oops! something went wrong';
    
  }   


}

}

// reset
if (isset($_POST['login_continue'])){

  $email = $_POST['email'];

  $password = $_POST['password'];
  
  $data = file_get_contents('files/user.json');

  $data = json_decode($data, true);

  for ($i = 0; $i < count($data); $i ++){

     $data_email = $data[$i]['email'];

     $data_password = $data[$i]['password'];

    if (empty($email)){
    
     $error['email'] = 'Enter a registered email';
      
    }
    
    if (($email == $data_email ) && ($password !== $data_password )){
    
      $error['password'] = 'Wrong password entered';
    }
    // } else {

    //   $error['email'] = 'User is not registered';
    //   break;

    // }
    
    // if (($email !== $data_email ) && ($password !== $data_password )){
    
    //   $error['email'] = 'User is not registered';
    
    // }
    
    if (($email == $data_email ) && ($password == $data_password )){

      $error['email'] = 'Logged In!';
  
      // $_SESSION['show'] = "invalid";
    }
  } 
}


if (isset($_POST['reset'])){

  $confirm = $_POST['confirm'];

  $new_password = $_POST['new_password'];
  
  $data = file_get_contents('files/user.json');

  $data = json_decode($data, true);

  for ($i = 0; $i < count($data); $i ++){

     $data_password = $data[$i]['password'];

     $data_confirm = $data[$i]['confirm_password'];

    if (empty($new_password) && (empty($confirm))){
    
     $error['new_password'] = 'Enter a new password';
  
    }
    
    if (empty($confirm) && (!empty($new_password))){
    
      $error['confirm'] = 'Enter verification password';
   
     }

     if (empty($new_password)){
    
      $error['confirm'] = 'Enter a new password first';
   
     }

      if (($new_password !== $confirm) && (!empty($confirm))){
    
      $error['confirm'] = 'New password and verification password do not match';
   
     }

    if (($new_password == $confirm) && (!empty($new_password))) {
      
     
    $data_password = $new_password;
    
    $data_confirm = $confirm;

    $error['confirm'] = 'success';
  

  var_dump($data_password);

  $new_user_data = json_encode($data, JSON_PRETTY_PRINT);
    
  file_put_contents('files/user.json', $new_user_data);

  }  

  


    // echo $data_password . ' ' . $data_confirm ;
    // $_SESSION['username'] = $data[$i]['first_name'];

    // $_SESSION['success'] = "Password reset successful!";
        
    // header('Location: welcome.php');
    
    // }else{

    // $error['new_password'] = 'Oops! something went wrong';
    }
  
    
    
    
    
}   





// log out
if (isset($_POST['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  unset($_SESSION['success']);
  header('Location: index.php');

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zuri Task 3</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
</html>
