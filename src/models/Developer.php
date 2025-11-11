<?php
class Developer {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM developers ORDER BY name ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM developers WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO developers (name, country) VALUES (?, ?)");
        $stmt->execute([$data['name'], $data['country'] ?? null]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE developers SET name = ?, country = ? WHERE id = ?");
        $stmt->execute([$data['name'], $data['country'] ?? null, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM developers WHERE id = ?");
        $stmt->execute([$id]);
    }
}
