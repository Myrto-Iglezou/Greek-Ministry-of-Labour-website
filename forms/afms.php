<?php
  session_start();
  include '../db_connection.php';
  echo "AFMS";
  $errors = array(); 

  print_r($_POST['checkBoxes']);
  ?>