<!DOCTYPE html>
<html>
      <?php
    
          $json = file_get_contents('php://input');
          $data = json_decode($json, true);
    
         //open or read json data
         $data_results = file_get_contents('address.json');
         $tempArray = json_decode($data_results, true);

         //append additional json to json file
         $tempArray[] = $data;
         $jsonData = json_encode($tempArray);

         file_put_contents('address.json', $jsonData);
        echo "<p>Operation successful! ";
      ?><!-- end PHP script -->
</html>


