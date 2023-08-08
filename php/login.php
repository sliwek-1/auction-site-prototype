<?php 
    declare(strict_types=1);
    session_start();

    $email = $_POST['email'];
    $passwd = $_POST['passwd'];

    function validate(string $data): string{
        trim($data);
        htmlentities($data);
        htmlspecialchars($data);
        return $data;
    }

    if(!empty($email) && !empty($passwd)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            include_once('connection.php');
        
            $sql = "SELECT COUNT(*) as 'count',id FROM users WHERE email = :email AND passwd = :passwd";
            $request = $conn->prepare($sql); 
            $request->bindParam(':email',$email);
            $request->bindParam(':passwd',$passwd);
            $request->execute();

            $response = $request->fetch(PDO::FETCH_ASSOC);
                            
            $count = (int) $response['count'];
                            
            if($count == 1){
                $_SESSION['userID'] = $response['id'];
                if(isset($_SESSION['userID'])){
                    echo "Logowanie powiodło się";
                }else{
                    echo "Coś poszło nie tak";
                }
            }else{
               echo "Nieprawidłowa kombinacja adresu email oraz hasła";
            }
        }else {
            echo "Email jest nie poprawny";
        }
    }
?>