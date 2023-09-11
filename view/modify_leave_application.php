<?php
include '../db.php';

session_start();

$role = $_SESSION['role'];
$id = $_GET['id'];

if ($role == 1) {
    echo "Welcome to modify leave application<br>";

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $proposed_leave_status = $_POST['proposed_leave_status'];

        // Construct and execute the SQL query
        $str = "UPDATE leave_management_leave_application SET status = :proposed_leave_status WHERE id = :id";

        try {
            $stmt = $db->prepare($str);
            $stmt->bindParam(':proposed_leave_status', $proposed_leave_status);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                echo "Record updated successfully<br>";
                echo "<a href=../view/leave_application.php>Back</a>";
            } else {
                echo "No records were updated.<br>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
            echo "Unable to perform update.<br>";
        }
    }
    ?>
    <form method="post" action="../view/modify_leave_application.php?id=<?php echo $id; ?>">
        <table border="1">
            <tr>
                <td>
                    Proposed leave status:<input type="text" name="proposed_leave_status"/>
                    <input type="submit" value="modify" name="modify_btn"/>
                </td>
            </tr>
        </table>
    </form>
    <?php
} else {
    echo "You are not logged in as an admin; you don't have permission to modify leave<br>";
    echo "<a href='../view/admin_profile_page.php'>Back</a>";
}
?>