<?php session_start(); ?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/css/tailwind.css" rel="stylesheet">
</head>

<body class="flex flex-col items-center justify-center w-screen h-screen bg-gray-200 text-gray-700">

    <div class="bg-white rounded shadow-lg p-12">
        <!-- Component Start -->
        <h1 class="font-semibold text-xl">Welcome To Wiki</h1>

        <form class="flex flex-col mt-4" method="post" action="../../App/controllers/UserController.php">
            <div>
                <label class="font-semibold text-xs" for="usernameField">Username</label>
                <input id="usernameField" name="username" placeholder="Enter your Username" class="flex items-center h-10 px-4 w-64 text-sm bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text" required>
                <small class="text-red-500"><?= isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?></small>
            </div>

            <div>
                <label class="font-semibold text-xs" for="emailField">Email</label>
                <input id="emailField" name="email" placeholder="Enter your Email" class="flex items-center h-10 px-4 w-64 text-sm bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text">
                <small class="text-red-500"><?= isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?></small>
            </div>

            <div>
                <label class="font-semibold text-xs mt-3" for="passwordField">Password</label>
                <input id="passwordField" name="password" placeholder="Enter your Password" class="flex items-center h-10 px-4 w-64 text-sm bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="password">
                <small class="text-red-500"><?= isset($_SESSION['password']) ? $_SESSION['password'] : ''; ?></small>
            </div>

            <div>
                <label class="font-semibold text-xs mt-3" for="cpasswordField">Confirm Password</label>
                <input id="cpasswordField" name="cpassword" placeholder="Confirm your Password" class="flex items-center h-10 px-4 w-64 text-sm bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="password" required>
                <small class="text-red-500"><?= isset($_SESSION['cpassword']) ? $_SESSION['cpassword'] : ''; ?></small>
            </div>

            <button name="register" class="flex items-center justify-center h-10 px-6 w-64 bg-blue-600 mt-6 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Sign Up</button>

            <div class="flex mt-4 justify-center text-xs">
                <a class="text-blue-400 hover:text-blue-500" href="#">Already have account</a>
                <span class="mx-2 text-gray-300">/</span>
                <a class="text-blue-400 hover:text-blue-500" href="signin.php">Sign In</a>
            </div>
        </form>
        <!-- Component End  -->
    </div>

</body>

</html>