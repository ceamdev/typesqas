<?php
include("inc/header.php");

/** consulto los tipos de quizzes */
$sql="SELECT * FROM quiz";
$res = $mysqli->query($sql);


?>
<section class="container p-4 m-3">
<h2>Quizzes</h2>

<article class="p-4 m-2">
   <?php
        if ($res->num_rows > 0) {
            // Salida de cada fila
            while($row = $res->fetch_assoc()) {
                echo "<p><a href='quiz.php?id=".$row["id_quiz"]."'>".$row["title"] ."</a></p>";
            }
        } else {
            echo "<li>No existe</li>";
        }
        ?>
</article>
</section>

<?php
include("inc/footer.php");
?>