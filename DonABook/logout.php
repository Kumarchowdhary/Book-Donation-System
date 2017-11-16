<?php
  session_start();
  session_unset();
  //session_unregister();
  header('location: login.php');
?>