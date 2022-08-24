<?php

function quizSubmit(){
  global $woocommerce;
  $data2 = intval($_POST["data2"]);
  $optinurl = $_POST["optinurl"] == 'http://localhost:9999/financialmatch/' || $_POST["optinurl"] == 'http://localhost:8888/financialmatch/' ? 'https://financialmatch.com/' : $_POST["optinurl"];

  $request_array = [
    "campid" => $_POST["campid"],
    "sid" => $_POST["sid"],
    "firstname" => $_POST["firstname"],
    "lastname" => $_POST["lastname"],
    "email" => $_POST["email"],
    "phone1" => $_POST["phone1"],
    "company" => $_POST["company"],
    "data1" => $_POST["data100"],
    "data2" => $_POST["data1"],
    "data3" => $data2,
    "data4" => $_POST["data3"],
    "data5" => $_POST["data4"],
    "data6" => $_POST["data5"],
    "data7" => $_POST["data6"],
    "data8" => $_POST["data7"],
    "data9" => $_POST["data8"],
    "data10" => $_POST["data9"],
    "data11" => $_POST["data10"],
    "c1" => $_POST["c1"],
    "c2" => $_POST["c2"],
    "c3" => $_POST["c3"],
    "c4" => $_POST["c4"],
    "ssid" => $_POST["ssid"],
    "ef_aff" => $_POST["ef_aff"],
    "source" => $_POST["source"],
    "ef_sub1" => $_POST["ef_sub1"],
    "ef_sub2" => $_POST["ef_sub2"],
    "ef_sub3" => $_POST["ef_sub3"],
    "ef_sub4" => $_POST["ef_sub4"],
    "ef_trans" => $_POST["ef_trans"],
    "optinurl" => $optinurl
  ];

  $ch = curl_init();
  try {
    curl_setopt($ch, CURLOPT_URL, "https://smb.leadbyte.com/restapi/v1.3/leads");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request_array);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X_KEY: 859eda508946525b6b0822ee93037a91',
        'Accept: application/json',
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
      echo curl_error($ch);
      die();
    }

    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($http_code == intval(200)){
      echo $response;
    }
    else{
      echo "Ressource introuvable : " . $http_code;
    }
  } catch (\Throwable $th) {
    throw $th;
  } finally {
    curl_close($ch);
  }

  wp_die();
}
add_action('wp_ajax_quizSubmit', 'quizSubmit');
add_action('wp_ajax_nopriv_quizSubmit', 'quizSubmit');