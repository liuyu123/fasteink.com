<?php
require '../vendor/autoload.php';
use Etsy\Etsy;
use Etsy\Resources\User;

session_start();
$client_id = 'dgb4cfdpd2rg2ic73r3yaqgr';
//Access Token: 453811509.r0CxY1FkDYqwn3EpM3oG0vk0gPULy8zniP2dhvl8rSKJr0w8XnAH8B_RnNe5Agw1m86SgDRirjMAca9m74UXr6grwg
//Refresh Token: 453811509._8RKPkFhXGOsKI1HgpHXg_Q73VidcquhOFFWEIYIAR6l9f5HEuzVTduYTnZ320IelkED1h8unT9UXDygHD6pFUiQf8
$access_token = '453811509.r0CxY1FkDYqwn3EpM3oG0vk0gPULy8zniP2dhvl8rSKJr0w8XnAH8B_RnNe5Agw1m86SgDRirjMAca9m74UXr6grwg';
$refresh_token = '453811509._8RKPkFhXGOsKI1HgpHXg_Q73VidcquhOFFWEIYIAR6l9f5HEuzVTduYTnZ320IelkED1h8unT9UXDygHD6pFUiQf8';
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
//print_r($user);
echo "userstop:<br/>";

// 获取用户的 shop
if ($user && isset($user->user_id)) {
    $shop = User::getShop($user->user_id);
//    print_r($shop);

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
    //获取分类
//    $Buyers = \Etsy\Resources\BuyerTaxonomy::all();
//    echo "Buyers:<br/>";
//    print_r($Buyers);
    //获取分类属性
//    $Buyers = \Etsy\Resources\BuyerTaxonomyProperty::all(1);
//    echo "Buyers:<br/>";
//    print_r($Buyers);
//  店铺休假模式
//    $Buyers = \Etsy\Resources\HolidayPreference::all($shop_id);
//    echo "Buyers:<br/>";
//    print_r($Buyers);

//      $Buyers = \Etsy\Resources\LedgerEntry::all($shop_id);
//      echo "Buyers:<br/>";
//      print_r($Buyers);

    $Buyers = \Etsy\Resources\LedgerEntry::all($shop_id);
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






