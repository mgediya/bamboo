<?php
/**
 * MU-plugin to provide trigger for OneInc portal modal.
 * 
 * Documentation: https://dev.oneinc.com/inbound-payments/docs/make-a-quickpay-payment-tutorial
 * 
 * Instructions:
 * 
 * 1. Define the constants used in Bamboo_OneInc_Portal_Modal_Integration::auth_key()
 * and Bamboo_OneInc_Portal_Modal_Integration::base_url() in wp-config.php.
 * If either of the values are empty, everything will bail or fail.
 * 
 * 2. Add the Bamboo_OneInc_Portal_Modal_Integration::BUTTON_SELECTOR value
 * to page elements that should trigger the modal.
 * 
 * 3. Call Bamboo_OneInc_Portal_Modal_Integration::frontend() on the page(s) with
 * elements to trigger the modal, to include the necessary scripts.
 * 
 * 4. Style the dialog box.
 */

defined( 'WPINC' ) || die();

class Bamboo_OneInc_Portal_Modal_Integration {

	const AJAX_ACTION     = 'bamboo-oneinc-sessionid';
	const BUTTON_SELECTOR = '.trigger-oneinc-portal-modal';
	const CONFIRM_MESSAGE = 'You are leaving Bamboo Insurance: proceed to third-party site?';

	/**
	 * Initialize.
	 * 
	 * @uses static::instance()
	 * 
	 * @return void
	 */
	public static function init() {
		static $init = false;

		if ( $init ) {
			trigger_error( sprintf( 'The %s class has already been initialized.', static::class ), E_USER_NOTICE );
			return;
		}

		static::instance();
		$init = true;
	}

	/**
	 * Create or get singleton instance.
	 * 
	 * @return self
	 */
	public static function instance() {
		static $instance = null;

		if ( ! is_null( $instance ) ) {
			return $instance;
		}

		$instance = new self;

		return $instance;
	}

	/**
	 * Initialize functionality for frontend.
	 * 
	 * If admin or authentication key is not set, bail.
	 * 
	 * @uses static::auth_key()
	 * @uses static::instance()
	 * 
	 * @return void
	 */
	public static function frontend() {
		if ( is_admin() ) {
			return;
		}
		
		if ( empty( static::auth_key() ) || empty( static::base_url() ) ) {
			return;
		}

		$instance = static::instance();

		add_action( 'wp_enqueue_scripts', array( $instance, 'action__wp_enqueue_scripts' ) );
		add_action( 'wp_footer',          array( $instance, 'action__wp_footer' ), 9 );
	}

	/**
	 * Get OneInc portal authentication key.
	 * 
	 * @return string
	 */
	public static function auth_key() {
		$value = '';

		if ( defined( 'ONEINC_PORTAL_AUTH_KEY' ) ) {
			$value = constant( 'ONEINC_PORTAL_AUTH_KEY' );
		}

		$value = ( string ) apply_filters( 'oneinc-portal-auth-key', $value );

		if ( empty( $value ) ) {
			return '';
		}

		return $value;
	}

	/**
	 * Get OneInc portal base URL.
	 * 
	 * @return string
	 */
	public static function base_url() {
		$value = '';

		if ( defined( 'ONEINC_PORTAL_BASE_URL' ) ) {
			$value = constant( 'ONEINC_PORTAL_BASE_URL' );
		}

		$value = ( string ) apply_filters( 'oneinc-portal-base-url', $value );

		if ( empty( $value ) ) {
			return '';
		}

		return trailingslashit( $value );
	}

	/**
	 * Construct.
	 * 
	 * Protected to prevent multiple instances.
	 * Access singleton via static::init().
	 * 
	 * If no authentication key or base URL is set, bail.
	 * 
	 * @uses static::auth_key()
	 */
	protected function __construct() {
		if ( empty( static::auth_key() ) || empty( static::base_url() ) ) {
			return;
		}

		add_action( 'wp_ajax_' . static::AJAX_ACTION,        array( $this, 'action__wp_ajax' ) );
		add_action( 'wp_ajax_nopriv_' . static::AJAX_ACTION, array( $this, 'action__wp_ajax' ) );
	}

	/**
	 * Action: wp_enqueue_scripts
	 * 
	 * Enqueue the OneInc script.
	 * 
	 * @uses $this->enqueue_script()
	 * 
	 * @return void
	 */
	public function action__wp_enqueue_scripts() {
		if ( 'wp_enqueue_scripts' !== current_action() ) {
			return;
		}

		$this->enqueue_script();
	}

	/**
	 * Action: wp_footer
	 * 
	 * Enqueue the OneInc script.
	 * 
	 * @uses $this->enqueue_script()
	 * 
	 * @return void
	 */
	public function action__wp_footer() {
		if ( 'wp_footer' !== current_action() ) {
			return;
		}

		$this->enqueue_script();
		?>

		<dialog id="exit-to-oneinc-dialog">
			<form method="dialog">
				<p><?php echo esc_html( static::CONFIRM_MESSAGE ) ?></p>
				<p>
					<button class="btn" value="cancel">Cancel</button>
					<button class="btn" value="default">Confirm</button>
				</p>
			</form>
		</dialog>

		<?php
	}

	/**
	 * Enqueue script (once), and add our inline script.
	 * 
	 * @uses $this->wp_add_inline_script()
	 * 
	 * @return void
	 */
	protected function enqueue_script() {
		if ( wp_script_is( 'oneinc-portal' ) ) {
			return;
		}

		$script_url = sprintf( '%sGenericModalV2/PortalOne.js', static::base_url() );

		   wp_enqueue_script( 'oneinc-portal', $script_url, array( 'jquery-core' ), false, true );
		wp_add_inline_script( 'oneinc-portal', $this->wp_add_inline_script() );
	}

	/**
	 * Inline script for OneInc script.
	 * 
	 * @return string
	 */
	protected function wp_add_inline_script() {
		$ajax_url = admin_url( 'admin-ajax.php' );
		$ajax_url = wp_nonce_url( $ajax_url, static::AJAX_ACTION );
		$ajax_url = add_query_arg( 'action', static::AJAX_ACTION, $ajax_url );

		ob_start();
		?>

		<script>
		( function () {

			const selector = <?php echo json_encode( static::BUTTON_SELECTOR ) ?>;

			/**
			 * If no triggers on page, bail.
			 */
			if ( ! document.querySelector( selector ) ) {
				return;
			}

			const ajax_url  = <?php echo json_encode( $ajax_url ) ?>;
			const dialog    = document.getElementById( 'exit-to-oneinc-dialog' );
			const portalOne = new OneInc.PortalOne();

			var proceed, response, json, sessionId, buttonState;

			/**
			 * Temporarily disable triggers.
			 */
			const disable_triggers = function ( ev ) {
				if ( ! ev.target.matches( selector ) ) {
					return true;
				}

				ev.preventDefault();
			};

			/**
			 * Toggle the state of trigger(s) to inform and prevent
			 * user from clicking trigger(s) again.
			 */
			const toggle_triggers_state = function () {
				document.querySelectorAll( selector ).forEach( function ( el ) {
					if ( '' === el.style.pointerEvents ) {
						document.removeEventListener( 'click', invoke_modal );
						document.addEventListener( 'click', disable_triggers );
						el.style.pointerEvents = 'none';
						el.style.cursor = 'not-allowed';
						el.style.opacity = '0.7';
					} else {
						document.addEventListener( 'click', invoke_modal );
						document.removeEventListener( 'click', disable_triggers );
						el.style.pointerEvents = '';
						el.style.opacity = '';
						el.style.cursor = '';
					}
				} );
			}

			/**
			 * Get session ID from API and store to variable.
			 */
			const set_session_id_from_api = async function () {
				if ( sessionId ) {
					return false;
				}

				response = await fetch( ajax_url, {
					headers: {
						'Content-Type': 'application/json',
					},
				} );

				if ( ! response.ok ) {
					return false;
				}

				json = await response.json();

				if ( ! json.hasOwnProperty( 'data' ) || ! json.data.hasOwnProperty( 'PortalOneSessionKey' ) ) {
					return false;
				}

				sessionId = json.data.PortalOneSessionKey;
			}

			/**
			 * Invoke the modal.
			 */
			const invoke_modal = async function ( ev ) {
				if ( ! ev.target.matches( selector ) ) {
					return true;
				}
				
				ev.preventDefault();
				toggle_triggers_state();

				/**
				 * Check for support of modern dialog element.
				 */
				if ( typeof HTMLDialogElement === 'function' ) {
					dialog.showModal();

					if ( ! sessionId ) {
						set_session_id_from_api();
					}

					return;
				}

				/**
				 * Backwards compatibility for browsers that don't 
				 * support modern dialog element.
				 */

				proceed = confirm( <?php echo json_encode( esc_html( static::CONFIRM_MESSAGE ) ) ?> );

				if ( ! proceed ) {
					return false;
				}

				if ( ! sessionId ) {
					await set_session_id_from_api();
				}

				if ( ! sessionId ) {
					alert( 'Unable to communicate with third-party: please try again.' );
					return false;
				}

				portalOne.quickPay( {
					'sessionId': sessionId,
					'userRole': 'agent',
				} );

				toggle_triggers_state();
			};

			/**
			 * Check for response to dialog, and handle appropriately.
			 */
			dialog.addEventListener( 'close', function () {
				if ( 'cancel' === dialog.returnValue ) {
					toggle_triggers_state();
					return;
				}

				if ( ! sessionId ) {
					toggle_triggers_state();
					alert( 'Unable to communicate with third-party: please try again.' );
					return;
				}

				portalOne.quickPay( {
					'sessionId': sessionId,
					'userRole': 'agent',
				} );

				toggle_triggers_state();
			} );

			document.addEventListener( 'click', invoke_modal );

		} () );
		</script>

		<?php
		$script = ob_get_clean();

		/**
		 * The wp_add_inline_script() function adds its own <script> tags.
		 * The above uses <script> tags for better IDE syntax highlighting.
		 */
		$script = str_replace( array( '<script>', '</script>' ), '', $script );

		return $script;
	}

	/**
	 * Action: wp_ajax_bamboo-oneinc-sessionid, wp_ajax_nopriv_bamboo-oneinc-sessionid
	 * 
	 * Make request to OneInc API to create session ID.
	 * 
	 * @return void
	 */
	public function action__wp_ajax() {
		if ( 
			empty( $_REQUEST['_wpnonce'] ) 
			|| ! wp_verify_nonce( $_REQUEST['_wpnonce'], self::AJAX_ACTION ) 
		) {
			status_header( 401 );
			nocache_headers();
			exit;
		}

		$ajax_url = sprintf( '%sApi/Api/Session/Create', static::base_url() );
		$ajax_url = add_query_arg( 'portalOneAuthenticationKey', static::auth_key(), $ajax_url );

		$response = wp_remote_get( $ajax_url );

		if ( is_wp_error( $response ) ) {
			wp_send_json_error( $response );
		}

		$body = wp_remote_retrieve_body( $response );
		$body = json_decode( $body );

		wp_send_json_success( $body );
	}

}

Bamboo_OneInc_Portal_Modal_Integration::init();