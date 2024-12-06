<?php
class Database {
    private $host;
    private $db;
    private $user;
    private $password;
    public $conn;

    public function __construct($host, $db, $user, $password) {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->password = $password;

        $dsn = "mysql:host=$this->host;dbname=$this->db";
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        try {
            $this->conn = new PDO($dsn, $this->user, $this->password, $options);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    // create $table.
    public function createTable($sql) {
        try {
            $this->conn->exec($sql);
            return true;
        } catch(PDOException $e) {
            echo "Error creating table: " . $e->getMessage();
            return false;
        }
    }
    // insert into $table for $data array or string.
    public function insert($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        try {
            $stmt->execute();
                echo "Datos insertados correctamente.";
                //header("Location: questions.php");
            return true;
        } catch(PDOException $e) {
            echo "Error inserting data: " . $e->getMessage();
            return false;
        }
    }
    // udpate $table, for $data array or string, for $where.
    public function update($table, $data, $where) {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ", ");

        $sql = "UPDATE $table SET $set WHERE $where";
        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        try {
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Error updating data: " . $e->getMessage();
            return false;
        }
    }
    // read $table, not with $where.
    public function readAll($table, $where = null) {
        $sql = "SELECT * FROM $table";
        if ($where) {
            $sql .= " WHERE $where";
        }
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // read $table and views for $id
    public function readQuizsById($table, $id) {
        $sql = "SELECT * FROM $table WHERE id_quiz = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // read questions in quiz, for id_quiz
    public function readQuestionsById($table, $id) {
        $sql = "SELECT * FROM $table WHERE id_question = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // read options in questions, for id_questions
    public function readOptionsById($table, $id) {
        $sql = "SELECT * FROM $table WHERE id_option = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // delete in ($table) for $where. 
    public function delete($table, $where) {
        $sql = "DELETE FROM $table WHERE $where";
        $stmt = $this->conn->prepare($sql);
        try {
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Error deleting data: " . $e->getMessage();
            return false;
        }
    }
    // validar respuesta de los formularios.
    public function validateAnswers($answer,$choise,$answeres){
        //Recoger datos del formulario
        if(isset($_POST['validate-answers'])){
            $answers = $_POST;
            // Convertimos ambas respuestas a minúsculas para evitar problemas de mayúsculas
            $choise = strtolower($choise);
            $answer = strtolower($answer);

            static $incorrectas = 0;
            static $correctas = 0;

            if($answers["oq$choise"] != $answeres){
                //echo "<b style='color:#ff0000;'>Incorrecta</b>";
                echo "<script>
                document.getElementById('".$answers["oq$choise"]."').style.backgroundColor = 'red';
                </script>";
                //echo $incorrectas++."<br>";
                //echo $incorrectas = -1;

            } else{
                //echo "<b style='color:#00ff00;'>Correcta</b>";
                echo "<script>
                document.getElementById('".$answers["oq$choise"]."').style.backgroundColor = 'green';
                </script>";
                //echo $correctas++."<br>";
                //echo $correctas = $choise + $incorrectas;
            }
        }  
    }

    // contar numeros de registros de una tabla
    public function countRegisters($tabla, $condicion = null) {
        $sql = "SELECT COUNT(*) AS total FROM $tabla";
        if ($condicion !== null) {
            $sql .= " WHERE $condicion";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['total'];
    }
}

$db = new Database("localhost", "typesqasdb", "root", "");

class Users{
        private $db;
    
        public function __construct($db) {
            $this->db = $db;
        }
    
        // Función para registrar un nuevo usuario
        public function register($username, $password, $name, $lastname, $dni, $email, $id_role) {
            // Validar datos (username y email únicos)
            if (!$this->isUnique('username', $username) || !$this->isUnique('email', $email)) {
                return false;
            }
    
            // Hashear la contraseña
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            // Insertar datos en la base de datos
            $sql = "INSERT INTO users (username, password, name, lastname, dni, email, up_register, datetime, up_lastconected, id_role) VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW(), NOW(), ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("ssssssi", $username, $hashedPassword, $name, $lastname, $dni, $email, $id_role);
            $result = $stmt->execute();
            return $result;
        }
    
        // Función para verificar si un campo es único
        private function isUnique($field, $value) {
            $sql = "SELECT COUNT(*) FROM users WHERE $field = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("s", $value);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_row();
            return $row[0] == 0;
        }
    
        // ... Otras funciones para login, obtener información del usuario, etc.
    }