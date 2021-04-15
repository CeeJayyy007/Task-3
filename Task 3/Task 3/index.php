<?php
//include header file
include 'header.php';

?>


<body>


<div class="container login">


  <div class="text-center">
    <img class="mb-4" src="images/jay.png" alt="" width="72" height="72">
  <h1 class="h2 mb-4 font-weight-bold">Welcome!</h1>
  <p class="h5 mb-4 font-weight-normal">Please Register</p>
</div>
<form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

      <label for="fName" class="sr-only">First Name</label>
      <input type="text" id="fName" class="form-control name1" name="fName" placeholder="First Name" value="<?php echo $fName; ?>" autofocus>
      <div class="text-danger">
        <?php echo $error['fName']; ?>
      </div>
      <label for="lName" class="sr-only">Last Name</label>
      <input type="text" id="lName" class="form-control regBorder" placeholder="Last Name" name="lName" value="<?php echo $lName; ?>">
      <div class="text-danger">
        <?php echo $error['lName']; ?>
      </div>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control regBorder" name="email" placeholder="Email address" value="<?php echo $email; ?>">
      <div class="text-danger">
        <?php echo $error['email']; ?>
      </div>
      <label for="password" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control regBorder" name="password" placeholder="Password">
      <div class="text-danger">
        <?php echo $error['password']; ?>
      </div>
      <label for="confirmPassword" class="sr-only">Confirm password</label>
      <input type="password" id="confirmPassword" class="form-control password" name="confirm" placeholder="Confirm password">
      <div class="text-danger">
        <?php echo $error['confirm']; ?>
      </div>
      <div class="mt-5">

      <button class="btn btn-lg btn-primary btn-block" name = "submit" type="submit">Register</button>

    </div>
    </form>
	    			<div class="text-center mt-3">
    						Already have an account? <a href="login.php" class="ml-2">Login here!</a>
    					</div>


            <?php
            //include footer file
            include 'footer.php';

            ?>
    				</div>


</body>
</html>
