<?php
/**
 * POS Application
 *
 * Returns an array of strings.
 */

defined( 'ABSPATH' ) || exit;

return array(
	0   => __( "Product doesn't exist", 'woocommerce-point-of-sale' ),
	/* translators: %s product name */
	1   => __( 'You cannot add another %s to your cart.', 'woocommerce-point-of-sale' ),
	2   => __( 'Sorry, this product cannot be purchased.', 'woocommerce-point-of-sale' ),
	/* translators: %s product name */
	3   => __( 'You cannot add %s to the cart because the product is out of stock.', 'woocommerce-point-of-sale' ),
	/* translators: %1$s product name %2$s left in stock */
	4   => __( 'You cannot add that amount of %1$s to the cart because there is not enough stock (%2$s remaining).', 'woocommerce-point-of-sale' ),
	/* translators: %1$s qty in stock %2$s qty added */
	5   => __( 'You cannot add that amount to the cart &mdash; we have %1$s in stock and you already have %2$s in your cart.', 'woocommerce-point-of-sale' ),
	6   => __( 'Product added successfully', 'woocommerce-point-of-sale' ),
	7   => __( 'Please choose product options&hellip;', 'woocommerce-point-of-sale' ),
	8   => __( 'Are you sure you want to clear all fields and start from scratch?', 'woocommerce-point-of-sale' ),
	9   => __( 'Please add products.', 'woocommerce-point-of-sale' ),
	10  => __( 'Please select Payment method.', 'woocommerce-point-of-sale' ),
	11  => __( 'Please enter correct amount.', 'woocommerce-point-of-sale' ),
	12  => __( 'Order successful.', 'woocommerce-point-of-sale' ),
	13  => __( 'Successfully voided.', 'woocommerce-point-of-sale' ),
	14  => __( 'Order successfully saved.', 'woocommerce-point-of-sale' ),
	15  => __( 'Please enter billing details for this order.', 'woocommerce-point-of-sale' ),
	16  => __( 'Please enter shipping details for this order.', 'woocommerce-point-of-sale' ),
	17  => __( 'Please fill Additional Information.', 'woocommerce-point-of-sale' ),
	18  => __( 'Shipping title is required.', 'woocommerce-point-of-sale' ),
	19  => __( 'Shipping price is required.', 'woocommerce-point-of-sale' ),
	20  => __( 'Product title is required.', 'woocommerce-point-of-sale' ),
	21  => __( 'Product price is required.', 'woocommerce-point-of-sale' ),
	22  => __( 'Quantity is required.', 'woocommerce-point-of-sale' ),
	23  => __( 'Free shipping coupon', 'woocommerce-point-of-sale' ),
	24  => __( 'Can\'t load order', 'woocommerce-point-of-sale' ),
	25  => array(
		__( 'item', 'woocommerce-point-of-sale' ),
		__( 'items', 'woocommerce-point-of-sale' ),
	),
	26  => __( 'All', 'woocommerce-point-of-sale' ),
	27  => __( 'Please enter the password.', 'woocommerce-point-of-sale' ),
	28  => __( 'Incorrect password.', 'woocommerce-point-of-sale' ),
	29  => __( 'Free!', 'woocommerce-point-of-sale' ),
	30  => __( 'Note successfully added.', 'woocommerce-point-of-sale' ),
	31  => __( 'Note successfully updated.', 'woocommerce-point-of-sale' ),
	32  => __( 'Note deleted.', 'woocommerce-point-of-sale' ),
	33  => __( 'Card not recognized.', 'woocommerce-point-of-sale' ),
	34  => __( 'Please enter correct data.', 'woocommerce-point-of-sale' ),
	35  => __( 'Please fill Custom Fields.', 'woocommerce-point-of-sale' ),
	36  => __( 'Invalid Barcode Scan', 'woocommerce-point-of-sale' ),
	37  => __( 'You have logged in successfully.', 'woocommerce-point-of-sale' ),
	38  => __( 'In Stock', 'woocommerce-point-of-sale' ),
	39  => __( 'Out of Stock', 'woocommerce-point-of-sale' ),
	40  => __( 'Back-order', 'woocommerce-point-of-sale' ),
	41  => __( 'Passwords don\'t match', 'woocommerce-point-of-sale' ),
	42  => __( 'Please choose a customer.', 'woocommerce-point-of-sale' ),
	43  => __( 'Offline order successful.', 'woocommerce-point-of-sale' ),
	44  => __( 'Please enter Fee Name', 'woocommerce-point-of-sale' ),
	45  => __( 'Item Note', 'woocommerce-point-of-sale' ),
	46  => __( 'Chose tab', 'woocommerce-point-of-sale' ),
	/* translators: %s spend limit */
	47  => __( 'Spend limit for this tab is %s', 'woocommerce-point-of-sale' ),
	48  => __( 'You are about to close this register. All sales will be logged for this session.', 'woocommerce-point-of-sale' ),
	49  => __( 'This tab already opened', 'woocommerce-point-of-sale' ),
	50  => __( 'Opened', 'woocommerce-point-of-sale' ),
	51  => __( 'Available', 'woocommerce-point-of-sale' ),
	52  => __( 'Minimum title length 3 symbols', 'woocommerce-point-of-sale' ),
	53  => __( 'Discount', 'woocommerce-point-of-sale' ),
	54  => __( 'Add customer', 'woocommerce-point-of-sale' ),
	55  => __( 'Save customer', 'woocommerce-point-of-sale' ),
	56  => __( 'Sign is required', 'woocommerce-point-of-sale' ),
	57  => __( 'Searching for', 'woocommerce-point-of-sale' ),
	58  => __( 'Offline function is enabled and products are being downloaded in background', 'woocommerce-point-of-sale' ),
	59  => __( 'Please generate an order ID', 'woocommerce-point-of-sale' ),
	60  => __( 'SKU:', 'woocommerce-point-of-sale' ),
	61  => __( 'Stock:', 'woocommerce-point-of-sale' ),
	62  => __( 'Product data could not be loaded', 'woocommerce-point-of-sale' ),
	63  => __( 'Full Screen', 'woocommerce-point-of-sale' ),
	64  => __( 'Lock Register', 'woocommerce-point-of-sale' ),
	66  => __( 'Settings', 'woocommerce-point-of-sale' ),
	67  => __( 'Load', 'woocommerce-point-of-sale' ),
	68  => __( 'Orders', 'woocommerce-point-of-sale' ),
	69  => __( 'Tabs', 'woocommerce-point-of-sale' ),
	70  => __( 'Closing Register', 'woocommerce-point-of-sale' ),
	71  => __( 'Show Tiles', 'woocommerce-point-of-sale' ),
	72  => __( 'Your device is connected to the internet.', 'woocommerce-point-of-sale' ),
	73  => __( 'This device is not connected to the internet and orders will not be synchronised with the shops database until an internet connection is available. This device will store orders locally until the connection is resumed.', 'woocommerce-point-of-sale' ),
	/* translators: %s time */
	74  => __( 'Register opened %s', 'woocommerce-point-of-sale' ),
	/* translators: %s version */
	75  => __( 'Version %s', 'woocommerce-point-of-sale' ),
	76  => __( 'Register Closed', 'woocommerce-point-of-sale' ),
	77  => __( 'Sorry, we could not locate this order number.', 'woocommerce-point-of-sale' ),
	78  => __( 'Register', 'woocommerce-point-of-sale' ),
	79  => __( 'Till Screen', 'woocommerce-point-of-sale' ),
	80  => __( 'Help & Feedback', 'woocommerce-point-of-sale' ),
	81  => __( 'Close Register', 'woocommerce-point-of-sale' ),
	82  => __( 'Outlet', 'woocommerce-point-of-sale' ),
	83  => __( 'Sales', 'woocommerce-point-of-sale' ),
	84  => __( 'Cart', 'woocommerce-point-of-sale' ),
	85  => __( 'Increase Quantity', 'woocommerce-point-of-sale' ),
	86  => __( 'Delete', 'woocommerce-point-of-sale' ),
	87  => __( 'Sale', 'woocommerce-point-of-sale' ),
	88  => __( 'Subtotal', 'woocommerce-point-of-sale' ),
	89  => __( 'Discounts', 'woocommerce-point-of-sale' ),
	90  => __( 'Coupon', 'woocommerce-point-of-sale' ),
	91  => __( 'Fees', 'woocommerce-point-of-sale' ),
	92  => __( 'Total', 'woocommerce-point-of-sale' ),
	93  => __( 'Shipping', 'woocommerce-point-of-sale' ),
	94  => __( 'Dining', 'woocommerce-point-of-sale' ),
	95  => __( 'Login', 'woocommerce-point-of-sale' ),
	96  => __( 'Note', 'woocommerce-point-of-sale' ),
	97  => __( 'Fee', 'woocommerce-point-of-sale' ),
	98  => __( 'Hold', 'woocommerce-point-of-sale' ),
	99  => __( 'Reset', 'woocommerce-point-of-sale' ),
	100 => __( 'Clear', 'woocommerce-point-of-sale' ),
	101 => __( 'Print', 'woocommerce-point-of-sale' ),
	102 => __( 'Pay', 'woocommerce-point-of-sale' ),
	/* translators: %s user name */
	103 => __( 'Add %s as new customer', 'woocommerce-point-of-sale' ),
	104 => __( 'Please add items to the cart.', 'woocommerce-point-of-sale' ),
	105 => __( 'Please select a customer', 'woocommerce-point-of-sale' ),
	106 => __( 'Signature', 'woocommerce-point-of-sale' ),
	107 => __( 'Cancel', 'woocommerce-point-of-sale' ),
	108 => __( 'Done', 'woocommerce-point-of-sale' ),
	109 => __( 'State', 'woocommerce-point-of-sale' ),
	110 => __( 'Signature required to fulfill this order.', 'woocommerce-point-of-sale' ),
	111 => __( 'Shipping Method', 'woocommerce-point-of-sale' ),
	112 => __( 'First Name', 'woocommerce-point-of-sale' ),
	113 => __( 'Last Name', 'woocommerce-point-of-sale' ),
	114 => __( 'Company', 'woocommerce-point-of-sale' ),
	115 => __( 'Street Address', 'woocommerce-point-of-sale' ),
	116 => __( 'Apartment, Suite, Unit, Etc. (Optional)', 'woocommerce-point-of-sale' ),
	117 => __( 'Town / City', 'woocommerce-point-of-sale' ),
	118 => __( 'Postcode / ZIP', 'woocommerce-point-of-sale' ),
	119 => __( 'Country', 'woocommerce-point-of-sale' ),
	120 => __( 'County', 'woocommerce-point-of-sale' ),
	121 => __( 'None', 'woocommerce-point-of-sale' ),
	122 => __( 'Standard Delivery', 'woocommerce-point-of-sale' ),
	123 => __( 'Express Delivery', 'woocommerce-point-of-sale' ),
	124 => __( 'International Delivery', 'woocommerce-point-of-sale' ),
	125 => __( 'Categories', 'woocommerce-point-of-sale' ),
	126 => __( 'Grids', 'woocommerce-point-of-sale' ),
	127 => __( 'Sort by product name', 'woocommerce-point-of-sale' ),
	128 => __( 'Sort by price', 'woocommerce-point-of-sale' ),
	129 => __( 'Sort by date added', 'woocommerce-point-of-sale' ),
	130 => __( 'Sort by popularity', 'woocommerce-point-of-sale' ),
	/* translators: %s number of products */
	131 => __( '%s products', 'woocommerce-point-of-sale' ),
	132 => __( 'Payment', 'woocommerce-point-of-sale' ),
	133 => __( 'Amount Due', 'woocommerce-point-of-sale' ),
	134 => __( 'Tendered', 'woocommerce-point-of-sale' ),
	135 => __( 'Tender', 'woocommerce-point-of-sale' ),
	136 => __( 'End of Sale', 'woocommerce-point-of-sale' ),
	137 => __( 'Thank You', 'woocommerce-point-of-sale' ),
	138 => __( 'Change', 'woocommerce-point-of-sale' ),
	139 => __( 'Present Card', 'woocommerce-point-of-sale' ),
	140 => __( 'Pending', 'woocommerce-point-of-sale' ),
	141 => __( 'Failed', 'woocommerce-point-of-sale' ),
	/* translators: %s number of seconds */
	142 => __( 'Changing user in %s seconds', 'woocommerce-point-of-sale' ),
	143 => __( 'Email', 'woocommerce-point-of-sale' ),
	144 => __( 'Close', 'woocommerce-point-of-sale' ),
	145 => __( 'Continue', 'woocommerce-point-of-sale' ),
	146 => __( 'Email address is required', 'woocommerce-point-of-sale' ),
	147 => __( 'Customer note is required', 'woocommerce-point-of-sale' ),
	148 => __( 'Order successfully completed.', 'woocommerce-point-of-sale' ),
	149 => __( 'Order has failed.', 'woocommerce-point-of-sale' ),
	150 => __( 'Please enter or select an amount to tender.', 'woocommerce-point-of-sale' ),
	151 => __( 'Outlet Information', 'woocommerce-point-of-sale' ),
	152 => __( 'Website', 'woocommerce-point-of-sale' ),
	153 => __( 'Phone', 'woocommerce-point-of-sale' ),
	154 => __( 'Address', 'woocommerce-point-of-sale' ),
	155 => __( 'Wireless', 'woocommerce-point-of-sale' ),
	156 => __( 'Social Networks', 'woocommerce-point-of-sale' ),
	157 => __( 'Search', 'woocommerce-point-of-sale' ),
	158 => __( 'Sort by order number', 'woocommerce-point-of-sale' ),
	159 => __( 'Price', 'woocommerce-point-of-sale' ),
	160 => __( 'Sort by date placed', 'woocommerce-point-of-sale' ),
	161 => __( 'Orders that are placed by this register will appear here. If there are no orders, please check the status loading options are correctly set by your shop manager.', 'woocommerce-point-of-sale' ),
	162 => __( 'Processing', 'woocommerce-point-of-sale' ),
	163 => __( 'Completed', 'woocommerce-point-of-sale' ),
	164 => __( 'On-Hold', 'woocommerce-point-of-sale' ),
	165 => __( 'Walk-in Customer', 'woocommerce-point-of-sale' ),
	166 => __( '(No Name)', 'woocommerce-point-of-sale' ),
	167 => __( 'No billing address set.', 'woocommerce-point-of-sale' ),
	168 => __( 'The receipt is being generated.', 'woocommerce-point-of-sale' ),
	169 => __( 'Reorder', 'woocommerce-point-of-sale' ),
	170 => __( 'Billing', 'woocommerce-point-of-sale' ),
	171 => __( 'Shipping', 'woocommerce-point-of-sale' ),
	172 => __( 'Website Order', 'woocommerce-point-of-sale' ),
	173 => __( 'Products', 'woocommerce-point-of-sale' ),
	174 => __( 'Customer Note', 'woocommerce-point-of-sale' ),
	175 => __( 'Product', 'woocommerce-point-of-sale' ),
	176 => __( 'Cost', 'woocommerce-point-of-sale' ),
	177 => __( 'Qty', 'woocommerce-point-of-sale' ),
	178 => __( 'Tax', 'woocommerce-point-of-sale' ),
	179 => __( 'Guest', 'woocommerce-point-of-sale' ),
	180 => __( 'No shipping address set.', 'woocommerce-point-of-sale' ),
	181 => __( 'Open Register', 'woocommerce-point-of-sale' ),
	182 => __( 'Float', 'woocommerce-point-of-sale' ),
	183 => __( 'Yes', 'woocommerce-point-of-sale' ),
	184 => __( 'Order Note', 'woocommerce-point-of-sale' ),
	185 => __( 'Save', 'woocommerce-point-of-sale' ),
	186 => __( 'Edit', 'woocommerce-point-of-sale' ),
	/* translators: %s cart action */
	187 => __( 'You have items in the cart. Are you sure you want to %s the cart?', 'woocommerce-point-of-sale' ),
	188 => __( 'No', 'woocommerce-point-of-sale' ),
	189 => __( 'Scan or enter card number', 'woocommerce-point-of-sale' ),
	190 => __( 'Product Image', 'woocommerce-point-of-sale' ),
	191 => __( 'Stock', 'woocommerce-point-of-sale' ),
	192 => __( 'SKU', 'woocommerce-point-of-sale' ),
	193 => __( 'Description', 'woocommerce-point-of-sale' ),
	194 => __( 'Dining', 'woocommerce-point-of-sale' ),
	195 => __( 'Password', 'woocommerce-point-of-sale' ),
	196 => __( 'Password is required', 'woocommerce-point-of-sale' ),
	197 => __( 'Invalid credentials', 'woocommerce-point-of-sale' ),
	198 => __( 'Fee Name', 'woocommerce-point-of-sale' ),
	199 => __( 'Taxable', 'woocommerce-point-of-sale' ),
	200 => __( 'Apply', 'woocommerce-point-of-sale' ),
	201 => __( 'Fee name is required.', 'woocommerce-point-of-sale' ),
	202 => __( 'Discount Reason', 'woocommerce-point-of-sale' ),
	203 => __( 'Wastage', 'woocommerce-point-of-sale' ),
	204 => __( 'Damaged', 'woocommerce-point-of-sale' ),
	205 => __( 'Managed Approved', 'woocommerce-point-of-sale' ),
	206 => __( 'General Discount', 'woocommerce-point-of-sale' ),
	207 => __( 'Student Discount', 'woocommerce-point-of-sale' ),
	208 => __( 'Member Discount', 'woocommerce-point-of-sale' ),
	/* translators: %s something off */
	209 => __( '%s off', 'woocommerce-point-of-sale' ),
	210 => __( 'Eat In', 'woocommerce-point-of-sale' ),
	211 => __( 'Take Away', 'woocommerce-point-of-sale' ),
	212 => __( 'Delivery', 'woocommerce-point-of-sale' ),
	213 => __( 'Add Product', 'woocommerce-point-of-sale' ),
	214 => __( 'Quantity', 'woocommerce-point-of-sale' ),
	215 => __( 'Quantity required', 'woocommerce-point-of-sale' ),
	216 => __( 'Update Customer', 'woocommerce-point-of-sale' ),
	217 => __( 'Company Name', 'woocommerce-point-of-sale' ),
	218 => __( 'Email Address', 'woocommerce-point-of-sale' ),
	219 => __( 'Username', 'woocommerce-point-of-sale' ),
	220 => __( 'Password', 'woocommerce-point-of-sale' ),
	221 => __( 'First Name, Last Name, Email Address will also be updated.', 'woocommerce-point-of-sale' ),
	222 => __( 'Product Name', 'woocommerce-point-of-sale' ),
	223 => __( 'Product Attributes', 'woocommerce-point-of-sale' ),
	224 => __( 'Label', 'woocommerce-point-of-sale' ),
	225 => __( 'Value', 'woocommerce-point-of-sale' ),
	226 => __( 'Publish Product', 'woocommerce-point-of-sale' ),
	227 => __( 'Add Attribute', 'woocommerce-point-of-sale' ),
	228 => __( 'Coupon Code', 'woocommerce-point-of-sale' ),
	229 => __( 'Opened', 'woocommerce-point-of-sale' ),
	230 => __( 'Closing', 'woocommerce-point-of-sale' ),
	231 => __( 'Closing Notes', 'woocommerce-point-of-sale' ),
	232 => __( 'Expected', 'woocommerce-point-of-sale' ),
	233 => __( 'Counted', 'woocommerce-point-of-sale' ),
	234 => __( 'Difference', 'woocommerce-point-of-sale' ),
	235 => __( 'Cash', 'woocommerce-point-of-sale' ),
	236 => __( 'Chip & Pin', 'woocommerce-point-of-sale' ),
	/* translators: %s opening cash amount */
	237 => __( 'Opening cash amount: %s', 'woocommerce-point-of-sale' ),
	/* translators: %s note */
	238 => __( 'Note: %s', 'woocommerce-point-of-sale' ),
	/* translators: %s cash */
	239 => __( 'Cash: %s', 'woocommerce-point-of-sale' ),
	/* translators: %s cash in */
	240 => __( 'Cash In: %s', 'woocommerce-point-of-sale' ),
	/* translators: %s total */
	241 => __( 'Total: %s', 'woocommerce-point-of-sale' ),
	242 => __( 'Edit Product', 'woocommerce-point-of-sale' ),
	243 => __( 'Update Product', 'woocommerce-point-of-sale' ),
	244 => __( 'Tax Class', 'woocommerce-point-of-sale' ),
	245 => __( 'Reference Number', 'woocommerce-point-of-sale' ),
	246 => __( 'Receipt', 'woocommerce-point-of-sale' ),
	247 => __( 'Printing...', 'woocommerce-point-of-sale' ),
	248 => __( 'No product results', 'woocommerce-point-of-sale' ),
	/* translators: %1$s product name %2$s left in stock */
	249 => __( 'You cannot add %1$s to the cart because there are only %2$s in stock.', 'woocommerce-point-of-sale' ),
	/* translators: %1$s numer of products cached %2$s total number of products */
	250 => __( '%1$s out of %2$s products cached', 'woocommerce-point-of-sale' ),
	/* translators: %1$s numer of orders cached %2$s total number of orders */
	251 => __( '%1$s out of %2$s orders cached', 'woocommerce-point-of-sale' ),
	252 => __( 'Search customer', 'woocommerce-point-of-sale' ),
	253 => __( 'pcs', 'woocommerce-point-of-sale' ),
	254 => __( 'View', 'woocommerce-point-of-sale' ),
	255 => __( 'Counted Value', 'woocommerce-point-of-sale' ),
	256 => __( 'Minimum 1', 'woocommerce-point-of-sale' ),
	257 => __( 'An error occurred', 'woocommerce-point-of-sale' ),
	258 => __( 'Order', 'woocommerce-point-of-sale' ),
	/* translators: %s product name */
	259 => __( 'Product %s not found', 'woocommerce-point-of-sale' ),
	/* translators: %s amount */
	260 => __( 'Free shipping needs min.%s of cart total or coupon with free shipping', 'woocommerce-point-of-sale' ),
	/* translators: %s amount */
	261 => __( 'Free shipping needs min.%s of cart total and coupon with free shipping`', 'woocommerce-point-of-sale' ),
	262 => __( 'Free shipping needs coupon with free shipping`', 'woocommerce-point-of-sale' ),
	/* translators: %s amount */
	263 => __( 'Free shipping needs min.%s of cart total', 'woocommerce-point-of-sale' ),
	264 => __( 'Invalid requirement for free shipping`', 'woocommerce-point-of-sale' ),
	265 => __( 'Invalid cost value`', 'woocommerce-point-of-sale' ),
	266 => __( 'Refund', 'woocommerce-point-of-sale' ),
	267 => __( 'Refund Reason', 'woocommerce-point-of-sale' ),
	268 => __( 'Select items to refund', 'woocommerce-point-of-sale' ),
	269 => __( 'Recover Stock', 'woocommerce-point-of-sale' ),
	270 => __( 'Scan SKU barcode', 'woocommerce-point-of-sale' ),
	271 => __( 'Search products', 'woocommerce-point-of-sale' ),
	272 => __( 'Search Orders', 'woocommerce-point-of-sale' ),
	273 => __( 'Copy Billing Address', 'woocommerce-point-of-sale' ),
	274 => __( 'Edit Shipping', 'woocommerce-point-of-sale' ),
	275 => __( 'Shipping Title', 'woocommerce-point-of-sale' ),
	276 => __( 'Shipping Price', 'woocommerce-point-of-sale' ),
	282 => __( 'Cancel Saved Order', 'woocommerce-point-of-sale' ),
	283 => __( 'Do you want to cancel this saved order?', 'woocommerce-point-of-sale' ),
	284 => __( 'Yes, cancel it', 'woocommerce-point-of-sale' ),
	285 => __( 'No, keep it as is', 'woocommerce-point-of-sale' ),
	286 => __( 'Order cancelled sucessfully.', 'woocommerce-point-of-sale' ),
	287 => __( 'Order could not be cancelled.', 'woocommerce-point-of-sale' ),
	288 => __( 'Cancelled', 'woocommerce-point-of-sale' ),
	289 => __( 'Order Status', 'woocommerce-point-of-sale' ),
	290 => __( 'There are products in the basket that will be cleared when you close the register. Do you want to continue?', 'woocommerce-point-of-sale' ),
	291 => __( 'Continue', 'woocommerce-point-of-sale' ),
	292 => __( 'Switch User?', 'woocommerce-point-of-sale' ),
	293 => __( 'There are products in the basket, do you want to keep them for later or clear them?.', 'woocommerce-point-of-sale' ),
	294 => __( 'Keep', 'woocommerce-point-of-sale' ),
	295 => __( 'Refunded', 'woocommerce-point-of-sale' ),
	296 => __( 'Tender amount should be equal or greater than cart total', 'woocommerce-point-of-sale' ),
	297 => __( 'Unauthorized', 'woocommerce-point-of-sale' ),
	298 => __( 'You are not assigned or have access to the outlet.', 'woocommerce-point-of-sale' ),
	299 => __( 'A custom prouct with the same name is added to the cart. Would you like to increase the quantity instead?', 'woocommerce-point-of-sale' ),
	300 => __( 'Yes, increase quantity', 'woocommerce-point-of-sale' ),
	301 => __( 'No, create a new item', 'woocommerce-point-of-sale' ),
	302 => __( 'Sorry, this order has already been refunded.', 'woocommerce-point-of-sale' ),
	303 => __( 'Gift Receipt', 'woocommerce-point-of-sale' ),
	304 => __( 'If you want a different price, please add a variation or change product name', 'woocommerce-point-of-sale' ),
	305 => __( 'Receipt could not be printed', 'woocommerce-point-of-sale' ),
	/* translators: %1$s product name %2$s quantity */
	306 => __( 'The minimum quantity for %1$s is %2$s.', 'woocommerce-point-of-sale' ),
	/* translators: %1$s product name %2$s quantity */
	307 => __( 'The maximum quantity for %1$s is %2$s.', 'woocommerce-point-of-sale' ),
	/* translators: %1$s product name %2$s quantity */
	308 => __( '%1$s must be bought in groups of %2$s.', 'woocommerce-point-of-sale' ),
	309 => __( 'There are no variations matching this selection.', 'woocommerce-point-of-sale' ),
	310 => __( 'Choose an option', 'woocommerce-point-of-sale' ),
	311 => __( 'Variation', 'woocommerce-point-of-sale' ),
	312 => __( 'Choose the dining option for this order.', 'woocommerce-point-of-sale' ),
	313 => __( 'Choose the type of note to record for this order.', 'woocommerce-point-of-sale' ),
	314 => __( 'More', 'woocommerce-point-of-sale' ),
	315 => __( 'Less', 'woocommerce-point-of-sale' ),
	316 => __( 'Choose a shipping method and enter the shipping details for this order.', 'woocommerce-point-of-sale' ),
	317 => __( 'Enter the coupon code to apply to this order.', 'woocommerce-point-of-sale' ),
	318 => __( 'Apply Coupon', 'woocommerce-point-of-sale' ),
	319 => __( 'Signature verification will be gone through after 80 seconds of inactivity', 'woocommerce-point-of-sale' ),
	/* translators: %s number of seconds */
	320 => __( 'Printing in %s second', 'woocommerce-point-of-sale' ),
	/* translators: %s number of seconds */
	321 => __( 'Printing in %s seconds', 'woocommerce-point-of-sale' ),
);