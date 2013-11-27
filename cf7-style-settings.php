<?php
/**
 * Contact Form 7 Style
 *
 * Settings
 */
include_once( 'cf7-style-options.php' );
	
/**
 * Contact Style
 *
 * Displays the settings pages in the admin area
 * and saves the options
 */
function cf7_style_add_admin() {

	global $cf7_style_name, $cf7_style, $templates, $custom;

	if ( isset( $_GET['page'] ) && $_GET['page'] == basename(__FILE__) ) {

		if ( isset( $_POST['action'] ) && 'save' == $_POST['action'] ) {
			header( "Location: admin.php?page=cf7-style-settings.php&saved=true" );   		   
			foreach ( $templates as $value ) { 
				if( isset( $_POST[ $value['id'] ] ) ) { update_option( $value['id'], $_POST[ $value['id'] ] ); } else { delete_option( $value['id'] ); } 
			}
			exit;
		}
		else if( isset( $_POST['action'] ) && 'reset' == $_POST['action'] ) {
			header( "Location: admin.php?page=cf7-style-settings.php&reset=true" );
			foreach ( $templates as $value ) {
				delete_option( $value['id'] );
			}
			exit;
		}
	}
	
	if ( isset( $_GET['page'] ) && $_GET['page'] == 'cf7-style-custom.php' ) { 

		if ( isset( $_POST['custom'] ) && 'save' == $_POST['custom'] ) {
			header( "Location: admin.php?page=cf7-style-custom.php&saved=true" );
			foreach ( $custom as $value ) {
				if( isset( $_POST[ $value['id'] ] ) ) { update_option( $value['id'], $_POST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); }
			}
			exit;  
		}
		else if( isset( $_POST['custom'] ) && 'reset' == $_POST['custom'] ) {
			header( "Location: admin.php?page=cf7-style-custom.php&reset=true" );
			foreach ( $custom as $value ) {
				delete_option( $value['id'] );
			}
			exit;
		}	
	}

	add_menu_page(
		$cf7_style_name,	
		'Xmas Style',	
		'administrator',  
		basename(__FILE__),
		'cf7_style_menu',
		'',
		28.5
	);

	add_submenu_page(
		basename(__FILE__),
		'Custom Style',
		'Custom Style',
		'administrator',
		'cf7-style-custom.php',
		'cf7_style_custom'
	);
}

/**
 * Xmas Style
 *
 * Displays fields for the Xmas Style area of the admin area
 */
function cf7_style_menu() {

	global $cf7_style_name, $cf7_style, $templates;
	$i=0;

	if ( isset( $_GET['saved'] ) ) echo '<div id="message" class="updated fade"><p><strong>' . $cf7_style_name . ' settings saved.</strong></p></div>';  
	if ( isset( $_GET['reset'] ) ) echo '<div id="message" class="updated fade"><p><strong>' . $cf7_style_name . ' settings reset.</strong></p></div>';
?>
<div class="wrap cf7_style_admin">
	<div id="icon-themes" class="icon32"></div>
	<h2>Xmas Style</h2>

	<div class="cf7_style_opts">
		<form method="post">

        <?php foreach ( $templates as $value ) {
        switch ( $value['type'] ) {

			case "open":
 
			break;
			case "close":
        ?>
        
	</div>  
</div>
		<?php
			break;
			case "title":
        ?>

		<p>To easily set up <?php echo $cf7_style_name; ?> addon, you can use the menu below.</p>

		<?php
			break;
			case "text":
		?>
  
	<div class="cf7_style_input cf7_style_text">  
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
		<small><?php echo $value['desc']; ?></small>
		<div class="clearfix"></div>
    </div>

		<?php
            break;
            case "textarea":
        ?>

    <div class="cf7_style_input cf7_style_textarea">  
        <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
        <textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>  
        <small><?php echo $value['desc']; ?></small>
        <div class="clearfix"></div>
    </div>

		<?php
            break;
            case "select":
        ?>
  
    <div class="cf7_style_input cf7_style_select">
        <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
        <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">  
            <?php foreach ( $value['options'] as $option ) { ?>  
            <option class="font-load" <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?> value="<?php echo $option; ?>"><?php echo $option; ?></option><?php } ?>
        </select>
    
        <small><?php echo $value['desc']; ?></small>
        <div class="clearfix"></div>
    
        <small class="preview">Preview</small>
        <div id="font-viewer" class="font-viewer3">
            <div class="style-select"></div>
            <p class="wpcf7">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
    </div>

		<?php
			break;
			case "section":

			$i++;
		?>

    <div class="cf7_style_section">
    	<div class="cf7_style_title">
			<h3><?php echo $value['name']; ?></h3>
			<div class="clearfix"></div>
        </div>
		<div class="cf7_style_options">  
			<ul class="cf7_style_templates">
				<li class="selected">
					<img src="<?php echo plugin_dir_url( __FILE__ ) . '/admin/images/cf7_xmas_classic.jpg'; ?>" />
					<span>Xmas Classic</span>
				</li>
				<li>
					<img src="<?php echo plugin_dir_url( __FILE__ ) . '/admin/images/cf7_xmas_red.jpg'; ?>" />
					<span>Xmas Red</span>
				</li>
				<li>
					<img src="<?php echo plugin_dir_url( __FILE__ ) . '/admin/images/cf7_xmas_simple.jpg'; ?>" />
					<span>Xmas Simple</span>
				</li>
			</ul>

		<?php 
			break;  
			}  
		} 
		?>
				<p class="submit">
                	<input name="save<?php echo $i; ?>" type="submit" value="Save changes"  class="button-primary" />
					<input type="hidden" name="action" value="save" />
                </p>
			</form>
            
			<form method="post">
				<p class="reset"> 				
                    <input name="reset" type="submit" value="Reset to default" class="button-secondary" />  
                    <input type="hidden" name="action" value="reset" />  
				</p>  
			</form>  

		</div>
	</div>
	<div id="about-section" class="cf7_style_section">
		<?php include_once( 'cf7-style-feed-box.php' );?>
	</div>
<?php
}


/**
 * Custom Style
 *
 * Displays fields for the Custom Style area of the admin area
 */
function cf7_style_custom() {
	global $cf7_style_name, $cf7_style, $custom;
	$i=0;

	if ( isset( $_GET['saved'] ) ) echo '<div id="message" class="updated fade"><p><strong>' . $cf7_style_name . ' custom settings saved.</strong></p></div>';
	if ( isset( $_GET['reset'] ) ) echo '<div id="message" class="updated fade"><p><strong>' . $cf7_style_name . ' custom settings reset.</strong></p></div>';
?>
<div class="wrap cf7_style_custom">
	<div class="icon32" id="icon-options-general"></div>
	<h2>Custom Style</h2>

	<div class="cf7_style_opts">
		<form method="post">
		<?php foreach ( $custom as $value ) {
			switch ( $value['type'] ) {
	
			case "open":
	
			break;
			case "close":
		?>
	</div>
</div>
		<?php
			break;
			case "title":
		?>
			<p>Here you can customize the template selected in the "Xmas Style" area.</p>
		<?php
			break;
			case "color-picker":
		?>

	<div class="cf7_style_input cf7_style_text">  
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
		<input type="text" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes( get_option( $value['id'] )  ); } else { echo $value['std']; } ?>"  class="wp-color-picker-field" />
		<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
	</div>
	
		<?php	
			break;
			case "text":  
		?>  
  
    <div class="cf7_style_input cf7_style_text">  
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes( get_option( $value['id'] )  ); } else { echo $value['std']; } ?>" />  
		<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>  
    </div>  

		<?php
            break;
            case "select":  
        ?>

    <div class="cf7_style_input cf7_style_select">  
        <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
        <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
            <option>Default</option>
    <?php foreach ( $value['options'] as $option ) { ?>
            <option class="font-load" <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?> value="<?php echo $option; ?>"><?php echo $option; ?></option><?php } ?>
        </select>
        <small><?php echo $value['desc']; ?></small>
        <small class="preview">Preview</small>
        <div id="font-viewer" class="font-viewer">
            <div class="style-select"></div>
            <p class="wpcf7">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
    </div>

		<?php
			break;
			case "select_input_font":
        ?>

    <div class="cf7_style_input cf7_style_select">  
        <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
        <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
            <option>Default</option>
    <?php foreach ( $value['options'] as $option ) { ?>
            <option class="font-load2" <?php if ( get_option( $value['id'] ) == $option ) { echo 'selected="selected"'; } ?> value="<?php echo $option; ?>"><?php echo $option; ?></option><?php } ?>
        </select>
        <small><?php echo $value['desc']; ?></small>
        <small class="preview">Preview</small>
        <div id="font-viewer2" class="font-viewer2">
            <div class="style-select2"></div>
            <p class="wpcf7-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div> 
    </div>
      
		<?php 
            break;  
            case "section":  
              
            $i++;     
        ?>

	<div class="cf7_style_section"> 
    	<div class="cf7_style_title">
        	<h3><?php echo $value['name']; ?></h3>
    		
            <div class="clearfix"></div>
        </div>  
    <div class="cf7_style_options">  
    </div>
		
		<?php
			break;
		}  
	}
    ?>  
        <p class="submit">
            <input name="save<?php echo $i; ?>" type="submit" value="Save changes"  class="button-primary" />
            <input type="hidden" name="custom" value="save" />
        </p> 
    </form> 
     
    <form method="post">  
		<p class="reset">  
			<input name="reset" type="submit" value="Reset to default" class="button-secondary" />
			<input type="hidden" name="custom" value="reset" />
		</p>
    </form>  

	</div>   
<?php
}

add_action('admin_menu', 'cf7_style_add_admin');

 
/**
 * Enqueue admin scrips and style
 */  
function cf7_style_add_init() {  

	// Add the color picker
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker-script', plugins_url('/admin/js/color.picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );

	wp_enqueue_style( "cf7_style_admin_css", plugin_dir_url( __FILE__ ) . "/admin/css/admin.css", false, "1.0", "all");  
	wp_enqueue_script( "cf7_style_admin_js", plugin_dir_url( __FILE__ ) . "/admin/js/admin.js", false, "1.0");
	wp_enqueue_script( "cf7_style_admin_ajax_js", plugin_dir_url( __FILE__ ) . "/admin/js/ajax.preview.tool.js", false, "1.0"); 
}
add_action('admin_init', 'cf7_style_add_init'); 


/**
 * Embed Google Fonts
 */
function cf7_style_fonts() { 
	$cf7_style_google_font = get_option( 'cf7_style_google_fonts' );
	 
	$query_args = array(
		'family' => urlencode( $cf7_style_google_font ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	$google_font_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" ); 
	
	return $google_font_url; 
}

/**
 * Embed Google Fonts for input
 */
function cf7_style_fonts_for_inputs() { 
	$cf7_style_google_font = get_option( 'cf7_style_google_fonts_for_input_text' );
	 
	$query_args = array(
		'family' => urlencode( $cf7_style_google_font ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	$google_font_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" ); 
	
	return $google_font_url; 
}


/**
 * Enqueues scripts and styles for front end
 */
function cf7_style_scripts_styles() {

	wp_enqueue_script( 'jquery' );

	// Embed Google Fonts
	wp_enqueue_style( 'cf7-xmas-fonts', cf7_style_fonts(), array(), null );
	
	// Embed Google Fonts for input 
	wp_enqueue_style( 'cf7-xmas-fonts-inputs', cf7_style_fonts_for_inputs(), array(), null );

	// Loads our main script.
	wp_enqueue_script( "cf7_style_frontend_js", plugin_dir_url( __FILE__ ) . "/js/frontend.js", false, "1.0"); 
	
	// Loads our main stylesheet
	wp_enqueue_style( "cf7_style_frontend_css", plugin_dir_url( __FILE__ ) . "/css/frontend.css", false, "1.0", "all");
	
}
add_action( 'wp_enqueue_scripts', 'cf7_style_scripts_styles' );

/**
 * Declare input font-family for frontend
 */
function cf7_style_fe_input_font() {
	$cf7_style_google_font = get_option( 'cf7_style_google_fonts_for_input_text' );
	$google_font_family    =  explode( ':', $cf7_style_google_font );
	?>
		<style type="text/css">
			.wpcf7 input,
			.wpcf7 textarea{
				font-family: "<?php echo $google_font_family[0]; ?>";
			}
		</style>
	<?php
}
add_action( 'wp_head', 'cf7_style_fe_input_font' );


/**
 * Body class
 *
 * Adds a body class to the $classes array
 * from the selected Contact Style template
 *
 * @param string $cf7_style_templates Contact style template
 * @return $classes
 */
function cf7_style_body_class( $classes ) {

	// Get the selected template
	$cf7_style_templates = get_option( 'cf7_style_templates' );

	// add the template class to the $classes array
	$classes[] = $cf7_style_templates;

	return $classes;
}
add_filter( 'body_class', 'cf7_style_body_class' );


/**
 * Change the form background color
 */
function cf7_style_form_background( $formbgclass ) {
	$cf7_style_form_background = get_option( 'cf7_style_form_bg' );
	$cf7_style_form_background =  explode( ':', $cf7_style_form_background );
	?>
		<style type="text/css">
            .wpcf7 {
                background-color: <?php echo $cf7_style_form_background[0]; ?>;	
            }
        </style>
    <?php
}
add_action ( 'wp_head', 'cf7_style_form_background' );


/**
 * Change the background color for input and textarea
 */
function cf7_style_input_background( $formbgclass ) {
	$cf7_style_input_background = get_option( 'cf7_style_input_bg' );
	$cf7_style_input_background =  explode( ':', $cf7_style_input_background );
	?>
		<style type="text/css">
            .wpcf7 input,
			.wpcf7 textarea{
                background-color: <?php echo $cf7_style_input_background[0]; ?>;	
            }
        </style>
    <?php
}
add_action ( 'wp_head', 'cf7_style_input_background' );


/**
 * Change the label color 
 */
function cf7_style_label_color( $formbgclass ) {
	$cf7_style_label_color = get_option( 'cf7_style_label_color' );	
	$cf7_style_label_color = explode( ':', $cf7_style_label_color );
	?>
		<style type="text/css">
            .wpcf7 .wpcf7-form p{
                color: <?php echo $cf7_style_label_color[0]; ?>;	
            }
        </style>
    <?php
}       
add_action ( 'wp_head', 'cf7_style_label_color' );


/**
 * Change the text color for input and textarea
 */
function cf7_style_input_text_color( $formbgclass ) {
	$cf7_style_input_text_color = get_option( 'cf7_style_input_text_color' );
	$cf7_style_input_text_color = explode( ':', $cf7_style_input_text_color );
	?>
		<style type="text/css">
            .wpcf7 .wpcf7-form input,
			.wpcf7 .wpcf7-form textarea{
                color: <?php echo $cf7_style_input_text_color[0]; ?>;	
            }
		</style>
	<?php
}  
add_action ( 'wp_head', 'cf7_style_input_text_color' );       


/**
 * Change the border color for input and textarea
 */
function cf7_style_input_border_color( $formbgclass ) {
	$cf7_style_input_border_color = get_option( 'cf7_style_input_border_color' );
	$cf7_style_input_border_color = explode( ':', $cf7_style_input_border_color );
	?>
		<style type="text/css">
            .wpcf7 .wpcf7-form input,
			.wpcf7 .wpcf7-form textarea {
                border: 1px solid <?php echo $cf7_style_input_border_color[0]; ?>;	
            }
        </style>
	<?php	
}
add_action ( 'wp_head', 'cf7_style_input_border_color' );


/**
 * Change the menu label to Contact Style
 */
function cf7_style_change_menu_label() {
  global $menu;

  $menu[28.5][0] = 'Contact Style';
}
add_action( 'admin_menu', 'cf7_style_change_menu_label' );