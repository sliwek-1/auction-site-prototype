<?php 
    session_start();
    include_once('php/connection.php');
    $userID = $_SESSION['userID'];
    
    if(isset($userID)){
        $sql = "SELECT imie, nazwisko from users where id = :id";
        $request = $conn->prepare($sql);
        $request->bindParam(':id', $userID);
        $request->execute();

        $response = $request->fetch(PDO::FETCH_ASSOC);
    }
?>

<header class="header">
    <div class="logo">
        <a href="index.php"><h1>Serwis Aukcujny</h1></a>
    </div>
    <?php if(isset($userID)) { ?>
        <nav class="nav">
            <div class="user-name">
                <p><?= $response['imie']." ".$response['nazwisko'] ?></p>
            </div>
            <ol class="list-items">
                <li class="list-item"><a href="create.php?userID=<?= $userID ?>" class="btn">Utwórz aukcje</a></li>
                <li class="list-item"><a href="manage.php?userID=<?= $userID ?>" class="btn">Zarządzaj aukcjami</a></li>
                <li class="list-item"><a href="logout.php?userID=<?= $userID ?>" class="btn">Wyloguj</a></li>
            </ol>
        </nav>
    <?php } else { ?>
        <nav class="nav">
            <div class="user-name">
                <p>Gość</p>
            </div>
            <ol class="list-items">
                <li class="list-item"><a href="login-page.php" class="btn">Zaloguj się</a></li>
                <li class="list-item"><a href="register-page.php" class="btn">Zarejestruj się</a></li>
            </ol>
        </nav>
    <?php } ?>
</header>