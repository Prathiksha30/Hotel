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
    document.getElementById("cartTotal").innerHTML = totalamount;

    item_name = $(".name_"+fieldName).attr('field');
    name = $('input[name='+item_name+']').val();
    if (!totalitems)
        totalitems=[];
    totalitems.push(name);
    alert(totalitems);
    //bill start logic 1
    // get handle on div
    var container = document.getElementById('cartBill');
    // create table element
    var table = document.createElement('table');
    var tbody = document.createElement('tbody');
    // loop array
    for (i = 0; i < totalitems.length; i++) {
        // get inner array
        var vals = totalitems[i];
        // create tr element
        var row = document.createElement('tr');
        // loop inner array
        for (var b = 0; b < vals.length; b++) {
            // create td element
            var cell = document.createElement('td');
            // set text
            cell.textContent = vals[b];
            // append td to tr
            row.appendChild(cell);
        }
        //append tr to tbody
        tbody.appendChild(row);
    }
    // append tbody to table
    table.appendChild(tbody);
    // append table to container
    container.appendChild(table);
    //bill end logic 1
    
    // result=find_duplicates(totalitems);
    //  for (var i = 0; i < totalitems.lenght-1 ,i++)
    // {
    //     document.getElementById("cartBill").innerHTML = "<td>"+totalitems[i]+"</td>";
    // }
    // for (var i=0; i<result.lenght-1,i++)
    // {
    //     document.getElementById("cartBill").innerHTML = "<td>"+result[i]+"</td>";
    // }
      // document.getElementById("cartBill").innerHTML = "<td>"+totalitems[i]+"</td><td>"+price+"</td>";

});
// function find_duplicates(arr) {
//   var len=arr.length,
//       out=[],
//       counts={};

//   for (var i=0;i<len;i++) {
//     var item = arr[i];
//     counts[item] = counts[item] >= 1 ? counts[item] + 1 : 1;
//   }

//   for (var item in counts) {
//     if(counts[item] > 1)
//       out.push(item);
//   }

//   return out;
// }


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
    }
    alert(totalitems);
    // for(var i=0; i<totalitems.length;i++)
    // {
    //     if(name==totalitems[i])
    //     {
    //         for(var j=i;j<totalitems.length-1;j++)
    //         {
    //             totalitems[j]=totalitems[j+1];
    //         }
    //     }
    // }
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
        alert(response);
        alert('Cart saved');
        window.location.reload();
      }
  });
   
});