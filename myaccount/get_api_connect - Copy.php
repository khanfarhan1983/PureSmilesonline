<?php


$customer_email = $current_user->user_email;
$cgwp = "http://dev-puresmiles.azurewebsites.net/api/v1/patient/$customer_email";
$response = get_web_page($cgwp);
$resArr = array();
$resArr = json_decode($response);
//echo "<pre>"; print_r($resArr->dateStart; echo "</pre>";
//print_r($resArr);
$cust_name = $resArr->firstName;
$cust_email = $resArr->email;
//$cust_status = "scheduled";
$cust_status = $resArr->status;
$schedule_array = $resArr -> schedules;
$schedule_class = $schedule_array[0];
$schedule_objs = $schedule_class->location;
$appt_date = $schedule_class->dateOfSchedule;
$appt_date_alp = date('M j Y', strtotime($appt_date));
//print_r($schedule_class);

if($customer_email != $cust_email)
  { ?>
<?php // header("Location: https://puresmilesonline.com/patient-portal/orders/"); ?>
<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container container--medium">
<div style="padding: 30px; background: rgba(216,216,216,0.15); border: 1px solid rgba(151,151,151,0.15);">
<h5 style="letter-spacing: .285em; color:gray;">YOUR REQUEST IS UNDER PROGRESS!</h5>
</div>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php die();} 

//Get no. days via API no. of weeks
$get_no_wks = $resArr->numberOfWeeks;
$no_wks_days = $get_no_wks * 7;

//Set the Date format
$get_api_date = $resArr->dateStart;
$get_api_date_sub = substr($get_api_date, 0, 10);
$newdate = DateTime::createFromFormat('Y-m-d', $get_api_date_sub);

$startdate =  $newdate->format('M j Y');

function get_web_page($url) {
    $options = array(
        CURLOPT_RETURNTRANSFER => true,   // return web page
        CURLOPT_HEADER         => false,  // don't return headers
        // CURLOPT_FOLLOWLOCATION => true,   // follow redirects
        // CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
        // CURLOPT_ENCODING       => "",     // handle compressed
        // CURLOPT_USERAGENT      => "test", // name of client
        // CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
        // CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
        // CURLOPT_TIMEOUT        => 120,    // time-out on response
    ); 

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);

    $content  = curl_exec($ch);

    curl_close($ch);

    return $content;
}


?>