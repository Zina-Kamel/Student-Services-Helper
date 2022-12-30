<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Manage Events</title>

    <link rel="stylesheet" href="../../../css/indexStyles.css">
    <link rel="stylesheet" href="../../../css/profileStyles.css">
    <link rel="stylesheet" href="../../../css/adminFunctionStyles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link rel="icon" type="image/x-icon" href="../../../logos/favicon.ico">
    <script src="../../../js/Profile.js"></script>
</head>

<body>

    <div>
        <?php
        require_once __DIR__ . '/vendor/autoload.php';
        $client = new MongoDB\Client("mongodb://localhost:27017");


        $users_collection = $client->student_services_db->users;

        $stid = (int)$_GET['id'];

        $cursor = $users_collection->find(["Student_ID" => $stid]);
        // print_r($cursor);

        ?>
        <input type="text" placeholder="Search..">
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
                    <th>Position</th>
                    <!-- <th>Edit Board Status</th> -->



                </tr>
            </thead>
            <tbody>
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
                        <td style="border: solid black 5px;"><?php echo $document['Position'] ?></td>
                        <!-- <td style = "border: solid black 5px;"><a name = "id" href = "editBoardStatus.php?id=<//?php echo $document['Student_ID']; ?>">Click</a></td> -->

                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <table>
            <thead>
                <th>Choose Club</th>
                <th>Choose Position</th>
                <th>Submit</th>
            </thead>

            <tbody>
                <tr>
                    <form action="editBoardStatus.php" method="post">
                        <td><input type="text" name="club"> </td>
                        
                        <td><input type="radio" name="position" <?php if (isset($position) && $position == "President") echo "checked"; ?> value="President">President
                            <input type="radio" name="position" <?php if (isset($position) && $position == "Vice President") echo "checked"; ?> value="Vice President">Vice President
                            <input type="radio" name="position" <?php if (isset($position) && $position == "Treasurer") echo "checked"; ?> value="Treasurer">Treasurer
                            <input type="radio" name="position" <?php if (isset($position) && $position == "Secretary") echo "checked"; ?> value="Secretary">Secretary
                        </td>
                        <td>
                            <input type="submit">
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>