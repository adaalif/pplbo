<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>

</head>
<body>
<h1 class = "header">
  Welcome
</h1>
<div class="login-container">
    <h2>Login</h2>
    <form action="../contr/login_contr.php" method="post">
      <h1>NIM</h1>
        <input type="text" name="nim" placeholder="" required>
        <h2>Password</h2>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
        <a href="../register.html" class = "Register">Register</a>
        <a href="../Forgot_password.html" class = "Forgot_Password"> Forgot Pasword</a>
        
    </form>
</div>
</body>
<style>
    body{
      background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
        font: 12px "Helvetica Neue",Helvetica,Arial,sans-serif;
        width: 300px;
        margin: 5% auto;
        min-height: 100vh;
        position: relative;
        display: grid;
        place-items: center;

      }
      .header{
        font-size: 40px;
        color:whitesmoke ;
        animation: slideInFromTop 1s ease forwards;
      }
    .login-container {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px black;
        width: 400px;
        height: fit-content;
        display: grid;
        place-items: center;
        position: absolute;
        animation: fadeIn 1s ease forwards;
    }
    .login-container form {
      text-align: center; /* Center align the form contents */
  }
    .login-container h2{
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .login-container form input[type="text"],
    .login-container form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #979494;
        border-radius: 5px;
        box-sizing: border-box;
    }
    .login-container form input[type=submit]{
        display: inline-block;
        text-align: center;
        width: 100px ;
        padding: 10px;
        border: none;
        border-radius: 25px;
        background-color: #007bff;
        color: #fff;
        margin-top: 10px;
        margin-right: 10px;
        text-decoration: none;
        height: auto;
    }
    .login-container form input[type=submit]:hover{
      opacity: 0.5;
    }
    .Forgot_Password {
      position: absolute; /* Change position to absolute */
      bottom: 10px;
      right: 10px; /* Adjust right position */
      text-decoration: none;
      margin:auto;
  }
  .Forgot_Password:hover, .Register:hover, .use_email:hover{
    opacity: 50%;
  }
  .Register {
    position: absolute; /* Change position to absolute */
      bottom: 10px;
      left: 10px;
      text-decoration: none;
    }

  .use_email{
    position: absolute; /* Change position to absolute */
    bottom: 30px;
    text-decoration: none;
    margin:auto;
    right: 10px; 
  }
  @keyframes slideInFromTop {
    0% {
        opacity: 0;
        transform: translateY(-50px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}


@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
    
      
</style>
</html>