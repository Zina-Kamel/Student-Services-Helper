<!DOCTYPE html>
<html>

<head>
    <?php
    print("<meta charset='utf-8'>");
    print("<title>Accept/Decline Events</title>");

    print("<link rel='stylesheet' href='../../../css/adminFunctionStyles.css'>");
    print("<link rel='icon' type='image/x-icon' href='../../../logos/favicon.ico'>");
    print("<script src='../../../js/Profile.js'></script>");

    print("</head>");
    ?>

<body>


    <div>
        <?php
        // session_start();

        error_reporting(E_ALL);
        ini_set('display_errors', 1); 

        
        session_start();
        $email = $_SESSION['useremail'];

        require_once __DIR__ . '/vendor/autoload.php';
        $client = new MongoDB\Client("mongodb://localhost:27017");

        $board_event_requests_collection = $client->student_services_db->board_events_requests;

        $cursor = $board_event_requests_collection->find();

        ?>

        <table class="table-main">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student ID </th>
                    <th>Name</th>
                    <th>isClass</th>
                    <th>Desc</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Poster</th>
                    <th>Club</th>

                    <th>Accept and Assign Location</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($cursor as $document) { ?>
                    <tr>
                        <td><?php echo $document['_id'] ?></td>
                        <td><?php echo $document['Student_ID'] ?></td>

                        <td><?php echo $document['Event_Name'] ?></td>
                        <td><?php echo $document['isclassroom'] ?></td>
                        <td><?php echo $document['Description'] ?></td>
                        <td><?php echo "<b>Date: </b>", ($document["Date"]["date"]); ?></td>
                        <td><?php echo $document['Time'] ?></td>
                        <td><img src = '../../../assets/event-photos/<?php echo $document['Poster']?>.jpg'></img></td>
                        <td><?php echo $document['Club'] ?></td>
                        <!-- accept -->
                        <td><a name="id2" style="color:green;" href="UpdatePendingEvent.php?id2=<?php echo $document['Event_Name']; ?>">&#x2713;
                            </a></td>

                        <!-- delete -->
                        <td><a name="id" style="color:red;" href="deletePendingEvent.php?id=<?php echo $document['Event_Name']; ?>">&#x2715;</a></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>