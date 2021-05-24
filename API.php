<?php
   
   $Citta = $_GET['Citta'];
   $curl = curl_init();

   curl_setopt_array($curl, [
       CURLOPT_URL => "https://hotels4.p.rapidapi.com/locations/search?query=$Citta&locale=it_IT",
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_FOLLOWLOCATION => true,
       CURLOPT_ENCODING => "",
       CURLOPT_MAXREDIRS => 10,
       CURLOPT_TIMEOUT => 30,
       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => "GET",
       CURLOPT_HTTPHEADER => [
           "x-rapidapi-host: hotels4.p.rapidapi.com",
           "x-rapidapi-key: f125ec2f2cmsh085b904746877d3p12d53ajsn41af6b56e9e4"
       ],
   ]);
   
   $response = curl_exec($curl);
   $err = curl_error($curl);
   
   curl_close($curl);
   
   if ($err) {
       echo "cURL Error #:" . $err;
   } else {
       echo $response;
   }

?>