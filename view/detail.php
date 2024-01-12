<!-- Header -->
<?php include("includes/header.php") ?>

<!-- main -->
<main class="pt-12 bg-gray-100 pb-12">
    <div class="container mx-auto px-4 flex flex-wrap lg:flex-nowrap">
        <!-- left sidebar -->
        <?php include("includes/sidebar/left.php") ?>

        <!-- Main content -->
        <div class="xl:w-6/12 lg:w-9/12 w-full  xl:ml-6 lg:mr-6">
            <!-- title -->
            <div class="flex bg-white px-3 py-2 justify-between items-center rounded-sm mb-5">
                <h5 class="text-base uppercase font-semibold font-roboto">BUSINESS</h5>
                <div class="">
                    <a href="#" class="text-white py-1 px-3 rounded-sm uppercase text-xs font-semibold bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition">
                        more option
                    </a>
                </div>

            </div>
            <!-- post view -->
            <div class="rounded-sm overflow-hidden bg-white shadow-sm">
                <div class="">
                    <img src="public/img/<?php echo $wiki->getImage() ?>" class="w-full h-96 object-cover">
                </div>
                <div class="p-4 pb-5">
                    <h2 class="block text-2xl font-semibold text-gray-700 font-roboto">
                        <?= $wiki->getTitle() ?>
                    </h2>
                    <div class="mt-2 flex space-x-4">
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

                    <p class="text-gray-500 text-sm mt-5">
                        <?= $wiki->getContent() ?>
                    </p>

                    <p class="bg-green-50 border border-green-500 p-3 text-sm  mt-5">
                        <span class="text-xl mr-1 text-gray-400"><i class="fas fa-quote-left"></i></span>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus blanditiis earum nam,
                        quisquam magnam aut odio aliquam inventore quibusdam mollitia! Alias, mollitia eveniet iure
                        quidem natus quis assumenda consectetur beatae.
                        Lorem, ipsum dolor quibusdam.
                        <span class="text-xl ml-1 text-gray-400"><i class="fas fa-quote-right"></i></span>
                    </p>

                    <?php $tagsTable = $wiki->getTags() ?>
                    <div class="flex items-center flex-wrap gap-2 mt-5">
                            <?php foreach ($tagsTable as $tag) : ?>
                                <a href="#" class="px-3 py-1  text-sm border border-gray-200 rounded-sm transition hover:bg-blue-500 hover:text-white"><?php echo $tag ?></a>
                            <?php endforeach; ?>
                    </div>

                    <div class="mt-5 pt-5 border-t border-gray-200 flex gap-2">
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
            </div>

            <!-- title -->
            <div class="flex bg-white px-3 py-2 justify-between items-center rounded-sm mt-8">
                <h5 class="text-base uppercase font-semibold font-roboto">Related post</h5>
                <a href="#" class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition">
                    see more
                </a>
            </div>

            <!-- similer post -->
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