<?php

define('SERVER', "localhost");
define('USERNAME', "root");
//define('PASSWORD',"");
define('PASSWORD', "ad@pro123");
define('DATABASE', "hub");
@mysql_connect(SERVER, USERNAME, PASSWORD);
mysql_select_db(DATABASE);

if (isset($_POST['id']) && isset($_POST['b_approval']))
{
    $id = $_POST['id'];
    $b_approval = $_POST['b_approval'];
    return mysql_query("UPDATE hub_user SET b_approval = $b_approval WHERE eid = $id") or die('Error: ' . mysql_error());

}

$result = mysql_query("SELECT hub_user.eid, hub_managers.name, b_approval FROM hub_managers INNER JOIN hub_user ON hub_user.eid = hub_managers.eid") or die('Error: ' . mysql_error());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>2adpro</title>
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
                    b_approval: !oldState
                },
                function(data, status){
                    console.log("Data: " + data + "\nStatus: " + status);
                });
        }
    </script>
</head>
<body>

<div class="container">
    <h2>User List</h2>
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

            echo "<td>" . $line['name'] . "</td>";
            echo "<td><input type=\"checkbox\" onchange='changeState(". $line['eid'] .", ". ord($line['b_approval']) .")' ". (ord($line['b_approval']) ? "checked" : "") ." ></td>";
            echo "</tr>\n";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
