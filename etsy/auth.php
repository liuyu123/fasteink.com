<?php
require './vendor/autoload.php';

use Etsy\OAuth\Client;

$client_id = 'dgb4cfdpd2rg2ic73r3yaqgr';

$client = new Client($client_id);

$redirect_uri = 'https://fasteink.com/etsy/callback.php';
$scopes = \Etsy\Utils\PermissionScopes::ALL_SCOPES;
[$verifier, $code_challenge] = $client->generateChallengeCode();
$nonce = $client->createNonce();
echo '1';
echo '$code_challenge:'.$code_challenge;
echo '$verifier:'.$verifier;
echo '$nonce:'.$nonce;
exit;

$url = $client->getAuthorizationUrl(
    $redirect_uri,
    $scopes,
    $code_challenge,
    $nonce
);