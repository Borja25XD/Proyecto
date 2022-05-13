let bookingDate =  document.querySelector("#bookingDate");
let today = new Date().toISOString().split('T')[0];
let dtToday = new Date();
// let shoppingCart = document.querySelector(".shopping-cart");

run();

function run() {
    setDateLimits();
}

function setDateLimits() {
    let year = dtToday.getFullYear() + 1;
    let month = dtToday.getMonth();
    let day = dtToday.getDate();

    if(month < 10) {
        month = '0' + month.toString();
    }
    if(day < 10) {
        day = '0' + day.toString();
    }
    
    let maxDate =   year + '-' + month + '-' + day;

    bookingDate.setAttribute("min", today);
    bookingDate.setAttribute("max", maxDate);
}