<?php include 'header.php';

?>

<body>

<div class="container login">


<div class="text-center">
  <img class="mb-4" src="images/jay.png" alt="" width="72" height="72">
  <h1 class="h2 mb-4 font-weight-bold">Welcome back!</h1>
  <p class="h5 mb-4 font-weight-normal">Please login</p>
</div>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-signin">
        <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control email" name="email" placeholder="Email address" value="<?php echo $email; ?>" autofocus>
      <div class="mb-2 text-danger">
        <?php echo $error['email']; ?>
      </div>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control password" name="password" placeholder="Password">
      <div class="mb-2 text-danger">
        <?php echo $error['password']; ?>
      </div>
      <div class="mt-5">
      <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button>

    </div>
    <div class="text-center mt-2 mb-3">
      <a href="reset.php">Password Reset?</a>
    </div>
    </form>
	    			<div class="text-center">
    						Don't have an account? <a href="index.php" class="ml-2">Register here!</a>
    					</div>


            <?php include 'footer.php';

            ?>
    				</div>


</body>
</html>
