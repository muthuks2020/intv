<?php
include_once('db.php');

if (isset($_POST['id']) && isset($POST['is_allowed']))
{
    $id = $_POST['id'];
    $is_allowed = $_POST['is_allowed'];
    echo mysql_query("UPDATE hub_manpower SET is_allowed = $is_allowed WHERE reporting_manager_id = $id") or die('Error: ' . mysql_error());
    exit;
}

$result = mysql_query("SELECT reporting_manager_id, reporting_manager_name, is_allowed FROM hub_database") or die('Error: ' . mysql_error());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        function changeState(id, oldState) {
            $.post("manage.php",
                {
                    id: id,
                    is_allowed: !oldState
                },
                function(data, status){
                    console.log("Data: " + data + "\nStatus: " + status);
                });
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Basic Table</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Username</th>
            <th>Is Allowed</th>
        </tr>
        </thead>
        <tbody>
        <?php


        while ($line = mysql_fetch_assoc($result)) {
            echo "<tr>";

            echo "<td>" . $line['reporting_manager_name'] . "</td>";
            echo "<td><input type=\"checkbox\" onchange='changeState(". $line['reporting_manager_id'] .", ". $line['is_allowed'] .")' checked='" . $line['is_allowed'] . "' ></td>";
            echo "</tr>\n";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
