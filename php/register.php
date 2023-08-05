<?php 
    declare(strict_types=1);

    $name = $_POST['name'];
    $surrname = $_POST['surrname'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $repeat_passwd = $_POST['repeat-passwd'];

    function validate(string $data): string{
        trim($data);
        htmlentities($data);
        htmlspecialchars($data);
        return $data;
    }
    
    if(!empty($name) && !empty($surrname) && !empty($email) && !empty($passwd) && !empty($repeat_passwd)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if($passwd == $repeat_passwd){
                if(strlen($passwd) >= 8){
                    if(preg_match('/[A-Z]/', $passwd)){
                        if(preg_match('/[0-9]/', $passwd)){
                            include_once('connection.php');

                            $sql = "SELECT COUNT(*) as 'count' FROM users WHERE email = :email";
                            $request = $conn->prepare($sql); 
                            $request->bindParam(':email',$email);
                            $request->execute();

                            $response = $request->fetch(PDO::FETCH_ASSOC);
                            
                            $count = (int) $response['count'];
                            
                            if($count == 0){
                                $sql2 = "INSERT INTO users(imie,nazwisko,email,passwd,repeat_passwd) VALUES (:imie,:nazwisko,:email,:passwd,:repeat_passwd)";
                                $request2 = $conn->prepare($sql2);
                                $request2->bindParam(':imie', $name);
                                $request2->bindParam(':nazwisko', $surrname);
                                $request2->bindParam(':email', $email);
                                $request2->bindParam(':passwd', $passwd);
                                $request2->bindParam(':repeat_passwd', $repeat_passwd);

                                $request2->execute();

                                if($request2){
                                    echo "Rejestracja się powiodła";
                                }else{
                                    echo "Rejestracja się nie powiodła";
                                }
                            }else{
                                echo "Użytkownik o takim adresie email jest już zarejestrowany";
                            }
                        }else{
                            echo "Hasło musi zawierać conajmniej jedną cyfre";
                        }
                    }else{
                        echo "Hasło musi zawirać conajmniej jedną wielką litere ";
                    }
                }else{
                    echo "Hasło musi zawierać więcej niż 8 liter";
                }
            }else{
                echo "Hasła nie są takie same";
            }
        }else{
            echo "Email jest niepoprawny";
        }
    }else{
        echo "Pola nie mogą być puste";
    }