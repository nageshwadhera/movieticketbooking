<?php
if(!isset($_SESSION['admin_id']) && !isset($_SESSION['admin_username'])){
    header("location: index.php");
}
?>