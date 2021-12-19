<?php 
 
require_once 'connection.php'; 

if(isset($_POST['supplier'])) {
                    $output .= '<table id = "tableData" class="onetable">
                        <thead>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </thead>';
                                $sql = "SELECT * FROM category";
                                $stmt = mysqli_stmt_init($connection);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    header("location: ../index.php?error=stmtfailedexists");
                                    exit();
                                }
                                mysqli_stmt_execute($stmt);

                                $resultData = mysqli_stmt_get_result($stmt);
                                $x = 1;
                                while($data = mysqli_fetch_array($resultData)){
                                    $output .= '<tbody>
                                    <tr>
                                        <th><?php echo $data[1];?></th>
                                        <th><?php echo implode("|",fetchStock($connection,$data["1"])); ?></th>
                                        <th><?php echo implode("|",fetchStockPrice($connection,$data["1"])); ?></th>
                                        <th><button type="Submit" class="action" name="editcat" id ="myBtn" value="<?php echo $data[1]; ?>"><i class="fas fa-edit"></i></button></th>
                                    </tr>
                                </tbody>';
                            }mysqli_stmt_close($stmt);
                            $output .= '</table>';
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=supplier.xls");
}elseif(isset($_POST['transaction'])) {
    $output .= '<table id = "tableData" class="onetable">
        <thead>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </thead>';
                $sql = "SELECT * FROM category";
                $stmt = mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../index.php?error=stmtfailedexists");
                    exit();
                }
                mysqli_stmt_execute($stmt);

                $resultData = mysqli_stmt_get_result($stmt);
                $x = 1;
                while($data = mysqli_fetch_array($resultData)){
                    $output .= '<tbody>
                    <tr>
                        <th><?php echo $data[1];?></th>
                        <th><?php echo implode("|",fetchStock($connection,$data["1"])); ?></th>
                        <th><?php echo implode("|",fetchStockPrice($connection,$data["1"])); ?></th>
                        <th><button type="Submit" class="action" name="editcat" id ="myBtn" value="<?php echo $data[1]; ?>"><i class="fas fa-edit"></i></button></th>
                    </tr>
                </tbody>';
            }mysqli_stmt_close($stmt);
            $output .= '</table>';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=transactions.xls");
}
 
?>
