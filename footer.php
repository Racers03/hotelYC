<?php require('config.php'); ?>
<div id="footer" class="container text-center p-4">
    Hakcipta &copy; <?php echo $namasistem ?> 2020
</div>
<script>
    if ((document.getElementById('footer').offsetTop + document.getElementById('footer').clientHeight) >= window.innerHeight) {
        document.getElementById('footer').classList.remove('fixed-bottom');
    } else {
        document.getElementById('footer').classList.add('fixed-bottom');
    }
</script>