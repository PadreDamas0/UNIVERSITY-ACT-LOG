<?php
include_once 'core/models.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $qualification = $_POST['qualification'];
    $specialization = $_POST['specialization'];

   
    createApplicant($first_name, $last_name, $email, $phone, $qualification, $specialization);

    
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Applicant</title>
</head>
<body>
    <h1>Create New Applicant</h1>
    <form method="POST">
        <label>First Name:</label><br>
        <input type="text" name="first_name" required><br><br>
        
        <label>Last Name:</label><br>
        <input type="text" name="last_name" required><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Phone:</label><br>
        <input type="text" name="phone" required><br><br>
        
        <label>Qualification:</label><br>
        <input type="text" name="qualification" required><br><br>
        
        <label>Specialization:</label><br>
        <input type="text" name="specialization" required><br><br>

        <button type="submit">Create Applicant</button>
    </form>
</body>
</html>
