  <!-- Header -->
  <?php include("includes/header.php") ?>

  <!-- main -->
  <main class="pt-12 bg-gray-100 pb-12">
    <div class="container mx-auto px-4 flex flex-wrap lg:flex-nowrap">
      <!-- left sidebar -->
      <?php include("includes/sidebar/left.php") ?>

      <!-- Main content -->
      <div class="xl:w-6/12 lg:w-9/12 w-full  xl:ml-6 lg:mr-6">

        <?php if (isset($_SESSION['Auth']) && $_SESSION['Auth']) : ?>
          <!-- Main side -->
          <div class="flex-1 mb-5">
            <!-- Create post -->
            <div class="bg-white create-post">
              <!-- Create input -->
              <div class="create-input pl-5  p-4 flex items-center">
                <img src="public/img/<?= $_SESSION['user_image'] ?>" alt="" class="w-12 h-12 rounded-full mr-3">
                <a href="addatricle" class="text-xs font-semibold ">Post an Article</a>
              </div>
              <!-- Create post links -->
              <div class="flex text-sm text-gray-600">
                <li class="flex items-center justify-center border-t border-r border-gray-300 flex-1 p-2 cursor-pointer">
                  <img src="public/img/photo.png" alt="" class="w-5 h-5 mr-2"> Photo
                </li>
                <li class="flex items-center justify-center border-t border-r border-gray-300 flex-1 p-2 cursor-pointer">
                  <img src="public/img/video.png" alt="" class="w-5 h-5 mr-2"> Video
                </li>
                <li class="flex items-center justify-center border-t border-r border-gray-300 flex-1 p-2 cursor-pointer">
                  <img src="public/img/event.png" alt="" class="w-5 h-5 mr-2"> Event
                </li>
                <li class="flex items-center   justify-center border-t flex-1 p-2 bg-blue-500 text-white cursor-pointer">
                  Post
                </li>
              </div>
            </div>
          </div>

        <?php else : ?>
          <!-- title -->
          <div class="flex bg-white px-3 py-2 justify-between items-center rounded-sm mb-5">
            <h5 class="text-base uppercase font-semibold font-roboto">BUSINESS</h5>
            <a href="#" class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition">
              see more
            </a>
          </div>
        <?php endif; ?>
        <!-- big post -->
        <div class="rounded-sm overflow-hidden bg-white shadow-sm">
          <a href="wiki-detail" class="block rounded-md overflow-hidden">
            <img src="public/img/img-12.jpg" class="w-full h-96 object-cover transform hover:scale-110 transition duration-500" alt="">
          </a>
          <div class="p-4 pb-5">
            <a href="wiki-detail">
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
              <img src="public/img/img-7.jpg" class="w-full h-60 object-cover transform hover:scale-110 transition duration-500" alt="">
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
              <img src="public/img/img-6.jpg" class="w-full h-60 object-cover transform hover:scale-110 transition duration-500" alt="">
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
              <img src="public/img/img-5.jpg" class="w-full h-60 object-cover transform hover:scale-110 transition duration-500" alt="">
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
              <img src="public/img/img-11.jpg" class="w-full h-60 object-cover transform hover:scale-110 transition duration-500" alt="">
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
      <?php include("includes/sidebar/right.php") ?>

    </div>
  </main>

  <!-- mobile menu -->
  <?php include("includes/mobile/mobile-menu.php") ?>

  <!-- footer -->
  <?php include("includes/footer.php") ?>