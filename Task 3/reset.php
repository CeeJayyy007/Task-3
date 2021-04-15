<?php
//include header file
include 'header.php';

?>

<body>

<div class="container login">


  <div class="text-center">
    <img class="mb-4" src="images/jay.png" alt="" width="72" height="72">
  <h1 class="h2 mb-4 font-weight-bold ">Welcome back!</h1>
  <p class="h5 mb-4 font-weight-normal ">Enter new password</p>
  </div>

  <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    
    <div class="text-center mt-2 mb-3 <?php echo $class; ?>">
    <label for="new_Password" class="sr-only">New password</label>
      <input type="password" id="new_Password" class="form-control regBorder" name = "new_password" placeholder="New password">
      <div class="mb-2 text-danger">
        <?php echo $error['new_password']; ?>
      </div>
      <label for="confirmPassword" class="sr-only">Confirm new password</label>
      <input type="password" id="confirmPassword" class="form-control password" name = "confirm" placeholder="Verify new password">
      <div class="mb-2 text-danger">
        <?php echo $error['confirm']; ?>
      </div>

      <div class="mt-5">

    <button class="btn btn-lg btn-primary btn-block" name = "reset" type="submit">Reset password</button>
    </div>


    </div>
<div class="text-center mt-2 mb-3">
<a href="login.php">Go back to login?</a>
</div>
</form>

	<div class="text-center">
   Don't have an account? <a href="index.php" class="ml-2">Register here!</a>
   </div>


   <?php
   //include footer file
   include 'footer.php';

   ?>
   </div>


</body>
</html>
