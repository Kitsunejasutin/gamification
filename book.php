<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
    session_start();
    
?>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/dashboard.css">
	<title>DUMNSS Library</title>
</head>
<body>
<?php
    include_once 'includes/bars.php';

    if (isset($_GET['book'])){
        $book = $_GET['book'];
        $data = fetchBook($connection, $book);
        // print_r ($data);

        print_r (incrementViews($connection, $book));
        ?>
        <div class="holder">
        <div class="image-holder">
            <img src="images/books/<?php echo $book ?>.jpg">
        </div>
        <div class="book-details">
            <div class="book-title">
                <span class="desc"><?php echo $data['book_name']; ?></span>
            </div>
            <div class="book-author">
                <span class="desc"><?php echo $data['book_author']; ?></span>
            </div>
            <div class="book-description">
                <span class="desc">"<?php echo $data['book_info']; ?>"</span>
            </div>
        </div>
        <div class="box-holder">
            <div class="box1">
                <span>Available</span>
                <div class="book-stats">
                    <span><b><?php echo $data['book_copies']; ?></b> copies</span>
                    <span><b><?php echo $data['book_copies'] - $data['book_borrowed']; ?></b> Available</span>
                    <span><b><?php echo $data['book_borrowed']; ?></b> Borrowed</span>
                </div>
                <hr>
                <div class="buttons">
                    <button class="blue"><i class="fas fa-phone-alt"></i>&nbspContact</button>
                    <button class="blue"><i class="fas fa-bookmark"></i></i>&nbspBookmark</button>
                </div>
                <p class="views"><?php echo "Views: " . $data['book_views']; ?></p>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="section-header">
            <span>About</span>
        </div>
        <div class="section-description">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae quis necessitatibus consequuntur qui odio provident tempora, et tempore ea ad 
                cumque quisquam cum a sit possimus, consectetur rerum dolor error magni autem quo! Adipisci sunt possimus eveniet eligendi alias mollitia nemo 
                placeat eius natus dolorum quod rem aperiam officia enim tempore quae vel ipsa, voluptatem pariatur, minima voluptate temporibus dolore? Tenetur
                quis earum qui dolor sed, voluptates sapiente illum eius. Animi velit eum recusandae neque consequatur quis consequuntur tenetur enim culpa temporibus. 
                Qui fugiat dicta ut ipsa eum, facilis enim eos natus! Distinctio neque cum et! Minima, porro facere? Nam cumque iure amet corrupti eligendi nisi rerum 
                beatae? Voluptatem laboriosam nemo ut numquam soluta est libero saepe, perferendis adipisci voluptatum, necessitatibus minima iste facilis pariatur nam 
                magni corrupti sint reprehenderit obcaecati molestiae recusandae labore. Quibusdam, asperiores ipsam temporibus unde laudantium laboriosam quaerat ab, commodi 
                accusamus fuga pariatur ducimus distinctio saepe? Possimus, ab nulla unde quos autem mollitia quidem, sunt illo nobis natus rem quis reiciendis distinctio, quod 
                incidunt saepe corrupti aspernatur voluptas. Blanditiis similique voluptates omnis excepturi cumque harum, hic maxime rem eius repellendus illo dolorem dolorum, 
                deleniti adipisci qui aliquid perspiciatis iusto provident odio dicta odit fugit. Mollitia esse facilis a ea, expedita quis voluptatibus vel perspiciatis sequi 
                labore eveniet perferendis consequatur doloribus vero magni error laudantium eos delectus! Atque libero sed aut, facilis, ullam laborum ducimus nesciunt ab quae 
                quisquam ut assumenda. Aliquid eius placeat in, quasi quidem est autem praesentium iusto maxime quae corporis ea quo beatae?
            </p>
        </div>
    </div>
    <?php 
    }else{
        echo "Please go back to the previous page";
        header( "Refresh:5; url=index.php", true, 303);
    }

	include_once 'includes/footer.php';
?>
