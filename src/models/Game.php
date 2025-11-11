<?php
class Game {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("
            SELECT g.id, g.title, g.release_year, g.rating, g.price,
                   d.name AS developer, d.id AS developer_id,
                   ge.name AS genre, ge.id AS genre_id
            FROM games g
            JOIN developers d ON g.developer_id = d.id
            JOIN genres ge ON g.genre_id = ge.id
            ORDER BY g.id ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM games WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("
            INSERT INTO games (title, developer_id, genre_id, release_year, rating, price)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['title'],
            $data['developer_id'],
            $data['genre_id'],
            $data['release_year'] ?? null,
            $data['rating'] ?? null,
            $data['price'] ?? null
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("
            UPDATE games SET title = ?, developer_id = ?, genre_id = ?, release_year = ?, rating = ?, price = ?
            WHERE id = ?
        ");
        $stmt->execute([
            $data['title'],
            $data['developer_id'],
            $data['genre_id'],
            $data['release_year'] ?? null,
            $data['rating'] ?? null,
            $data['price'] ?? null,
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM games WHERE id = ?");
        $stmt->execute([$id]);
    }
}
