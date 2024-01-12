<!-- left sidebar -->
<div class=" w-3/12 hidden xl:block">
    <!-- categories -->
    <div class="w-full bg-white shadow-sm rounded-sm p-4 ">
        <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Categories</h3>
        <div class="space-y-2">

            <?php foreach ($categories as $category) : ?>
                <a href="#" class="flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                    <span class="mr-2">
                        <i class="far fa-folder-open"></i>
                    </span>
                    <span><?= $category->getName(); ?></span>
                    <p class="ml-auto font-normal">(12)</p>
                </a>
            <?php endforeach; ?>
            
        </div>
    </div>

    <!-- random posts -->
    <div class="w-full mt-8 bg-white shadow-sm rounded-sm p-4 ">
        <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Random Posts</h3>
        <div class="space-y-4">
            <a href="#" class="flex group">
                <div class="flex-shrink-0">
                    <img src="public/img/img-1.jpg" class="h-14 w-20 rounded object-cover" alt="">
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
                    <img src="public/img/img-2.jpg" class="h-14 w-20 rounded object-cover" alt="">
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
                    <img src="public/img/img-3.jpg" class="h-14 w-20 rounded object-cover" alt="">
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