<?php include 'config/config.php'?>
<?php 

  if (isset($_POST["add_students"])){
    
    $f_name = $_POST["f_name"];
    $m_name = $_POST["m_name"];
    $l_name = $_POST["l_name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];

    if ($f_name == "" || empty($f_name) && $m_name == "" || empty($m_name)){
      
      header('location:index.php?errmessage=Please input the required information.');
    }
    else{
      $sql = "INSERT INTO students(first_name, midle_name, last_name, age, gender) 
        VALUE (:f_name, :m_name, :l_name, :age, :gender)";
      $stmt = $pdo->prepare($sql);

      $stmt->execute([//Make sure parameter names match the placeholders in the SQL query
        'f_name' => $f_name,
        'm_name' => $m_name,
        'l_name' => $l_name,
        'age' => $age,
        'gender' => $gender,
    ]);

      if ($stmt->rowCount() > 0) {//check if the current data is affected after excecuting method
          header('location: index.php?insert_msg=The data has been saved.');
      } else {
          die("Query Failed: " . json_encode($stmt->errorInfo()));
      }
    }
  }
?>