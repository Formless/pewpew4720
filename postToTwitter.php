<html>
<head>
<title>Twitter-Post Confirmation</title>
<link href="css/style-php.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
$consumerKey = 'U9KqtTZTQ0JfSp9KkeRg';
$consumerSecret = 'vyuo3bePAEZHF4QQ76nvFKTFidQPIiio1Vd09Ti7Y';
$oAuthToken = '382834326-zTYbTDtWHzPPWslB78mWsAhKOLtPcfPNIXksktVO';
$oAuthSecret = 'QCxu5ihKZEJpoUKrdGC6Bg5prB1D5kLySpeQdF0yWo';

require_once('twitteroauth/twitteroauth.php');

// create a new instance
$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);

//message
$t_item = $_POST['t_item'];
$t_location = $_POST['t_location'];
$t_time = $_POST['t_time'];
$msg = $t_item . " at " . $t_time . " in " . $t_location;

//send a tweet
$tweet->post('statuses/update', array('status' => $msg));

// add to calendar
$addCal = `postToCal.php`;

//  refresh / redirect to an internal web page
header( 'refresh: 3; url=index.html' ); # redirects to our homepage
echo '<h2>Thanks for posting!</h2>';
?>

</body>
</html>
