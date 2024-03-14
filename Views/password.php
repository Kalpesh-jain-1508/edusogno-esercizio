<?php
session_start();

error_reporting (E_PARSE);
// Include and initialize UserController
require_once('../Controller/UserController.php');
$userController = new UserController();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate form data (e.g., length, complexity, match)
    // Note: Implement your validation logic here

    // Verify current password
    $userId = $_SESSION['user_id'];

    $verifyPassword = $userController->verifyPassword($userId, $currentPassword);
    if ($verifyPassword) {
        // Change password
        if ($newPassword === $confirmPassword) {
            $changePassword = $userController->changePassword($userId, $currentPassword, $newPassword);
            // echo $changePassword;
            // die;
            if ($changePassword) {
                header("Location: ./changePassword.php?error=Password changed successfully.");
                exit;
                echo "Password changed successfully.";
            } else {
                header("Location: ./changePassword.php?error=Failed to change password. Please try again.");
                exit;
                echo "Failed to change password. Please try again.";
            }
        } else {
            header("Location: ./changePassword.php?error=New password and confirm password do not match.");
            exit;
            echo "New password and confirm password do not match.";
        }
    } else {
        header("Location: ./changePassword.php?error=Incorrect current password.");
        exit; // Stop further execution
    }
}
?>
