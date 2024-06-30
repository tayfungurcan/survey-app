<?php
require_once("connect.php")
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="settings/style.css">

    <title>Document</title>
</head>
<body>
    <?php
    $surveyQuery        =   $databaseConnection->prepare("SELECT * FROM survey LIMIT 1");
    $surveyQuery->execute();
    $numberOfRecords    =   $surveyQuery->rowCount();
    $record             =   $surveyQuery->fetch(PDO::FETCH_ASSOC);

    $numberOfVotesForTheFirstOption             = $record["votecountone"];
    $numberOfVotesForTheSecondOption            = $record["votecounttwo"];
    $numberOfVotesForTheThirdOption             = $record["votecountthree"];
    $totalNumberOfVotes                         = $record["totalvotes"];

    $calculateThePercentageForTheFirstOption    =($numberOfVotesForTheFirstOption / $totalNumberOfVotes) * 100;
    $percentageForTheFirstOption                =number_format($calculateThePercentageForTheFirstOption, 2, ",", "");
    $calculateThePercentageForTheSecondOption   =($numberOfVotesForTheSecondOption / $totalNumberOfVotes) * 100;
    $percentageForTheSecondOption               =number_format($calculateThePercentageForTheSecondOption, 2, ",", "");
    $calculateThePercentageForTheThirdOption    =($numberOfVotesForTheThirdOption / $totalNumberOfVotes) * 100;
    $percentageForTheThirdOption                =number_format($calculateThePercentageForTheThirdOption, 2, ",", "");

    if($numberOfRecords>0){
    ?>
        <table width="300" align="center" border="0" cellpadding="0" cellspacing="0" class="form">
            <tr height="30">
                <td colspan="2"><?php echo $record["question"]; ?></td>
            </tr>
            <tr height="30">
                <td width="75">%<?php echo $percentageForTheFirstOption; ?></td>
                <td width="225"><?php echo $record["answerone"]; ?></td>
            </tr>
            <tr height="30">
                <td width="75">%<?php echo $percentageForTheSecondOption; ?></td>
                <td width="225"><?php echo $record["answertwo"]; ?></td>
            </tr>
            <tr height="30">
                <td width="75">%<?php echo $percentageForTheThirdOption; ?></td>
                <td width="225"><?php echo $record["answerthree"]; ?></td>
            </tr>
            <tr height="30">
                <td colspan="2" align="right"> <a href="index.php" >Ana Sayfaya Dön</a></td>
            </tr>
        </table>
    <?php
    }else{
        header("Location:index.php");
        exit();
    }
    ?>
</body>
</html>

<?php
$databaseConnection = null;
?>