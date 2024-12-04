<?php
include_once 'core/models.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $applicant = getApplicantById($id);

    if (!$applicant) {
        echo 'Applicant not found.';
        exit;
    }
} else {
    echo 'Invalid ID. The ID must be a numeric value.';
    exit;
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
        echo $result['message'];
    } else {
        echo $result['message'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Applicant</title>
</head>
<body>

<h2>Edit Applicant</h2>

<form action="edit.php?id=<?php echo htmlspecialchars($id); ?>" method="POST">
    <label for="first_name">First Name:</label><br>
    <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($applicant['first_name']); ?>"><br><br>

    <label for="last_name">Last Name:</label><br>
    <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($applicant['last_name']); ?>"><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($applicant['email']); ?>"><br><br>

    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($applicant['phone']); ?>"><br><br>

    <label for="qualification">Qualification:</label><br>
    <input type="text" id="qualification" name="qualification" value="<?php echo htmlspecialchars($applicant['qualification']); ?>"><br><br>

    <label for="specialization">Specialization:</label><br>
    <input type="text" id="specialization" name="specialization" value="<?php echo htmlspecialchars($applicant['specialization']); ?>"><br><br>

    <button type="submit">Update Applicant</button>
</form>

<a href="delete.php?id=<?php echo htmlspecialchars($id); ?>" onclick="return confirm('Are you sure you want to delete this applicant?');">
    <button>Delete Applicant</button>
</a>

</body>
</html>
