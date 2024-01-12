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
                      <label for="fileInput" class="block rounded-md overflow-hidden cursor-pointer">
                          <img id="thumbnailPreview" src="public/img/wiki-thumbnail.svg" class="w-full h-60 md:h-96 object-cover transform hover:scale-110 transition duration-500" alt="">
                          <input type="file" name="image" id="fileInput" class="hidden" onchange="previewImage(this)">
                      </label>
                      <div class="p-4 pb-5">
                          <div class="flex w-full justify-end">
                              <div class="flex text-gray-400">
                                  <button data-modal-target="addCategory" data-modal-toggle="addCategory" name="addwiki" type="button" class="font-medium text-xs text-white bg-black border border-black dark:border-black px-4 py-1 rounded-3xl shadow-md transition duration-300 ease-in-out hover:bg-black  mr-2">
                                      Category
                                  </button>

                                  <!-- Add Category  modal -->
                                  <div id="addCategory" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                      <div class="relative p-4 w-full max-w-md max-h-full">
                                          <!-- Modal content -->
                                          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                              <!-- Modal header -->
                                              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                      Category Section
                                                  </h3>
                                                  <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="addCategory">
                                                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                      </svg>
                                                      <span class="sr-only">Close modal</span>
                                                  </button>
                                              </div>
                                              <!-- Modal body -->
                                              <div class="p-4 md:p-5">
                                                  <form class="space-y-4" action="addwiki#" method="post" enctype="multipart/form-data">
                                                      <div class="flex">
                                                          <span class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                                                              Category
                                                          </span>
                                                          <label for="category" class="sr-only">Select Category</label>
                                                          <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-e-lg border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                              <?php foreach ($categories as $category) : ?>
                                                                  <option value="<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></option>
                                                              <?php endforeach; ?>
                                                          </select>
                                                      </div>

                                                      <button data-modal-hide="addCategory" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                                      <button data-modal-hide="addCategory" id="submitCategoryBtn" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 m-2 ml-0">Submit</button>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <button data-modal-target="addTags" data-modal-toggle="addTags" name="addwiki" type="button" class="font-medium text-xs text-white bg-green-500 border border-green-600 dark:border-green-500 px-4 py-1 rounded-3xl shadow-md transition duration-300 ease-in-out hover:bg-green-600 dark:hover:bg-green-400">
                                      Tags
                                  </button>

                                  <!-- Add Tag  modal -->
                                  <div id="addTags" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                      <div class="relative p-4 w-full max-w-md max-h-full">
                                          <!-- Modal content -->
                                          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                              <!-- Modal header -->
                                              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                      Select Tag
                                                  </h3>
                                                  <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="addTags">
                                                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                      </svg>
                                                      <span class="sr-only">Close modal</span>
                                                  </button>
                                              </div>
                                              <!-- Modal body -->
                                              <div class="p-4 md:p-5">
                                                  <form class="space-y-4" action="addwiki#" method="post" enctype="multipart/form-data">
                                                      <div class="flex">
                                                          <select id="tags" size="5" name="tags[]" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                              <?php foreach ($tags as $tag) : ?>
                                                                  <option value="<?php echo $tag->getId(); ?>"><?php echo $tag->getName(); ?></option>
                                                              <?php endforeach; ?>
                                                          </select>
                                                      </div>

                                                      <button data-modal-hide="addTags" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                                      <button data-modal-hide="addTags" id="submitTagBtn" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 m-2 ml-0">Submit</button>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <textarea rows="2" name="title" placeholder="Title of Your Article" class="w-full border-0 outline-none focus:ring-0 resize-none block  text-xl  md:text-3xl md:font-semibold font-semibold text-gray-700 hover:text-blue-500 transition font-roboto"></textarea>
                          <textarea rows="5" name="content" placeholder="Add the Description of The Article" class="w-full border-0 outline-none focus:ring-0  block text-gray-500 text-sm"></textarea>

                          <div id="selectedCategory"></div>
                          <div id="selectedTags"></div>

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