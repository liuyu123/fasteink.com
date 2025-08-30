<?php
require '../vendor/autoload.php';
use Etsy\Etsy;
use Etsy\Resources\User;

session_start();
$client_id = 'dgb4cfdpd2rg2ic73r3yaqgr';
//Access Token: 453811509.S7pIWjk2qBBQOWlSpGy5Yiu3oRvnGddT710I8PFnGyOa5qe-EKBoY296QF05bPTy-RB8GK8HWTyjKVUsJ1l0rB8jrA
//Refresh Token: 453811509.lLi3gLS9J9Q7YSIFfEehb8eJmyLyHAvmxChJlOFFIkDHXTFvjRD9tH8CoJckux67fNE9_j9kEC8BEqLhVSQkEjvK_s
$access_token = '453811509.S7pIWjk2qBBQOWlSpGy5Yiu3oRvnGddT710I8PFnGyOa5qe-EKBoY296QF05bPTy-RB8GK8HWTyjKVUsJ1l0rB8jrA';
$refresh_token = '453811509.lLi3gLS9J9Q7YSIFfEehb8eJmyLyHAvmxChJlOFFIkDHXTFvjRD9tH8CoJckux67fNE9_j9kEC8BEqLhVSQkEjvK_s';
//
//$client = new \Etsy\OAuth\Client($client_id);
//$tokens = $client->refreshAccessToken($refresh_token);
//
//$access_token  = $tokens['access_token'] ?? null;
//$refresh_token = $tokens['refresh_token'] ?? null;
//echo "Access Token: " . $access_token . "<br/>";
//echo "Refresh Token: " . $refresh_token . "<br/>";

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
    //获取商品列表
//    $listing = \Etsy\Resources\Listing::get($shop_id);
//    echo "listing:<br/>";
//    print_r($listing);
    //
    $Buyers = \Etsy\Resources\BuyerTaxonomy::all();
    echo "Buyers:<br/>";
    print_r($Buyers);

//    $receipt = \Etsy\Resources\Receipt::get($shop_id,2600454445);
//    echo "receipt:<br/>";
//    print_r($receipt);
//    $address = \Etsy\Resources\UserAddress::all(['user_id'=>9127457]);
//    echo "address:<br/>";
//    print_r($address);
//    $address = \Etsy\Resources\UserAddress::get(1137131569365);
//    echo "address:<br/>";
//    print_r($address);

} else {
    echo "无法获取用户信息";
}






