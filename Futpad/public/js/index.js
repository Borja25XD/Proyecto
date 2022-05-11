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

// function addProduct(product){
    
// }

// $(document).ready(function(){
//     $('category_list .category_item[category="all"]').addClass('ct_item-active');

//     $('category_item').click(function(){
//         var catProduct = $(this).attr('category');
        
//         $('.category_item').removeClass('ct_item-active');
//         $(this).addClass('ct_item-active');

//         $('product-item').hide();

//         $('.product-item[category="'+catProduct+'"]').show();
//     });
//     $('.category_item[category="all"]').click(function(){
//         $('.product-item').show();
//     });
// });



