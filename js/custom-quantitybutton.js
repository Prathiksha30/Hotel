$('.qtyplus').click(function(e){
    // Stop acting like a button
    e.preventDefault();
    // Get the field name
    fieldName = $(this).attr('field');
    // Get its current value
    var currentVal = parseInt($('input[name='+fieldName+']').val());
    // If is not undefined
    if (!isNaN(currentVal)) {
        // Increment
        $('input[name='+fieldName+']').val(currentVal + 1);
    } else {
        // Otherwise put a 0 there
        $('input[name='+fieldName+']').val(0);
    }
    var item_name = document.getElementById("item_name").getAttribute("value");
    var item_price = document.getElementById("item_price").getAttribute("value");
    var totalamount= $totalamount + ($item_price * $currentVal);
    document.getElementById("cartTotal").innerHTML = $totalamount;


});
// This button will decrement the value till 0
$(".qtyminus").click(function(e) {
    // Stop acting like a button
    e.preventDefault();
    // Get the field name
    fieldName = $(this).attr('field');
    // Get its current value
    var currentVal = parseInt($('input[name='+fieldName+']').val());
    // If it isn't undefined or its greater than 0
    if (!isNaN(currentVal) && currentVal > 0) {
        // Decrement one
        $('input[name='+fieldName+']').val(currentVal - 1);
    } else {
        // Otherwise put a 0 there
        $('input[name='+fieldName+']').val(0);
    }
    var item_name = document.getElementById("item_name").getAttribute("value");
    var item_price = document.getElementById("item_price").getAttribute("value");
    var totalamount= $totalamount + ($item_price * $currentVal);
    document.getElementById("cartTotal").innerHTML = $totalamount;

}); 