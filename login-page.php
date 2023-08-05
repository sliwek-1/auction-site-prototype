<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="./js/show-passwd.js" defer></script>
    <script src="./js/login.js" defer></script>
    <title>Logowanie</title>
    <style>
        body{
            overflow:hidden;
        }
    </style>
</head>
<body>

    <?php include_once('./komponenty/header.php') ?>

    <div class="center-form">
        <div class="error">
            
        </div>
        <form action="#" method="post" class="login-form form">
            <h1>Logowanie</h1>

            <div class="form-content">
                <div class="input-element">
                    <input type="text" name="email" class="email-input input" placeholder="Email" required />
                </div>

                <div class="input-element">
                    <input type="password" name="passwd" class="passwd-input input" placeholder="Hasło" required />
                </div>

                <div class="show-element">
                    <label for="show">Pokaż Hasło</label>
                    <input type="checkbox" name="show-passwd" class="show-passwd" />
                </div>

                <button type="submit" class="register-btn">Zaloguj się</button>

                <span class="info-acc">Nie masz jeszcze konta? <a href="register-page.php">Zarejestruj się!</a></span>
            </div>
        </form> 
    </div>
</body>
</html>