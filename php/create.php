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


    //echo "Data Rozpoczęcia: ".$dataStart." | "."Data Zakończenia: ".$dataEnd;

    if(!empty($title) && !empty($cena) && !empty($opis) && !empty($data_start) && !empty($data_end)){
        $currentDateTime = date('Y-m-d H:i:s');
        if($currentDateTime < date($dataStart)){
            if(date($dataEnd) > date($dataStart)){
                
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