<?php

// Retrieve environment variables
$instanceUnixSocket = getenv("INSTANCE_UNIX_SOCKET");
$dbUser = getenv("DB_USER");
$dbPass = getenv("DB_PASS");
$dbName = getenv("DB_NAME");

try {
    // Construct DSN (Data Source Name) for Cloud SQL Unix socket
    $dsn = "mysql:unix_socket={$instanceUnixSocket};dbname={$dbName}";

    // Create PDO connection
    $conn = new PDO($dsn, $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $memberName = $_POST['memberName'];
    $team = $_POST['team'];

    $sql = "INSERT INTO members (member, team) VALUES (:member, :team)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':member', $memberName);
    $stmt->bindParam(':team', $team);
    $stmt->execute();

    echo "Member added successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
