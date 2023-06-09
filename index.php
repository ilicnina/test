<?php
    $msgInsert = isset($msgInsert)?$msgInsert:"";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Index strana</title>
</head>
<body>
    <form action="controller.php" method="POST">
        <h3>Unesi podatke za insert</h3>
        <input type="text" name="id" placeholder="ID"> <br>
        <input type="text" name="brRadnika" placeholder="Broj radnika"> <br>
        <input type="text" name="trajanjePrisustva" placeholder="Trajanje prisustva"> <br>
        <input type="submit" name="action" value="Insert">
    </form>
    <?php
        echo $msgInsert;
    ?>
</body>
</html>