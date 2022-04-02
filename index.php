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
?>
            <div class="info">
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
                                $column = "book_id";
                                $table = "book";
                                $columnspecific = "book_status";
                                $columnspecific_value = "borrowed";
                                echo implode("|",countAllSpecific($connection, $column, $table, $columnspecific, $columnspecific_value)); ?></p>
                                <div class="indicator"><i class="fas fa-book-reader"></i></i><p class="text margin5">Borrowed</p></div>
                        </div>
                        <div class="column third">
                            <p class="align-right"><?php 
                            $column = "return_status";
                            $table = "history";
                            $columnspecific = "return_status";
                            $columnspecific_value = "Late Return";
                            echo implode("|",countAllSpecific($connection, $column, $table, $columnspecific, $columnspecific_value)); ?></p>
                            <div class="indicator"><i class="fas fa-clock"></i></i><p class="text margin25">Late</p></div>
                        </div>
                    </div>
                </div>
                <div class="news">
                    <div class="main-news">
                        <span>Site Announcements</span><br>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt itaque labore aspernatur assumenda natus! Nulla amet quod laboriosam recusandae laudantium repellendus. Neque quo asperiores qui, sit possimus totam similique hic!
                    </div>
                    <div class="side-news">
                        <span>Other News</span><br>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Id eius accusamus aliquid illo sit perspiciatis ut quae beatae dignissimos, delectus corporis? Obcaecati voluptatum mollitia inventore in tempore sequi aliquid modi?
                    </div>
                </div>
            </div>
<?php 
	include_once 'includes/footer.php';
?>
