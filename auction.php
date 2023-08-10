<?php 
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

    $data = array_merge($response, $response2);

    print_r($data);
?>