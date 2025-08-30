<?php
require '../vendor/autoload.php';
use Etsy\Etsy;
use Etsy\Resources\User;

session_start();
$client_id = 'dgb4cfdpd2rg2ic73r3yaqgr';
$access_token = '453811509.3jDNXCxOZuvCHtqH38noQG08KuyCJVVTf5GaqNhPSz2Px_ZUIuaYCnMJrodWKVVQ_VOuWk-AsODQ2hwZUEq40qHOzA';
$refresh_token = '453811509.ZIg0riIztplmf4hsOLAxj1bpsCTACexCQ-Vo_WkRBEK4J8z7U49ewuPINjiaFMINlrIO3FcxKG-_38aFdp1HrWPF49';

$client = new \Etsy\OAuth\Client($client_id);
$tokens = $client->refreshAccessToken($refresh_token);

$access_token  = $tokens['access_token'] ?? null;
$refresh_token = $tokens['refresh_token'] ?? null;
echo "Access Token: " . $access_token . "<br/>";
echo "Refresh Token: " . $refresh_token . "<br/>";

$_SESSION['access_token'] = $access_token;

$etsy = new Etsy($client_id, $access_token);
// Get the authenticated user.


$user = User::me();
echo "User:<br/>";
print_r($user);
echo "userstop:<br/>";

// 获取用户的 shop
if ($user && isset($user->user_id)) {
    $shop = User::getShop($user->user_id);
    print_r($shop);

    $shop_id = $shop->shop_id;
    $shop_name = $shop->shop_name;
    $shop_url = $shop->url;

    echo "shop_id: " . $shop_id . "<br/>";
    echo "shop_name: " . $shop_name . "<br/>";
    echo "shop_url: " . $shop_url . "<br/>";
//    $listing = \Etsy\Resources\Listing::get($shop_id);
//    echo "listing:<br/>";
//    print_r($listing);

//    $receipt = \Etsy\Resources\Receipt::get($shop_id,2771149092);
//    echo "receipt:<br/>";
//    print_r($receipt);
    $address = \Etsy\Resources\UserAddress::all();
    echo "address:<br/>";
    print_r($address);

} else {
    echo "无法获取用户信息";
}






