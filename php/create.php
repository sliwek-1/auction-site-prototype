<?php 
    session_start();
    $userID = $_SESSION['userID'];
    $title = $_POST['title'];
    $cena = $_POST['cena'];
    $opis = $_POST['opis'];
    $data_start =  $_POST['data-start'];
    $godzina_start = $_POST['godzina-start'] < 10 ? "0" . $_POST['godzina-start'] : $_POST['godzina-start'];
    $minuta_start = $_POST['minuta-start'] < 10 ? "0" . $_POST['minuta-start'] : $_POST['minuta-start'];
    $sekunda_start = $_POST['sekunda-start'] < 10 ? "0" . $_POST['sekunda-start'] : $_POST['sekunda-start'];
    $data_end = $_POST['data-end'];
    $godzina_end = $_POST['godzina-end'] < 10 ? "0" . $_POST['godzina-end'] : $_POST['godzina-end'];
    $minuta_end = $_POST['minuta-end'] < 10 ? "0" . $_POST['minuta-end'] : $_POST['minuta-end'];
    $sekunda_end = $_POST['sekunda-end'] < 10 ? "0" . $_POST['sekunda-end'] : $_POST['sekunda-end'];

    $dataStart = $data_start . " " . $godzina_start . ":" . $minuta_start . ":" . $sekunda_start;
    $dataEnd = $data_end . " " . $godzina_end . ":" . $minuta_end . ":" . $sekunda_end;


    function validate(string $data): string{
        trim($data);
        htmlentities($data);
        htmlspecialchars($data);
        return $data;
    }

    //echo "Data Rozpoczęcia: ".$dataStart." | "."Data Zakończenia: ".$dataEnd;

    if(!empty($title) && !empty($cena) && !empty($opis) && !empty($data_start) && !empty($data_end)){
        $currentDateTime = date('Y-m-d H:i:s');
        if($currentDateTime < date($dataStart)){
            if(date($dataEnd) > date($dataStart)){
                include_once('connection.php');
                $id = time();
                $sql = "INSERT INTO auctions(id_auction,title,cena,opis,data_start,data_end) VALUES(:id_auction,:title, :cena, :opis, :data_start, :data_end)";
                $request = $conn->prepare($sql);
                $request->bindParam(':id_auction', $id);
                $request->bindParam(':title', $title);
                $request->bindParam(':cena', $cena);
                $request->bindParam(':opis', $opis);
                $request->bindParam(':data_start', $dataStart);
                $request->bindParam(':data_end', $dataEnd);

                $request->execute();

                if($request){
                    if(isset($_FILES['photos']['name']) && count($_FILES['photos']['name']) > 0){
                        $dir = "img/";
                        for($i = 0;$i <= count($_FILES['photos']['name']);$i++){
                            $fileExtension = explode('.',$_FILES['photos']['name'][$i])[1];
                            $fileName = explode('.',$_FILES['photos']['name'][$i])[0];
                            $allowedExtensions = ['jpg','png','jpeg'];
                            
                            if(in_array($fileExtension,$allowedExtensions)){
                                $fileNewName = $fileName."_". $i.".".$fileExtension;
                                $destinationFilePath = $dir.$fileNewName;
                                if(move_uploaded_file($_FILES['photos']['tmp_name'][$i],$destinationFilePath)){
                                    echo $destinationFilePath;
                                }else{
                                    echo "Coś poszło nie tak";
                                }
                            }else{
                                echo "Zdjęcie powinno mieć rozszerzenie jpg, png lub jpeg";
                            }
                        }
                    }else{
                        echo "Nie załadowana żadnych plików";
                    }

                }else{
                    echo "Coś poszło nie tak";
                }
            }else{
                echo "Data zakończenia aukcji powinna być po datcie rozpoczęcia aukcji";
            }
        }else{
            echo "Data rozpoczęcia aukcji powinna być po: ".$currentDateTime;
        }
    }else{
        echo "Pola nie mogą być puste!";
    }
?>