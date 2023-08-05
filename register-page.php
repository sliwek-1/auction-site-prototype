<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="./js/show-passwd.js" defer></script>
    <script src="./js/register.js" defer></script>
    <title>Rejestracja</title>
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
        <form action="#" method="post" class="register-form form">
            <h1>Rejestracja</h1>

            <div class="form-content">
                <div class="input-element">
                    <input type="text" name="name" class="name-input input" placeholder="Imie" required /> 
                    <input type="text" name="surrname" class="surrname-input input" placeholder="Nazwisko" required />
                </div>

                <input type="text" name="email" class="email-input input" placeholder="Email" required />

                <div class="input-element">
                    <input type="password" name="passwd" class="register-passwd-input input passwd-input" placeholder="Hasło" required />

                    <input type="password" name="repeat-passwd" class="register-passwd-input input passwd-input" placeholder="Powtóż Hasło" required />
                </div>

                <div class="show-element">
                    <label for="show">Pokaż Hasło</label>
                    <input type="checkbox" name="show-passwd" class="show-passwd" />
                </div>

                <button type="submit" class="register-btn">Zarejestruj</button>

                <span class="info-acc">Masz już konto? <a href="login-page.php">Zaloguj się!</a></span>
            </div>
        </form> 
    </div>
</body>
</html>