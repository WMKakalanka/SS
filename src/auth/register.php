<?php
require_once __DIR__. '/../../src/db/connection.php';
ob_start(); // Start output buffering

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Set role based on username condition
    $role_id = (preg_match('/^adm.*@$/', $username)) ? 1 : 2;

    // Database connection
    $pdo = getDBConnection();

    // Check if user exists
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? OR username = ?');
    $stmt->execute([$email, $username]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        if ($existingUser['email'] === $email) {
            header('Location: ../../register.php?error=This%20email%20is%20already%20used');
        } elseif ($existingUser['username'] === $username) {
            header('Location: ../../register.php?error=This%20username%20is%20already%20used');
        }
        exit();
    }

    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
        header('Location: ../../register.php?error=Password%20must%20be%20at%20least%208%20characters%20long%20and%20include%20both%20letters%20and%20numbers');
        exit();
    }
    

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    try {
        $stmt = $pdo->prepare('INSERT INTO users (username, email, password, role_id) VALUES (?, ?, ?, ?)');
        $stmt->execute([$username, $email, $hashed_password, $role_id]);

        if ($stmt->rowCount() > 0) {
            // Successful insert, redirect to login page
            header('Location: ../../login.php');
            exit();
        } else {
            echo "Failed to insert user into the database.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
}
