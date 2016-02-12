var totalamount;
var totalitems=[];
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

    item_price = $(".price_"+fieldName).attr('field');
    // Get its current value
    price = $('input[name='+item_price+']').val();
    if (!totalamount)
        totalamount = 0;
    totalamount = parseInt(totalamount) + parseInt(price);
    document.getElementById("cartTotal").innerHTML = totalamount;

    item_name = $(".name_"+fieldName).attr('field');
    name = $('input[name='+item_name+']').val();
    if (!totalitems)
        totalitems=[];
    totalitems=totalitems+" "+name;
    // var indexOfTotalItems=totalitems.length - 1;
    // alert(indexOfTotalItems);
    // totalitems = totalitems.splice(parseInt(indexOfTotalItems),0,name);
     document.getElementById("cartBill").innerHTML = "<div><td>"+totalitems+" </td><td>  "+(price*(currentVal+1))+"</td><br><div>";

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

    item_price = $(".price_"+fieldName).attr('field');
    // Get its current value
    if (currentVal != 0)
    {
        price = $('input[name='+item_price+']').val();
        if (!totalamount)
            totalamount = 0;
        totalamount = parseInt(totalamount) - parseInt(price);
        document.getElementById("cartTotal").innerHTML = totalamount;
    }
    
}); 