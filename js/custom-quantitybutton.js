var totalamount;
var totalitems=[];
var result=[];
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
   

    item_name = $(".name_"+fieldName).attr('field');
    name = $('input[name='+item_name+']').val();
    if (!totalitems)
        totalitems=[];
    totalitems.push(name);
    document.getElementById("cartTotal").innerHTML = totalamount;
    document.getElementById("BillItems").innerHTML = totalitems;

    
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
    item_name = $(".name_"+fieldName).attr('field');
    name = $('input[name='+item_name+']').val();
    if (!totalitems)
        totalitems=[];
    var index = totalitems.indexOf(name);
    if (index > -1) 
    {
        totalitems.splice(index, 1);
        document.getElementById("BillItems").innerHTML = totalitems;
    }
});

$('#checkOut').click(function(){
    $.ajax({
      type: 'GET',
      url: 'cart_checkout.php',
      data: {
        'totalAmount': totalamount,
        'totalItems': totalitems
      },
      success: function(response){
        // alert(response);
        alert('Cart saved');
       window.location.reload();
      }
  });  
});
