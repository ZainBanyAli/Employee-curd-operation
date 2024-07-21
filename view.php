<?php
include 'crudForm.php';


if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "No ID provided!";
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM crud WHERE id = $id";
$result = $conn->query($sql);

if (!$result) {
    echo "Error: " . $conn->error;
    exit;
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No record found";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employee</title>

   
</head>
<body>
    <div class="container mt-5">
        <h1>Employee Details</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> <?php echo htmlspecialchars($row['id']); ?></p>
                <p><strong>first_name :</strong> <?php echo htmlspecialchars($row['first_name']); ?></p>
                <p><strong>last_name :</strong> <?php echo htmlspecialchars($row['last_name']); ?></p>

                <p><strong>Address:</strong> <?php echo htmlspecialchars($row['Address']); ?></p>
                <p><strong>salary:</strong> <?php echo htmlspecialchars($row['salary']); ?></p>
                <a href="index.php" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</body>
</html>
