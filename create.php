<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utwórz Aukcje</title>
    <link rel="stylesheet" href="style.css">
    <script src="./js/create.js" defer></script>
</head> 
<body>
    <?php include_once('komponenty/header.php') ?>

    <main class="main-create">
        <section class="center-create-form">
            <form action="#" method="post" enctype="multipart/form-data" class="create-form">
                <h1>Utwórz nową aukcje</h1>
                <div for="tytul" class="title">Tytuł Aukcji:</div>
                <input type="text" name="title" class="input title-auction" placeholder="Tytuł">
                <div for="cena class=" class="title">Cena Wywolawcza:</div>
                <input type="number" name="cena" class="input cena" placeholder="Cena">
                
                <div class="data-start">
                    <div class="date_start title">Od kiedy: </div>
                    <input type="date" name="data-start" class="input"> 
                    <label for="godzina">Godz.</label>
                    <input type="number" name="godzina-start" min="0" max="23" value="0" class="input number">
                    <label for="minuta">Min.</label>
                    <input type="number" name="minuta-start" min="0" max="60" value="0" class="input number"> 
                    <label for="sekunda">Sec.</label>
                    <input type="number" name="sekunda-start" min="0" max="60" value="0" class="input number"> 
                </div>
                
                <div class="data-end">
                    <div class="date_end title">Do kiedy: </div>
                    <input type="date" name="data-end" class="input"> 
                    <label for="godzina">Godz.</label>
                    <input type="number" name="godzina-end" min="0" max="23" value="0" class="input number">
                    <label for="minuta">Min.</label>
                    <input type="number" name="minuta-end" min="0" max="60" value="0" class="input number">
                    <label for="sekunda">Sec.</label>
                    <input type="number" name="sekunda-end" min="0" max="60" value="0" class="input number"> 
                </div>
                
                <div for="opis" class="title">Opis produktu lub usługi:</div>
                <textarea name="opis" id="opis" placeholder="Opis"></textarea>
                <div for="images" class="title">Wybierz zdjęcia:</div>
                <input type="file" class="photo" name="photos[]" multiple>

                <button type="submit" class="submit">Utwórz</button>
            </form>
        </section>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>