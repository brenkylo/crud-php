
<?php 
  include 'config/config.php';

  if (isset($_POST["delete_students"])) {
    $id = $_POST['id'];
    echo "Received ID: " . $id; // Output the received ID for debugging

    $sql = "DELETE FROM students WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->execute(['id' => $id]);

    if ($stmt->rowCount() > 0) {
        header('location: index.php?delete_msg=The data has been Deleted.');
       
    } else {
        die("Query Failed: " . json_encode($stmt->errorInfo()));
    }
}
?>