<?php echo $message; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Website</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/style.css"/>
</head>
<body class="bg-login">
<form class="formlogin" action="<?php echo base_url("login/validasi"); ?>" method="post">
	<div class="imgcontainer">
        <img src='<?php echo base_url() ?>asset/images/login.png' alt="user" class="user">
    </div>
	
	<div class="containerlogin">
        <label for="nama"><b>Username</b></label>
        <input class="inputlogin" type="text" placeholder="Enter Username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input class="inputlogin" type="password" placeholder="Enter Password" name="password" required>

        <br>
        <button class="btnlogin" type="submit" name="login">Login</button>
     </div>
  </div>
</form>
</body>
</html>