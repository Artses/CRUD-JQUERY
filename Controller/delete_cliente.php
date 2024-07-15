<?php
include '../Model/conexao.php';
include '../Model/Manager.php';

$manager = new Manager();

$id = $_POST['id'];

if (isset($id) && !empty($id)) {
    $manager->delete_client($id);
    header("Location: ../index.php?cod=1");
} else {
    header("Location: ../index.php?cod=0");
}
