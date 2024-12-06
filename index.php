<?php include("requires/header.php");?>
<section class="container">
<h2>Home</h2>
<section class="row">
    <article class="col-12">    
        <h3>Begginers</h3>
        <ol>
    <?php 
    $where =" level = 'Beginners'";
    $resultsQuizzes = $db->readAll('quizzes',$where);
    foreach ($resultsQuizzes as $resultQuiz) { 
        // muestro las quizzes disponibles por level 
        if ($resultQuiz){?>
            <li>
                <a href="quiz.php?quiz=<?php echo $resultQuiz['id_quiz'];?>"><?php echo $resultQuiz['title'];?></a>
            </li>
    <?php } } ?>
        </ol>
    </article>
    <article class="col-12">    
        <h3>Begginers</h3>
        <ol>
    <?php 
    $where =" level = 'Pre-intermediate'";
    $resultsQuizzes = $db->readAll('quizzes',$where);
    foreach ($resultsQuizzes as $resultQuiz) { 
        // muestro las quizzes disponibles por level 
        if ($resultQuiz){?>
            <li>
                <a href="quiz.php?quiz=<?php echo $resultQuiz['id_quiz'];?>"><?php echo $resultQuiz['title'];?></a>
            </li>
    <?php } } ?>
        </ol>
    </article>
    <article class="col-12">    
        <h3>Begginers</h3>
        <ol>
    <?php 
    $where =" level = 'Beginners'";
    $resultsQuizzes = $db->readAll('quizzes',$where);
    foreach ($resultsQuizzes as $resultQuiz) { 
        // muestro las quizzes disponibles por level 
        if ($resultQuiz){?>
            <li>
                <a href="quiz.php?quiz=<?php echo $resultQuiz['id_quiz'];?>"><?php echo $resultQuiz['title'];?></a>
            </li>
    <?php } } ?>
        </ol>
    </article>
    <article class="col-12">    
        <h3>Begginers</h3>
        <ol>
    <?php 
    $where =" level = 'Beginners'";
    $resultsQuizzes = $db->readAll('quizzes',$where);
    foreach ($resultsQuizzes as $resultQuiz) { 
        // muestro las quizzes disponibles por level 
        if ($resultQuiz){?>
            <li>
                <a href="quiz.php?quiz=<?php echo $resultQuiz['id_quiz'];?>"><?php echo $resultQuiz['title'];?></a>
            </li>
    <?php } } ?>
        </ol>
    </article>
</section>
</section>
<?php include("requires/footer.php");?>