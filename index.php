<?php
include __DIR__ . '/Views/header.php';
if (!isset($_SESSION['auth_token'])) {
    header('Location: login.php');
    exit;
}
?>

<section class="container">
    <h2>Home</h2>
</section>

<?php
include __DIR__ . '/Views/footer.php';
?>