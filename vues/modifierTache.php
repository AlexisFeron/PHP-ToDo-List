<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier une tâche</title>
</head>
<body>
    <?php require("barreNav.php") ?>
    <form method="post" action="">
        <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Faite</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="text"></td>
                <td><input type="checkbox"></td>
            </tr>
            </tbody>
        </table>
        <input value="Annuler" type="reset">
        <input value="Ajouter" type="submit">
    </form>
</body>
</html>