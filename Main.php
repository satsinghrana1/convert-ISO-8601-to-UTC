<?php
/*
 * Convert ISO 8601 date time format to UTC
 * Developer : Sat Singh
 * Created : 20-05-2019
 */

function convertIso8601ToUTC($date) {

	/*
	 * SPLIT DATE AND TIME
	 */
	$a = explode('T', $date);

	$date = $a[0];

	/*
	 * CHECK THE TIME ZONE OPERATOR
	 */

	$timezoneOperator = (strpos($a[1], '-')) ? '-' : '+';

	/*
	 * GET TIME AND TIMEZONE
	 */

	$b = explode($timezoneOperator, $a[1]);

	$time = $b[0];
	$timeDifference = $b[1];

	/*
	 * GET HOUR(s) AND MINUTE(s) FROM TIME DIFFERENCE
	 */

	$c = explode(':', $timeDifference);

	$hour_s = $c[0];
	$minute_s = $c[1];

	$start = $date . ' ' . $time;

	return date('Y-m-d H:i:s', strtotime($timezoneOperator . $hour_s . ' hour' . ' ' . $timezoneOperator . $minute_s . ' minutes', strtotime($start)));

}

echo $isoDateTime = '2019-05-20T11:31:00-05:00';

echo convertIso8601ToUTC($isoDateTime);
