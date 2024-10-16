<?php
session_start(); // Start the session to track user login status

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAA Security</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      // Include Tailwind's dark mode support if needed
      tailwind.config = {
        darkMode: 'class',
      };
    </script>
</head>
<body class="min-h-screen bg-black text-white flex items-center justify-center p-4">
    
    <div class="w-full max-w-6xl p-6 rounded-2xl shadow-2xl flex items-center">
        <!-- Left Section: Authentication Content -->
        <div class="w-1/2 p-6">
            <!-- Header with Title -->
            <div class="flex items-center justify-center mb-6">
                
                    <path d="M12 2L2 12h3v8h8v-8h3L12 2z"></path>
                </svg>
                <h1 class="text-3xl font-extrabold text-center text-red-400">AAA Security</h1>
            </div>

            <?php if ($isLoggedIn): ?>
                <!-- Content for logged-in users -->
                <p class="text-lg text-center mb-4">Hello, <span class="font-semibold"><?php echo htmlspecialchars($_SESSION['username']); ?></span>!</p>
                <div class="mt-4 flex justify-center space-x-4">
                    <a href="./src/auth/logout.php" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-md transform hover:scale-105 transition duration-300">Logout</a>

                    <?php if ($_SESSION['role_id'] == 1): ?>
                        <!-- Admin dashboard -->
                        <a href="./dashboard.php" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-md transform hover:scale-105 transition duration-300">Go to Admin Dashboard</a>
                    <?php else: ?>
                        <!-- User dashboard -->
                        <a href="./my_dashboard.php" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-md transform hover:scale-105 transition duration-300">Go to User Dashboard</a>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <!-- Content for guests -->
                <p class="text-center text-gray-300 mb-4">Please login or register to continue.</p>
                <div class="flex flex-col space-y-4">
                <a href="./login.php" class="px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-full text-center shadow-md transform hover:scale-105 transition duration-300">Login</a>
                <a href="./register.php" class="px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-full text-center shadow-md transform hover:scale-105 transition duration-300">Register</a>

                </div>
            <?php endif; ?>
        </div>
        
        <!-- Right Section: Image -->
        <div class="w-1/2 p-6">
            <img src="cyber.jpg" alt="Secure Authentication" class="rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
        </div>
    </div>
    
</body>
</html>
