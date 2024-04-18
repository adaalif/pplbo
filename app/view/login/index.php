<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Masukkan stylesheet dan script JavaScript yang diperlukan di sini -->
</head>
<body>
    <h1 class="header">Welcome</h1>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login_contr.php" method="post">
            <h1>NIM</h1>
            <input type="text" name="nim" placeholder="" required>
            <h2>Password</h2>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
            <a href="register.html" class="Register">Register</a>
            <a href="Forgot_password.html" class="Forgot_Password">Forgot Password</a>
        </form>
    </div>
</body>
</html>
