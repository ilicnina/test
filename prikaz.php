<?php
session_start();

// Provera da li postoji sesija
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

// Prikaz minimalnog trajanja prisustva i ID radnika
include_once 'DAO.php';

$dao = new DAO();
$minPrisustvo = $dao->getMin();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Prikaz</title>
</head>
<body>
    <h3>Minimalno trajanje prisustva:</h3>
    <?php if ($minPrisustvo): ?>
        <p>ID: <?php echo $minPrisustvo['id']; ?></p>
        <p>Trajanje prisustva: <?php echo $minPrisustvo['trajanjePrisustva']; ?></p>
    <?php else: ?>
        <p>Nema podataka o prisustvu</p>
    <?php endif; ?>

    <a href="controller.php?action=logout">Logout</a>
</body>
</html>
