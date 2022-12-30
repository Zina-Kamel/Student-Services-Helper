<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>View Classrooms</title>

    <link rel="stylesheet" href="../../../css/adminFunctionStyles.css">

    <link rel="icon" type="image/x-icon" href="../../../logos/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#classroomsTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>
</head>
<?php
require_once __DIR__ . '/vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");

$classrooms_collection = $client->student_services_db->classrooms;

$cursor = $classrooms_collection->find();
?>

<body>
    <h2>Search for any room by any identifier:</h2>
    <div class="box">
        <input id="myInput" type="text" class="search_text" placeholder="&#x1F50D;" name="txt" onmouseout="this.value = ''; this.blur();">
    </div>

    <br><br>

    <table class="table-main">
        <thead>
            <tr>
                <th>ID</th>
                <th>Building Code</th>
                <th>Building Name</th>
                <th>Room Category</th>
                <th>Building Name</th>
                <th>Booking ID</th>
                <th>AC Status</th>
                <th>Availabiity</th>
                <th>Electricity Status</th>
            </tr>
        </thead>
        <tbody id="classroomsTable">
            <?php
            foreach ($cursor as $document) { ?>
                <tr>
                    <td><?php echo $document['_id'] ?></td>
                    <td><?php echo $document['Building_Code'] ?></td>
                    <td><?php echo $document['Building_Name'] ?></td>
                    <td><?php echo $document['Room'] ?></td>
                    <td><?php echo $document['Room_Category'] ?></td>
                    <td><?php

                        foreach ($document['Booking_ID'] as $x => $y) {
                            echo $y . "<br>";
                        }
                        ?></ul>
                        </th>
                    </td>
                    <td><?php echo $document['AC_Status'] ?></td>
                    <td><?php echo $document['Availability'] ?></td>
                    <td><?php echo $document['Elec_Status'] ?></td>

                </tr>
            <?php } ?>

        </tbody>
    </table>


</body>

</html>

</body>