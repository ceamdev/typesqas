<?php include("requires/header.php"); ?>
<section class="container p-4">
    <article>
    <form action="" method="post" class="row g-3 needs-validation" novalidate>
        <ol>
<?php // read table quiz
    $idQuiz = isset($_GET['quiz']) ? $_GET['quiz'] : null; 
    $resultsQuiz = $db->readQuizsById('quizzes', $idQuiz);
        if ($resultsQuiz) {
            // muestro datos de quiz. ?> 
            <h2><?php echo $resultsQuiz['title'];?></h2>
            <p>
                <?php echo $resultsQuiz['description']."<br>";?>
                <?php echo "<b>Times:</b> ".$resultsQuiz['times']." minutes" ;?> | <?php echo "<b>Level:</b> ".$resultsQuiz['level'];?> | 
                <?php echo "<b># Questions:</b> ".$totalQuestions = $db->countRegisters('questions','id_quiz='.$idQuiz.'');?> | 
                <?php echo "<a href='questions.php?quiz=".$idQuiz."'>Add Question.</a>";?>         
            </p>
        <?php   } else {
            //echo "Este quiz no existe.";
            header("location: quizzes.php");
        }
    // read table questions
    $where ="id_quiz = $idQuiz";
    $resultsQuestion = $db->readAll('questions', $where);
    foreach ($resultsQuestion as $resultQuestion) {
        // muestro las preguntas por su id. ?>

            <?php $id_question = $resultQuestion['id_question'];
            echo "<h3><li>".$resultQuestion['question']."</li></h3>"; 
            echo "<p>".$resultQuestion['instructionsqs']."</p>";
            //echo "Respuesta: ".$resultQuestion['answer']."<br>";
            //echo "Tipo de pregunta: ".$resultQuestion['id_typeqas']."<br>";
            echo "<a href='options.php?quiz=".$idQuiz."&question=".$id_question."'>Add Options</a>";?>

     <?php       // read table options
            $where =" id_question = $id_question";
            $resultsOption = $db->readAll('options', $where);
            foreach ($resultsOption as $resultOption) { 
            // muestro las opciones de cada cuestion por el id_question 
            
            // id del tipo de pregunta o formato de pregunta.
            $idTypesQAs = $resultQuestion['id_typeqas'];
     
                    //if(isset($_POST)){
                    // mientra no alla enviado el formulario.
                    echo $QuestionType = "
                    <div class='form-check'>
                    <input class='form-check-input' type='radio' name='oq".$resultOption['id_question']."' id='".$resultOption['option']."' value='".$resultOption['option']."' required>
                    <label class='form-check-label' for'".$resultOption['option']."'>".$resultOption['option']."</label></div>";
                    //}
                
                // muestro segun tipo de pregunta.
                //echo $QuestionType;
                // Recoger datos del formulario y valid la la respuesta.
                $db->validateAnswers($resultQuestion['answer'], $resultOption['id_question'], $resultQuestion["answer"]);
}
                }
?>  
        </ol>

<?php

if(!isset($_POST['validate-answers'])){ ?>

<div class="col-12">
    <button type="submit" class="btn btn-primary" name="validate-answers">ENVIAR A REVISIÓN</button>
</div>

<?php }else{ 
    echo "<h4>Mostrar al teacher</h4>";
}
?>
        </form>
    </article>
</section>
<?php include("requires/footer.php");?>