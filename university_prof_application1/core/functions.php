<?php
function getApplicants($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM applicants");
        $applicants = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'message' => 'Applicants fetched successfully.',
            'statusCode' => 200,
            'querySet' => $applicants
        ];
    } catch (Exception $e) {
        return [
            'message' => 'Error fetching applicants: ' . $e->getMessage(),
            'statusCode' => 400
        ];
    }
}
