 <?php
 $con  = mysqli_connect("localhost","root","","casacristina");
 if (!$con) {
     # code...
    echo "Problemă cu baza de date!" . mysqli_error();
 }else{
         $sql ="SELECT * FROM bookings";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
            $booking_date[]  = date_format(date_create( $row['booking_date']),"M")  ;
            $Status[] = $row['Status'];
             $id[] = $row['id'];
        }
 }
 ?>

   <script src="js/chart1.js"></script>
<body>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = <?php echo json_encode($booking_date); ?>;
var yValues = <?php echo json_encode($Status);?>;

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
     title: {
      display: true,
      text: "Enrolees By Year Level"
    },
    legend: {
      display: false 
    },
    scales: {
      yAxes: [{ticks: {min: 0.5, max:4.5}}],

    }
  }
});