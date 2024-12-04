<?php
include_once 'core/models.php';


$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';


$applicants = getApplicants($searchTerm);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Applicants</title>
</head>
<body>
    <h1>Applicants</h1>

    <!-- Search Bar -->
    <form method="GET">
        <input type="text" name="search" placeholder="Search applicants" value="<?php echo htmlspecialchars($searchTerm); ?>">
        <button type="submit">Search</button>
    </form>

    <h2>Applicants List</h2>
    <table border="1">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Qualification</th>
            <th>Specialization</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($applicants as $applicant): ?>
        <tr>
            <td><?php echo htmlspecialchars($applicant['first_name']); ?></td>
            <td><?php echo htmlspecialchars($applicant['last_name']); ?></td>
            <td><?php echo htmlspecialchars($applicant['email']); ?></td>
            <td><?php echo htmlspecialchars($applicant['phone']); ?></td>
            <td><?php echo htmlspecialchars($applicant['qualification']); ?></td>
            <td><?php echo htmlspecialchars($applicant['specialization']); ?></td>
            <td>
                <!-- Edit Button -->
                <form action="edit.php" method="GET">
                    <input type="hidden" name="id" value="<?php echo $applicant['id']; ?>">
                    <button type="submit">Edit</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="create.php">Create New Applicant</a>
</body>
</html>
