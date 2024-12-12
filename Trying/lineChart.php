<?php
include "connection.php";

// Query SQL untuk mengambil data 5 tahun terakhir
$sql = "
    SELECT 
        YEAR(dp.TGL_KEGIATAN) AS tahun,
        COUNT(dp.ID_DETAIL) AS jumlah_kegiatan,
        SUM(t.poin) AS jumlah_poin
    FROM 
        PRESTASI p
    JOIN 
        DETAIL_PRESTASI dp ON p.ID_DETAIL = dp.ID_DETAIL
    JOIN 
        TINGKAT t ON p.ID_TINGKAT = t.ID_TINGKAT
    WHERE 
        YEAR(dp.TGL_KEGIATAN) BETWEEN YEAR(GETDATE()) - 5 AND YEAR(GETDATE())
    GROUP BY 
        YEAR(dp.TGL_KEGIATAN)
    ORDER BY 
        YEAR(dp.TGL_KEGIATAN) ASC;
";

// Menjalankan query dan mengambil hasil
$stmt = $conn->query($sql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Menyiapkan array untuk data tahun dan poin
$years = [];
$points = [];
$amount = [];

// Mengambil data dari hasil query dan menyimpannya dalam array
if ($data) {
    foreach ($data as $row) {
        $years[] = $row['tahun'];
        $points[] = $row['jumlah_poin'];
        $amount[] = $row['jumlah_kegiatan'];
    }
} else {
    // Jika tidak ada data, gunakan data default (contoh)
    $years = [2019, 2020, 2021, 2022, 2023, 2024];
    $points = [0, 0, 0, 0, 0, 0];
    $amount = [0, 0, 0, 0, 0, 0];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart.js with PHP and SQL Server</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        canvas {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

    <script>
        // Menyusun data dari PHP ke dalam JavaScript
        const xValues = <?php echo json_encode($years); ?>;
        const pointValues = <?php echo json_encode($points); ?>;
        const amountValues = <?php echo json_encode($amount); ?>;

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    label: "Kenaikan Poin",
                    fill: true,
                    backgroundColor: "rgba(0, 0, 255, 0.2)",
                    borderColor: "rgba(0,0,255,0.1)",
                    lineTension: 0.1,
                    borderWidth: 5,
                    data: pointValues
                },{
                    label: "Kenaikan Prestasi",
                    fill: true,
                    lineTension: 0.1,
                    backgroundColor: "rgba(255, 0, 30, 0.2)",
                    borderColor: "rgba(255, 0, 30, 0.1)",
                    borderWidth: 5,
                    data: amountValues
                }]
            },
            options: {
                legend: {
                    display: true,
                    position: 'top'
                },
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Tahun'
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: Math.max(...pointValues) + 10 // Dinamis menyesuaikan max poin
                        }
                    }]
                }
            }
        });
    </script>

</body>

</html>