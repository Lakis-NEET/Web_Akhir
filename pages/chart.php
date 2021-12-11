<?php

$dist_year = mysqli_query($connection, "SELECT DISTINCT YEAR(comic_release) FROM comic_list ORDER BY comic_release");
$year_arr = [];
while ($row = mysqli_fetch_row($dist_year)) {
    $year_arr[$row[0]] = '0';
}
foreach ($year_arr as $key => $val) {
    $result = mysqli_query($connection, "SELECT COUNT(comic_release) FROM comic_list WHERE YEAR(comic_release) = $key");
    $test = mysqli_fetch_row($result);
    $year_arr[$key] = $test[0];
}

$dataPoints = array();
foreach ($year_arr as $key => $val) {
    $singleData = array("y" => $val, "label" => $key);
    array_push($dataPoints, $singleData);
}


?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Annual Comics Release"
                },
                axisY: {
                    title: "Number of Comics"
                },
                data: [{
                    type: "line",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>