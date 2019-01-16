<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

include 'get_api_connect.php';

// Get Treatment and Aligner date
$from_date = $startdate;
    
//$nextdate = date('M j Y', strtotime('+14 days', strtotime($from_date)));
$treatmentend = date('M j Y', strtotime('+'.$no_wks_days. 'days', strtotime($from_date)));

$system_date = date('Y-m-d');
$currentdate = date('M j Y', strtotime($system_date));




//Get No. of days bw dates - Treatment Days
$treatmentdays = getTreatmentDays($currentdate,$treatmentend);

function getTreatmentDays($startDate,$endDate){
  $startDate = strtotime($startDate);
  $endDate = strtotime($endDate);

  if($startDate <= $endDate){
    $datediff = $endDate - $startDate;
    return floor($datediff / (60 * 60 * 24));
  }
  return false;
}

//Convert Treatment days spent into percent
$trt_prg = $no_wks_days - $treatmentdays ;
$trt_prd_pct = round(($trt_prg / $no_wks_days)  * 100);
?>
<style type="text/css">
.progress {height:14px;  border: 2px solid #fff; border-radius:7px !important; background:none !important; margin-bottom: 0px !important;}
.progress-bar {background-color: #FFF !important;}
h3, h4, h5, h6, p {
font-family: "Gotham SSm A", "Gotham SSm B", sans-serif !important;
font-weight: normal;
}
  <?php $wide = 40; ?>
  .progresswidth {width:<?php echo $trt_prd_pct; ?>%;}
  h3 {font-size:36px !important;}
  
  .col-md-50 {width:63% !important; float:left;}
  .col-md-35 {width:25% !important; float:right;}
  @media only screen and (max-width:980px) {
	  .col-md-50 {width:90% !important; float: none; margin:auto; }
  	  .col-md-35 {width:90% !important; float: none; margin:auto; }
  }
.get-buy-now {
border: 2px solid #29287f !important;
background: none !important;
color: #29287f !important;
border-radius: 10px !important;
padding: 10px 25px !important;
text-decoration:none !important;
  }
  </style>

<?php


//Get remaining Aligners
$rem_aligners = $treatmentdays/14;
$aligners_rnd = round($rem_aligners);

$rm_wks = round($treatmentdays / 7);
$snextdate = $get_no_wks - $rm_wks ;

$snextdate = $snextdate + 1;	

/*
for($x=0; $x<$snextdate; $x++)
{ 
 $ddays =  ($diffdays * 7);
 $nextdate = date('M j Y', strtotime('+'.$ddays.'days', strtotime($from_date)));
} */
$y = round($snextdate/2); 

for($upd=0; $upd<=$y; $upd++)
{
    //$upd = $upd + 1;    
    $upds = 14 * $y;
   // $upd = $upd * $y; 
    $nextdate = date('M j Y', strtotime('+'.$upds.'days', strtotime($from_date))); 
    //$upd = $upd * $y;
}

//Get No. of days for Aligner Swap - You have XX days until you swap aligners
$remainingdays = getAlignersDays($currentdate,$nextdate);
 
function getAlignersDays($startDate,$endDate){
  $startDate = strtotime($startDate);
  $endDate = strtotime($endDate);

  if($startDate <= $endDate){
    $datediff = $endDate - $startDate;
    return floor($datediff / (60 * 60 * 24));
  }
  return false;
}

?>
<?php if ($cust_status == "Scheduled") { ?>
  <?php include 'book-new-smile-template.php'; ?>
 	<div class="row" style="display:none;"><div class="col-md-12" style="padding: 30px; background: rgba(216,216,216,0.15); border: 1px solid rgba(151,151,151,0.15);">
<h5 style="letter-spacing: .095em; color:#000; font-size:16px;">Hey <?php echo $cust_name; ?>, we're excited to meet you.</h5>
<h5 style="letter-spacing: 0em; color:gray; font-size:18px; line-height:30px;">Your appointment is <?php echo $schedule_class->timeStart; ?>, <?php echo $appt_date_alp; ?> at <?php echo $schedule_class->location; ?>. During your visit, which will take 30 minutes, you'll be able to see a image of your teeth. We'll use that to create your new smile. See your appointment confirmation email for more details.
<br/><br/>
Please email us at <a href="mailto:info@puresmilesonline.com">info@puresmilesonline.com</a> if you have any questions!<br/><br/>

<!-- <a href="http://dev-puresmiles.azurewebsites.net/api/v1/schedule/Cancel/<?php // echo $cust_sheduleid; ?>">Cancel Schedule</a>  -->

</h5>
</div></div>

<?php } else if ($cust_status == "Ready To Get Started") { ?>

  <?php include 'ready-get-started-temp2.php'; ?>
  <?php // include 'ready-get-started-temp.php'; ?>

<?php } else if ($cust_status == "Paid") {  ?>

<div class="row"><div class="col-md-12" style="padding: 30px; background: rgba(216,216,216,0.15); border: 1px solid rgba(151,151,151,0.15);">
<h5 style="letter-spacing: .095em; color:#000; font-size:16px;">Hey <?php echo $cust_name; ?>,<br/><br/>Thank you for your payment. You can view your invoices by <a href="https://puresmilesonline.com/patient-portal/orders/">CLICKING HERE</a>.</h5>
<h5 style="letter-spacing: 0em; color:gray; font-size:18px; line-height:30px;">Your aligners will be ready within 6 weeks of your order.<br/><br/>Please email us at <a href="mailto:info@puresmilesonline.com">info@puresmilesonline.com</a> if you have any questions!
</h5>
</div></div>


<?php } else if ($cust_status == "Started") {  ?>

<div class="col-md-50" style="padding: 30px; background: rgba(216,216,216,0.15); border: 1px solid rgba(151,151,151,0.15);">
<h5 style="letter-spacing: .095em; color:#000; font-size:16px;">Hello <?php echo $cust_name; ?>,</h5>
<h5 style="letter-spacing: 0em; color:gray;">YOUR PROGRESS</h5>
<h3 style="color: #29287f; font-size:30px !important; font-weight:bold;">You have <?php  echo $remainingdays; ?> days until you swap aligners.</h3>

<h5 style="letter-spacing: .095em; color:gray; font-size:15px;"><strong>Current Treatment:</strong> Aligner No. 1 started on <?php echo $startdate; ?></h5>

<h5 style="letter-spacing: .095em; color:gray; font-size:15px;"><strong>Next Aligner Set:</strong> Aligner No. <?php echo $y+1; ?> switch on <?php echo $nextdate; ?></h5>

</div>

<div class="col-md-35" style="padding: 7px 30px; background: #29287f; ">
<h3 style="color: #FFF; font-size:24px !important; font-weight:600;">Your future smile is just on the horizon.</h3>

<p style="letter-spacing: .095em; color:#FFF; font-size:11px; line-height: 0px; padding-bottom: 7px;">TREATMENT TIME REMAINING:</p>
<h3 style="font-size:36px; color: #fff; line-height:0px;"><?php echo $treatmentdays-1; ?> days</h3>
<div style="padding:3px 0px;"></div>
<!-- Progress bar -->
<div class="col-sm-8 col-xs-8" style="padding-top:5px; margin-left:-10px;">
   <div class="progress"> 
    <div class="progress-bar progresswidth" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" />
    </div>
  </div>
</div>
<div class="col-sm-3 col-xs-3 col-sm-offset-1 col-xs-offset-1">
<p style="font-size:15px; color: #fff;"><?php echo $trt_prd_pct."%"; ?></p>
</div>

<div class="clearfix"></div>
<p style="letter-spacing: .095em; color:#FFF; font-size:11px;">ALIGNERS REMAINING:</p>
<h3 style="font-size:36px; color: #fff; line-height:0px;"><?php echo $aligners_rnd; ?></h3>

</div>
<?php  } /* if ($treatmentdays <=1 ){ ?>
 <div class="col-md-12" style="padding: 30px; background: rgba(216,216,216,0.15); border: 1px solid rgba(151,151,151,0.15);">
<h5 style="letter-spacing: .095em; color:#000; font-size:16px;">Hello <?php echo $cust_name; ?>,</h5>
<h5 style="letter-spacing: .285em; color:gray;">YOU DID IT!</h5>
<h3 style="color: #9ace6e;">Congratulations!</h3>

<p style="letter-spacing: .095em; color:gray; font-size:15px;">Hey, Hope your smile is looking good</p>
 
 
 <?php }*/ else { ?>
 <div class="row"><div class="col-md-12" style="padding: 30px; background: rgba(216,216,216,0.15); border: 1px solid rgba(151,151,151,0.15);">
<h5 style="letter-spacing: .095em; color:#000; font-size:16px;">Hey <?php echo $cust_name; ?>, Your Aligners are ready to ship!</h5>
<h5 style="letter-spacing: 0em; color:gray; font-size:18px; line-height:30px;">Please email us at <a href="mailto:info@puresmilesonline.com">info@puresmilesonline.com</a> if you have any questions!
</h5>
</div></div>
 <?php }  ?>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
