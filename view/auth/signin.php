<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/tailwind.css" rel="stylesheet">
</head>

<body class="flex flex-col items-center justify-center w-screen h-screen bg-gray-200 text-gray-700">

    <!-- Component Start -->
    <div class="bg-white rounded shadow-lg p-12">
        <h1 class="font-semibold text-xl">Welcome Back</h1>


        <!-- Form -->
        <form class="flex flex-col mt-4" method="post" action="login">
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

            <button name="login" class="flex items-center justify-center h-10 px-6 w-64 bg-blue-600 mt-6 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Login</button>
            <div class="flex mt-4 justify-center text-xs">
                <a class="text-blue-400 hover:text-blue-500" href="#">Don't have account</a>
                <span class="mx-2 text-gray-300">/</span>
                <a class="text-blue-400 hover:text-blue-500" href="signup">Sign Up</a>
            </div>
        </form>
    </div>
    <!-- Component End  -->

</body>

</html>