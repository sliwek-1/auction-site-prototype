<?php 

    include_once('connection.php');

    $sql = "SELECT * FROM auctions";
    $request = $conn->prepare($sql);

    $request->execute();

    $result = $request->fetchAll(PDO::FETCH_ASSOC);

    $text = "";

    $response = [];

    foreach($result as $row){
        $id = $row['id_auction'];

        $sql2 = "SELECT id_auction, src FROM images WHERE id_auction = :id_auction";
        $req = $conn->prepare($sql2);
        $req->bindParam(':id_auction',$id);
        $req->execute();

        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        
        $data = [
            'title' => $row['title'],
            'cena' => $row['cena'],
            'opis' => $row['opis'],
            'data_start' => $row['data_start'],
            'data_end' => $row['data_end'],
            'id_auction' => $row['id_auction'],
            'images' => $res
        ];

        array_push($response,$data);
    }

    header('application/json');
    echo json_encode($response);
?>