<?php
include("inc/header.php");
?>
<section class="container p-4 m-3">
<h2>Quiz</h2>
<article class="p-4 m-2">
<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
// Si hay un ID, ejecutar la consulta para obtener los datos
if ($id !== null) {
    $sql = "SELECT * FROM quiz WHERE id_quiz=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {


        // Procesar los datos obtenidos
        while ($row = $result->fetch_assoc()) {
            // Aquí puedes mostrar los datos.:
            echo "Identificador: " . $row["id_quiz"] . "<br>";
            echo "Title: " . $row["title"] . "<br>";
            echo "<a href='questions.php?id=".$row["id_quiz"]."'>Agregar Preguntas</a>";

            if ($id !== null) {
                $sqlquizid = "SELECT * FROM questions WHERE id_quiz=?";
                $stmt = $mysqli->prepare($sqlquizid);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                echo "<ul>";
                while ($options_quiz = $result->fetch_assoc()) {
                    // Aquí puedes mostrar los datos de options.:
                    echo "<h3>Q: <small>" . $options_quiz["question"] . "</small></h3>";
                    echo "<li>" . $options_quiz["option1"] . "</li>";
                    echo "<li>" . $options_quiz["option2"] . "</li>";
                    echo "<li>" . $options_quiz["option3"] . "</li>";
                    echo "<li>" . $options_quiz["option4"] . "</li>";
                    echo "<li>" . $options_quiz["option5"] . "</li>";
                }
                echo "</ul>";
                }else {
                    echo "No tiene opciones.";
                }
    }
} else {
        echo "No se encontró ningún registro con el ID especificado.";
}
} else {
    // Cargar datos por defecto
    echo "Is need asign quiz and answer at quizzes.";
    header("Location: quizzes.php");
    // Aquí puedes cargar los datos por defecto desde un archivo, otra tabla, etc.
}?>
</article>
</section>
<section class="container p-4 m-3">
<h2>Preguntas y Respuestas</h2>
</section>
<?php
include("inc/footer.php");
?>