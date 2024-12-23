
<?php
if (isset($_GET['id'])) {
    $username = $_GET['id'];
} else {
    // Redirect to login page if no username is found
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bus Ticket</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
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

	<main class="">

		<div class="container my-3">
		  <div class="card img-fluid border-0" style="width:100%">
		    <img class="card-img-top" src="websiteImage/banner.png" alt="Card image" style="width:100%">
		    <div class="card-img-overlay mx-auto text-center pt-5">
		      <h1 class="card-title display-1 fw-bold text-center text-light pt-5">End-to-End Travel with</h1>
		      <h1 class="card-text display-1 fw-bold text-center text-success">P Paribahan</h1>
		      <p class="card-text text-light text-center">Yes, you can run unit tests and view the results directly within the app. The<br>integrated testing features allow for a streamlined .</p>
		      <a href="#ticket_buy" class="btn btn-success text-dark p-3 fw-bold">Buy Ticket</a>
		    </div>
		  </div>
		</div>

		<div class="container bus_add">
			<div class="row">
				
			  <div class="card col mx-3 border-success shadow" style="border: 0px; border-bottom: 5px solid #198754;">
			    <div class="card-body">
			    	<div class="row">
			    		<div class="col-4">
			    			<img class="card-img-top mx-auto" src="websiteImage/people.png" alt="Card image" style="width:90%">
			    		</div>
			    		<div class="col-8">
			    			<h1 class="text-dark text-left fw-bolder">500k+</h1>
			    			<p class="text-dark text-left">Registered users</p>
			    		</div>
			    	</div>
			    </div>
			  </div>
			  <div class="card col mx-3 border-success shadow" style="border: 0px;border-bottom: 5px solid #198754;">
			    <div class="card-body">
			    	<div class="row">
			    		<div class="col-4">
			    			<img class="card-img-top mx-auto" src="websiteImage/ticket-cupon.png" alt="Card image" style="width:90%">
			    		</div>
			    		<div class="col-8">
			    			<h1 class="text-dark text-left fw-bolder">500k+</h1>
			    			<p class="text-dark text-left">Registered users</p>
			    		</div>
			    	</div>
			    </div>
			  </div>
			  <div class="card col mx-3 border-success shadow" style="border: 0px;border-bottom: 5px solid #198754;">
			    <div class="card-body">
			    	<div class="row">
			    		<div class="col-4">
			    			<img class="card-img-top mx-auto" src="websiteImage/stoppage.png" alt="Card image" style="width:90%">
			    		</div>
			    		<div class="col-8">
			    			<h1 class="text-dark text-left fw-bolder">500k+</h1>
			    			<p class="text-dark text-left">Registered users</p>
			    		</div>
			    	</div>
			    </div>
			  </div>

			</div>
		</div>

		<div class="container mt-5 pt-5">
			<h1 class="text-dark text-center"> Best Offers for you </h1>
			<div class="row mt-5">
				<div class="col mx-3">
					<div class="card img-fluid border-0" style="width:100%">
						<img class="card-img-top" src="websiteImage/ticket.png" alt="Card image" style="width:100%">
						<div class="card-img-overlay pt-5">
						  <div class="row m-0 p-0">
						  	<div class="col-8 py-3" style="padding-left: 30px;">
						  		<h1 class="text-dark fw-bolder">15% OFF</h1>
						  		<p class="text-dark">on your next purchase</p>
						  		<p class="text-muted">use by January 2024</p>
						  	</div>
						  	<div class="col-4 pt-4">
						  		<h1 class="text-dark fw-bolder">NEW15</h1>
						  		<p class="text-dark">Coupon Code</p>
						  	</div>
						  </div>
						</div>
					</div>
				</div>
				
				<div class="col mx-3">
					<div class="card img-fluid border-0" style="width:100%">
						<img class="card-img-top" src="websiteImage/ticket_pink.png" alt="Card image" style="width:100%">
						<div class="card-img-overlay pt-5">
						  <div class="row m-0 p-0">
						  	<div class="col-8 py-3" style="padding-left: 30px;">
						  		<h1 class="text-dark fw-bolder">20% OFF</h1>
						  		<p class="text-dark">on your next purchase</p>
						  		<p class="text-muted">use by January 2024</p>
						  	</div>
						  	<div class="col-4 pt-4 px-0" style="margin-left:-1%;">
						  		<h1 class="text-dark fw-bolder">Couple20</h1>
						  		<p class="text-dark">Coupon Code</p>
						  	</div>
						  </div>
						</div>
					</div>
				</div>

				<div class="mx-auto text-center">
					<a href="#" class="btn btn-outline-success p-3 fw-bolder m-4">See All Offers</a>
				</div>
			</div>	
		</div>

		<div class="container-fluid border-success main_ticket pb-5" style="border: 0px; border-top: 5px solid #198754; border-top-left-radius: 10%; border-top-right-radius: 10%;">
			<h1 class="text-center text-dark fw-bolder display-4 pt-5 pb-4 mt-5">P.H Paribahan</h1>
			<p class="text-center text-muted">Yes, you can run unit tests and view the results directly within the app. The integrated <br> testing features allow for a streamlined .</p>
			<div class="container py-5">
				<div class="card img-fluid border-0 p-0" style="width:100%">
					<img class="card-img-top" src="websiteImage/ticketWhite.png" alt="Card image" style="width:100%">
					<div class="card-img-overlay pt-3">
					  <div class="row m-0 p-0">
					  	<div class="col-9 py-4" style="padding-left: 50px;">
					  		<div class="row">
					  			<div class="col-2">
					  				<img class="card-img-top ms-auto mt-3 d-block" src="websiteImage/bus-logo.png" alt="Card image" style="width:60%">
					  			</div>
					  			<div class="col-7">
					  				<h1 class="text-dark fw-bolder">Greenline Paribahan</h1>
					  				<p class="text-muted">Coach-009-WEB ! AC_Business</p>
					  			</div>
					  			<div class="col-3">
					  				<div class="card py-2 px-4 bg-success text-light bg-opacity-75">
					  					<p class="pt-2"><img src="websiteImage/seat-green.png" width="20px" height="20px" alt=""> <span class="seatsLeft" id="SeatsLeft">40</span> Seats left</p>
					  				</div>
					  			</div>
					  		</div>
							<div class="mx-3 bg-secondary bg-opacity-25 rounded px-5">
								<div class="row pt-4 pb-3" style="border-bottom: 5px dotted #6c757d;">
									<p class="text-muted col text_l fs-5">Route</p>
									<p class="text-muted col text_r fs-5">Dhaka - Sylhet</p>
								</div>
								<div class="row pt-4 pb-3" style="border-bottom: 5px dotted #6c757d;">
									<p class="text-muted col text_l fs-5">Departure Time</p>
									<p class="text-muted col text_r fs-5">9:00 PM</p>
								</div>
								<div class="row pt-4 pb-3">
									<div class="col mx-2 bg-secondary bg-opacity-25 rounded pt-3 pb-1">
										<p class="text-center text-muted">Boarding Point - Laxmipur</p>
									</div>
									<div class="col mx-2 bg-secondary bg-opacity-25 rounded pt-3 pb-1">
										<p class="text-center text-muted">Dropping Point - Bogura</p>
									</div>
									<div class="col mx-2 bg-secondary bg-opacity-25 rounded pt-3 pb-1">
										<p class="text-center text-muted">Est. Time - 11 Hour</p>
									</div>
								</div>
							</div>
					  	</div>
					  	<div class="col-3" style="padding-left: 50px; padding-top:12.5%;">
					  		<img src="websiteImage/fare.png" class="d-block mx-auto" width="50px" height="50px" alt="">
					  		<h1 class="text-dark fw-bolder text-center">550 Taka</h1>
					  		<p class="text-muted text-center">Per Seat</p>
					  	</div>
					  </div>
					</div>
				</div>
			</div>
			<div class="container my-3 bg-white p-4 rounded" id="ticket_buy">
				<div class="row">
					<div class="col-7 p-2" style="border-right: 5px dotted #198754;">
						<p class="text-dark text-left fs-4">Select your Seats</p>
						<div class="row pt-4 pb-3 me-2" style="border-bottom: 5px dotted #6c757d;border-top: 5px dotted #6c757d;">
							<p class="text-muted col text_l fs-5"><img src="websiteImage/seat-gray.png" width="20px" height="20px" alt="">Available</p>
							<p class="text-success col text_r fs-5"><img src="websiteImage/seat-green-filled.png" width="20px" height="20px" alt="">Selected</p>
						</div>

						<div class="row_button py-2 pt-5 mx-auto">
							<span  title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >A1</span>
							<span  title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >A2</span>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition">A3</span>
							<span  title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >A4</span>
						</div>
						<div class="row_button py-2 mx-auto">
							<span  title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >B1</span>
							<span  title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >B2</span>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span  title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >B3</span>
							<span  title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >B4</span>
						</div>
						<div class="row_button py-2 mx-auto">
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >C1</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >C2</span>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition">C3</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >C4</span>
						</div>
						<div class="row_button py-2 mx-auto">
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >D1</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition">D2</span>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >D3</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >D4</span>
						</div>
						<div class="row_button py-2 mx-auto">
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >E1</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >E2</span>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >E3</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition">E4</span>
						</div>
						<div class="row_button py-2 mx-auto">
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >F1</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >F2</span>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >F3</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition">F4</span>
						</div>
						<div class="row_button py-2 mx-auto">
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >G1</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition">G2</span>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >G3</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >G4</span>
						</div>
						<div class="row_button py-2 mx-auto">
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >H1</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4" >H2</span>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >H3</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >H4</span>
						</div>
						<div class="row_button py-2 mx-auto">
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >I1</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >I2</span>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >I3</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >I4</span>
						</div>
						<div class="row_button py-2 mx-auto">
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition">J1</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >J2</span>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >J3</span>
							<span title="" class="btn btn-secondary py-3 px-5 mx-4 seatPosition" >J4</span>
						</div>
						
					</div>
					<div class="col-5">
						<div style="border-bottom: 5px dotted #6c757d;">
							<p class="text-dark text-left fs-4">Select your Seats</p>
						</div>
						<div class="py-4 main_ticket m-3 rounded p-3">
							<table class="table bg-transparent">
								<thead class="bg-transparent">
									<tr class="bg-transparent">
									  <th class="bg-transparent">Seats</th>
									  <th class="bg-transparent">Class</th>
									  <th class="bg-transparent">Price</th>
									</tr>
								</thead class="bg-transparent">
								<tbody class="table bg-transparent ticake_info_table">
									
									 
								</tbody>
								<tr class="bg-transparent">
									<th class="fw-bolder bg-transparent" colspan="2">Total</th>
									<th class="fw-bolder bg-transparent ">BDT <span class="bg-transparent totalAmount">0<span></th>
								  </tr>
							</table>
							<div class="p-3 row bg-white m-2 rounded">
								<input class="form-control col bg-transparent border-0" id="coupne" type="text" placeholder="Apply Coupne Code" value="" >
								<button onclick="myFunction()" class="btn btn-success col-3" id="cupon_apply">Apply</button>
							</div>
							<div class="row pt-4">
								<p class="text-muted col text_l fs-5 fw-bolder ">Grand Total</p>
								<p class="text-muted col text_r fs-5 fw-bold">BDT <span class="grandTotal">0</span></p>
							</div>
						</div>
						<div>
                            <form action="save_ticket.php" method="POST">
                                <input type="hidden" name="seats" id="seatsInput">
                                <input type="hidden" name="grandTotal" id="totalAmountInput">
                                <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
                                
                                <div class="my-3">
                                    <label for="name" class="fs-5 fw-bold pb-2 pt-4">Passenger Name*</label>
                                    <input type="text" class="form-control fs-6 p-3" id="name" placeholder="Enter your name" name="name" required>
                                </div>
                                <div class="my-3">
                                    <label for="phn" class="fs-5 fw-bold pb-2 pt-4">Phone Number*</label>
                                    <input type="text" class="form-control fs-6 p-3" id="phn" placeholder="Enter your phone number" name="phn" required>
                                </div>
                                <div class="my-3">
                                    <label for="email" class="fs-5 fw-bold pb-2 pt-4">Email ID</label>
                                    <input type="email" class="form-control fs-6 p-3" id="email" placeholder="Enter your email" name="email">
                                </div>
                                <div class="my-3">
                                    <label for="travelDate" class="fs-5 fw-bold pb-2 pt-4">Travel Date*</label>
                                    <input type="date" class="form-control fs-6 p-3" id="travelDate" name="travel_date" required>
                                </div>
                                <button type="submit" class="btn btn-success col-12 p-3 fs-4 fw-bolder" onclick="submitForm()">Next</button>
                            </form>
						</div>
					</div>
				</div>
						
			</div>
		</div>
		
	</main>
	<footer class="bg_dark py-5 px-5 bg-dark">
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

    <!-- ticket button function js -->
	<script src="./app.js"></script>
</body>
</html>
