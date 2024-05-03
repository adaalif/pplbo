<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
</head>
<body>

<div class="register-container">
    <h2>Register</h2>
    <form action="register_process.php" method="post">
        <input type="text" name="nim" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <input type="submit" value="Register">
    </form>
</div>

</body>
</html>

