<?php 
include("requires/header.php");
                                            
// Extraigo el ID del Quiz.
$idQuiz = isset($_GET['quiz']) ? $_GET['quiz'] : null;
$idQuestion = isset($_GET['question']) ? $_GET['question'] : null;

// muesrtotitulo y description de este quiz.
$resultsQuiz = $db->readQuizsById('quizzes', $idQuiz);
// muesrto el question de este quiz.
$resultsQuestion = $db->readQuestionsById('questions', $idQuestion);

if (isset($_POST['registrar-option'])) {
// Inserto la question en la tabla questions, junto a sus opciones.
  //option, choise, id_question
  $data = Array('option' => $_POST["option"], 
  'id_question' => $_POST["id_question"], 
  'id_quiz' => $_POST["id_quiz"]);
  $insertQuiz = $db->insert('options', $data);
  // inserto la option y redirijo a la pregunta.
  header("Location: quiz.php?quiz=".$_POST['id_quiz']."");
}
?>
<section class="container p-4 m-3">
  
<?php if ($resultsQuiz) {
    // muestro datos de quiz. ?> 

    <h2><?php echo $resultsQuiz['id_quiz']; echo " - ".$resultsQuiz['title'];?></h2>
    <p><?php echo $resultsQuiz['description']; echo " <b><a href='quiz.php?quiz=".$idQuiz."'>Back to quiz.</a></b>";?>
    </p>
<?php   } else {
      //echo "Este quiz no existe.";
      header("location: quizzes.php");
  }
?>

<?php if ($resultsQuestion) { 
        echo "<h3>".$resultsQuestion['question']."</h3>";
        echo "Instructions: ".$resultsQuestion['instructionsqs']."<br>";
        } else {
            //echo "Este quiz no existe.";
            header("location: quizzes.php");
        }
?>


<h4>New Option <small></small></h4>
<form action="" method="POST" class="row g-3 needs-validation" novalidate>
<?php 
  if(!$idQuestion){
    echo "Is need asign questions and answer at options.";
    header("Location: quizzes.php");
  }else { 
    echo "<input name='id_question' type='hidden' class='form-control' id='id_question' value=".$idQuestion." required>";
    echo "<input name='id_quiz' type='hidden' class='form-control' id='id_quiz' value=".$idQuiz." required>";
  }
?> 
<div class="form-floating col-4">
  <input name="option" type="text" class="form-control" id="floatingOption" placeholder="Option" required>
  <label for="floatingOption">Option</label>
    <div class="invalid-feedback">
      Please provide a Option.
    </div>
</div> 
  <div class="col-12">
    <button class="btn btn-primary" name="registrar-option">Submit form</button>
  </div>
</form>
</section>
<?php
include("requires/footer.php");?>