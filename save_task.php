<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombre = $_POST['nombre_pro'];
  $origen_p = $_POST['origen_p'];
  $transporte = $_POST['transporte'];
  $telefono = $_POST['telefono'];
  $ubicacion = $_POST['ubicacion'];
  $nombre_empreza = $_POST['nombre_empreza'];
  $calidad = $_POST['calidad'];
  $categoria = $_POST['categoria'];

  $query = "INSERT INTO proveedor(nombre_pro, origen_p, transporte, telefono, ubicacion, nombre_empreza, calidad, categoria) VALUES ('$nombre', '$origen_p', '$transporte', '$telefono', '$ubicacion', '$nombre_empreza', '$calidad', '$categoria')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Registro guardado exitosamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
