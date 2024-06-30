<?php
require_once("connect.php");
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="settings/style.css">
    <title>Anket</title>
</head>
<body>
    <?php
    $surveyQuery = $databaseConnection->prepare("SELECT * FROM survey LIMIT 1");
    $surveyQuery->execute();
    $numberOfRecords = $surveyQuery->rowCount();
    $record = $surveyQuery->fetch(PDO::FETCH_ASSOC);

    if($numberOfRecords > 0){
    ?>
    <form action="vote.php" method="post" class="form">
        <table width="300" align="center" border="0" cellpadding="0" cellspacing="0">
            <tr height="30">
                <td colspan="2"><?php echo htmlspecialchars($record["question"]); ?></td>
            </tr>
            <tr height="30">
                <td width="25"><input type="radio" name="answer" value="1"></td>
                <td width="275"><?php echo htmlspecialchars($record["answerone"]); ?></td>
            </tr>
            <tr height="30">
                <td width="25"><input type="radio" name="answer" value="2"></td>
                <td width="275"><?php echo htmlspecialchars($record["answertwo"]); ?></td>
            </tr>
            <tr height="30">
                <td width="25"><input type="radio" name="answer" value="3"></td>
                <td width="275"><?php echo htmlspecialchars($record["answerthree"]); ?></td>
            </tr>
            <tr height="30">
                <td colspan="2"><input type="submit" value="Oyunu Gönder" class="blueButton"></td>
            </tr>
            <tr height="30">
                <td colspan="2" align="right"><a href="results.php">Anket Sonuçlarını Göster</a></td>
            </tr>
        </table>
    </form>
    <?php
    } else {
        echo "<div class='center-text'>Anket Bulunmuyor.</div>";
    }
    ?>
</body>
</html>

<?php
$databaseConnection = null;
?>
