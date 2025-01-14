<?php

// コードベースのファイルのオートロード
spl_autoload_extensions(".php"); 
spl_autoload_register();

// composerの依存関係のオートロード
require_once 'vendor/autoload.php';

// クエリ文字列からパラメータを取得
$min = $_GET['min'] ?? 2;
$max = $_GET['max'] ?? 5;

// パラメータが整数であることを確認
$min = (int)$min;
$max = (int)$max;

$employees = Helpers\RandomGenerator::employees($min,$max);
$restaurantLocations = Helpers\RandomGenerator::restaurantChains($min,$max);
$restaurantChains = Helpers\RandomGenerator::restaurantChains($min, $max);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Restaurant Chain Mockup</title>
</head>
<body>
    <?php foreach ($restaurantChains as $restaurantChain): ?>
        <div>
            <?php echo $restaurantChain->toHTML(); ?>  
        </div>      
    <?php endforeach; ?>
</body>
</html>
