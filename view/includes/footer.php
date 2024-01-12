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
    const otherdiv = document.getElementById("otherdiv");

    searchInput.addEventListener("input", async function(e) {
        try {
            const query = e.target.value;
            const data = await fetch("search?q=" + encodeURIComponent(query));
            const results = JSON.parse(data);
            console.log(query)

            searchResults.innerHTML = "";

            results.forEach((item) => {
                const card = document.createElement("div");
                card.className = "col-lg-3 col-md-4";
                card.innerHTML = `
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <a href="wiki_details?id=${btoa(item.id)}">
                        ${
                        item.image
                            ? `<img src="public${item.image}" alt="" class="w-full h-48 object-cover">`
                            : '<h1 class="message">Wait till Wikis Team Accept Your Wiki</h1>'
                        }
                    </a>
                    <p class="title text-lg font-semibold mt-2">${item.title}</p>
                    <p class="sub text-gray-600">${item.category_name}</p>
                    </div>
                `;
                searchResults.appendChild(card);
            });
        } catch (error) {
            console.error(error);
        }
    });
</script>
</body>

</html>