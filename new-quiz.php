<?php 
include("requires/header.php");

// inserto datos de formulario new-quiz
if (isset($_POST['registrar-datos'])) {
    $data = Array('title' => $_POST["title"], 
    'description' => $_POST["description"], 
    'times' => $_POST["time"], 
    'date' => $_POST["date"], 
    'level' => $_POST["level"]);
    $insertQuiz = $db->insert('quizzes', $data);

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
<input name="date" type="hidden" class="form-control" id="floatingDate" value="<?php echo $fechaLocalHoy;?>" required>
<div class="form-floating mb-3">
  <input name="level" type="text" class="form-control" id="floatingLevel" placeholder="Básic" required>
  <label for="floatingLevel">Level</label>
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
include("requires/footer.php");?>