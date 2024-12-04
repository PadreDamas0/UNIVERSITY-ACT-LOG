<?php

require_once('core/models.php');

$id = $_GET['id'] ?? null;
$applicant = null;


if ($id) {
    $applicant = getApplicantById($id);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $qualification = $_POST['qualification'];
    $specialization = $_POST['specialization'];

    
    $result = updateApplicant($id, $first_name, $last_name, $email, $phone, $qualification, $specialization);
    if ($result['statusCode'] == 200) {
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Applicant</title>
    <style>
         body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            width: 80%;
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="submit"],
        button {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        input[type="submit"]:focus,
        button:focus {
            outline: none;
            border-color: #4CAF50;
        }

        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            text-align: left;
        }

        table th,
        table td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        .action-links a {
            margin-right: 10px;
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }

        .action-links a:hover {
            color: #45a049;
        }

        .search-bar input {
            width: 80%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin: 10px auto;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Applicant</h1>
        <form method="POST">
            <label>First Name: <input type="text" name="first_name" value="<?= $applicant['first_name'] ?>" required></label>
            <label>Last Name: <input type="text" name="last_name" value="<?= $applicant['last_name'] ?>" required></label>
            <label>Email: <input type="email" name="email" value="<?= $applicant['email'] ?>" required></label>
            <label>Phone: <input type="text" name="phone" value="<?= $applicant['phone'] ?>" required></label>
            <label>Qualification: <input type="text" name="qualification" value="<?= $applicant['qualification'] ?>" required></label>
            <label>Specialization: <input type="text" name="specialization" value="<?= $applicant['specialization'] ?>" required></label>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
