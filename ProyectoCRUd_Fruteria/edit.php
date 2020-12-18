<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $description = $row['description'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre = $_POST['nombre'];
  $temporada = $_POST['temporada'];
  $precio = $_POST['precio'];
  $stock = $_POST['stock'];

  $query = "UPDATE task set nombre = '$nombre', temporada = '$temporada', precio = '$precio', stock = '$stock' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Se modifico Correctamente';
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


        <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
            <textarea name="temporada" rows="2" class="form-control" placeholder="Temporada"></textarea>
          </div>
          <div class="form-group">
            <textarea name="precio" rows="2" class="form-control" placeholder="Precio"></textarea>
          </div>
          <div class="form-group">
            <textarea name="stock" rows="2" class="form-control" placeholder="Stock"></textarea>
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
