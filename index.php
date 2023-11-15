<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre_pro" class="form-control" placeholder=" Nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="origen_p" class="form-control" placeholder="Origen de producto" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="transporte" class="form-control" placeholder="Transporte" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="ubicacion" class="form-control" placeholder="Ubicacion" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="nombre_empreza" class="form-control" placeholder="Nombre de la Empreza" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="calidad" class="form-control" placeholder="Calidad" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="categoria" class="form-control" placeholder="Categoria" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="telefono" class="form-control" placeholder="Telefono" autofocus>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Guardar Proveeedor">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Origen de producto</th>
            <th>Transporte</th>
            <th>Telefono</th>
            <th>Ubicacion</th>
            <th>Nombre de la Empreza</th>
            <th>Calidad</th>
            <th>Categoria</th>
              </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM proveedor";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombre_pro']; ?></td>
            <td><?php echo $row['origen_p']; ?></td>
            <td><?php echo $row['transporte']; ?></td>
            <td><?php echo $row['ubicacion']; ?></td>
            <td><?php echo $row['nombre_empreza']; ?></td>
            <td><?php echo $row['calidad']; ?></td>
            <td><?php echo $row['categoria']; ?></td>
            <td><?php echo $row['telefono']; ?></td>

            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
