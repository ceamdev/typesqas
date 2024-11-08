<?php include("inc/header.php"); ?>

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

        // Selecciono y muestro datos de quiz.
        while ($row = $result->fetch_assoc()) {
            echo "Identificador: " . $row["id_quiz"] . "<br>";
            echo "Title: " . $row["title"] . "<br>";
            echo "<a href='questions.php?id=".$row["id_quiz"]."'>Agregar Preguntas</a>";

            // Selecciono y muesto datos de questions.
            if ($id !== null) {
                $sqlquizid = "SELECT * FROM questions WHERE id_quiz=?";
                $stmt = $mysqli->prepare($sqlquizid);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                
                while ($options_quiz = $result->fetch_assoc()) {


                     // Selecciono y muesto datos de options, relacionadas con las questions.
            
                    // muestro preguntas y respesuestas segpun typesqas.
                    if($options_quiz["id_typeqas"] == 1){
                        echo "<br> ID TypeQAS: ".$options_quiz["id_typeqas"];
                        echo "<br> Q: : ".$options_quiz["question"];
                        // cargo opciones de las preguntas, desde el id_question asociado.
                        $id_question = $options_quiz["id_question"];
                        // recorrro los datos de options la questions por id.
                        if ($id_question) {
                            $sql_options ="SELECT * FROM options WHERE id_question=$id_question";
                            $row_options = $mysqli->query($sql_options);
                            if ($row_options->num_rows > 0) {
                                // Salida de cada fila
                                while($rows_option = $row_options->fetch_assoc()) {
                                    echo "<div>" .$rows_option["option"] . "</div>";
                                }
                            } else {
                                echo "<option value=''>No hay resultados</option>";
                            }
                        // -- fin

                        }
                    }
                    // muestro preguntas y respesuestas segpun typesqas.
                    if($options_quiz["id_typeqas"] == 2){
                        echo "<br> ID TypeQAS: ".$options_quiz["id_typeqas"];
                        echo "<br> Q: : ".$options_quiz["question"];
                        // cargo opciones de las preguntas, desde el id_question asociado.
                        $id_question = $options_quiz["id_question"];
                        // recorrro los datos de options la questions por id.
                        if ($id_question) {
                            $sql_options ="SELECT * FROM options WHERE id_question=$id_question";
                            $row_options = $mysqli->query($sql_options);
                            if ($row_options->num_rows > 0) {
                                // Salida de cada fila
                                while($rows_option = $row_options->fetch_assoc()) {
                                    echo "<div>" .$rows_option["option"] . "</div>";
                                }
                            } else {
                                echo "<option value=''>No hay resultados</option>";
                            }
                        // -- fin

                    }
                    // muestro preguntas y respesuestas segpun typesqas.
                    if($options_quiz["id_typeqas"] == 3){
                        echo "<br> ID TypeQAS: ".$options_quiz["id_typeqas"];
                        echo "<br> Q: : ".$options_quiz["question"];
                        // cargo opciones de las preguntas, desde el id_question asociado.
                        $id_question = $options_quiz["id_question"];
                        // recorrro los datos de options la questions por id.
                        if ($id_question) {
                            $sql_options ="SELECT * FROM options WHERE id_question=$id_question";
                            $row_options = $mysqli->query($sql_options);
                            if ($row_options->num_rows > 0) {
                                // Salida de cada fila
                                while($rows_option = $row_options->fetch_assoc()) {
                                    echo "<div>" .$rows_option["option"] . "</div>";
                                }
                            } else {
                                echo "<option value=''>No hay resultados</option>";
                            }
                        // -- fin

                    }

                }
                }
            }

        // - fin // Selecciono y muestro datos de quiz.
        }
    
    }
}
}
?>
        </article>
</section>

<?php include("inc/footer.php"); ?>