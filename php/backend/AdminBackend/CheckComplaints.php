<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Check Messages</title>
  <link rel="stylesheet" href="../../../css/adminFunctionStyles.css">
  <link rel="icon" type="image/x-icon" href="../../../logos/favicon.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#complaintsCards tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

</head>


<body class="body-card">
  <h2>Search for any complaint by any identifier:</h2>

  <div class="box">
    <input id="myInput" type="text" class="search_text" placeholder="&#x1F50D;" name="txt" onmouseout="this.value = ''; this.blur();">
  </div>

  <div class="wrap">
    <h3 class="box">An email will be sent to students once you review their complaint</h3>
    <table class="cards-table">
      <thead class="cards-thead">

      </thead>
      <tbody id="complaintsCards">
        <?php
        require_once __DIR__ . '/vendor/autoload.php';
        $client = new MongoDB\Client("mongodb://localhost:27017");

        $complaints_collection = $client->student_services_db->complaints;

        $cursor = $complaints_collection->find();

        foreach ($cursor as $document) { ?>

          <tr class="cards-tr">
            <td class="cards-td"><?php echo "<b>ID:</b> ", $document['_id'] ?></td>
            <td class="cards-td"><?php echo "<b>Name:</b> ", $document['First_Name'], ' ', $document['Last_name'] ?></td>
            <!-- <td class = "cards-td"><//?php echo $document['Last_name'] ?></td> -->
            <td class="cards-td"><?php echo "<b>Email: </b>", $document['Email_Address'] ?></td>
            <!-- <td class="cards-td"><//?php $d = json_encode(iterator_to_array($document['Date_Sent'])); 
                                  // echo "<b>Date:</b> ", mb_substr($d, 9, 10, 'utf-8') ?//></td>-->
            <td class="cards-td"><?php echo "<b>Date: </b>", ($document['Date_Sent']->toDateTime()->format("d M Y")); ?></td>


            <td class="cards-td"><?php echo "<b> Claim:</b> ", $document['Text'] ?></td>
            <td><a name="id" style="color:green; " href="deleteComplaint.php?id=<?php echo $document['_id']; ?>">&#10004;</a></td>


          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>

</body>







</html>