<?php


try {
    $pdo = new PDO('mysql:host=localhost;dbname=casil_university_application', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}


function createApplicant($first_name, $last_name, $email, $phone, $qualification, $specialization, $user_id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("INSERT INTO applicants (first_name, last_name, email, phone, qualification, specialization) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$first_name, $last_name, $email, $phone, $qualification, $specialization]);
        logActivity($pdo, $user_id, 'insert', "Created applicant: $first_name $last_name");
        return ['message' => 'Applicant created successfully!', 'statusCode' => 200];
    } catch (PDOException $e) {
        return ['message' => 'Error inserting applicant: ' . $e->getMessage(), 'statusCode' => 400];
    }
}



function getApplicants($search = '') {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM applicants WHERE first_name LIKE ? OR last_name LIKE ? OR email LIKE ? OR phone LIKE ? OR qualification LIKE ? OR specialization LIKE ?");
        $stmt->execute(["%$search%", "%$search%", "%$search%", "%$search%", "%$search%", "%$search%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return ['message' => 'Error retrieving applicants: ' . $e->getMessage(), 'statusCode' => 400];
    }
}


function getApplicantById($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM applicants WHERE applicant_id = ?");
        $stmt->execute([$id]);

        $applicant = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$applicant) {
            error_log("No applicant found with ID: " . $id);  
            return false;
        }

        return $applicant;

    } catch (PDOException $e) {
        error_log("Error retrieving applicant: " . $e->getMessage());  
        return false;
    }
}



function updateApplicant($id, $first_name, $last_name, $email, $phone, $qualification, $specialization, $user_id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("UPDATE applicants SET first_name = ?, last_name = ?, email = ?, phone = ?, qualification = ?, specialization = ? WHERE applicant_id = ?");
        $stmt->execute([$first_name, $last_name, $email, $phone, $qualification, $specialization, $id]);
        logActivity($pdo, $user_id, 'update', "Updated applicant ID: $id");
        return ['message' => 'Applicant updated successfully!', 'statusCode' => 200];
    } catch (PDOException $e) {
        return ['message' => 'Error updating applicant: ' . $e->getMessage(), 'statusCode' => 400];
    }
}



function deleteApplicant($id, $user_id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("DELETE FROM applicants WHERE applicant_id = ?");
        $stmt->execute([$id]);
        logActivity($pdo, $user_id, 'delete', "Deleted applicant ID: $id");
        return ['message' => 'Applicant deleted successfully!', 'statusCode' => 200];
    } catch (PDOException $e) {
        return ['message' => 'Error deleting applicant: ' . $e->getMessage(), 'statusCode' => 400];
    }
}



function getApplicants($search = '', $user_id = null) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM applicants WHERE first_name LIKE ? OR last_name LIKE ? OR email LIKE ? OR phone LIKE ? OR qualification LIKE ? OR specialization LIKE ?");
        $stmt->execute(["%$search%", "%$search%", "%$search%", "%$search%", "%$search%", "%$search%"]);
        if ($user_id) {
            logActivity($pdo, $user_id, 'search', "Searched for: $search");
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return ['message' => 'Error retrieving applicants: ' . $e->getMessage(), 'statusCode' => 400];
    }
}


?>
