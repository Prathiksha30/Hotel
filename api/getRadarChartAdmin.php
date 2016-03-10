<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";
session_start();

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
global $conn;
  if ($stmt = $conn->prepare("SELECT COUNT(*) FROM `user_services` WHERE `dept_id`="1" AND MONTH(delivery_time)="02"")) 
        {
            $stmt->execute();
            $stmt->bind_result($bill_item, $amount);
            
            // // -----------------------------------------------------------
            // /*
            // OKK!! we also need colors for each item and we're not storing
            // colors in DB, therefore we pick it we just hard it here. :D 
            // */   
            // // $colors = ['indigo','red','maroon','yellow','black','blue','indigo','violet'];          
            // $colors = ['#00ffff','#00ff80','#668cff','#8000ff','#ff6666']; 
            // //to set different colors for different items
            // $i = 0;
            // // -----------------------------------------------------------
      
            while ($stmt->fetch()) {  
                  $pie_chart_data[] = array('value' => $amount, 'label' => $bill_item, 'color'=>$colors[$i],'hightlight'=>$colors[$i+1]);
                $i++;
                
                }
            $stmt->close();
            echo json_encode($pie_chart_data);
         
        }
        else 
        {
                printf("Error message: %s\n", $conn->error);
        }
var data = {
    labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 90, 81, 56, 55, 40]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 96, 27, 100]
        }
    ]
};
?>
