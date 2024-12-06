<?php 
include("requires/header.php");
// Extraigo el ID del Quiz.
$idQuiz = isset($_GET['quiz']) ? $_GET['quiz'] : null;
/** consulto los tipos de typeqas */
$resultsTypesQAS = $db->readAll('typeqas');

if (isset($_POST['registrar-question'])) {

  //question, instructionsqs, answer, id_typeqas, id_quiz
  $data = Array('question' => $_POST["question"], 
  'instructionsqs' => $_POST["instructionsqs"], 
  'answer' => $_POST["answer"], 
  'id_typeqas' => $_POST["id_typeqas"], 
  'id_quiz' => $_POST["id_quiz"]);
  $insertQuiz = $db->insert('questions', $data);

}
?>
<section class="container p-4 m-3">
<h3>New Question <small></small></h3>

<form action="" method="POST" class="row g-3 needs-validation" novalidate>

<div class="form-floating mb-3">
  <?php 
  if(!$idQuiz){
    echo "Is need asign questions and answer at quiz.";
    header("Location: quizzes.php");
  }else { 
    echo "<input name='id_quiz' type='hidden' class='form-control' id='quiz' value=".$idQuiz." required>";
  }?>
</div> 
<div class="form-floating mb-3">
  <input name="question" type="text" class="form-control" id="floatingQuestion" placeholder="Question?" required>
  <label for="floatingQuestion">Question?</label>
    <div class="invalid-feedback">
      Please provide a Question?.
    </div>
</div> 
<div class="form-floating mb-3">
<input name="instructionsqs" type="text" class="form-control" id="floatingQuestion" placeholder="Question instructions" required>
  <label for="floatingQuestion">Question Instructions.</label>
    <div class="invalid-feedback">
      Please provide a Question Instructions?.
    </div>
</div> 
<div class="form-floating mb-3">
  <input name="answer" type="text" class="form-control" id="floatingAnswer" placeholder="Answer Correct" required>
  <label for="floatingAnswer">Answer Correct</label>
    <div class="invalid-feedback">
      Please provide a Answer Correct.
    </div>
</div>
<div class="form-floating mb-3">
  <select name="id_typeqas" class="form-control" id="floatingTypeQuiz"  required>
  <option value=''>Select Type Questions</option>
<?php
  foreach ($resultsTypesQAS as $resultsTypesQA) { 
    // muestro las quizzes disponibles de cada quiz por el id_quiz 
    if ($resultsTypesQA){
       echo "<option value='" . $resultsTypesQA["id_typeqas"] . "'>" . $resultsTypesQA["nametype"] . "</option>";
      } else {
        echo "<option value=''>No hay resultados</option>";
      }
    }?>
    </select>
    <label for="floatingTypeQuiz">Type Questions & Answers</label>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" name="registrar-question">Submit form</button>
  </div>
</form>
</section>
<?php
include("requires/footer.php");?>