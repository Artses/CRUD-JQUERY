<?php
include '../Model/conexao.php';
include '../Model/Manager.php';

$manager = new Manager();
if (!empty($_POST)) {
    $manager->update_client($_POST);
    header("Location: ../index.php?cod=3");
}
