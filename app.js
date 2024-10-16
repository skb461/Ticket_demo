//all ticket button
let ticketBtns = document.querySelectorAll('.seatPosition')

//ticket showing table
let ticketInfoTable = document.querySelector('.ticake_info_table')

//total amount display
let totalAmoutDisplay = document.querySelector('.totalAmount')

//grand total 
let grandTotalDisplay = document.querySelector('.grandTotal')

//ticket price
let ticketprice = 550;

//initial total ticket price
let totalAmount=0;

//initial check ticket
let previous_name=0;

//initial flag
let flag = 0;

let seatsLeft = 40;


//clicking all ticket btn
ticketBtns.forEach((ticketBtn)=>{
    ticketBtn.addEventListener('click',()=>{

        if (flag < 4){
            //adding price to current amount
            totalAmount=totalAmount+ticketprice;

            grandTotalDisplay.textContent=totalAmount;

            ticketBtn.className='btn btn-success py-3 px-5 mx-4 seatPosition'

            seatsLeft = seatsLeft-1;
            document.getElementById("SeatsLeft").innerText = seatsLeft;
        } else {
            if (ticketBtn.className == 'btn btn-success py-3 px-5 mx-4 seatPosition'){
                ticketBtn.className = 'btn btn-success py-3 px-5 mx-4 seatPosition'
            } else {
                ticketBtn.className='btn btn-secondary py-3 px-5 mx-4 seatPosition'
            }
        }

        //getting seat number
        let seatName = ticketBtn.textContent

        //adding booked ticket to table
        bookingTicket(seatName,ticketprice)

        //changing the total amount on table
        totalAmoutDisplay.textContent=totalAmount;
    })
})

//cupone total discount
function myFunction() {
    let cuponeTotalDiscount = document.getElementById("coupne").value;

    //changing the grand total
    if (cuponeTotalDiscount == "NEW15") {
        grandTotalDisplay.textContent=totalAmount-((totalAmount*15)/100);
    } else if (cuponeTotalDiscount == "Couple20") {
        grandTotalDisplay.textContent=totalAmount-((totalAmount*20)/100);
    } else {
        grandTotalDisplay.textContent=totalAmount;
    }
}

//booking ticket
function bookingTicket(seatName,price){
    if (previous_name == seatName) {
        alert("Wrong Ticket Already Booked!!\nTry Another One.");
    } else {
        if (flag < 4){
            //creating tr
            let tr = document.createElement('tr')

            //adding table class list
            tr.className='table bg-transparent'

            //data in td
            tr.innerHTML=`<td class="bg-transparent">${seatName}</td>
            <td class="bg-transparent">Economoy</td>
            <td class="bg-transparent">${price}</td>`

            //adding tr-data to table
            ticketInfoTable.appendChild(tr)

            previous_name = seatName;

            flag++;
        } else {
            alert("You have select more then four seats!!");
        }
    }
}