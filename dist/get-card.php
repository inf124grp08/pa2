<?
if( preg_match('/^3[47][0-9]{2}$/', $_GET['creditCard1']))
{
  echo "http://edw2014.dataversity.net/uploads/ConfSiteAssets/79/image/amex_256.png";
}
else if ( preg_match('/^65[4-9][0-9]{1}|64[4-9][0-9]{1}|6011$/', $_GET['creditCard1']))
{
  echo "https://www.discovernetwork.com/downloads/discover_logo.jpg";
}
else if ( preg_match('/^5[1-5][0-9]{2}$/', $_GET['creditCard1']))
{
  echo "https://pngimg.com/uploads/mastercard/mastercard_PNG24.png";
}
else if ( preg_match('/^4[0-9]{3}$/', $_GET['creditCard1']))
{
  echo "https://www.inmotionhosting.com/support/images/stories/icons/ecommerce/visa.png";
}
?>

