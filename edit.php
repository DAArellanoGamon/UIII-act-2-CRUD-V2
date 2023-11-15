<?php
include("db.php");
$nombre = '';
$origen_p= '';
$transporte= '';
$telefono= '';
$ubicacion= '';
$nombre_empreza= '';
$calidad= '';
$categoria= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM proveedor WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre_pro'];
    $origen_p = $row['origen_p'];
    $transporte = $row['transporte'];
    $telefono = $row['telefono'];
    $ubicacion = $row['ubicacion'];
    $nombre_empreza = $row['nombre_empreza'];
    $calidad = $row['calidad'];
    $categoria = $row['categoria'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre_pro'];
  $origen_p = $_POST['origen_p'];
  $transporte = $_POST['transporte'];
  $telefono = $_POST['telefono'];
  $ubicacion = $_POST['ubicacion'];
  $nombre_empreza = $_POST['nombre_empreza'];
  $calidad = $_POST['calidad'];
  $categoria = $_POST['categoria'];

  $query = "UPDATE proveedor set nombre_pro = '$nombre', origen_p = '$origen_p', transporte = '$transporte', telefono = '$telefono', ubicacion = '$ubicacion', nombre_empreza = '$nombre_empreza', calidad = '$calidad', categoria = '$categoria' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Registro modificaro exitosamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre_pro" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="origen_p" type="text" class="form-control" value="<?php echo $origen_p; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="transporte" type="text" class="form-control" value="<?php echo $transporte; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="telefono" type="text" class="form-control" value="<?php echo $telefono; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="ubicacion" type="text" class="form-control" value="<?php echo $ubicacion; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="nombre_empreza" type="text" class="form-control" value="<?php echo $nombre_empreza; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="calidad" type="text" class="form-control" value="<?php echo $calidad; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="categoria" type="text" class="form-control" value="<?php echo $categoria; ?>" placeholder="Update Title">
        </div>


        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
