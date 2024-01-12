  <!-- Header -->
  <?php include("includes/header.php"); ?>
  <!-- main -->
  <main class="pt-12 bg-gray-100 pb-12">
    <div class="container mx-auto px-4 flex flex-wrap lg:flex-nowrap">
      <!-- left sidebar -->
      <?php include("includes/sidebar/left.php") ?>

      <!-- Main content -->
      <div class="xl:w-6/12 lg:w-9/12 w-full  xl:ml-6 lg:mr-6">


        <!-- big post -->
        <?php foreach ($wikis as $wiki) : ?>
          <?php if (!isset($_SESSION['Auth']) && $_SESSION['Auth']) : ?>
            <!-- Main side -->
            <div class="flex-1 mb-5">
              <!-- Create post -->
              <div class="bg-white create-post">
                <!-- Create input -->
                <div class="create-input pl-5  p-4 flex items-center">
                  <img src="public/img/<?= $_SESSION['user_image'] ?>" alt="" class="cursor-pointer w-12 h-12 rounded-full mr-3">
                  <a href="addwiki" class="text-xs font-semibold w-full">Post an Article</a>
                </div>
                <!-- Create post links -->
                <div class="flex text-sm text-gray-600">
                  <li class="list-none border-t border-r border-gray-300 flex-1 p-2 cursor-pointer">
                    <a href="addwiki" class="flex items-center justify-center"><img src="public/img/photo.png" alt="" class="w-5 h-5 mr-2"> Photo</a>
                  </li>
                  <li class="list-none border-t border-r border-gray-300 flex-1 p-2 cursor-pointer">
                    <a href="addwiki" class="flex items-center justify-center"><img src="public/img/video.png" alt="" class="w-5 h-5 mr-2"> Video</a>
                  </li>
                  <li class="list-none border-t border-r border-gray-300 flex-1 p-2 cursor-pointer">
                    <a href="addwiki" class="flex items-center justify-center"><img src="public/img/event.png" alt="" class="w-5 h-5 mr-2"> Event</a>
                  </li>
                  <li class="list-none border-t flex-1 p-2 bg-blue-500 text-white cursor-pointer">
                    <a href="addwiki" class="flex items-center justify-center">Post</a>
                  </li>
                </div>
              </div>
            </div>

          <?php else : ?>
            <!-- title -->
            <div class="relative flex bg-white px-3 py-2 justify-between items-center rounded-sm mb-5">
              <h5 class="text-base uppercase font-semibold font-roboto"><?php echo $wiki->getCategoryName(); ?></h5>

              <div x-data="{ isOpen: false }">
                <button @click="isOpen = !isOpen" type="button" class="text-white py-2 px-3 rounded-sm uppercase text-xs font-semibold bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition" id="menu-button" aria-expanded="true" aria-haspopup="true">
                  more option
                </button>
                <div x-show="isOpen" @click.away="isOpen = false" class="absolute right-0 z-10 mt-2.5 w-36 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                  <div class="py-1" role="none">
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Pin wiki</a>
                    <a href="edit?id=<?= base64_encode($wiki->getId()) ?>" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Edit wiki</a>
                    <button data-modal-target="<?php echo $wiki->getId(); ?>" data-modal-toggle="<?php echo $wiki->getId(); ?>" class="text-gray-700 block w-full px-4 py-2 text-left text-sm" type="button">Delete wiki</button>
                  </div>
                </div>
              </div>
              <!-- Delete Tag Model -->
              <div id="<?php echo $wiki->getId(); ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                  <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="<?php echo $wiki->getId(); ?>">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                      </svg>
                      <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                      <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                      <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this Wiki?</h3>
                      <a href="deleteWiki?id=<?php echo $wiki->getId(); ?>" data-modal-hide="<?php echo $wiki->getId(); ?>" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">Yes, I'm sure</a>
                      <button data-modal-hide="<?php echo $wiki->getId(); ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <div id="searchResults" class="rounded-sm overflow-hidden bg-white shadow-sm">
            <a href="wiki-detail?id=<?= base64_encode($wiki->getId()) ?>" class="block rounded-md overflow-hidden">
              <img src="public/img/<?php echo $wiki->getImage() ?>" class="w-full h-96 object-cover transform hover:scale-110 transition duration-500" alt="">
            </a>
            <div class="p-4 pb-5">
              <a href="wiki-detail?id=<?= base64_encode($wiki->getId()) ?>">
                <h2 class="block text-xl font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                  <?= (strlen($wiki->getTitle()) > 150 ? substr($wiki->getTitle(), 0, 150) . '....' : $wiki->getTitle()) ?>
                </h2>
              </a>

              <p class="text-gray-500 text-sm mt-2">
                <?= (strlen($wiki->getContent()) > 200 ? substr($wiki->getContent(), 0, 200) . '....' : $wiki->getContent()) ?>
              </p>
              <div class="mt-3 flex space-x-4">
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-2 text-xs">
                    <img src="public/img/<?= $wiki->getAuthorImage() ?>" alt="" class="w-6 h-6 rounded-2xl object-cover">
                  </span>
                  <?php echo $wiki->getAuthorName() ?>
                </div>
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-2 text-xs">
                    <i class="far fa-clock"></i>
                  </span>
                  <?php echo $wiki->getCreatedAt() ?>
                </div>
              </div>
            </div>
          </div>
        <?php break;
        endforeach; ?>

        <!-- title -->
        <div class="flex bg-white px-3 py-2 justify-between items-center rounded-sm mt-8">
          <h5 class="text-base uppercase font-semibold font-roboto">Related post</h5>
          <a href="#" class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition">
            see more
          </a>
        </div>

        <!-- regular post -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mt-4">
          <div class="rounded-sm bg-white p-3 pb-5 shadow-sm">
            <a href="#" class="block rounded-md overflow-hidden">
              <img src="public/img/img-7.jpg" class="w-full h-40 object-cover transform hover:scale-110 transition duration-500">
            </a>
            <div class="mt-3">
              <a href="#">
                <h2 class="block text-base font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                  Lorem, ipsum dolor amet sit consec tetur elit.
                </h2>
              </a>
              <div class="mt-2 flex space-x-3">
                <div class="flex text-gray-400 text-xs items-center">
                  <span class="mr-1 text-xs">
                    <i class="far fa-user"></i>
                  </span>
                  Blogging Tips
                </div>
                <div class="flex text-gray-400 text-xs items-center">
                  <span class="mr-1 text-xs">
                    <i class="far fa-clock"></i>
                  </span>
                  June 11, 2021
                </div>
              </div>
            </div>
          </div>
          <div class="rounded-sm bg-white p-3 pb-5 shadow-sm">
            <a href="#" class="block rounded-md overflow-hidden">
              <img src="public/img/img-5.jpg" class="w-full h-40 object-cover transform hover:scale-110 transition duration-500">
            </a>
            <div class="mt-3">
              <a href="#">
                <h2 class="block text-base font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                  Lorem, ipsum dolor amet sit consec tetur elit.
                </h2>
              </a>
              <div class="mt-2 flex space-x-3">
                <div class="flex text-gray-400 text-xs items-center">
                  <span class="mr-1 text-xs">
                    <i class="far fa-user"></i>
                  </span>
                  Blogging Tips
                </div>
                <div class="flex text-gray-400 text-xs items-center">
                  <span class="mr-1 text-xs">
                    <i class="far fa-clock"></i>
                  </span>
                  June 11, 2021
                </div>
              </div>
            </div>
          </div>
          <div class="rounded-sm bg-white p-3 pb-5 shadow-sm hidden md:block">
            <a href="#" class="block rounded-md overflow-hidden">
              <img src="public/img/img-6.jpg" class="w-full h-40 object-cover transform hover:scale-110 transition duration-500">
            </a>
            <div class="mt-3">
              <a href="#">
                <h2 class="block text-base font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                  Lorem, ipsum dolor amet sit consec tetur elit.
                </h2>
              </a>
              <div class="mt-2 flex space-x-3">
                <div class="flex text-gray-400 text-xs items-center">
                  <span class="mr-1 text-xs">
                    <i class="far fa-user"></i>
                  </span>
                  Blogging Tips
                </div>
                <div class="flex text-gray-400 text-xs items-center">
                  <span class="mr-1 text-xs">
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