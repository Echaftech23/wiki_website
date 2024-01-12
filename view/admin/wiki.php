    <!-- start: Sidebar -->
    <?php include("../../view/includes/sidebar/admin.php") ?>

    <!-- start: Main -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">

        <?php include("../../view/includes/admin/header.php") ?>

        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 mb-6">
                <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
                    <div class="flex justify-between mb-4 items-start">
                        <div class="font-medium">Wikis Details</div>
                        <div class="dropdown">
                            <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                            <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                <li>
                                    <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                        <div class="rounded-md border border-dashed border-gray-200 p-4">
                            <div class="flex items-center mb-0.5">
                                <div class="text-xl font-semibold">10</div>
                                <span class="p-1 rounded text-[12px] font-semibold bg-blue-500/10 text-blue-500 leading-none ml-1">80</span>
                            </div>
                            <span class="text-gray-400 text-sm">Total Wikis</span>
                        </div>
                        <div class="rounded-md border border-dashed border-gray-200 p-4">
                            <div class="flex items-center mb-0.5">
                                <div class="text-xl font-semibold">50</div>
                                <span class="p-1 rounded text-[12px] font-semibold bg-emerald-500/10 text-emerald-500 leading-none ml-1">+69</span>
                            </div>
                            <span class="text-gray-400 text-sm">Published</span>
                        </div>
                        <div class="rounded-md border border-dashed border-gray-200 p-4">
                            <div class="flex items-center mb-0.5">
                                <div class="text-xl font-semibold">4</div>
                                <span class="p-1 rounded text-[12px] font-semibold bg-rose-600/10 text-rose-500 leading-none ml-1">-$130</span>
                            </div>
                            <span class="text-gray-400 text-sm">Archived</span>
                        </div>
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Image</th>
                                    <th scope="col" class="px-6 py-4">ID</th>
                                    <th scope="col" class="px-6 py-4">Title</th>
                                    <th scope="col" class="px-6 py-4">Description</th>
                                    <th scope="col" class="px-6 py-4">Category</th>
                                    <th scope="col" class="px-6 py-4">Status</th>
                                    <th scope="col" class="px-6 py-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($wikis as $wiki) : ?>
                                    <tr class="bg-white  border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td scope="col" class="px-6 py-4"><img src="public/img/<?php echo $wiki->getImage(); ?>" alt="" class="w-8 h-8 rounded-2xl object-cover mr-2"></td>
                                        <td scope="col" class="px-6 py-4"><?php echo $wiki->getId(); ?></td>
                                        <td scope="col" class="px-6 py-4"><?= (strlen($wiki->getTitle()) > 20 ? substr($wiki->getTitle(), 0, 20) . '....' : $wiki->getTitle()) ?></td>
                                        <td scope="col" class="px-6 py-4"><?= (strlen($wiki->getContent()) > 20 ? substr($wiki->getContent(), 0, 20) . '....' : $wiki->getContent()) ?></td>
                                        <td scope="col" class="px-6 py-4"><?php echo $wiki->getCategoryName(); ?></td>
                                        <td scope="col" class="px-6 py-4">
                                            <span class="p-1 rounded text-[12px] font-semibold <?= ($wiki->getStatus() == 'Pending') ? 'bg-orange-600/10 text-orange-500 leading-none' : (($wiki->getStatus() == 'Accepted') ? 'bg-green-600/10 text-green-500 leading-none' : 'bg-red-600/10 text-red-500 leading-none') ?>;">
                                                <?php echo $wiki->getStatus(); ?>
                                            </span>
                                        </td>

                                        <td class="flex items-center px-6 py-6">
                                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end: Main -->

    <!-- footer -->
    <?php include("../../view/includes/admin/footer.php") ?>