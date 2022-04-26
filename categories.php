<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
    session_start();
    
?>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="styles/categories.css">
	<title>DUMNSS Library</title>
</head>
<body>
<?php
    include_once 'includes/bars.php';
?>
            <?php
                if (isset($_GET["page"])){
                    $page=$_GET['page'];
                    if($_GET["page"] == $page){ ?>
                        <div class="info">
                            <div class="header">
                                <div class="row">
                                    <div class="column first">
                                        <p class="align-right"><?php 
                                        $columnspecific_value= $page;
                                        echo implode("|",countAllCategories($connection, $columnspecific_value)); ?></p>
                                        <div class="indicator"><i class="fas fa-book"></i><p class="text margin15">Books</p></div>
                                    </div>
                                    <div class="column second">
                                        <p class="align-right"><?php 
                                      $sql = "SELECT book_borrowed FROM book WHERE book_category=?";
                                      $stmt = mysqli_stmt_init($connection);
                                      if (!mysqli_stmt_prepare($stmt, $sql)) {
                                          header("location: index.php?error=stmtfailedexists");
                                          exit();
                                      }
                                      mysqli_stmt_bind_param($stmt, "s", $page);
                                      mysqli_stmt_execute($stmt);
                                      
                                      $resultData = mysqli_stmt_get_result($stmt);
                                      error_reporting(E_ERROR | E_PARSE);
                                      while ($row = mysqli_fetch_assoc($resultData)){
                                        $total += $row['book_borrowed'];
                                      }
                                      mysqli_stmt_close($stmt);
                                      echo $total;  
                                        ?>
                                        </p>
                                            <div class="indicator"><i class="fas fa-book-reader"></i></i><p class="text margin5">Borrowed</p></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $book_category = $page;
                            $sql = "SELECT * FROM book WHERE book_category=? ORDER BY book_id ASC";
                            $stmt = mysqli_stmt_init($connection);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                header("location: ../addbook.php?error=stmtfailedexists");
                                exit();
                            }
                            mysqli_stmt_bind_param($stmt, "s", $book_category);
                            mysqli_stmt_execute($stmt);
                            $resultData = mysqli_stmt_get_result($stmt);
                            
                            $count = 1;
                            echo '<p class="header">'. $page . ' Books</p>';
                            echo '<table><tr>';
                            while ($row = mysqli_fetch_array($resultData)) { 
                                if($count <= 4) {
                                    echo '<th><span class="id">' . $row['book_id'] . '</span><br><a href="book.php?book='. $row['book_id'] .'"><img src="images/books/'. $row['book_id'] .'.jpg" width="250px"></a><br><p class="book-name">'. $row['book_name'] . '</p><p class="author">'. $row['book_author'] . '</p></th>';
                                }else{
                                    echo '</tr>\n<tr>'. '<th>' . $row['book_id'] . '<br><img src="images/books/'. $row['book_id'] .'.jpg" width="250px"><br><p class="book-name">'. $row['book_name'] . '</p><p class="author">'. $row['book_author'] . '</p></th>';
                                }
                                $count++;
                            }
                            ?>
                            <?php include_once "includes/notification_handle.php" ?>
                        </div>
                        <?php
                    }
                }else{
                    echo '<p>Please go back to the previous page</p>';
                    header( "Refresh:5; url=index.php", true, 303);
                }
            ?>
<?php 
	include_once 'includes/footer.php';
?>
