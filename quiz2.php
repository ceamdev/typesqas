<?php 
include("requires/header.php");
?>
<section class="container">
    <article>
    <form action="" method="post" class="row g-3 needs-validation" novalidate>
        <ol>
<?php // read table quiz
    $idQuiz = isset($_GET['quiz']) ? $_GET['quiz'] : null; 
    $resultsQuiz = $db->readQuizsById('quizzes', $idQuiz);
        if ($resultsQuiz) {
            // muestro datos de quiz. ?> 

            <h2><?php echo $resultsQuiz['id_quiz']; echo " - ".$resultsQuiz['title'];?></h2>
            <p> 
                <?php echo $resultsQuiz['description']."<br>";?>
                <?php echo "<b>Times:</b> ".$resultsQuiz['times']." minutes" ;?> | 
                <?php echo "<b>Level:</b> ".$resultsQuiz['level'];?> | 
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
            echo "Instructions: ".$resultQuestion['instructionsqs']."<br>";
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
            // evaluo que tipo de pregunta es y muestro el input segun el tipo de preguntas
            switch ($idTypesQAs) {
                case 1:                                    
                    /** para evaluar respuestas correctas e incorrectas */
                    if(isset($_POST)){
                    // mientra no alla enviado el formulario.
                    $QuestionType = "
                    <div class='form-check'>
                    <input class='form-check-input' type='radio' name='oq".$resultOption['id_question']."' id='".$resultOption['option']."' value='".$resultOption['option']."' required>
                    <label class='form-check-label' for'".$resultOption['option']."'>".$resultOption['option']."</label></div>";
                    }
                    /** fin evaluar respuestas correctas e incorrectas */
                break;
                case 2:
                    /** para evaluar respuestas correctas e incorrectas */
                    if(isset($_POST)){

                        // mientra no alla enviado el formulario.
                        $QuestionType = "
                        <div class='form-group'>
                        <input type='text' class='form-control' name='oq".$resultOption['id_question']."' value='' id='".$resultOption['option']."' required>
                        </div>"; 
                    }  
                    /** fin evaluar respuestas correctas e incorrectas */
                break;
                case 3:          
                    /** para evaluar respuestas correctas e incorrectas */
                    if(isset($_POST)){
                       // mientra no alla enviado el formulario.
                       $QuestionType = "<div class='form-check'><input class='form-check-input' type='radio' name='oq".$resultOption['id_question']."' id='".$resultOption['option']."' value='".$resultOption['option']."' required>
                       <label class='form-check-label' for'".$resultOption['option']."'>".$resultOption['option']."</label></div>";
                        
                    }
                    /** fin evaluar respuestas correctas e incorrectas */
                break;
                case 4:          
                                        /** para evaluar respuestas correctas e incorrectas */
                    if(isset($_POST)){
                        // mientra no alla enviado el formulario.
                        $QuestionType = "<div class='form-check'><input class='form-check-input' type='radio' name='oq".$resultOption['id_question']."' id='".$resultOption['option']."' value='".$resultOption['option']."' required>
                        <label class='form-check-label' for'".$resultOption['option']."'>".$resultOption['option']."</label></div>";
                    }
                     /** fin evaluar respuestas correctas e incorrectas */
                    break;
                default:
                $QuestionType = "Tipo defecto.";
                }
                // muestro segun tipo de pregunta.
                echo $QuestionType;
                // Recoger datos del formulario y valid la la respuesta.
                $db->validateAnswers($resultQuestion['answer'], $resultOption['id_question'], $resultQuestion["answer"]);
            }
            //echo $correctas;
}
?>  
        </ol>
    <button type="submit" class="btn btn-primary" name="validate-answers">ENVIAR A REVISIÓN</button>
        </form>
    </article>
</section>
<?php 
include("requires/footer.php");?>