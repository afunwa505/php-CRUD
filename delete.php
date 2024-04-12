<?php
    include "connect.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM registertable WHERE id = $id ";
        $delete = mysqli_query($conn, $sql);
        if(!$delete){
            die("failed");
            
        }
        
        header("location:show.php");
    }
?>