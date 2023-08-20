<?php
include '../db.php';

$email = $_POST['email'];
$password = $_POST['password'];

try {
    // Create a PDO connection
    //$db = new PDO("mysql:host=your_host;dbname=your_dbname", "your_username", "your_password");
    
    // Prepare the SQL statement with placeholders
    $stmt = $db->prepare("SELECT * FROM leave_management_employee_new WHERE email = '$email' AND password = '$password'");
    
    // Execute the statement with bound parameters
    $stmt->execute();
    
    // Fetch all rows as an associative array
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (!empty($data)) {
        // Data is an array of rows, you can iterate through it
        foreach ($data as $row) {
            echo "<pre>";
            print_r($row);
        }
        
        // Redirect to the profile page
        header("Location: ../view/profile_page.php");
        exit(); // Stop script execution after the redirect
    } else {
        echo "Unable to log in. User not found or incorrect password.";
    }
} catch (PDOException $e) {
    echo "An exception occurred: " . $e->getMessage();
}
?>





