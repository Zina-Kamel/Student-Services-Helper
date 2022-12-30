<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>View sessions</title>

    <link rel="stylesheet" href="../../../css/adminFunctionStyles.css">

    <link rel="icon" type="image/x-icon" href="../../../logos/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#sessionsTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</head>
<?php
require_once __DIR__ . '/vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");

$sessions_collection = $client->student_services_db->sessions;

$cursor = $sessions_collection->find();
?>

<body>
    <h2>Search for any session by any identifier:</h2>
    <div class="box">
        <input id="myInput" type="text" class="search_text" placeholder="&#x1F50D;" name="txt" onmouseout="this.value = ''; this.blur();">
    </div>

    <br><br>

    <table class="table-main">
        <thead>
            <tr>
                <th>ID</th>
                <th>Time</th>
                <th>Emails</th>
                <th>Topic</th>
                <th>Location</th>
                <th>Activity </th>
                <th>Start</th>
                <th>End</th>
                
            </tr>
        </thead>
        <tbody id="sessionsTable">
            <?php
            foreach ($cursor as $document) { ?>
                <tr>
                    <td><?php echo $document['Session_ID'] ?></td>
                    <td><?php

                        foreach ($document['Timestamp'] as $x => $y) {
                            echo $y . "<br>";
                        }
                        ?></ul>

                    </td>

                    <td><?php

                        foreach ($document['Participants_Emails'] as $x => $y) {
                            echo $y . "<br>";
                        }
                        ?></ul>

                    </td>
                    </td>
                    <td><?php echo $document['Topic'] ?></td>
                    <td><?php echo $document['Location'] ?></td>
                   
                    <td><?php echo $document['Activity'] ?></td>
                    <td><?php echo $document['Start_Time'] ?></td>
                    <td><?php echo $document['End_Time'] ?></td>

                </tr>
            <?php } ?>

        </tbody>
    </table>


</body>

</html>

</body>