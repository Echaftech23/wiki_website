<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tail-Blog</title>
  <link rel="stylesheet" href="../public/css/fontawesome-all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="../public/css/tailwind.css" rel="stylesheet">
</head>


<body class="font-poppins text-gray-600">
  <!-- Header -->
  <?php include("includes/header.php") ?>

  <!-- main -->
  <main class="pt-12 bg-gray-100 pb-12">
    <div class="container mx-auto px-4 flex flex-wrap lg:flex-nowrap">
      <!-- left sidebar -->
      <div class="w-3/12 hidden xl:block">
        <!-- categories -->
        <div class="w-full bg-white shadow-sm rounded-sm p-4 ">
          <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Categories</h3>
          <div class="space-y-2">
            <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
              <span class="mr-2">
                <i class="far fa-folder-open"></i>
              </span>
              <span>Beauti</span>
              <p class="ml-auto font-normal">(12)</p>
            </a>
            <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
              <span class="mr-2">
                <i class="far fa-folder-open"></i>
              </span>
              <span>Business</span>
              <p class="ml-auto font-normal">(15)</p>
            </a>
            <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
              <span class="mr-2">
                <i class="far fa-folder-open"></i>
              </span>
              <span>Fashion</span>
              <p class="ml-auto font-normal">(5)</p>
            </a>
            <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
              <span class="mr-2">
                <i class="far fa-folder-open"></i>
              </span>
              <span>Food</span>
              <p class="ml-auto font-normal">(10)</p>
            </a>
            <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
              <span class="mr-2">
                <i class="far fa-folder-open"></i>
              </span>
              <span>Learn</span>
              <p class="ml-auto font-normal">(3)</p>
            </a>
            <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
              <span class="mr-2">
                <i class="far fa-folder-open"></i>
              </span>
              <span>Music</span>
              <p class="ml-auto font-normal">(7)</p>
            </a>
            <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
              <span class="mr-2">
                <i class="far fa-folder-open"></i>
              </span>
              <span>Nature</span>
              <p class="ml-auto font-normal">(0)</p>
            </a>
            <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
              <span class="mr-2">
                <i class="far fa-folder-open"></i>
              </span>
              <span>People</span>
              <p class="ml-auto font-normal">(13)</p>
            </a>
            <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
              <span class="mr-2">
                <i class="far fa-folder-open"></i>
              </span>
              <span>Sports</span>
              <p class="ml-auto font-normal">(7)</p>
            </a>
            <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
              <span class="mr-2">
                <i class="far fa-folder-open"></i>
              </span>
              <span>Technology</span>
              <p class="ml-auto font-normal">(17)</p>
            </a>
          </div>
        </div>

        <!-- random posts -->
        <div class="w-full mt-8 bg-white shadow-sm rounded-sm p-4 ">
          <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Random Posts</h3>
          <div class="space-y-4">
            <a href="#" class="flex group">
              <div class="flex-shrink-0">
                <img src="../public/img/img-1.jpg" class="h-14 w-20 rounded object-cover" alt="">
              </div>
              <div class="flex-grow pl-3">
                <h5 class="leading-5 block font-roboto font-semibold  transition group-hover:text-blue-500">
                  Team Bitbose geared up to attend Blockchain
                </h5>
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-1 text-xs"><i class="far fa-clock"></i></span>
                  June 11, 2021
                </div>
              </div>
            </a>
            <a href="#" class="flex group">
              <div class="flex-shrink-0">
                <img src="../public/img/img-2.jpg" class="h-14 w-20 rounded object-cover" alt="">
              </div>
              <div class="flex-grow pl-3">
                <h5 class="leading-5 block font-roboto font-semibold  transition group-hover:text-blue-500">
                  After a Caribbean Hurricane, the Battle
                </h5>
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-1 text-xs"><i class="far fa-clock"></i></span>
                  March 27, 2021
                </div>
              </div>
            </a>
            <a href="#" class="flex group">
              <div class="flex-shrink-0">
                <img src="../public/img/img-3.jpg" class="h-14 w-20 rounded object-cover" alt="">
              </div>
              <div class="flex-grow pl-3">
                <h5 class="leading-5 block font-roboto font-semibold  transition group-hover:text-blue-500">
                  California sheriff’s deputy shot during ‘ambush’
                </h5>
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-1 text-xs"><i class="far fa-clock"></i></span>
                  Aprile 17, 2021
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>

      <!-- Main content -->
      <div class="xl:w-6/12 lg:w-9/12 w-full  xl:ml-6 lg:mr-6">

        <!-- title -->
        <div class="flex bg-white px-3 py-2 justify-between items-center rounded-sm mb-5">
          <h5 class="text-base uppercase font-semibold font-roboto">BUSINESS</h5>
          <a href="#" class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition">
            see more
          </a>
        </div>

        <!-- big post -->
        <div class="rounded-sm overflow-hidden bg-white shadow-sm">
          <a href="view.html" class="block rounded-md overflow-hidden">
            <img src="../public/img/img-12.jpg" class="w-full h-96 object-cover transform hover:scale-110 transition duration-500" alt="">
          </a>
          <div class="p-4 pb-5">
            <a href="view.html">
              <h2 class="block text-xl font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iddo loremque, totam
                architecto odit pariatur Lorem ips dolor.
              </h2>
            </a>

            <p class="text-gray-500 text-sm mt-2">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem distinctio doloremque
              placeat ipsa! Sequi, recusandae. In numquam similique molestiae error, magni velit suscipit
              repudiandae itaqu....
            </p>
            <div class="mt-3 flex space-x-4">
              <div class="flex text-gray-400 text-sm items-center">
                <span class="mr-2 text-xs">
                  <i class="far fa-user"></i>
                </span>
                Blogging Tips
              </div>
              <div class="flex text-gray-400 text-sm items-center">
                <span class="mr-2 text-xs">
                  <i class="far fa-clock"></i>
                </span>
                June 11, 2021
              </div>
            </div>
          </div>
        </div>

        <!-- regular post -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
          <div class="rounded-sm bg-white p-4 pb-5 shadow-sm">
            <a href="#" class="block rounded-md overflow-hidden">
              <img src="../public/img/img-7.jpg" class="w-full h-60 object-cover transform hover:scale-110 transition duration-500" alt="">
            </a>
            <div class="mt-3">
              <a href="#">
                <h2 class="block text-lg font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                  Lorem, ipsum dolor sit amet consec tetur adipisicing elit.
                </h2>
              </a>
              <div class="mt-2 flex space-x-3">
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-2 text-xs">
                    <i class="far fa-user"></i>
                  </span>
                  Blogging Tips
                </div>
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-2 text-xs">
                    <i class="far fa-clock"></i>
                  </span>
                  June 11, 2021
                </div>
              </div>
            </div>
          </div>
          <div class="rounded-sm bg-white p-4 pb-5 shadow-sm">
            <a href="#" class="block rounded-md overflow-hidden">
              <img src="../public/img/img-6.jpg" class="w-full h-60 object-cover transform hover:scale-110 transition duration-500" alt="">
            </a>
            <div class="mt-3">
              <a href="#">
                <h2 class="block text-lg font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                  Lorem, ipsum dolor sit amet consec tetur adipisicing elit.
                </h2>
              </a>
              <div class="mt-2 flex space-x-3">
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-2 text-xs">
                    <i class="far fa-user"></i>
                  </span>
                  Blogging Tips
                </div>
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-2 text-xs">
                    <i class="far fa-clock"></i>
                  </span>
                  June 11, 2021
                </div>
              </div>
            </div>
          </div>
          <div class="rounded-sm bg-white p-4 pb-5 shadow-sm">
            <a href="#" class="block rounded-md overflow-hidden">
              <img src="../public/img/img-5.jpg" class="w-full h-60 object-cover transform hover:scale-110 transition duration-500" alt="">
            </a>
            <div class="mt-3">
              <a href="#">
                <h2 class="block text-lg font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                  Lorem, ipsum dolor sit amet consec tetur adipisicing elit.
                </h2>
              </a>
              <div class="mt-2 flex space-x-3">
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-2 text-xs">
                    <i class="far fa-user"></i>
                  </span>
                  Blogging Tips
                </div>
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-2 text-xs">
                    <i class="far fa-clock"></i>
                  </span>
                  June 11, 2021
                </div>
              </div>
            </div>
          </div>
          <div class="rounded-sm bg-white p-4 pb-5 shadow-sm">
            <a href="#" class="block rounded-md overflow-hidden">
              <img src="../public/img/img-11.jpg" class="w-full h-60 object-cover transform hover:scale-110 transition duration-500" alt="">
            </a>
            <div class="mt-3">
              <a href="#">
                <h2 class="block text-lg font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                  Lorem, ipsum dolor sit amet consec tetur adipisicing elit.
                </h2>
              </a>
              <div class="mt-2 flex space-x-3">
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-2 text-xs">
                    <i class="far fa-user"></i>
                  </span>
                  Blogging Tips
                </div>
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-2 text-xs">
                    <i class="far fa-clock"></i>
                  </span>
                  June 11, 2021
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- right sidebar -->
      <div class="lg:w-3/12 w-full mt-8 lg:mt-0">
        <!-- Social plugin -->
        <div class="w-full bg-white shadow-sm rounded-sm p-4 ">
          <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Social Plugin</h3>
          <div class="flex gap-2">
            <a href="#" class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
              <i class="fab fa-pinterest-p"></i>
            </a>
            <a href="#" class="w-8 h-8 rounded-sm flex items-center justify-center border border-gray-400 text-base text-gray-800">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>

        <!-- Popular posts -->
        <div class="w-full mt-8 bg-white shadow-sm rounded-sm p-4 ">
          <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Popular Posts</h3>
          <div class="space-y-4">
            <a href="#" class="flex group">
              <div class="flex-shrink-0">
                <img src="../public/img/img-5.jpg" class="h-14 w-20 lg:w-14 xl:w-20 rounded object-cover" alt="">
              </div>
              <div class="flex-grow pl-3">
                <h5 class="leading-5 block font-roboto font-semibold  transition group-hover:text-blue-500">
                  Team Bitbose geared up to attend Blockchain
                </h5>
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-1 text-xs"><i class="far fa-clock"></i></span>
                  June 11, 2021
                </div>
              </div>
            </a>
            <a href="#" class="flex group">
              <div class="flex-shrink-0">
                <img src="../public/img/img-9.jpg" class="h-14 w-20 lg:w-14 xl:w-20 rounded object-cover" alt="">
              </div>
              <div class="flex-grow pl-3">
                <h5 class="leading-5 block font-roboto font-semibold  transition group-hover:text-blue-500">
                  After a Caribbean Hurricane, the Battle
                </h5>
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-1 text-xs"><i class="far fa-clock"></i></span>
                  March 27, 2021
                </div>
              </div>
            </a>
            <a href="#" class="flex group">
              <div class="flex-shrink-0">
                <img src="../public/img/img-8.jpg" class="h-14 w-20 lg:w-14 xl:w-20 rounded object-cover" alt="">
              </div>
              <div class="flex-grow pl-3">
                <h5 class="leading-5 block font-roboto font-semibold  transition group-hover:text-blue-500">
                  California sheriff’s deputy shot during ‘ambush’
                </h5>
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-1 text-xs"><i class="far fa-clock"></i></span>
                  Aprile 17, 2021
                </div>
              </div>
            </a>
          </div>
        </div>

        <!-- tag -->
        <!-- categories -->
        <div class="w-full bg-white shadow-sm rounded-sm p-4  mt-8">
          <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Tags</h3>
          <div class="flex items-center flex-wrap gap-2">
            <a href="#" class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white">Beauti</a>
            <a href="#" class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white">Sports</a>
            <a href="#" class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white">Business</a>
            <a href="#" class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white">Politics</a>
            <a href="#" class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white">Computer</a>
            <a href="#" class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white">Coding</a>
            <a href="#" class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white">Web
              Design</a>
            <a href="#" class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white">Web
              App</a>
          </div>
        </div>
      </div>

    </div>
  </main>

  <!-- mobile menu -->
  <div class="fixed w-full h-full bg-black bg-opacity-25 left-0 top-0 z-10 opacity-0 invisible transition-all duration-500 xl:hidden" id="sidebar_wrapper">
    <div class="fixed top-0 w-72 h-full bg-white shadow-md z-10 flex flex-col transition-all duration-500 -left-80" id="sidebar">

      <!-- search and menu -->
      <div class="lg:hidden">
        <!-- searchbar -->
        <div class="relative mx-3 mt-3 shadow-sm">
          <span class="absolute left-3 top-2 text-sm text-gray-500">
            <i class="fas fa-search"></i>
          </span>
          <input type="text" class="block w-full shadow-sm border-none rounded-3xl  pl-11 pr-2 py-2 focus:outline-none bg-gray-50 text-sm text-gray-700 placeholder-gray-500" placeholder="Search">
        </div>

        <!-- navlink -->
        <h3 class="text-xl font-semibold text-gray-700 mb-1 font-roboto pl-3 pt-3">Menu</h3>
        <div class="">
          <a href="index.html" class="flex px-4 py-1 uppercase items-center font-semibold text-sm  transition hover:text-blue-500">
            <span class="w-6">
              <i class="fas fa-home"></i>
            </span>
            Home
          </a>
          <a href="#" class="flex px-4 py-1 uppercase items-center font-semibold text-sm  transition hover:text-blue-500">
            <span class="w-6">
              <i class="far fa-file-alt"></i>
            </span>
            About
          </a>
          <a href="#" class="flex px-4 py-1 uppercase items-center font-semibold text-sm  transition hover:text-blue-500">
            <span class="w-6">
              <i class="fas fa-phone"></i>
            </span>
            Contact
          </a>
        </div>
        <!-- navlinks end -->
      </div>

      <!-- categories -->
      <div class="w-full mt-3 px-4 ">
        <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Categories</h3>
        <div class="space-y-2">
          <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
            <span class="mr-2">
              <i class="far fa-folder-open"></i>
            </span>
            <span>Beauti</span>
            <p class="ml-auto font-normal">(12)</p>
          </a>
          <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
            <span class="mr-2">
              <i class="far fa-folder-open"></i>
            </span>
            <span>Business</span>
            <p class="ml-auto font-normal">(15)</p>
          </a>
          <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
            <span class="mr-2">
              <i class="far fa-folder-open"></i>
            </span>
            <span>Fashion</span>
            <p class="ml-auto font-normal">(5)</p>
          </a>
          <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
            <span class="mr-2">
              <i class="far fa-folder-open"></i>
            </span>
            <span>Food</span>
            <p class="ml-auto font-normal">(10)</p>
          </a>
          <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
            <span class="mr-2">
              <i class="far fa-folder-open"></i>
            </span>
            <span>Learn</span>
            <p class="ml-auto font-normal">(3)</p>
          </a>
          <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
            <span class="mr-2">
              <i class="far fa-folder-open"></i>
            </span>
            <span>Music</span>
            <p class="ml-auto font-normal">(7)</p>
          </a>
          <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
            <span class="mr-2">
              <i class="far fa-folder-open"></i>
            </span>
            <span>Nature</span>
            <p class="ml-auto font-normal">(0)</p>
          </a>
          <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
            <span class="mr-2">
              <i class="far fa-folder-open"></i>
            </span>
            <span>People</span>
            <p class="ml-auto font-normal">(13)</p>
          </a>
          <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
            <span class="mr-2">
              <i class="far fa-folder-open"></i>
            </span>
            <span>Sports</span>
            <p class="ml-auto font-normal">(7)</p>
          </a>
          <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
            <span class="mr-2">
              <i class="far fa-folder-open"></i>
            </span>
            <span>Technology</span>
            <p class="ml-auto font-normal">(17)</p>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- footer -->
  <?php include("includes/footer.php") ?>