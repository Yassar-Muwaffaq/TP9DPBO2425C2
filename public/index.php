<?php
// Hubungkan ke database dan model
require_once __DIR__ . '/../src/config/database.php';
require_once __DIR__ . '/../src/models/Game.php';
require_once __DIR__ . '/../src/models/Developer.php';
require_once __DIR__ . '/../src/models/Genre.php';

// Routing sederhana
$page   = $_GET['page']   ?? 'games';
$action = $_GET['action'] ?? 'list';
$id     = $_GET['id']     ?? null;

// Inisialisasi model
$gameModel = new Game($pdo);
$devModel  = new Developer($pdo);
$genreModel = new Genre($pdo);

// Layout header

switch ($page) {
  // ================= GAMES =================
  case 'games':
    if ($action === 'create') {
        if ($_POST) {
            $gameModel->create($_POST);
            header('Location: ?page=games');
            exit;
        }
        $developers = $devModel->getAll();
        $genres = $genreModel->getAll();
        include __DIR__ . '/../src/views/games/form.php';
    } elseif ($action === 'edit' && $id) {
        if ($_POST) {
            $gameModel->update($id, $_POST);
            header('Location: ?page=games');
            exit;
        }
        $game = $gameModel->getById($id);
        $developers = $devModel->getAll();
        $genres = $genreModel->getAll();
        include __DIR__ . '/../src/views/games/form.php';
    } elseif ($action === 'delete' && $id) {
        $gameModel->delete($id);
        header('Location: ?page=games');
        exit;
    } else {
        $games = $gameModel->getAll();
        include __DIR__ . '/../src/views/games/list.php';
    }
    break;

  // ================= DEVELOPERS =================
  case 'developers':
    if ($action === 'create') {
        if ($_POST) {
            $devModel->create($_POST);
            header('Location: ?page=developers');
            exit;
        }
        include __DIR__ . '/../src/views/developers/form.php';
    } elseif ($action === 'edit' && $id) {
        if ($_POST) {
            $devModel->update($id, $_POST);
            header('Location: ?page=developers');
            exit;
        }
        $developer = $devModel->getById($id);
        include __DIR__ . '/../src/views/developers/form.php';
    } elseif ($action === 'delete' && $id) {
        $devModel->delete($id);
        header('Location: ?page=developers');
        exit;
    } else {
        $developers = $devModel->getAll();
        include __DIR__ . '/../src/views/developers/list.php';
    }
    break;

  // ================= GENRES =================
  case 'genres':
    if ($action === 'create') {
        if ($_POST) {
            $genreModel->create($_POST);
            header('Location: ?page=genres');
            exit;
        }
        include __DIR__ . '/../src/views/genres/form.php';
    } elseif ($action === 'edit' && $id) {
        if ($_POST) {
            $genreModel->update($id, $_POST);
            header('Location: ?page=genres');
            exit;
        }
        $genre = $genreModel->getById($id);
        include __DIR__ . '/../src/views/genres/form.php';
    } elseif ($action === 'delete' && $id) {
        $genreModel->delete($id);
        header('Location: ?page=genres');
        exit;
    } else {
        $genres = $genreModel->getAll();
        include __DIR__ . '/../src/views/genres/list.php';
    }
    break;

  default:
    echo "<div class='container'><h2>Page not found</h2></div>";
    break;
}

// Layout footer
