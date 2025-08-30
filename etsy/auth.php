<?php
require '../vendor/autoload.php';

use Etsy\OAuth\Client;

session_start();
$client_id = 'dgb4cfdpd2rg2ic73r3yaqgr';

$client = new Client($client_id);

$redirect_uri = 'https://fasteink.com/etsy/callback.php';
$scopes = \Etsy\Utils\PermissionScopes::ALL_SCOPES;
[$verifier, $code_challenge] = $client->generateChallengeCode();
$nonce = $client->createNonce();
//和获取access_token使用$verifier保持一致
$_SESSION['verifier'] = $verifier;

echo '1';
echo "<br/>";
echo '$code_challenge:'.$code_challenge;
echo "<br/>";
echo '$verifier:'.$verifier;
echo "<br/>";
echo '$nonce:'.$nonce;
echo "<br/>";
//exit;

$url = $client->getAuthorizationUrl(
    $redirect_uri,
    $scopes,
    $code_challenge,
    $nonce
);
echo $url;
// 跳转到 Etsy 授权页
header("Location: $url");
exit;