<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tail-Blog</title>
    <link rel="stylesheet" href="public/css/fontawesome-all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="public/css/tailwind.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="public/js/script.js"></script>
</head>


<body class="font-poppins text-gray-600">
    <!-- navbar -->
    <nav class="shadow-sm">
        <div class="container px-4 mx-auto flex items-center py-3">
            <!-- logo -->
            <div class="lg:w-10 w-10 mr-7">
                <a href="index.php" class="flex items-center font-bold">
                    <img src="public/img/logo.svg" alt="logo" class="w-full" width="30px" height="30px"><span class="ms-2">Wiki</span>
                </a>
            </div>
            <!-- logo end -->

            <!-- navlinks -->
            <div class="ml-12 lg:flex space-x-5  hidden">
                <a href="#" class="flex items-center font-semibold text-sm  transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="fas fa-home"></i>
                    </span>
                    Home
                </a>
                <a href="#" class="flex items-center font-semibold text-sm  transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="far fa-file-alt"></i>
                    </span>
                    About
                </a>
                <a href="#" class="flex items-center font-semibold text-sm  transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="fas fa-phone"></i>
                    </span>
                    Contact
                </a>
            </div>
            <!-- navlinks end -->

            <!-- searchbar -->
            <div class="relative lg:ml-auto hidden lg:block">
                <span class="absolute left-3 top-2 text-sm text-gray-500">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" class="block w-full shadow-sm border-none rounded-3xl  pl-11 pr-2 py-2 focus:outline-none bg-gray-50 text-sm text-gray-700 placeholder-gray-500" placeholder="Search">
            </div>
            <div class="lg:ml-5 ml-auto relative text-left">

                <?php if (isset($_SESSION['Auth']) && $_SESSION['Auth']) : ?>
                    <div x-data="{ isOpen: false }">
                        <button @click="isOpen = !isOpen" type="button" class="inline-flex w-full items-center justify-center gap-x-1.5 pe-3 py-2 text-sm font-semibold text-gray-900" id="menu-button" aria-expanded="true" aria-haspopup="true">
                            <img src="public/img/admin-1.jpg" alt="" class="w-8 h-8 rounded-2xl object-cover mr-2">
                            <span class="text-sm font-semibold inline-flex">Echafai</span>
                            <svg x-bind:class="{ 'transform rotate-180': isOpen }" class="-mr-1 h-5 w-5 text-gray-400 transition-transform" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="isOpen" @click.away="isOpen = false" class="absolute right-0 z-10 mt-2 w-36 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Profile</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Settings</a>
                                <form method="POST" action="logout" role="none">
                                    <button type="submit" class="text-gray-700 block w-full px-4 py-2 text-left text-sm" role="menuitem" tabindex="-1" id="menu-item-3">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <a href="signup" class=" text-sm font-semibold hover:text-blue-500 transition flex items-center">
                        <span class="mr-2"><i class="far fa-user"></i></span>
                        Login/Register
                    </a>
                <?php endif; ?>

            </div>
            <div class="text-xl text-gray-700 cursor-pointer ml-4 xl:hidden block hover:text-blue-500 transition" id="open_sidebar">
                <i class="fas fa-bars"></i>
            </div>
            <!-- searchbar end -->

        </div>
    </nav>