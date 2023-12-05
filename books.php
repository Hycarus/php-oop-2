<?php
include __DIR__ . '/Views/header.php';
include __DIR__ . '/Model/Book.php';
if (!isset($_SESSION['auth_token'])) {
    header('Location: login.php');
    exit;
}
$books = Book::fetchAll();
?>

<section class="container">
    <h2>Books</h2>
    <div class="row">
        <?php
        foreach ($books as $item) {
            $item->printCard();
        }
        ?>
    </div>
</section>

<?php
include __DIR__ . '/Views/footer.php';
?>