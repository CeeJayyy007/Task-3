<?php include 'header.php';

?>

<body>

<div class="text-center">



<?php

if (isset($_SESSION['username'])) : ?>

  <h2 class="my-3"> Hello, <strong><?php echo $_SESSION['username']; ?></strong></h2>
  <p class="h4 my-5"><?php echo $_SESSION['success'] ?></p>

      <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <button class="btn btn-lg btn-primary btn-block" name="logout" type="submit">Log out</button>
      </form>

 <?php endif ?>

    </div>
  </body>
</html>
