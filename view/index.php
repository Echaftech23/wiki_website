  <!-- Header -->
  <?php include("includes/header.php");
  // echo "
  // <pre>"; var_dump($wikis->$auther_image);"</pre>"; 
  ?>
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
                <a href="addwiki" class="text-xs font-semibold ">Post an Article</a>
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
            <h5 class="text-base uppercase font-semibold font-roboto"><?php echo $wiki->getCategoryName(); ?></h5>
            <a href="#" class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition">
              see more
            </a>
          </div>
        <?php endif; ?>
        <!-- big post -->
        <?php foreach ($wikis as $wiki) : ?>
          <div class="rounded-sm overflow-hidden bg-white shadow-sm">
            <a href="wiki-detail" class="block rounded-md overflow-hidden">
              <img src="public/img/<?php echo $wiki->getImage(); ?>" class="w-full h-96 object-cover transform hover:scale-110 transition duration-500" alt="">
            </a>
            <div class="p-4 pb-5">
              <a href="wiki-detail">
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
                    <img src="public/img/<?= $wiki->getAuthorImage(); ?>" alt="" class="w-6 h-6 rounded-2xl object-cover">
                  </span>
                  <?php echo $wiki->getAuthorName(); ?>
                </div>
                <div class="flex text-gray-400 text-sm items-center">
                  <span class="mr-2 text-xs">
                    <i class="far fa-clock"></i>
                  </span>
                  <?php echo $wiki->getCreatedAt(); ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" data-aos="fade-left" id="searchResults">
          <?php foreach ($wikis as $wiki) : ?>
            <div class="col-span-1 md:col-span-2 lg:col-span-1">
              <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                <a href="wiki_details?id=<?= base64_encode($wiki['id']) ?>">
                  <?php if ($wiki['image']) : ?>
                    <img src="public/img/<?= $wiki['image'] ?>" alt="" class="w-full h-48 object-cover">
                  <?php else : ?>
                    <h1 class="message">Wait till Wikis Team Accept Your Wiki</h1>
                  <?php endif; ?>
                </a>
                <p class="title text-lg font-semibold mt-2">
                  <?= $wiki['title'] ?>
                </p>
                <p class="sub text-gray-600">
                  <?= $wiki['category_name'] ?>
                </p>
              </div>
            </div>
          <?php endforeach; ?>
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