<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier une ToDo List</title>
</head>
<body>
    <?php require("barreNav.php") ?>
    <form method="post" action="?action=modifieLaListe&liste=<?= $_REQUEST["liste"]?>">
        <table>
            <thead>
            <tr>
                <th>Nouveau nom de la liste</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="text" name="nomListe"></td>
            </tr>
            </tbody>
        </table>
        <input value="Annuler" type="reset">
        <input value="Ajouter" type="submit">
    </form>
</body>
</html>