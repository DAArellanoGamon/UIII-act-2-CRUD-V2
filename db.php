<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'bd_ferreteria'
) or die(mysqli_erro($mysqli));

?>
