<?php

include 'core/models.php';


$applicants = getApplicants();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants List</title>
</head>
<body>
    <h1>University Teacher Applications</h1>

    <div class="back-button">
        <a href="index.php"><button>Back to Home</button></a>
    </div>

    <!-- Table structure -->
    <table border="1">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Qualification</th>
                <th>Specialization</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($applicants): ?>
                <?php foreach ($applicants as $applicant): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($applicant['first_name']); ?></td>
                        <td><?php echo htmlspecialchars($applicant['last_name']); ?></td>
                        <td><?php echo htmlspecialchars($applicant['email']); ?></td>
                        <td><?php echo htmlspecialchars($applicant['phone']); ?></td>
                        <td><?php echo htmlspecialchars($applicant['qualification']); ?></td>
                        <td><?php echo htmlspecialchars($applicant['specialization']); ?></td>
                        <td>
                            
                            <a href="edit.php?id=<?php echo $applicant['id']; ?>" style="padding: 5px 10px; background-color: blue; color: white; text-decoration: none;">Edit</a> 
                            | 
                           
                            <a href="delete.php?id=<?php echo $applicant['id']; ?>" onclick="return confirm('Are you sure you want to delete this applicant?')" style="padding: 5px 10px; background-color: red; color: white; text-decoration: none;">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No applicants found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
