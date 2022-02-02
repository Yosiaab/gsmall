<?php 
$layout_ID = ( get_option( 'page_on_front' ) ) ? get_option( 'page_on_front' ) : 0;
$home_layout = get_post_meta( $layout_ID, 'page_home_template', true );
if( !in_array( $home_layout, array( 'home-style17' ) ) ){
	return;
}

/**
 * Add meta box custom
 */
function prfx_review_meta() {
    add_meta_box( 'prfx_meta', __( 'MetaBox Custom', 'sw_core' ), 'prfx_meta_callback', 'post', 'side', 'high' );
	add_meta_box( 'sw_review_meta', esc_html__( 'Review Meta', 'sw_core' ), 'sw_review_meta', 'post', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'prfx_review_meta' );
/**
 * Outputs the content of the meta box
 */
function prfx_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    global $post;
	$prfx_stored_meta = get_post_meta( $post->ID );
    ?>

 <p>
    <span class="prfx-row-title">-&nbsp;<?php _e( 'Check if this is a Hot post: ', 'sw_core' )?></span>
    <div class="prfx-row-content">
        <label for="hot_checkbox">
            <input type="checkbox" name="hot_checkbox" id="hot_checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['hot_checkbox'] ) ) checked( $prfx_stored_meta['hot_checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Hot Post', 'sw_core' )?>
        </label>

    </div>
</p>
 <p>
    <span class="prfx-row-title">-&nbsp;<?php _e( 'Check if this is a Highlight post: ', 'sw_core' )?></span>
    <div class="prfx-row-content">
        <label for="highlight_checkbox">
            <input type="checkbox" name="highlight_checkbox" id="highlight_checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['highlight_checkbox'] ) ) checked( $prfx_stored_meta['highlight_checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Highlight Post', 'sw_core' )?>
        </label>

    </div>
</p>

 <p>
    <span class="prfx-row-title">-&nbsp;<?php _e( 'Check if this is a Recommend post: ', 'sw_core' )?></span>
    <div class="prfx-row-content">
        <label for="recommend_checkbox">
            <input type="checkbox" name="recommend_checkbox" id="recommend_checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['recommend_checkbox'] ) ) checked( $prfx_stored_meta['recommend_checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Recommend Post', 'sw_core' )?>
        </label>

    </div>
</p>
    <?php
}

/* Metabox content */
function sw_review_meta(){
	 wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
	 global $post;
	// Add an nonce field so we can check for it later.
	$pros   = get_post_meta( $post->ID, '_review_pros', true );
	$cons   = get_post_meta( $post->ID, '_review_cons', true );
	$gameplay   = get_post_meta( $post->ID, '_gameplay', true );
	$gamestory   = get_post_meta( $post->ID, '_gamestory', true );
	$graphic   = get_post_meta( $post->ID, '_grapphic', true );
	$performance   = get_post_meta( $post->ID, '_performance', true );

	$name_game   = get_post_meta( $post->ID, '_name_game', true );
	$deverloper   = get_post_meta( $post->ID, '_deverloper', true );
	$publisher   = get_post_meta( $post->ID, '_publisher', true );
	$release   = get_post_meta( $post->ID, '_release', true );
	$platforms   = get_post_meta( $post->ID, '_platforms', true );
?>
	<div class="sw-meta">
		<h3><?php echo esc_html__( 'Game Review', 'sw_core' ); ?></h3>
		<div class="meta-item">
			<p>
				<h4>Pros: </h4><br />
				<?php wp_editor( $pros, '_review_pros', $settings = array('textarea_name' => '_review_pros', 'textarea_rows' => 5) ); ?>
			</p>
		</div>
		
		<div class="meta-item">
			<p>
				<h4>Cons: </h4><br />
				<?php wp_editor( $cons, '_review_cons', $settings = array('textarea_name' => '_review_cons', 'textarea_rows' => 5) ); ?>
			</p>
		</div>
		
		<div class="meta-item">
			<p><?php echo esc_html__( 'Game Play', 'sw_core' ); ?>: </p>
			<input type="text" name="_gameplay" id="_gameplay" size="70" value="<?php echo esc_attr( $gameplay ); ?>"/>
		</div>
		
		<div class="meta-item">
			<p><?php echo esc_html__( 'Games Story', 'sw_core' ); ?>: </p>
			<input type="text" name="_gamestory" id="_gamestory" size="70" value="<?php echo esc_attr( $gamestory ); ?>"/>
		</div>
		
		<div class="meta-item">
			<p><?php echo esc_html__( 'Graphic', 'sw_core' ); ?>: </p>
			<input type="text" name="_grapphic" id="_grapphic" size="70" value="<?php echo esc_attr( $graphic ); ?>"/>
		</div>
		
		<div class="meta-item">
			<p><?php echo esc_html__( 'Performance', 'sw_core' ); ?>: </p>
			<input type="text" name="_performance" id="_performance" size="70" value="<?php echo esc_attr( $performance ); ?>"/>
		</div>
		
		<h3><?php echo esc_html__( 'Game Info', 'sw_core' ); ?></h3>
		<div class="meta-item">
			<p><?php echo esc_html__( 'Name Game', 'sw_core' ); ?>: </p>
			<input  type="text" name="_name_game" id="_name_game" size="70" value="<?php echo esc_attr( $name_game ); ?>"/>
		</div>
		
		<div class="meta-item">
			<p><?php echo esc_html__( 'Deverloper', 'sw_core' ); ?>: </p>
			<input type="text" name="_deverloper" id="_deverloper" size="70" value="<?php echo esc_attr( $deverloper ); ?>"/>
		</div>
		
		<div class="meta-item">
			<p><?php echo esc_html__( 'Publisher', 'sw_core' ); ?>: </p>
			<input type="text" name="_publisher" id="_publisher" size="70" value="<?php echo esc_attr( $publisher ); ?>"/>
		</div>
		
		<div class="meta-item">
			<p><?php echo esc_html__( 'Release Date', 'sw_core' ); ?>: </p>
			<input type="text" name="_release" id="_release" size="70" value="<?php echo esc_attr( $release ); ?>"/>
		</div>
		
		<div class="meta-item">
			<p><?php echo esc_html__( 'Platforms', 'sw_core' ); ?>: </p>
			<input type="text" name="_platforms" id="_platforms" size="70" value="<?php echo esc_attr( $platforms ); ?>"/>
		</div>
	</div>
<?php 
}

/**
 * Saves the custom meta input
 */
function prfx_meta_save( $post_id ) {
    // Checks save status - overcome autosave, etc.
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
	
	// Checks for input hot and saves - save checked as yes and unchecked at no
	if( isset( $_POST[ 'hot_checkbox' ] ) ) {
		update_post_meta( $post_id, 'hot_checkbox', 'yes' );
	} else {
		update_post_meta( $post_id, 'hot_checkbox', 'no' );
	}
	// Checks for input highlight and saves - save checked as yes and unchecked at no
	if( isset( $_POST[ 'highlight_checkbox' ] ) ) {
		update_post_meta( $post_id, 'highlight_checkbox', 'yes' );
	} else {
		update_post_meta( $post_id, 'highlight_checkbox', 'no' );
	}
	
	// Checks for input highlight and saves - save checked as yes and unchecked at no
	if( isset( $_POST[ 'recommend_checkbox' ] ) ) {
		update_post_meta( $post_id, 'recommend_checkbox', 'yes' );
	} else {
		update_post_meta( $post_id, 'recommend_checkbox', 'no' );
	}
	
	if( isset( $_POST['_review_pros'] ) ){
		update_post_meta( $post_id, '_review_pros',  $_POST['_review_pros'] );
	}
	if( isset( $_POST['_review_cons'] ) ){
		update_post_meta( $post_id, '_review_cons', $_POST['_review_cons'] );
	}
	if( isset( $_POST['_gameplay'] ) ){
		update_post_meta( $post_id, '_gameplay', $_POST['_gameplay'] );
	}
	if( isset( $_POST['_gamestory'] ) ){
		update_post_meta( $post_id, '_gamestory', $_POST['_gamestory'] );
	}
	if( isset( $_POST['_grapphic'] ) ){
		update_post_meta( $post_id, '_grapphic', $_POST['_grapphic'] );
	}
	if( isset( $_POST['_performance'] ) ){
		update_post_meta( $post_id, '_performance', $_POST['_performance'] );
	}
	
	if( isset( $_POST['_name_game'] ) ){
		update_post_meta( $post_id, '_name_game', $_POST['_name_game'] );
	}
	if( isset( $_POST['_deverloper'] ) ){
		update_post_meta( $post_id, '_deverloper', $_POST['_deverloper'] );
	}
	if( isset( $_POST['_publisher'] ) ){
		update_post_meta( $post_id, '_publisher', $_POST['_publisher'] );
	}
	if( isset( $_POST['_release'] ) ){
		update_post_meta( $post_id, '_release', $_POST['_release'] );
	}
	if( isset( $_POST['_platforms'] ) ){
		update_post_meta( $post_id, '_platforms', $_POST['_platforms'] );
	}
	
}
add_action( 'save_post', 'prfx_meta_save' );

//init the meta box
add_action( 'after_setup_theme', 'custom_postimage_setup' );
function custom_postimage_setup(){
    add_action( 'add_meta_boxes', 'custom_postimage_meta_box' );
    add_action( 'save_post', 'custom_postimage_meta_box_save' );
}

function custom_postimage_meta_box(){

    //on which post types should the box appear?
       add_meta_box('custom_postimage_meta_box',__( 'More Featured Images', 'sw_core'),'custom_postimage_meta_box_func','post','side','low');
}

function custom_postimage_meta_box_func($post){

    //an array with all the images (ba meta key). The same array has to be in custom_postimage_meta_box_save($post_id) as well.

        $image_meta_val=get_post_meta( $post->ID, 'second_featured_image', true);
		if ( $image_meta_val ) {
				$image = wp_get_attachment_thumb_url( $image_meta_val );
			} else {
				$image = wc_placeholder_img_src();
			}
        ?>
        <div class="custom_postimage_wrapper" id="second_featured_image_wrapper" style="margin-bottom:20px;">
            <img src="<?php echo esc_url( $image ); ?>" style="width:100%;margin:0 0 20px; display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" alt="">
            <a class="addimage button" onclick="custom_postimage_add_image('second_featured_image');"style="margin:0 0 20px;"><?php _e('add image','sw_core'); ?></a><br>
            <a class="removeimage" style="color:#a00;cursor:pointer;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" onclick="custom_postimage_remove_image('second_featured_image');"><?php _e('remove image','sw_core'); ?></a>
            <input type="hidden" name="second_featured_image" id="second_featured_image" value="<?php echo $image_meta_val; ?>" />
        </div>
    <script>
    function custom_postimage_add_image(key){

        var $wrapper = jQuery('#'+key+'_wrapper');

        custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
            title: '<?php _e('select image','sw_core'); ?>',
            button: {
                text: '<?php _e('select image','sw_core'); ?>'
            },
            multiple: false
        });
        custom_postimage_uploader.on('select', function() {

            var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
            var img_url = attachment['url'];
            var img_id = attachment['id'];
            $wrapper.find('input#'+key).val(img_id);
            $wrapper.find('img').attr('src',img_url);
            $wrapper.find('img').show();
            $wrapper.find('a.removeimage').show();
        });
        custom_postimage_uploader.on('open', function(){
            var selection = custom_postimage_uploader.state().get('selection');
            var selected = $wrapper.find('input#'+key).val();
            if(selected){
                selection.add(wp.media.attachment(selected));
            }
        });
        custom_postimage_uploader.open();
        return false;
    }

    function custom_postimage_remove_image(key){
        var $wrapper = jQuery('#'+key+'_wrapper');
        $wrapper.find('input#'+key).val('');
        $wrapper.find('img').hide();
        $wrapper.find('a.removeimage').hide();
        return false;
    }
    </script>
    <?php
    wp_nonce_field( 'custom_postimage_meta_box', 'custom_postimage_meta_box_nonce' );
}

function custom_postimage_meta_box_save($post_id){

    if ( ! current_user_can( 'edit_posts', $post_id ) ){ return 'not permitted'; }

    if (isset( $_POST['custom_postimage_meta_box_nonce'] ) && wp_verify_nonce($_POST['custom_postimage_meta_box_nonce'],'custom_postimage_meta_box' )){

        //same array as in custom_postimage_meta_box_func($post)
		if(isset($_POST['second_featured_image']) && intval($_POST['second_featured_image'])!=''){
			update_post_meta( $post_id,'second_featured_image', intval($_POST['second_featured_image']));
		}else{
			update_post_meta( $post_id, 'second_featured_image', '');
		}
    }
}