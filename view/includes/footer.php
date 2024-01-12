<footer class="border-t  py-4">
    <p class=" text-sm text-center">Copyright © 2024 <span class="font-semibold">Echaf Dev</span>
        All Rights Reserved</p>
</footer>

<script>
    document.querySelector('#open_sidebar').addEventListener('click', function() {
        document.querySelector('#sidebar').classList.remove('-left-80')
        document.querySelector('#sidebar').classList.add('left-0')
        document.querySelector('#sidebar_wrapper').classList.remove('opacity-0')
        document.querySelector('#sidebar_wrapper').classList.remove('invisible')
    })

    document.body.addEventListener('click', function(e) {
        if (e.target.id === 'sidebar_wrapper') {
            document.querySelector('#sidebar').classList.add('-left-80')
            document.querySelector('#sidebar').classList.remove('left-0')
            document.querySelector('#sidebar_wrapper').classList.add('opacity-0')
            document.querySelector('#sidebar_wrapper').classList.add('invisible')
        }
    })

    // For Image view :
    function previewImage(input) {
        const fileInput = document.getElementById('fileInput');
        const thumbnailPreview = document.getElementById('thumbnailPreview');

        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                thumbnailPreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    // Selecting Tags :
    document.getElementById('submitTagBtn').addEventListener('click', function() {
        var modal = document.getElementById('addTags');
        var selectedOptions = document.getElementById('tags').selectedOptions;

        var selectedTagsDiv = document.getElementById('selectedTags');
        selectedTagsDiv.innerHTML = '';

        for (var i = 0; i < selectedOptions.length; i++) {
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'tagsIds[]';
            input.value = selectedOptions[i].value;
            selectedTagsDiv.appendChild(input);
        }
    });

    document.getElementById('submitCategoryBtn').addEventListener('click', function() {
        // Get the selected category value
        var selectedCategory = document.getElementById('category').value;
        var selectedCategoryDiv = document.getElementById('selectedCategory');
        selectedCategoryDiv.innerHTML = '';

        console.log(selectedCategory);

        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'categoryId';
        input.value = selectedCategory;
        selectedCategoryDiv.appendChild(input);
    });
</script>

<script>
    const searchInput = document.getElementById("searchInput");
    const searchResults = document.getElementById("searchResults");

    searchInput.addEventListener("input", async function(e) {

        try {
            const query = e.target.value;
            const data = await fetch(`search?q=${encodeURIComponent(query)}`);
            const results = await data.json();
            searchResults.innerHTML = "";
            results.forEach((wiki) => {
                const rowTemplate = `
                <div class="p-4 pb-5">
                    <a href="wiki-detail?id=${btoa(unescape(encodeURIComponent(wiki.id)))}">
                        <h2 class="block text-xl font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                            ${wiki.title.length > 150 ? `${wiki.title.substring(0, 150)}...` : wiki.title}
                        </h2>
                    </a>

                    <p class="text-gray-500 text-sm mt-2">
                        ${wiki.content.length > 200 ? `${wiki.content.substring(0, 200)}...` : wiki.content}
                    </p>
                    <div class="mt-3 flex space-x-4">
                        <div class="flex text-gray-400 text-sm items-center">
                            <span class="mr-2 text-xs">
                                <img src="public/img/${wiki.author_image}" alt="" class="w-6 h-6 rounded-2xl object-cover">
                            </span>
                            ${wiki.author_name}
                        </div>
                        <div class="flex text-gray-400 text-sm items-center">
                            <span class="mr-2 text-xs">
                                <i class="far fa-clock"></i>
                            </span>
                            ${new Intl.DateTimeFormat('en-US', { month: 'long', day: 'numeric', year: 'numeric' }).format(new Date(wiki.created_at))}
                        </div>

                    </div>
                </div>
            `;
                searchResults.innerHTML += rowTemplate;
            });
        } catch (error) {
            console.error(error);
        }
    });

    // Resize textarea Based on content height :
    const areaContent = document.getElementById("areaContent");

    function updateHeight() {
        areaContent.style.height = 'auto';
        areaContent.style.height = areaContent.scrollHeight + 'px';
    }

    updateHeight();

    areaContent.addEventListener('input', updateHeight);
</script>
</body>

</html>