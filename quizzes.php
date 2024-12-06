<?php 
include("requires/header.php");?>
<section class="container p-4">
<h2>Quizzes</h2>
    <article>
<?php 
//$where =" id_question = $id_question";
$resultsQuizzes = $db->readAll('quizzes');
    foreach ($resultsQuizzes as $resultQuiz) { 
    // muestro las quizzes disponibles de cada quiz por el id_quiz 
    if ($resultQuiz){?>
        <ul>
            <li><a href="quiz.php?quiz=<?php echo $resultQuiz['id_quiz'];?>"><?php echo $resultQuiz['title'];?></a></li>
        </ul>
    <?php }
    
}
?>
    </article>
</section>
<?php include("requires/footer.php");?>