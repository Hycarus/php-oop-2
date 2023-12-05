<?php
function login()
{
    if ((isset($_POST['email']) && $_POST['email'] !== '') && (isset($_POST['password']) && $_POST['password'] !== '')) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $error = checkPassword($password);
        if ($error) {
            return $error;
        }
        $_SESSION['auth_token'] = rand(10000, 99999) . $email;
    }
    if (!empty($_SESSION['auth_token'])) {
        header('Location: index.php');
    }
}
function checkPassword($password)
{
    if (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters';
        return $error;
    } else {
        return false;
    }
}
