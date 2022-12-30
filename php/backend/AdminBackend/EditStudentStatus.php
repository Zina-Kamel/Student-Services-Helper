<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Manage Events</title>
    <link rel="stylesheet" href="../../../css/indexStyles.css">
    <link rel="stylesheet" href="../../../css/profileStyles.css">
    <link rel="stylesheet" href="../../../css/adminFunctionStyles.css">

    <link rel="icon" type="image/x-icon" href="../../../logos/favicon.ico">
    <script src="../../../js/Profile.js"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#cTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</head>

<body>
    <h2>Search for any student by any identifier:</h2>
    <div class="box">
        <input id="myInput" type="text" class="search_text" placeholder="&#x1F50D;" name="txt" onmouseout="this.value = ''; this.blur();">
    </div>
    <div>
        <?php
        require_once __DIR__ . '/vendor/autoload.php';
        $client = new MongoDB\Client("mongodb://localhost:27017");


        $users_collection = $client->student_services_db->users;
        $board_collection = $client->student_services_db->club_board;



        $cursor = $users_collection->find();
        // print_r($cursor);

        ?>
        <table class="table-main">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student_ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Date Registered</th>
                    <th>Club Member Status</th>
                    <th>Club</th>
                    <th>Position</th>
                    <th>Remove Board Status</th>

                </tr>
            </thead>
            <tbody id="cTable">
                <?php
                foreach ($cursor as $document) { ?>
                    <tr>

                        <td style="border: solid black 5px;"><?php echo $document['_id'] ?></td>
                        <td style="border: solid black 5px;"><?php echo $document['Student_ID'] ?></td>
                        <td style="border: solid black 5px;"><?php echo $document['First_Name'] ?></td>
                        <td style="border: solid black 5px;"><?php echo $document['Last_Name'] ?></td>
                        <td style="border: solid black 5px;"><?php echo $document['Email_Address'] ?></td>
                        <td style="border: solid black 5px;"><?php echo $document['Date_Registered'] ?></td>
                        <td style="border: solid black 5px;"><?php echo $document['Is_Club_Member'] ?></td>

                        <td style="border: solid black 5px;"><?php echo $document['Club_Name'] ?></td>

                        <?php $cursor2 = $board_collection->findOne(['Email_Address' => $document['Email_Address']]); ?>
                        <td style="border: solid black 5px;"><?php echo $cursor2['Position'] ?></td>
                        <td style="border: solid black 5px;"><a name="id" href="removeStudentBoard.php?id=<?php echo $document['Student_ID']; ?>">Click</a></td>



                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>