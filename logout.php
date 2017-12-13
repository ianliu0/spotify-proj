<?php
/**
 * Created by PhpStorm.
 * User: ian
 * Date: 12/10/17
 * Time: 5:24 PM
 */
session_start();
session_destroy();
setcookie("uid","1",time()-1);
header("location:login.php");
exit();
?>