<footer class="border-t py-4">
    <p class=" text-sm text-center">Copyright © 2021 <span class="font-semibold">Echaf Dev</span>
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
</script>
</body>

</html>