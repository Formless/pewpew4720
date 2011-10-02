 <?php
require_once('postToTwitter.php');

// Define credentials for the Google Calendar account
define('GCAL_USER', 'pewpew4720@gmail.com');
define('GCAL_PASS', 'nomnom4720');


// If you need to target a specific calendar, uncomment and enter
// its calendar ID here. The calendar ID is available on the
// calendar settings page, next to the Calendar Address buttons.
define('GCAL_ID', 'dbps29le1b85liab7vlflgrg8g@group.calendar.google.com');

echo $msg;
// Include Zend GData client library
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_Calendar');


// Get Google Calendar service name (predefined service name for calendar)
$service = Zend_Gdata_Calendar::AUTH_SERVICE_NAME;


// Authenticate with Google Calendar
$client = Zend_Gdata_ClientLogin::getHttpClient(GCAL_USER, GCAL_PASS, $service);


	// If you echo the message body here, you'll notice that the
	// extraneous text is removed from its beginning for us
	//echo $message;continue;


	// You could do some processing here if you wanted;
	// e.g. allow only direct messages from certain users detect
	// a particular flag or message format for processing


	// Create a new Google Calendar object
	$calendar = new Zend_Gdata_Calendar($client);


	// Create a new event
	$event = $calendar->newEventEntry();


	// Make it a Quick Add event
	$event->quickAdd = $calendar->newQuickAdd('true');


	// Add our message as the event content
	$event->content = $calendar->newContent($msg);


	// Send the new event to be added to Google Calendar
	if (defined('GCAL_ID')) {
		$newEvent = $calendar->insertEvent($event, 'http://www.google.com/calendar/feeds/'.GCAL_ID.'/private/full');
	} else {
		$newEvent = $calendar->insertEvent($event);
	}



?>