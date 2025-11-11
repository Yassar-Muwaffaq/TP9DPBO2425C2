<?php
class Genre {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM genres ORDER BY name ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM genres WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO genres (name) VALUES (?)");
        $stmt->execute([$data['name']]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE genres SET name = ? WHERE id = ?");
        $stmt->execute([$data['name'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM genres WHERE id = ?");
        $stmt->execute([$id]);
    }
}
