<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
    session_start();
    setDay($connection);
    
?>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="styles/carousel.css">
	<title>DUMNSS Library</title>
</head>
<body>
<?php
    include_once 'includes/bars.php';
?>
            <div class="info"> 
                <?php error_reporting(E_ERROR | E_PARSE); if ($_SESSION['type'] == "admins"){ ?>
                    <div class="header">
                        <div class="row">
                            <div class="column first">
                                <p class="align-right"><?php 
                                $column = "book_id";
                                $table = "book";
                                echo implode("|",countAll($connection, $column, $table)); ?></p>
                                <div class="indicator"><i class="fas fa-book"></i><p class="text margin15">Books</p></div>
                            </div>
                            <div class="column second">
                                <p class="align-right"><?php 
                                      $sql = "SELECT book_borrowed FROM book;";
                                      $stmt = mysqli_stmt_init($connection);
                                      if (!mysqli_stmt_prepare($stmt, $sql)) {
                                          header("location: index.php?error=stmtfailedexists");
                                          exit();
                                      }
                                      mysqli_stmt_execute($stmt);
                                      
                                      $resultData = mysqli_stmt_get_result($stmt);
                                      error_reporting(E_ERROR | E_PARSE);
                                      while ($row = mysqli_fetch_assoc($resultData)){
                                        $total += $row['book_borrowed'];
                                      }
                                      mysqli_stmt_close($stmt);
                                      echo $total;  
                                        ?></p>
                                    <div class="indicator"><i class="fas fa-book-reader"></i></i><p class="text margin5">Borrowed</p></div>
                            </div>
                            <div class="column third">
                                <p class="align-right"><?php 
                                            $column = "return_status";
                                            $table = "history";
                                            $columnspecific = "return_status";
                                            $columnspecific_value = "Late Return";
                                            echo implode("|", countAllSpecific($connection, $column, $table, $columnspecific, $columnspecific_value)); 
                                        ?>
                                    </p>
                                <div class="indicator"><i class="fas fa-clock"></i></i><p class="text margin25">Late</p></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="news">
                    <div class="main-news">
                        <span>Site Announcements</span><br>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt itaque labore aspernatur assumenda natus! Nulla amet quod laboriosam recusandae laudantium repellendus. Neque quo asperiores qui, sit possimus totam similique hic!
                    </div>
                    <div class="popular-books">
                        <span class="title">Popular Books</span><br>
                            <div class="carousel">
                                <button class="carousel__button is-hidden carousel__button--left">
                                    <img src="images/left.svg" alt="">
                                </button>
                                <div class="carousel__track-container">
                                    <ul class="carousel__track">

                                        <?php 
                                            $sql = "SELECT book_id FROM book ORDER BY book_views DESC LIMIT 5;";
                                            $stmt = mysqli_stmt_init($connection);
                                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                header("location: ../dashboard.php?error=stmtfailedexists");
                                                exit();
                                            }
                                        
                                            mysqli_stmt_execute($stmt);
                                            $resultData = mysqli_stmt_get_result($stmt);
                                        
                                            while ($row = mysqli_fetch_array($resultData)) {
                                                echo '<li class="carousel__slide current-slide">';
                                                echo '<a href=book.php?book=' . $row[0] . '><img class="carousel__image" src="images/books/' . $row[0] .'.jpg" alt=""></a>';
                                            echo '</li>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <button class="carousel__button carousel__button--right">
                                    <img src="images/right.svg" alt="">
                                </button>
                                <div class="carousel__nav">
                                    <button class="carousel__indicator current-slide"></button>
                                    <button class="carousel__indicator"></button>
                                    <button class="carousel__indicator"></button>
                                    <button class="carousel__indicator"></button>
                                    <button class="carousel__indicator"></button>
                                </div>
                            </div>
                    </div>
                </div>
                <?php include_once "includes/notification_handle.php" ?>
            </div>
<?php 
	include_once 'includes/footer.php';
?>
