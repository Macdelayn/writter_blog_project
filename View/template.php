 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title  ?></title>
        <link href="View/style.css" rel="stylesheet" /> 
    </head>
    <header>
        <form class="identification">
        <div>
            <label for="userId">Pseudo</label><br />
            <input type="text" id="userId" name="userId" />
        </div>
        <div>
            <label for="pass">mot de passe</label><br />
            <input type="password" id="pass" name="pass">
        </div>
        <div>
            <input type="submit" />
        </div>
        <a href="">S'inscrire</a>
        </form>
    </header>    
    <body>
        <?= $content ?>
    </body>
</html>
