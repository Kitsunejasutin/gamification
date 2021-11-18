<?php
    if (isset($_POST['submit'])) { 
        $name = $_POST['name'];
        $comment = $_POST['comment']; 

        $sql = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Comment added successfully.')</script>";
        } else {
            echo "<script>alert('Comment does not add.')</script>";
        }
}
