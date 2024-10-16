<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAA Security | Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        };
    </script>
    <style>
        body {
            background-image: url('login.jpg'); /* Replace with your image path */
            background-color: #000; /* Fallback for browsers that do not support images */
            background-size: cover; /* Cover the entire background */
            background-position: center; /* Center the image */
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen text-white flex items-center justify-center p-6">
    <form action="./src/auth/login.php" method="POST" class="bg-black backdrop-blur-sm p-8 rounded-xl shadow-2xl w-full max-w-md space-y-6">
        <h1 class="text-3xl font-bold text-white text-center mb-6">Login to Your Account</h1>

        <?php if (isset($_GET['error'])): ?>
            <div class="bg-red-500 text-white p-3 rounded-lg mb-6">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
        
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email:</label>
            <input type="email" id="email" name="email" required 
                   class="w-full px-4 py-3 bg-gray-700 text-white border border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400" placeholder="Enter your email">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password:</label>
            <input type="password" id="password" name="password" required 
                   class="w-full px-4 py-3 bg-gray-700 text-white border border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400" placeholder="Enter your password">
        </div>

        <div>
            <input type="submit" value="Login" 
                   class="w-full px-4 py-3 bg-blue-700 text-white font-semibold rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer transition duration-300">
        </div>

        <div class="text-center mt-4">
            <p class="text-sm text-gray-400">Don't have an account? <a href="./register.php" class="text-blue-400 hover:text-blue-500">Sign up</a></p>
        </div>
    </form>
</body>
</html>
