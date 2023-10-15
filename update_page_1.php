<?php
include 'config/config.php';

if (isset($_POST['gender'])) {
    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $l_name = $_POST['l_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $id = $_POST['id'];

    // Query to update data
    $sql = "UPDATE students SET 
              first_name = :f_name, 
              midle_name = :m_name, 
              last_name = :l_name, 
              age = :age,
              gender = :gender 
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute(
        [
            'f_name' => $f_name,
            'm_name' => $m_name,
            'l_name' => $l_name,
            'age' => $age,
            'gender' => $gender,
            'id' => $id
        ]);

    if ($result) {
        echo 'Data updated';
    } else {
        echo 'Data update failed';
    }
}
?>
