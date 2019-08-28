<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter( 'rwmb_meta_boxes', 'futura_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function futura_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'futura_';

	// metabox for link post format
	$meta_boxes[] = array(
		'id'			=> 'linkmetabox',
		'title'			=> __('Link Format Post Options', 'futura'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(
			// Link text box
			array(
				'name'	=> __('URL', 'futura'),
				'id'	=> "{$prefix}url",
				'desc'	=> __('Paste the URL here, the post title will be link title', 'futura'),
				'type'	=> 'text',

			)
		)
	);

	// metabox for audio post format
	$meta_boxes[] = array(
		'id'			=> 'audiometabox',
		'title'			=> __('Audio Format Post Options', 'futura'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(

			array(
				'name'	=> __( 'Audio Host Type', 'futura' ),
				'id'	=> "{$prefix}audio_host_type",
				'type'	=> 'radio',
				'options' => array(
					'embeded' => __( 'Embed Code', 'futura' ),
					'selfhosted' => __( 'Self Hosted', 'futura' ),
				),
				'std'	=> 'embeded',
			),
			array(
				'name'	=> __('Audio Embed Code', 'futura'),
				'id'	=> "{$prefix}audio_embed_code",
				'desc'	=> __('Paste the embed code here. If you want to use self hosted, you may leave it blank and choose self hosted option above.', 'futura'),
				'type'	=> 'textarea',
				'class' => 'field-embed'

			),
			array(
				'name'	=> __( 'Upload Audio File', 'your-prefix' ),
				'id'	=> "{$prefix}shaudio",
				'type'	=> 'file_advanced',
				'class' => 'field-sh',
				'desc'	=> __( 'Upload or select your self hosted audio. If you want to use embed code. you may leave it blank and choose embed code option above.', 'your-prefix' ),
				'mime_type'	 => 'audio', // Leave blank for all file types
			),
			

		)
	);

	// metabox for video post format
	$meta_boxes[] = array(
		'id'			=> 'videometabox',
		'title'			=> __('Video Format Post Options', 'futura'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(

			array(
				'name'	=> __( 'Video Host Type', 'futura' ),
				'id'	=> "{$prefix}video_host_type",
				'type'	=> 'radio',
				'options' => array(
					'embeded' => __( 'Embed Code', 'futura' ),
					'selfhosted' => __( 'Self Hosted', 'futura' ),
				),
				'std'	=> 'embeded',
			),
			array(
				'name'	=> __('Video Embed Code', 'futura'),
				'id'	=> "{$prefix}video_embed_code",
				'desc'	=> __('Paste the embed code here. If you want to use self hosted, you may leave it blank and choose self hosted option above.', 'futura'),
				'type'	=> 'textarea',
				'class' => 'field-embed'
			),
			array(
				'name'	=> __( 'Upload Video File', 'your-prefix' ),
				'id'	=> "{$prefix}shvideo",
				'type'	=> 'file_advanced',
				'class' => 'field-sh',
				'desc'	=> __( 'Upload or select your self hosted Video. If you want to use embed code. you may leave it blank and choose embed code option above.', 'your-prefix' ),
				'max_file_uploads' => 1,
				'mime_type'	 => 'video', // Leave blank for all file types
			)
		)
	);

// metabox for quote post format
	$meta_boxes[] = array(
		'id'			=> 'quotemetabox',
		'title'			=> __('Quote Format Post Options', 'futura'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(

			array(
				'name'	=> __( 'Quote Content', 'futura' ),
				'id'	=> "{$prefix}quote_content",
				'type'	=> 'textarea',
				'desc'	=> __('Please type the text of your quote here.', 'futura'),
			),
			array(
				'name'	=> __( 'Quote Source Name', 'futura' ),
				'id'	=> "{$prefix}quote_source_name",
				'type'	=> 'text',
				'desc'	=> __('Type the author name / name of the quote source.', 'futura'),
			),
			array(
				'name'	=> __('Quote Source Link (URL)', 'futura'),
				'id'	=> "{$prefix}quote_source_link",
				'type'	=> 'text',
				'desc'	=> __('Paste the link of the quote source. The author name will be linked to this link.', 'futura')
			),
		)
	);

	// metabox for status post format
	$meta_boxes[] = array(
		'id'			=> 'statusmetabox',
		'title'			=> __('Status Format Post Options', 'futura'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(

			array(
				'name'	=> __( 'Status Type', 'futura' ),
				'id'	=> "{$prefix}status_type",
				'type'	=> 'radio',
				'options' => array(
					'twitter' => __( 'Twitter Status', 'futura' ),
					'facebook' => __( 'Facebook Status', 'futura' ),
				),
				'std'	=> 'twitter',
				'desc'	=> __('Choose the status type you wnt to post', 'futura')
			),
			array(
				'name'	=> __('Status link (URL)', 'futura'),
				'id'	=> "{$prefix}status_link",
				'desc'	=> __('Paste the Link of the status', 'futura'),
				'type'	=> 'text',
			),
		)
	);
	// metabox for gallery post format
	$meta_boxes[] = array(
		'id'			=> 'gallerymetabox',
		'title'			=> __('Gallery Format Post Options', 'futura'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(

			array(
				'name'	=> __( 'Gallery Type', 'futura' ),
				'id'	=> "{$prefix}gallery_type",
				'type'	=> 'radio',
				'options' => array(
					'slider' => __( 'Slider Gallery', 'futura' ),
					'tiled' => __( 'Tiled Gallery', 'futura' ),
				),
				'std'	=> 'slider',
				'desc'	=> __('Choose the Gallery type you wnt to display', 'futura')
			),
			array(
				'name'	=> __('Upload or Choose Images', 'futura'),
				'id'	=> "{$prefix}gallery_images",
				'desc'	=> __('Choose or upload images for this gallery', 'futura'),
				'type'	=> 'file_advanced',
				'mime_type'	 => 'image'
			),
		)
	);


	// // 1st meta box
	// $meta_boxes[] = array(
	// 	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	// 	'id'         => 'standard',
	// 	// Meta box title - Will appear at the drag and drop handle bar. Required.
	// 	'title'      => __( 'Standard Fields', 'your-prefix' ),
	// 	// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
	// 	'post_types' => array( 'post', 'page' ),
	// 	// Where the meta box appear: normal (default), advanced, side. Optional.
	// 	'context'    => 'normal',
	// 	// Order of meta box: high (default), low. Optional.
	// 	'priority'   => 'high',
	// 	// Auto save: true, false (default). Optional.
	// 	'autosave'   => true,
	// 	// List of meta fields
	// 	'fields'     => array(
	// 		// TEXT
	// 		array(
	// 			// Field name - Will be used as label
	// 			'name'  => __( 'Text', 'your-prefix' ),
	// 			// Field ID, i.e. the meta key
	// 			'id'    => "{$prefix}text",
	// 			// Field description (optional)
	// 			'desc'  => __( 'Text description', 'your-prefix' ),
	// 			'type'  => 'text',
	// 			// Default value (optional)
	// 			'std'   => __( 'Default text value', 'your-prefix' ),
	// 			// CLONES: Add to make the field cloneable (i.e. have multiple value)
	// 			'clone' => true,
	// 		),
	// 		// CHECKBOX
	// 		array(
	// 			'name' => __( 'Checkbox', 'your-prefix' ),
	// 			'id'   => "{$prefix}checkbox",
	// 			'type' => 'checkbox',
	// 			// Value can be 0 or 1
	// 			'std'  => 1,
	// 		),
	// 		// RADIO BUTTONS
	// 		array(
	// 			'name'    => __( 'Radio', 'your-prefix' ),
	// 			'id'      => "{$prefix}radio",
	// 			'type'    => 'radio',
	// 			// Array of 'value' => 'Label' pairs for radio options.
	// 			// Note: the 'value' is stored in meta field, not the 'Label'
	// 			'options' => array(
	// 				'value1' => __( 'Label1', 'your-prefix' ),
	// 				'value2' => __( 'Label2', 'your-prefix' ),
	// 			),
	// 		),
	// 		// SELECT BOX
	// 		array(
	// 			'name'        => __( 'Select', 'your-prefix' ),
	// 			'id'          => "{$prefix}select",
	// 			'type'        => 'select',
	// 			// Array of 'value' => 'Label' pairs for select box
	// 			'options'     => array(
	// 				'value1' => __( 'Label1', 'your-prefix' ),
	// 				'value2' => __( 'Label2', 'your-prefix' ),
	// 			),
	// 			// Select multiple values, optional. Default is false.
	// 			'multiple'    => false,
	// 			'std'         => 'value2',
	// 			'placeholder' => __( 'Select an Item', 'your-prefix' ),
	// 		),
	// 		// HIDDEN
	// 		array(
	// 			'id'   => "{$prefix}hidden",
	// 			'type' => 'hidden',
	// 			// Hidden field must have predefined value
	// 			'std'  => __( 'Hidden value', 'your-prefix' ),
	// 		),
	// 		// PASSWORD
	// 		array(
	// 			'name' => __( 'Password', 'your-prefix' ),
	// 			'id'   => "{$prefix}password",
	// 			'type' => 'password',
	// 		),
	// 		// TEXTAREA
	// 		array(
	// 			'name' => __( 'Textarea', 'your-prefix' ),
	// 			'desc' => __( 'Textarea description', 'your-prefix' ),
	// 			'id'   => "{$prefix}textarea",
	// 			'type' => 'textarea',
	// 			'cols' => 20,
	// 			'rows' => 3,
	// 		),
	// 	),
	// 	'validation' => array(
	// 		'rules'    => array(
	// 			"{$prefix}password" => array(
	// 				'required'  => true,
	// 				'minlength' => 7,
	// 			),
	// 		),
	// 		// optional override of default jquery.validate messages
	// 		'messages' => array(
	// 			"{$prefix}password" => array(
	// 				'required'  => __( 'Password is required', 'your-prefix' ),
	// 				'minlength' => __( 'Password must be at least 7 characters', 'your-prefix' ),
	// 			),
	// 		)
	// 	)
	// );
	return $meta_boxes;
}