<?php
include __DIR__ . '/Views/header.php';
include __DIR__ . '/Model/Game.php';
if (!isset($_SESSION['auth_token'])) {
    header('Location: login.php');
    exit;
}
$games = Game::fetchAll();
?>

<section class="container">
    <h2>Games</h2>
    <div class="row">
        <?php
        foreach ($games as $item) {
            $item->printCard($item->formatCard());
        }
        ?>
    </div>
</section>

<?php
include __DIR__ . '/Views/footer.php';
?>