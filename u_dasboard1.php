<!--[if IE 8 ]>    <html lang="ru" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="ru" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Test</title>
    <script src="libs/jquery.min.js"></script>
    <script src="libs/chart.js"></script>
</head>

<body>
    <canvas id="myChart" width="400" height="400"></canvas>
<script>
  
    $.get('api/getPiechartData.php',function(data){
        console.log(data);
        // we need to convert string data into array!
        // therefore, we need to use parseJSON() function to convert data
        // sent by php to valid JS array, otherwise it will just 
        // treat it as string and NO CHARTS!! 
        ndata = jQuery.parseJSON(data);
        var ctx = document.getElementById("myChart").getContext("2d");
        var myNewChart = new Chart(ctx).Pie(ndata);
    });

</script>
</body>

</html>