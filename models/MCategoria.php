<?php
// src/models/MCategoria.php
require_once __DIR__ . '/../config/DBHelper.php';

class MCategoria
{
    private $db;

    public function __construct()
    {
        $this->db = new DBHelper();
    }

    public function create($descripcion)
    {
        $conn = $this->db->createConnection();
        $sql = "INSERT INTO categoria (descripcion) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$descripcion]);
    }

    public function findAll()
    {
        $conn = $this->db->createConnection();
        $sql = "SELECT * FROM categoria";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function findById($id)
    {
        $conn = $this->db->createConnection();
        $sql = "SELECT * FROM categoria WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function update($id, $descripcion)
    {
        $conn = $this->db->createConnection();
        $sql = "UPDATE categoria SET descripcion = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$descripcion, $id]);
    }

    public function delete($id)
    {
        $conn = $this->db->createConnection();
        $sql = "DELETE FROM categoria WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }
}
?>
