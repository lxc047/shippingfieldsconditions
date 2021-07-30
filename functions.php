// Embedded jQuery script
add_action( 'wp_footer', 'checkout_shipping_fields_conditions' );
function checkout_shipping_fields_conditions() {
    // Only checkout page
    if( ! ( is_checkout() && ! is_wc_endpoint_url() ) ) return;
    ?>
    <script type="text/javascript">
		jQuery( function($){

			$('form.checkout').on('change', function(){

				var a = 'input[name^="shipping_method"]', b = a+':checked';
				var checkeditem = $(b).val();
				if(checkeditem == 'local_pickup:1' || checkeditem == 'local_pickup:2' || checkeditem == 'local_pickup:3'){ //change the value to yours shipping values
					$(".woocommerce-shipping-fields").css("display", "none");
					$("input#ship-to-different-address-checkbox").prop("checked", false);
				}

				if(checkeditem == 'flat_rate:4' || checkeditem == 'free_shipping:5'){ //change the value to yours shipping values
					$(".woocommerce-shipping-fields").css("display", "block");
					//$("input#ship-to-different-address-checkbox").prop("checked", true);
				}
				
			});
		});

		jQuery(document).ready(function($) {
			$('#order_review .shop_table').appendTo('#order_review_tableonly');
		});
    </script>
    <?php
}
