<?php 
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinputsignup") {
        echo "<script>
        const bgmodal_signup_php = document.querySelector('.bg-modal-signup');
        const modalcont_php = document.querySelector('.modal-content-signup');
        const body_signup_php = document.querySelector('.responsive')
            if (bgmodal_signup_php){
                bgmodal_signup_php.style.display = 'flex';
                body_signup_php.classList.toggle('overflow-hidden');
                modalcont_php.style.height = '640px';
            };";
            echo '</script>';
        echo "<p class='error'>Fill in all fields</p>";
    }else if ($_GET["error"] == "invalidemail") {
        echo "<script>
        const bgmodal_signup_php = document.querySelector('.bg-modal-signup');
        const modalcont_php = document.querySelector('.modal-content-signup');
        const body_signup_php = document.querySelector('.responsive')
            if (bgmodal_signup_php){
                bgmodal_signup_php.style.display = 'flex';
                body_signup_php.classList.toggle('overflow-hidden');
                modalcont_php.style.height = '640px';
            };";
            echo '</script>';
        echo "<p class='error'>Email is not acceptable</p>";
    }else if ($_GET["error"] == "stmtfailed") {
        echo "<script>
        const bgmodal_signup_php = document.querySelector('.bg-modal-signup');
        const modalcont_php = document.querySelector('.modal-content-signup');
        const body_signup_php = document.querySelector('.responsive')
            if (bgmodal_signup_php){
                bgmodal_signup_php.style.display = 'flex';
                body_signup_php.classList.toggle('overflow-hidden');
                modalcont_php.style.height = '640px';
            };";
            echo '</script>';
            echo "<p class='error'>Something went wrong, try again</p>";
    }else if ($_GET["error"] == "passworddontmatch") {
        echo "<script>
        const bgmodal_signup_php = document.querySelector('.bg-modal-signup');
        const modalcont_php = document.querySelector('.modal-content-signup');
        const body_signup_php = document.querySelector('.responsive')
            if (bgmodal_signup_php){
                bgmodal_signup_php.style.display = 'flex';
                body_signup_php.classList.toggle('overflow-hidden');
                modalcont_php.style.height = '640px';
            };";
            echo '</script>';
        echo "<p class='error'>Passwords doesn't match!</p>";
    }else if ($_GET["error"] == "emailtaken") {
        echo "<script>
        const bgmodal_signup_php = document.querySelector('.bg-modal-signup');
        const modalcont_php = document.querySelector('.modal-content-signup');
        const body_signup_php = document.querySelector('.responsive')
            if (bgmodal_signup_php){
                bgmodal_signup_php.style.display = 'flex';
                body_signup_php.classList.toggle('overflow-hidden');
                modalcont_php.style.height = '640px';
            };";
            echo '</script>';
        echo "<p class='error'>Email already exists!</p>";
    }else if ($_GET["error"] == "none") {
        echo "<script>
        const bgmodal_signup_php = document.querySelector('.bg-modal-signup');
        const modalcont_php = document.querySelector('.modal-content-signup');
        const body_signup_php = document.querySelector('.responsive')
            if (bgmodal_signup_php){
                bgmodal_signup_php.style.display = 'flex';
                body_signup_php.classList.toggle('overflow-hidden');
                modalcont_php.style.height = '640px';
            };";
            echo '</script>';
        echo "<p class='error'>Signup Successfully</p>";
    }
}
