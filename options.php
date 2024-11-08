<?php
include("inc/header.php");
                                            
// Extraigo el ID del Quiz.
$id = isset($_GET['id']) ? $_GET['id'] : null;

/** consulto los tipos de typequestionsanswers */
$sql_typeQA ="SELECT * FROM typeqas";
$row_typeQA = $mysqli->query($sql_typeQA);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        

if (isset($_POST['registrar-question'])) {
// Inserto la question en la tabla questions, junto a sus opciones.

// Obtener datos del formulario (questions)
$question = $_POST['question'];
$answer = $_POST['answer'];
$num_answer = $_POST['num_answer'];
$id_typeqas = $_POST['id_typeqas'];
$id_quiz = $id;

// Primera inserción (tabla questions)
$sql1 = "INSERT INTO questions (question, answer, num_answer, id_typeqas, id_quiz) VALUES (?, ?, ?, ?, ?)";
$stmt1 = $mysqli->prepare($sql1);
$stmt1->bind_param("ssiii", $question, $answer, $num_answer, $id_typeqas, $id_quiz);
$stmt1->execute();

    if ($stmt1->affected_rows > 0) {
            $mysqli->commit();
        echo "Datos insertados correctamente";
    } else {
        $mysqli->rollback();
        echo "Error al insertar datos";
    }
}
?>
<section class="container p-4 m-3">
<h2>New Question <small></small></h2>

<form action="" method="POST" class="row g-3 needs-validation" novalidate>

<div class="form-floating mb-3">
  <?php 
  if(!$id){
    echo "Is need asign questions and answer at quiz.";
    header("Location: quizzes.php");
  }else { 
    echo "<input name='id_quiz' type='hidden' class='form-control' id='quiz' value=".$id." required>";
  }?>
  <input name="question" type="text" class="form-control" id="floatingQuestion" placeholder="Question?" required>
  <label for="floatingQuestion">Question?</label>
    <div class="invalid-feedback">
      Please provide a Question?.
    </div>
</div> 
<div class="form-floating mb-3">
  <select name="id_typeqas" class="form-control" id="floatingTypeQuiz"  required>
  <option value=''>Select Type Questions</option>
        <?php
        if ($row_typeQA->num_rows > 0) {
            // Salida de cada fila
            while($rows = $row_typeQA->fetch_assoc()) {
                echo "<option value='" . $rows["id_typeqas"] . "'>" . $rows["nametype"] . "</option>";
            }
        } else {
            echo "<option value=''>No hay resultados</option>";
        }
        ?>
    </select>
    <label for="floatingTypeQuiz">Type Questions & Answers</label>
  </div>
<div class="form-floating mb-3">
  <input name="answer" type="text" class="form-control" id="floatingAnswer" placeholder="Answer Correct" required>
  <label for="floatingAnswer">Answer Correct</label>
    <div class="invalid-feedback">
      Please provide a Answer Correct.
    </div>
</div> 
<div class="form-floating mb-3">
  <input name="num_answer" type="text" class="form-control" id="floatingnAnswer" placeholder="Answer Correct" required>
  <label for="floatingnAnswer">Number Answer Correct</label>
    <div class="invalid-feedback">
      Please provide a Number Answer Correct.
    </div>
</div>
<div class="form-floating mb-3">
  <input name="option1" type="text" class="form-control" id="floatingnAnswer1" placeholder="Answer Correct" required>
  <label for="floatingnAnswer1">Option # 1 Answer</label>
    <div class="invalid-feedback">
      Please provide a Option # 1 Answer.
    </div>
</div>
<div class="form-floating mb-3">
  <input name="option2" type="text" class="form-control" id="floatingnAnswer2" placeholder="Answer Correct" required>
  <label for="floatingnAnswer1">Option # 2 Answer</label>
    <div class="invalid-feedback">
      Please provide a Option # 2 Answer.
    </div>
</div>
<div class="form-floating mb-3">
  <input name="option3" type="text" class="form-control" id="floatingnAnswer3" placeholder="Answer Correct" required>
  <label for="floatingnAnswer1">Option # 3 Answer</label>
    <div class="invalid-feedback">
      Please provide a Option # 3 Answer.
    </div>
</div>
<div class="form-floating mb-3">
  <input name="option4" type="text" class="form-control" id="floatingnAnswer4" placeholder="Answer Correct" required>
  <label for="floatingnAnswer1">Option # 4 Answer</label>
    <div class="invalid-feedback">
      Please provide a Option # 4 Answer.
    </div>
</div>
<div class="form-floating mb-3">
  <input name="option5" type="text" class="form-control" id="floatingnAnswer5" placeholder="Answer Correct" required>
  <label for="floatingnAnswer5">Option # 5 Answer</label>
    <div class="invalid-feedback">
      Please provide a Option # 5 Answer.
    </div>
</div>
  <div class="col-12">
    <button class="btn btn-primary" name="registrar-question">Submit form</button>
  </div>
</form>
</section>
<?php
include("inc/footer.php");
?>