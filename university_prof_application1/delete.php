<?php
include_once 'core/models.php';


$id = $_GET['id'];
deleteApplicant($id);


header('Location: index.php');
exit();
?>
