<?php
/**
 * The confirmation dialogs.
 *
 * @link       https://trewknowledge.com
 * @since      1.0.0
 *
 * @package    GDPR
 * @subpackage public
 * @author     Fernando Claussen <fernandoclaussen@gmail.com>
 */
?>

<?php
$title = '';
$text  = '';
if ( isset( $_GET['notify'] ) && sanitize_text_field( wp_unslash( $_GET['notify'] ) ) ) : // WPCS: input var ok, CSRF ok.
?>
	<?php
	if ( isset( $_GET['user-deleted'] ) ) { // WPCS: input var ok, CSRF ok.
		$title = __( 'Your account', 'gdpr' );
		if ( sanitize_text_field( wp_unslash( $_GET['user-deleted'] ) ) ) { // WPCS: input var ok, CSRF ok.
			$text = __( 'Your account has been closed. We are sorry to see you go.', 'gdpr' );
		} else {
			$text = __( 'Your request has been received and is being reviewed. You will receive an email when we are done.', 'gdpr' );
		}
	}
	if ( isset( $_GET['request-confirmed'] ) && sanitize_text_field( wp_unslash( $_GET['request-confirmed'] ) ) ) { // WPCS: input var ok, CSRF ok.
		$title = __( 'Request Received', 'gdpr' );
		$text  = __( 'Your request has been received. We will be in touch soon.', 'gdpr' );
	}
	if ( isset( $_GET['malformed-confirmation-link'] ) && sanitize_text_field( wp_unslash( $_GET['malformed-confirmation-link'] ) ) ) { // WPCS: input var ok, CSRF ok.
		$title = __( 'Error!', 'gdpr' );
		$text  = __( 'Malformed request confirmation link!', 'gdpr' );
	}
	if ( isset( $_GET['user-not-found'] ) && sanitize_text_field( wp_unslash( $_GET['user-not-found'] ) ) ) { // WPCS: input var ok, CSRF ok.
		$title = __( 'Error!', 'gdpr' );
		$text  = __( 'User not found.', 'gdpr' );
	}
	if ( isset( $_GET['request-key-not-found'] ) && sanitize_text_field( wp_unslash( $_GET['request-key-not-found'] ) ) ) { // WPCS: input var ok, CSRF ok.
		$title = __( 'Error!', 'gdpr' );
		$text  = __( 'We could not confirm the request key. It may be expired.', 'gdpr' );
	}
	if ( isset( $_GET['request-key-not-match'] ) && sanitize_text_field( wp_unslash( $_GET['request-key-not-match'] ) ) ) { // WPCS: input var ok, CSRF ok.
		$title = __( 'Error!', 'gdpr' );
		$text  = __( 'The key used does not match the request key we have stored.', 'gdpr' );
	}
	?>
<?php endif ?>
<div class="gdpr gdpr-general-confirmation">
	<div class="gdpr-wrapper">
		<header>
			<div class="gdpr-box-title">
				<h3><?php echo esc_attr( $title ); ?></h3>
				<span class="gdpr-close"></span>
			</div>
		</header>
		<div class="gdpr-content">
			<p><?php echo esc_html( $text ); ?></p>
		</div>
		<footer>
			<button class="gdpr-ok"><?php esc_html_e( 'OK', 'gdpr' ); ?></button>
		</footer>
	</div>
</div>
