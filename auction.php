<?php 
    error_reporting(0);
    session_start();
    include_once('php/connection.php');

    if(!isset($_SESSION['userID'])){
        header('Location: index.php');
    }

    $auctionID = $_GET['auctionID'];

    $sql = "SELECT * FROM auctions WHERE id_auction = :id_auction";
    $request = $conn->prepare($sql);
    $request->bindParam(':id_auction', $auctionID);
    $request->execute();
    $response = $request->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = "SELECT src FROM images WHERE id_auction = :id_auction";
    $request2 = $conn->prepare($sql2);
    $request2->bindParam(':id_auction',$auctionID);
    $request2->execute();
    $response2 = $request2->fetchAll(PDO::FETCH_ASSOC);
    
    $data = $response[0];

    $images = $response2;

    $i = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="./js/slider.js" defer></script>
    <title>Aukcja - <?= $data['title'] ?></title>
</head>
<body>
    <?php include_once('komponenty/header.php'); ?>
    <div class="auction">
        <div class="img-auction-section">
            <button class="backward-btn"><</button>
            <?php foreach($images as $img) { ?>
                <div class="img-section" data-id="<?= $i ?>">
                    <img src="php/<?= $img['src'] ?>" alt="#">
                </div>
            <?php 
                $i++;
                }
            ?>
            <button class="forward-btn">></button>
        </div>
        <div class="pagination-img">
            <?php foreach($images as $img) { ?>
                <div class="img-pagination" data-id="<?= $i ?>">
                    <img src="php/<?= $img['src'] ?>" alt="#">
                </div>
            <?php 
                $i++;
                }
            ?>
        </div>
        <div class="info-auction-section">
            <div class="title"><?= $data['title'] ?></div>
            <div class="cena">Cena Wywoławcza: <?= $data['cena'] ?></div>
            <div class="opis"><?= $data['opis'] ?></div>
        </div>
    </div>
</body>
</html>