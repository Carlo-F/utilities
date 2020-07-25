<?php
    if(isset($_COOKIE['id'])){
        session_start();
        $_SESSION['id']=$_COOKIE['id'];
        header("location: home.php");
    }
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $id = $_POST['id'];
        $password = $_POST['password'];
        $remember = $_POST['remember'];

        $row = ['password'=>'password'];
        if($row['password']==$password){
            if(isset($remember)){
                setcookie("id", $id, time()+60);
            }
            session_start();
            $_SESSION['id']=$id;
            header("location: home.php");
        }
        else{
            echo "Invalid User ID or Password";
        }
    }
?>
<form method="post">
    Login<hr/>
    ID:<br/><input name="id"/>
    <br/>Password:<br/><input type="password" name="password"/>
    <br/><input type="checkbox" name="remember"/>Remember ME
    <hr/><input type="submit"/>
</form>