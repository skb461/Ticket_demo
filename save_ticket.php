<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "ln_database";

// Establish the database connection
$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Only handle the POST request for inserting data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input values
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phn = mysqli_real_escape_string($conn, $_POST['phn']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $seats = mysqli_real_escape_string($conn, $_POST['seats']);
    $totalAmount = mysqli_real_escape_string($conn, $_POST['grandTotal']);
    $travelDate = mysqli_real_escape_string($conn, $_POST['travel_date']);

    // Insert the ticket data into the database
    $insertQuery = "INSERT INTO ticket_purchases (username, name, phone, email, seats, total_amount, travel_date, approved) 
                    VALUES ('$username', '$name', '$phn', '$email', '$seats', '$totalAmount', '$travelDate', '2')";

    if (!mysqli_query($conn, $insertQuery)) {
        die("Error: " . mysqli_error($conn));
    } else {
        // Redirect to ticket_history.php
        header("Location: ticket_history.php?id=" . urlencode($username));
        exit(); // Ensure no further code is executed
    }
}

// Fetch the saved tickets from the database
$selectQuery = "SELECT * FROM ticket_purchases ORDER BY created_at DESC";
$result = mysqli_query($conn, $selectQuery);

mysqli_close($conn);
?>
