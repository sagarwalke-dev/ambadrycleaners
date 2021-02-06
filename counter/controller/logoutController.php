<?php
    session_start();
    $_SESSION['error']=null;
    $_SESSION['success']=null;
    $_SESSION['username']=null;
    $_SESSION['password']=null;
    session_destroy();

?>