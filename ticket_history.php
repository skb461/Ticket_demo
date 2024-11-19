<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "ln_database";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the username from the URL
if (isset($_GET['id'])) {
    $username = mysqli_real_escape_string($conn, $_GET['id']);
} else {
    die("Username is required!");
}

// Fetch the user's ticket history
$query = "SELECT * FROM ticket_purchases WHERE username = '$username' ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Ticket History</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-light navbar-light justify-content-center px-5 py-3">
            <ul class="navbar-nav d-flex me-auto">
                <h3>P-Ticket</h3>
            </ul>
            <ul class="navbar-nav d-flex ms-auto">
                <li class="nav-item">
                    <span class="nav-link fw-bolder">Welcome, <?php echo htmlspecialchars($username); ?></span>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-success me-2" href="ticket_history.php?id=<?php echo urlencode($username); ?>">My Tickets</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-danger" href="index.php">Logout</a>
                </li>
            </ul>
        </nav>
    </header>
<div class="container mt-5">
    <h1 class="text-center text-success mb-4">My Ticket History</h1>
    <div class="row g-4">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $createdAt = htmlspecialchars($row['created_at']);
                $date = date('Y-m-d', strtotime($createdAt));
                $time = date('H:i:s', strtotime($createdAt));
                $status = $row['approved'] == 1 ? 'Approved' : ($row['approved'] == 0 ? 'Canceled' : 'Waiting');


                echo "
                <div class='col-md-4'>
                    <div class='card shadow-sm border-success position-relative'>
                        <div class='position-absolute top-0 end-0 m-2'>
                            <span class='badge bg-" . ($status == 'Approved' ? 'success' : ($status == 'Canceled' ? 'danger' : 'warning')) . "'>$status</span>
                        </div>
                        <div class='card-body'>
                            <h5 class='card-title text-success'>Passenger: " . htmlspecialchars($row['name']) . "</h5>
                            <p class='card-text'>
                                <strong>Phone:</strong> " . htmlspecialchars($row['phone']) . "<br>
                                <strong>Email:</strong> " . htmlspecialchars($row['email']) . "<br>
                                <strong>Seats:</strong> " . htmlspecialchars($row['seats']) . "<br>
                                <strong>Total Amount:</strong> BDT " . htmlspecialchars($row['total_amount']) . "<br>
                                <strong>Travel Date:</strong> " . date('F j, Y', strtotime($row['travel_date'])) . "
                            </p>
                        </div>
                        <div class='card-footer bg-success text-white'>
                            <small><strong>Saved On:</strong> $date</small><br>
                            <small><strong>Time:</strong> $time</small>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "
            <div class='col-12'>
                <div class='alert alert-warning text-center'>No tickets found for this user.</div>
            </div>";
        }
        ?>
    </div>
</div>
	<footer class="bg_dark py-5 px-5 bg-dark mt-5">
		<div class="row px-5 mx-5" style="border-bottom: 5px dotted #6c757d;">
			<div class="col">
				<h1 class="text-white text-left">P-Ticket</h1>
				<p class="text-left text-light">P-Ticket is a digital platform to make your<br>daily commuting better.</p>
			</div>
			<div class="col">
				<p class="text-white text_r" style="text-align: right;">Download our app</p>
				<img src="websiteImage/playstore.png" class="w-25 ms-auto d-block" alt="">
			</div>
		</div>
		<div class="row px-5 mx-5 py-3">
			<div class="col">
				<p class="text-left text-light">@all rights reserved, P-Ticket services limited.2024</p>
			</div>
			<div class="col">
				<a href="#" title="" class="btn text-light mx-2">Terms & condition</a>
				<a href="#" title="" class="btn text-light mx-2">Return & refund policy</a>
				<a href="#" title="" class="btn text-light mx-2">Privacy policy</a>
			</div>
		</div>
	</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>
