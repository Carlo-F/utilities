<?php
    session_start();
    if(isset($_SESSION['id'])==false){
        header("location: index.php");
    }
?>
<a href="logout.php">logout</a>
<?php   
    var_dump($GLOBALS);
?>