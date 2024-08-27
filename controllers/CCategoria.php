<?php
// src/controllers/CCategoria.php
require_once __DIR__ . '/../models/MCategoria.php';
require_once __DIR__ . '/../views/VCategoria.php';

class CCategoria
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new MCategoria();
        $this->view = new VCategoria();
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['create'])) {
                $this->createCategoria();
            } elseif (isset($_POST['update'])) {
                $this->updateCategoria();
            } elseif (isset($_POST['delete'])) {
                $this->deleteCategoria();
            }
        } elseif (isset($_GET['edit'])) {
            $this->editCategoria();
        } else {
            $this->showAll();
        }
    }

    private function createCategoria()
    {
        $descripcion = $_POST['descripcion'];
        $this->model->create($descripcion);
        $this->showAll();
    }

    private function updateCategoria()
    {
        $id = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $this->model->update($id, $descripcion);
        $this->showAll();
    }

    private function deleteCategoria()
    {
        $id = $_POST['id'];
        $this->model->delete($id);
        $this->showAll();
    }

    private function editCategoria()
    {
        $id = $_GET['edit'];
        $categorias = $this->model->findAll();
        $editingCategoria = $this->model->findById($id);
        $this->view->render($categorias, $editingCategoria);
    }

    private function showAll()
    {
        $categorias = $this->model->findAll();
        $this->view->render($categorias);
    }
}
?>
