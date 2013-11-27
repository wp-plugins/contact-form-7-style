<?php
/**
 * Options
 *
 * Generate fields for admin area
 */
$cf7_style_name = "Contact Style";  
$cf7_style = "cf7_style";

// Templates
$templates = array (  
       
    array( 	"name" 		=> $cf7_style_name." Options",  
			"type" 		=> "title"),  
       
      
    array( 	"name" 		=> "General",  
			"type" 		=> "section"),  
    array( 	"type" 		=> "open"),  
       
	array(  "name"    	=> "Xmas templates",  
			"desc"    	=> "Choose one of the templates",  
			"id"      	=> $cf7_style."_templates",  
			"type"    	=> "select",
			"options" 	=> array( 
							'xmas-classic',
							'xmas-red',
							'xmas-simple'
						),  
			"std"		=> "xmas-classic"
	), 
	
	array(  "name"		=> "Label Fonts",
			"desc"		=> "Choose from the following Google fonts",  
			"id"		=> $cf7_style."_google_fonts",  
			"type"		=> "select",
			"options"	=> array( 
							'Emilys Candy',
							'Henny Penny',
							'Joti One',
							'Open Sans:400,300,600,700',
							'Pirata One'
						),  
			"std"		=> "Open Sans:400,300,600,700"
	),

    array( "type"		=> "close")  
       
); 

// Custom
$custom = array (  

    array(	"name"		=> $cf7_style_name." Options",
			"type"		=> "title"),
	
    array(	"name"		=> "Settings",
			"type"		=> "section"),
    array(	"type"		=> "open"),
	
	array(  "name"		=> "Form Background",
			"desc"		=> "Choose the background color of the form",  
			"id"		=> $cf7_style."_form_bg",  
			"type"		=> "color-picker", 
			"std"		=> "#fff"
	), 
	
	array(  "name"		=> "Input Background",  
			"desc"		=> "Choose the background color of the input",  
			"id"		=> $cf7_style."_input_bg",  
			"type"		=> "color-picker", 
			"std"		=> "#f2f2f2"
	),
	
	array(	"name"		=> "Label Color",
			"desc"		=> "Choose the color for the label text",
			"id"		=> $cf7_style."_label_color",
			"type"		=> "color-picker",
			"std"		=> "#000000"
	),
	
	array(	"name"		=> "Input Text Color",
			"desc"		=> "Choose the color for the input text",
			"id"		=> $cf7_style."_input_text_color",
			"type"		=> "color-picker",
			"std"		=> "#000000"
	),
	
	array(	"name"		=> "Input Border Color",
			"desc"		=> "Choose a color for the input border",
			"id"		=> $cf7_style."_input_border_color",
			"type"		=> "color-picker",
			"std"		=> "#ffffff"
	),
	
	array(  "name"		=> "Label Fonts", 
			"desc"		=> "Choose from the following Google fonts",  
			"id"		=> $cf7_style."_google_fonts",  
			"type"		=> "select",
			"options"	=> array( 
							'Emilys Candy',
							'Henny Penny',
							'Joti One',
							'Open Sans:400,300,600,700',
							'Pirata One'
						 ),  
			"std"  => "Open Sans:400,300,600,700"
	),
	
	array(	"name"		=> "Input Fonts",
			"desc"		=> "Choose from the following Google Fonts",
			"id"		=> $cf7_style."_google_fonts_for_input_text",
			"type"		=> "select_input_font",
			"options"	=> array(
							'Emilys Candy',
							'Henny Penny',
							'Joti One',
							'Open Sans:400,300,600,700',
							'Pirata One'
						   ),
			"std"		=> "Open Sans:400,300,600,700"
	
	),

    array( "type"		=> "close")  
       
); 