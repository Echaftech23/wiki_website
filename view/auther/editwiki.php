  <!-- Header -->
  <?php include("../../view/includes/header.php") ?>

  <!-- main -->
  <main class="pt-12 bg-gray-100 pb-12">
      <div class="container mx-auto px-4 flex items-center justify-center  lg:flex-nowrap">
          <!-- Main content -->
          <div class="xl:w-6/12 lg:w-9/12 w-full  xl:ml-6 lg:mr-6">

              <!-- big post -->
              <div class="rounded-sm rounded-t-md overflow-hidden bg-white shadow-sm">

                  <form action="addWiki" method="post" enctype="multipart/form-data">
                      <a href="detail.php" class="block rounded-md overflow-hidden">
                          <img src="public/img/<?php echo $wiki->getImage(); ?>" class="w-full h-96 object-cover transform hover:scale-110 transition duration-500" alt="">
                      </a>
                      <div class="p-4 pb-5">

                          <textarea rows="2" name="title" placeholder="Title of Your Article" class="w-full border-0 outline-none resize-none block text-3xl font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                                <?php echo $wiki->getTitle(); ?>
                          </textarea>
                          <textarea rows="5" name="content" placeholder="Add the Description of The Article" class="w-full border-0 outline-none  block text-gray-500 text-sm">
                                <?php echo $wiki->getContent(); ?>
                          </textarea>

                          <div class="mt-3 flex items-center justify-between space-x-4">
                              <div class="flex text-gray-400 text-sm items-center">
                                  <span class="mr-2 text-xs">
                                      <img src="public/img/<?= $_SESSION['user_image'] ?>" alt="" class="w-6 h-6 rounded-2xl object-cover">
                                  </span>
                                  <?php echo $_SESSION['Auth_username'] ?>

                              </div>
                              <button name="addwiki" type="submit" class="font-medium text-white bg-blue-500 border border-blue-600 dark:border-blue-500 px-4 py-1 rounded-3xl shadow-md transition duration-300 ease-in-out hover:bg-blue-600 dark:hover:bg-blue-400">
                                  Post
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </main>

  <!-- mobile menu -->
  <?php include("../../view/includes/mobile/mobile-menu.php") ?>

  <!-- footer -->
  <?php include("../../view/includes/footer.php") ?>