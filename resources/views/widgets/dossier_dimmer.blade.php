@extends('voyager::master')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>New Folders Analytics</title>
</head>

<body>
    <div style="background-color:rgba(43, 45, 56, 0.80)">
    <?php
    $con = new mysqli('localhost', 'root', '', 'laravel');
    $query = $con->query("
    SELECT 
      MONTHNAME(created_at) as monthname,
        count(dossier_pedagogique) as amount
    FROM professeurs
    GROUP BY monthname
  ");

    foreach ($query as $data) {
        $month[] = $data['monthname'];
        $amount[] = $data['amount'];
    }

    ?>
    <?php
    $con = new mysqli('localhost', 'root', '', 'laravel');
    $query = $con->query("
    SELECT 
      MONTHNAME(created_at) as monthname,
        count(dossier_scientifique) as amount
    FROM professeurs
    GROUP BY monthname
  ");

    foreach ($query as $data) {
        $month[] = $data['monthname'];
        $amount[] = $data['amount'];
    }

    ?>
    <?php
    $con = new mysqli('localhost', 'root', '', 'laravel');
    $query = $con->query("
    SELECT 
      MONTHNAME(created_at) as monthname,
        count(dossier_administratif) as amount
    FROM professeurs
    GROUP BY monthname
  ");

    foreach ($query as $data) {
        $month[] = $data['monthname'];
        $amount[] = $data['amount'];
    }

    ?>

<div>

    <div style=" width:400px; display: inline-block; margin-left:200px;">
        <canvas id="myChart"></canvas>
    </div>
    <div style=" width:400px; display: inline-block;">
        <canvas id="lineChart"></canvas>
    </div>
</div>

    <div style="width: 400px; margin-left:400px;">
        <canvas id="pieChart"></canvas>
    </div>

    <script>
        // === include 'setup' then 'config' above ===
        const labels = <?php echo json_encode($month) ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'Dossiers par mois',
                data: <?php echo json_encode($amount) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        const config2 = {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
        var lineChart = new Chart(
            document.getElementById('lineChart'),
            config2
        );

        const config3 = {
            type: 'pie',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        var pieChart = new Chart(
            document.getElementById('pieChart'),
            config3
        );
    </script>
</div>
</body>

</html>
@endsection