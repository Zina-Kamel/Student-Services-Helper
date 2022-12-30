<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Manage Events</title>
    <link rel="stylesheet" href="indexStyles.css">
    <link rel="stylesheet" href="../../../css/profileStyles.css">
    <link rel="stylesheet" href="../../../css/adminFunctionStyles.css">
    <link rel="icon" type="image/x-icon" href="../../../logos/favicon.ico">
    <script src="../../../js/Profile.js"></script>
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



</head>

<body>

    <div>
        <?php
        require_once __DIR__ . '/vendor/autoload.php';
        $client = new MongoDB\Client("mongodb://localhost:27017");

        $past_events_collection = $client->student_services_db->past_events;

        $cursor = $past_events_collection->find();
        // print_r($cursor);


        ?>

        <h2>Search for any event by any identifier:</h2>
        <div class="box">
            <!-- <forms name="search"> -->
            <input id="myInput" type="text" class="search_text" placeholder="&#x1F50D;" name="txt" onmouseout="this.value = ''; this.blur();">
            <!-- </form> -->
        </div>
        <table class="table-main">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Club</th>
                    <th>Registrants</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($cursor as $document) { ?>
                    <tr>
                        <th><?php echo $document['_id'] ?></th>
                        <th><?php echo $document['Event_Name'] ?></th>
                        <th><?php

                            foreach ($document['Date'] as $x => $y) {
                                echo $y . "<br>";
                            }
                            ?></ul>
                        </th>
                        <th><?php echo $document['Club'] ?></th>

                        <th>
                            <?php

                            foreach ($document['Email_Addresses'] as $x => $y) {
                                echo $y . "<br>";
                            }
                            ?></ul>
                        </th>


                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>