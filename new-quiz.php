<?php
include("inc/header.php");

/** inserto datos del quiz */
// Recoger datos del formulario

if (isset($_POST['registrar-datos'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $times = $_POST['time'];
    $date = $_POST['date'];
    $tags = $_POST['tags'];

// Preparar la consulta SQL (sentencia preparada para prevenir inyecciones SQL)
$sql2 = "INSERT INTO quiz (title,description,times,date,tags) VALUES (?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql2);
$stmt->bind_param("ssiss",$title, $description, $times, $date, $tags);

// Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error al insertar datos: " . $stmt->error;
    }
}
?>
<section class="container p-4 m-3">
<h2>New Quiz</h2>

<form action="" method="POST" class="row g-3 needs-validation" novalidate>

<div class="form-floating mb-3">
  <input name="title" type="text" class="form-control" id="floatingTitle" placeholder="Prueba 1 - Unidad 1." required>
  <label for="floatingTitle">Title</label>
    <div class="invalid-feedback">
      Please provide a Title.
    </div>
</div>
<div class="form-floating mb-3">
  <textarea name="description" class="form-control" placeholder="El quiz se trata de... " id="floatingDescription" style="height: 100px" required></textarea>
  <label for="floatingDescription">Description</label>
    <div class="invalid-feedback">
      Please provide a Description.
    </div>
</div>
<div class="form-floating mb-3">
  <input name="time" type="number" class="form-control" id="floatingTimes" placeholder="10" required>
  <label for="floatingTimes">Times (minutos)</label>
    <div class="invalid-feedback">
      Please provide a Times (minutos).
    </div>
</div>
<input name="date" type="hidden" class="form-control" id="floatingDate" value="<?php echo $fecha;?>" required>
<div class="form-floating mb-3">
  <input name="tags" type="text" class="form-control" id="floatingTags" placeholder="Unidad 1 - Tema " required>
  <label for="floatingTags">Tags</label>
    <div class="invalid-feedback">
      Please provide a Tags.
    </div>
</div>
  <div class="col-12">
    <button class="btn btn-primary" name="registrar-datos">Submit form</button>
  </div>
</form>
</section>
<?php
include("inc/footer.php");
?>