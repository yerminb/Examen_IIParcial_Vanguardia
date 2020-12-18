<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombre = $_POST['nombre'];
  $temporada = $_POST['temporada'];
  $precio = $_POST['precio'];
  $stock = $_POST['stock'];
  $query = "INSERT INTO task(nombre,temporada,precio,stock) VALUES ('$nombre','$temporada','$precio','$stock')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
