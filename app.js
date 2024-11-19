// All ticket buttons
let ticketBtns = document.querySelectorAll('.seatPosition');

// Ticket showing table
let ticketInfoTable = document.querySelector('.ticake_info_table');

// Total amount display
let totalAmoutDisplay = document.querySelector('.totalAmount');

// Grand total display
let grandTotalDisplay = document.querySelector('.grandTotal');

// Ticket price
let ticketprice = 550;

// Initial total ticket price
let totalAmount = 0;

// Initial check ticket
let previous_name = 0;

// Initial flag
let flag = 0;

let seatsLeft = 40;

// Hidden grand total input
let totalAmountInput = document.getElementById('totalAmountInput');

// Clicking all ticket buttons
ticketBtns.forEach((ticketBtn) => {
    ticketBtn.addEventListener('click', () => {
        if (flag < 4) {
            // Adding price to current amount
            totalAmount = totalAmount + ticketprice;

            // Update displays
            grandTotalDisplay.textContent = totalAmount;
            totalAmountInput.value = totalAmount; // Update hidden input field

            ticketBtn.className = 'btn btn-success py-3 px-5 mx-4 seatPosition';

            seatsLeft = seatsLeft - 1;
            document.getElementById('SeatsLeft').innerText = seatsLeft;
        } else {
            if (ticketBtn.className == 'btn btn-success py-3 px-5 mx-4 seatPosition') {
                ticketBtn.className = 'btn btn-success py-3 px-5 mx-4 seatPosition';
            } else {
                ticketBtn.className = 'btn btn-secondary py-3 px-5 mx-4 seatPosition';
            }
        }

        // Getting seat number
        let seatName = ticketBtn.textContent;

        // Adding booked ticket to table
        bookingTicket(seatName, ticketprice);

        // Changing the total amount on the table
        totalAmoutDisplay.textContent = totalAmount;
    });
});

// Coupon total discount
function myFunction() {
    let cuponeTotalDiscount = document.getElementById("coupne").value;

    // Changing the grand total
    if (cuponeTotalDiscount == "NEW15") {
        let discountedTotal = totalAmount - ((totalAmount * 15) / 100);
        grandTotalDisplay.textContent = discountedTotal;
        totalAmountInput.value = discountedTotal; // Update hidden input field
    } else if (cuponeTotalDiscount == "Couple20") {
        let discountedTotal = totalAmount - ((totalAmount * 20) / 100);
        grandTotalDisplay.textContent = discountedTotal;
        totalAmountInput.value = discountedTotal; // Update hidden input field
    } else {
        grandTotalDisplay.textContent = totalAmount;
        totalAmountInput.value = totalAmount; // Update hidden input field
    }
}

// Booking ticket
function bookingTicket(seatName, price) {
    if (previous_name == seatName) {
        alert("Wrong Ticket Already Booked!!\nTry Another One.");
    } else {
        if (flag < 4) {
            // Creating tr
            let tr = document.createElement('tr');

            // Adding table class list
            tr.className = 'table bg-transparent';

            // Data in td
            tr.innerHTML = `<td class="bg-transparent">${seatName}</td>
            <td class="bg-transparent">Economy</td>
            <td class="bg-transparent">${price}</td>`;

            // Adding tr-data to table
            ticketInfoTable.appendChild(tr);

            previous_name = seatName;

            flag++;
        } else {
            alert("You have selected more than four seats!!");
        }
    }
}

// Submit form function
function submitForm() {
    let selectedSeats = [];
    document.querySelectorAll('.btn-success.seatPosition').forEach((seat) => {
        selectedSeats.push(seat.textContent.trim());
    });


    // Populate hidden fields
    document.getElementById('seatsInput').value = selectedSeats.join(',');
    totalAmountInput.value = grandTotalDisplay.textContent.trim(); // Ensure the grand total is updated
}