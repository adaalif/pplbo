<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST["nim"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT nim, Password FROM user WHERE nim = ?");
    $stmt->bind_param("s", $nim);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($nim, $stored_password);
        $stmt->fetch();
    
        // Verify the password
        if ($password === $stored_password) {
            // Password is correct, log the user in
            session_start();
            $_SESSION["nim"] = $nim;
            
            echo "<script>alert('Login Berhasil');</script>"; 
            header("Location: dashboard.html");
            
            exit(); // Penting untuk menghentikan eksekusi skrip setelah redirect
        } else {
            // Incorrect password
            $error = "Incorrect password";
            echo "Incorrect password";
        }
    } else {
        // User not found
        $error = "User not found";
    }
    

    $stmt->close();
}

$conn->close();
?>
