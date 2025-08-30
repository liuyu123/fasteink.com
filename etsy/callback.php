<?php
require '../vendor/autoload.php';

use Etsy\OAuth\Client;
use Etsy\Etsy;
use Etsy\Resources\User;

session_start();
$client_id = 'dgb4cfdpd2rg2ic73r3yaqgr';
$redirect_uri = 'https://fasteink.com/etsy/callback.php';
// 1. 获取回调参数
$code  = isset($_GET['code']) ? $_GET['code'] : null;
$state = isset($_GET['state']) ? $_GET['state'] : null;
$error = isset($_GET['error']) ? $_GET['error'] : null;

echo $code;
echo "<br/>";
echo $state;
echo "<br/>";
echo $error;
echo "<br/>";
//$code = 'cMp2rEmdmCFW134gyY-sJ9SFr5BMNB0ADD9EHIahvDbdBr8SItMPxyNPA_ife4or6KH5I91ZRh4rScPeuXXTVhPWHXeGls2DfdHQ';

$client = new Client($client_id);
//[$verifier, $code_challenge] = $client->generateChallengeCode();
$verifier = $_SESSION['verifier'];
echo '$verifier:'.$verifier;
echo "<br/>";
$tokens = $client->requestAccessToken(
    $redirect_uri,
    $code,
    $verifier
);
$access_token  = $tokens['access_token'] ?? null;
$refresh_token = $tokens['refresh_token'] ?? null;

echo "Access Token: " . $access_token . "<br/>";
echo "Refresh Token: " . $refresh_token . "<br/>";

$etsy = new Etsy($client_id, $access_token);
// Get the authenticated user.


$user = User::me();

print_r($user);

// 获取用户的 shop
if ($user && isset($user->user_id)) {
    $shop = User::getShop($user->user_id);
    print_r($shop);
} else {
    echo "无法获取用户信息";
}





//// 2. 检查是否有错误
//if ($error) {
//    $error_description = isset($_GET['error_description']) ? $_GET['error_description'] : 'Unknown error';
//    die("Authorization failed: $error - $error_description");
//}
//
//// 3. 校验 state 防止 CSRF
//if (!isset($_SESSION['oauth2_state']) || $state !== $_SESSION['oauth2_state']) {
//    die("Invalid state parameter. Possible CSRF attack.");
//}