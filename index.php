<?php
include __DIR__ . '/Views/header.php';
include __DIR__ . '/Model/Helper.php';
include __DIR__ . '/Model/Game.php';
if (!isset($_SESSION['auth_token'])) {
    header('Location: login.php');
    exit;
}
$gameImage = Game::getRndImage();
$movieImage = Helper::getRndImage('/movie_db.json', 'poster_path');
$bookImage = Helper::getRndImage('/books_db.json', 'thumbnailUrl');
?>

<section class="container">
    <h2>Home</h2>
    <div class="d-flex justify-content-between ">
        <a href="movies.php" class="my-square border-1 border position-relative overflow-y-hidden">
            <h4 class="position-absolute text-danger">Movies</h4>
            <img class="w-100  " src="<?= $movieImage ?>" alt="movie">
        </a>
        <a href="books.php" class="my-square border-1 border position-relative overflow-y-hidden">
            <h4 class="position-absolute text-danger">Books</h4>
            <img class="w-100 " src="<?= $bookImage ?>" alt="book">
        </a>
        <a href="games.php" class="my-square border-1 border position-relative overflow-y-hidden">
            <h4 class="position-absolute text-danger">Games</h4>
            <img class="w-100 " src="<?= $gameImage ?>" alt="game">
        </a>
    </div>
</section>

<?php
include __DIR__ . '/Views/footer.php';
?>