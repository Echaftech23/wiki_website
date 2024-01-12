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
</body>

</html>