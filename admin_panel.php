<?php
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Database connection
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "ln_database";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Approve Ticket Purchase
    if (isset($_POST['approve_ticket'])) {
        $ticketId = mysqli_real_escape_string($conn, $_POST['ticket_id']);
        $updateTicket = "UPDATE ticket_purchases SET approved = 1 WHERE id = '$ticketId'";
        if (!mysqli_query($conn, $updateTicket)) {
            echo "Error: " . mysqli_error($conn);
        }
    }

    // Cancel Ticket Purchase
    if (isset($_POST['cancel_ticket'])) {
        $ticketId = mysqli_real_escape_string($conn, $_POST['ticket_id']);
        $deleteTicket = "UPDATE ticket_purchases SET approved = 0 WHERE id = '$ticketId'";
        if (!mysqli_query($conn, $deleteTicket)) {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Fetch tickets for approval
$pendingTickets = mysqli_query($conn, "SELECT * FROM ticket_purchases WHERE approved = 2 ORDER BY username, created_at DESC");

// Fetch approved tickets grouped by user
$approvedTickets = mysqli_query($conn, "SELECT * FROM ticket_purchases WHERE approved = 1 ORDER BY username, created_at DESC");

// Fetch data for User vs Total Purchase graph
$graphDataQuery = "SELECT username, SUM(total_amount) AS total_purchase FROM ticket_purchases GROUP BY username";
$graphResult = mysqli_query($conn, $graphDataQuery);

$usernames = [];
$totalPurchases = [];

if ($graphResult) {
    while ($row = mysqli_fetch_assoc($graphResult)) {
        $usernames[] = $row['username'];
        $totalPurchases[] = $row['total_purchase'];
    }
}

// Fetch data for Date vs Total Purchase graph
$dateGraphQuery = "SELECT DATE(created_at) AS purchase_date, SUM(total_amount) AS daily_total FROM ticket_purchases GROUP BY DATE(created_at)";
$dateGraphResult = mysqli_query($conn, $dateGraphQuery);

$purchaseDates = [];
$dailyTotals = [];

if ($dateGraphResult) {
    while ($row = mysqli_fetch_assoc($dateGraphResult)) {
        $purchaseDates[] = $row['purchase_date'];
        $dailyTotals[] = $row['daily_total'];
    }
}

// Fetch data for Approved, Canceled, and Waiting tickets
$statusGraphQuery = "
    SELECT 
        DATE(created_at) AS ticket_date,
        SUM(CASE WHEN approved = 1 THEN total_amount ELSE 0 END) AS approved_total,
        SUM(CASE WHEN approved = 0 THEN total_amount ELSE 0 END) AS canceled_total,
        SUM(CASE WHEN approved = 2 THEN total_amount ELSE 0 END) AS waiting_total
    FROM ticket_purchases
    GROUP BY DATE(created_at)";
$statusGraphResult = mysqli_query($conn, $statusGraphQuery);

$statusDates = [];
$approvedTotals = [];
$canceledTotals = [];
$waitingTotals = [];

if ($statusGraphResult) {
    while ($row = mysqli_fetch_assoc($statusGraphResult)) {
        $statusDates[] = $row['ticket_date'];
        $approvedTotals[] = $row['approved_total'];
        $canceledTotals[] = $row['canceled_total'];
        $waitingTotals[] = $row['waiting_total'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-header {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .badge-approved {
            background-color: #28a745;
            font-size: 0.9rem;
        }
        .badge-canceled {
            background-color: #dc3545;
            font-size: 0.9rem;
        }
        .badge-waiting {
            background-color: #ffc107;
            font-size: 0.9rem;
        }
        .section-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #343a40;
        }
        .ticket-card {
            border: 2px solid #dee2e6;
            transition: transform 0.2s ease;
        }
        .ticket-card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
<div class="container my-5">
    <a href="logout.php" class="btn btn-danger">Logout</a>

    <h1 class="text-center text-primary mb-5">Admin Panel</h1>

    <!-- Graphs -->
    <div class="row">
        <div class="card mb-5 col mx-2">
            <div class="card-header bg-primary text-white">Purchase</div>
            <div class="card-body">
                <canvas id="purchaseChart" width="30%" height="20"></canvas>
            </div>
        </div>

        <div class="card mb-5 col mx-2">
            <div class="card-header bg-info text-white">Statistics</div>
            <div class="card-body">
                <canvas id="datePurchaseChart" width="30%" height="20"></canvas>
            </div>
        </div>

        <div class="card mb-5 col mx-2">
            <div class="card-header bg-success text-white">Status</div>
            <div class="card-body">
                <canvas id="statusChart" width="30%" height="20"></canvas>
            </div>
        </div>
    </div>

    <!-- Pending Tickets -->
    <div class="mb-5">
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">Tickets Pending Approval</div>
            <div class="card-body">
                <?php if (mysqli_num_rows($pendingTickets) > 0): ?>
                    <?php 
                    $currentUsername = '';
                    while ($ticket = mysqli_fetch_assoc($pendingTickets)): 
                        if ($currentUsername !== $ticket['username']): 
                            $currentUsername = $ticket['username'];
                            if ($currentUsername !== ''): ?>
                                </div>
                            <?php endif; ?>
                            <div class="row mb-4 px-5">
                                <h5 class="section-title">User: <?php echo htmlspecialchars($currentUsername); ?></h5>
                        <?php endif; ?>
                        <div class="col-md-4 mb-3">
                            <div class="card ticket-card">
                                <div class="card-body">
                                    <h5 class="card-title text-warning">Passenger: <?php echo htmlspecialchars($ticket['name']); ?></h5>
                                    <p class="card-text">
                                        <strong>Phone:</strong> <?php echo htmlspecialchars($ticket['phone']); ?><br>
                                        <strong>Seats:</strong> <?php echo htmlspecialchars($ticket['seats']); ?><br>
                                        <strong>Total Amount:</strong> BDT <?php echo htmlspecialchars($ticket['total_amount']); ?><br>
                                        <strong>Travel Date:</strong> <?php echo date('F j, Y', strtotime($ticket['travel_date'])); ?>
                                    </p>
                                    <form method="POST" action="" class="d-flex justify-content-between">
                                        <input type="hidden" name="ticket_id" value="<?php echo $ticket['id']; ?>">
                                        <button type="submit" name="approve_ticket" class="btn btn-success btn-sm">Approve</button>
                                        <button type="submit" name="cancel_ticket" class="btn btn-danger btn-sm">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p class="text-muted">No pending tickets to approve or cancel.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Approved Tickets -->
    <div class="container">
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Approved Tickets</div>
            <div class="card-body">
                <?php if (mysqli_num_rows($approvedTickets) > 0): ?>
                    <?php 
                    $currentUsername = '';
                    while ($ticket = mysqli_fetch_assoc($approvedTickets)): 
                        if ($currentUsername !== $ticket['username']): 
                            $currentUsername = $ticket['username'];
                            if ($currentUsername !== ''): ?>
                                </div>
                            <?php endif; ?>
                            <div class="row mb-4 px-5">
                                <h5 class="section-title">User: <?php echo htmlspecialchars($currentUsername); ?></h5>
                        <?php endif; ?>
                        <div class="col-md-4 mb-3">
                            <div class="card ticket-card border-success">
                                <div class="card-body">
                                    <h5 class="card-title text-success">Passenger: <?php echo htmlspecialchars($ticket['name']); ?></h5>
                                    <p class="card-text">
                                        <strong>Phone:</strong> <?php echo htmlspecialchars($ticket['phone']); ?><br>
                                        <strong>Seats:</strong> <?php echo htmlspecialchars($ticket['seats']); ?><br>
                                        <strong>Total Amount:</strong> BDT <?php echo htmlspecialchars($ticket['total_amount']); ?><br>
                                        <strong>Travel Date:</strong> <?php echo date('F j, Y', strtotime($ticket['travel_date'])); ?>
                                    </p>
                                    <span class="badge badge-approved">Approved</span>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p class="text-muted">No approved tickets to display.</p>
                <?php endif; ?>
            </div>
        </div>
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

<script>
    const ctx1 = document.getElementById('purchaseChart').getContext('2d');
    const purchaseChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($usernames); ?>,
            datasets: [{
                label: 'Total Purchase Amount (BDT)',
                data: <?php echo json_encode($totalPurchases); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'User vs Total Purchase Amount'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctx2 = document.getElementById('datePurchaseChart').getContext('2d');
    const datePurchaseChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($purchaseDates); ?>,
            datasets: [{
                label: 'Daily Total Purchase (BDT)',
                data: <?php echo json_encode($dailyTotals); ?>,
                fill: false,
                borderColor: 'rgba(54, 162, 235, 1)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'Date vs Total Purchases'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctx3 = document.getElementById('statusChart').getContext('2d');
    const statusChart = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($statusDates); ?>,
            datasets: [
                {
                    label: 'Approved',
                    data: <?php echo json_encode($approvedTotals); ?>,
                    borderColor: 'rgba(40, 167, 69, 1)',
                    tension: 0.1,
                    fill: false
                },
                {
                    label: 'Canceled',
                    data: <?php echo json_encode($canceledTotals); ?>,
                    borderColor: 'rgba(220, 53, 69, 1)',
                    tension: 0.1,
                    fill: false
                },
                {
                    label: 'Waiting',
                    data: <?php echo json_encode($waitingTotals); ?>,
                    borderColor: 'rgba(255, 193, 7, 1)',
                    tension: 0.1,
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'Ticket Status vs Total Amount'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>
