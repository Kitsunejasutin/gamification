<?php 
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<script>
        const bgmodalphp = document.querySelector('.bg-modal');
        const modalcont_php = document.querySelector('.modal-content');
        const body_php = document.querySelector('.responsive')
            if (bgmodalphp){
                bgmodalphp.style.display = 'flex';
                body_php.classList.toggle('overflow-hidden');
                modalcont_php.style.height = '430px';
            };";
            echo '</script>';
        echo "<p class='error'>Fill in all fields</p>";
    }else if ($_GET["error"] == "stmtfailed") {
        echo "<script>
        const bgmodalphp = document.querySelector('.bg-modal');
        const modalcont_php = document.querySelector('.modal-content');
        const body_php = document.querySelector('.responsive')
            if (bgmodalphp){
                bgmodalphp.style.display = 'flex';
                body_php.classList.toggle('overflow-hidden');
                modalcont_php.style.height = '430px';
            };";
            echo '</script>';
        echo "<p class='error'>Something went wrong, try again</p>";
    }else if ($_GET["error"] == "wronglogin") {
        echo "<script>
        const bgmodalphp = document.querySelector('.bg-modal');
        const modalcont_php = document.querySelector('.modal-content');
        const body_php = document.querySelector('.responsive')
            if (bgmodalphp){
                bgmodalphp.style.display = 'flex';
                body_php.classList.toggle('overflow-hidden');
                modalcont_php.style.height = '430px';
            };";
            echo '</script>';
        echo "<p class='error'>Incorrect login information!</p>";
    }else if ($_GET["error"] == "wrongloginpassword") {
        echo "<script>
        const bgmodalphp = document.querySelector('.bg-modal');
        const modalcont_php = document.querySelector('.modal-content');
        const body_php = document.querySelector('.responsive')
            if (bgmodalphp){
                bgmodalphp.style.display = 'flex';
                body_php.classList.toggle('overflow-hidden');
                modalcont_php.style.height = '430px';
            };";
            echo '</script>';
        echo "<p class='error'>Incorrect password!</p>";
    }
}
