<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Manage club_board_requests</title>
    <link rel="stylesheet" href="../../../css/indexStyles.css">
    <link rel="stylesheet" href="../../../css/profileStyles.css">
    <link rel="stylesheet" href="../../../css/adminFunctionStyles.css">

    <link rel="icon" type="image/x-icon" href="../../../logos/favicon.ico">
    <script src="../../../js/Profile.js"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#mem tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>
</head>

<body>
<h2>Search for any member by any identifier:</h2>
    <div class="box">
        <input id="myInput" type="text" class="search_text" placeholder="&#x1F50D;" name="txt" onmouseout="this.value = ''; this.blur();">
    </div>

    <div>
        <?php
        require_once __DIR__ . '/vendor/autoload.php';
        $client = new MongoDB\Client("mongodb://localhost:27017");

        $club_board_requests_collection = $client->student_services_db->club_board_requests;

        $cursor = $club_board_requests_collection->find();
        // print_r($cursor);

        ?>
        <table class="table-main">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Position</th>
                    <th>Club</th>
                    <th>Description</th>
                    <th>Verify</th>
                    <th>Decline</th>

                </tr>
            </thead>
            <tbody id = "mem">
                <?php
                foreach ($cursor as $document) { ?>
                    <tr>
                        <td><?php echo $document['_id'] ?></td>
                        <td><?php echo $document['Student_ID'] ?></td>
                         
                        <td><?php echo $document['Position'] ?></td>
                        <td><?php echo $document['Club_Name'] ?></td>
                        <td><?php echo $document['Description'] ?></td>
                        <td><a name="id2" style="color:green; " href="approveClubMemberReq.php?id2=<?php echo $document['Student_ID']; ?>">&#x2713;</a></td>
               
                        <td><a name="id" style="color:red; " href="deleteClubMemberReq.php?id=<?php echo $document['_id']; ?>">&#x2715;</a></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>