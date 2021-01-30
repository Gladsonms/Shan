<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?= $title ?></title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
  <link rel="stylesheet" href="css/fontawesome-all.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css?v=201805282344">
  <link rel="shortcut icon" href="favicon.ico">
</head>
<body>
  <div class="wrapper clearfix">
  	<div class="login-wrapper">
      <div class="login-logo"><a href="index.php" class="clearfix"><h1>Sports Warehouse</h1></a></div>
      <div class="new-account-box">
        <form action="createaccount.php" method="post" id="create-account">
          <h1>Create account</h1>
          <div class="login-row">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
          </div>
          <div class="login-row">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
          </div>
          <div class="login-row">
            <label for="confirm_password">Re-enter password</label>
            <input type="password" name="confirm_password" id="confirm-password" required>
          </div>
          <input type="submit" id="createSubmit" value="Create your SW account">
          <b>By creating an account, you agree to SW's <a href="privacy.php">Privacy Notice</a>.</b>
        </form>
        <p><?= $message ?></p>
        <div class="divider-break"></div>
        <b>Already have an account? <a href="login.php">Sign in</a></b>
      </div>
    </div>
  </div>
  <!-- This is the footer -->
  <div class="copyright">
    <p>&#169;Copyright 2018 Sports Warehouse. <span>All rights reserved. </span><span>Website made by Charles Chen.</span></p>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/custom.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
</body>
</html>
