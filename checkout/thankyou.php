<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style>
.gform_footer { text-align: center; }
#input_10_7, #input_10_8, #input_10_9, #input_10_11, #input_10_1, #input_10_2, #input_10_6, #input_10_15 {padding:20px !important; border-radius:10px !important; color: #03148d !important; border:2px solid #ccc;}
#input_10_2 {width:84% !important;}

.ui-datepicker{
box-shadow: 0 0 10px 0 rgba(0,0,0,0.2)!important;
}

.ui-datepicker-header{
background-color: #031478 !important;
}

.ui-datepicker-header select{
background-color: #fff!important;
color: #031478!important;
border: 0!important;

}

.ui-datepicker-month{
margin: 5px 5px 6px 0px!important;
}

.ui-datepicker-year{
margin: 5px 0px 6px 0px!important;
}

.ui-datepicker-prev {
background-position: center -20px!important;
}

.ui-datepicker-next {
background-position: center 9px!important;
}

.ui-datepicker-calendar .ui-state-default{
background: #fff!important;
}

td.ui-datepicker-unselectable.ui-state-disabled{
background-color: #eee!important;
}

.ui-datepicker-calendar .ui-state-active{
border: 1px solid #031478 !important;
box-shadow: none!important;
background: #031478 !important;
margin: 0!important;
text-shadow: none!important;
color: #fff!important;
}
@media ony screen and (max-width:1024px) {
#input_8_2 {width:78% !important;}	
}
</style>

<div class="woocommerce-order">

	<?php if ( $order ) : ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you for your order.', 'woocommerce' ), $order ); ?></p>
            <p>You will get an email soon.<br/>For Immediate assistance, please email us at info@puresmilesonline.com.</p>
<br/>
			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php _e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php _e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php _e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php _e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php _e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php // do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php // do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

	<?php endif; ?>
    <?php // echo do_shortcode('[gravityform id="10" title="false" ajax="true"]'); ?> 
</div>