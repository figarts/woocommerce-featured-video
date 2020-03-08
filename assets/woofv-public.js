/**
 * Load media uploader on pages with our custom metabox
 */
jQuery(document).ready(function ($) {

	'use strict';

	// Instantiates the variable that holds the media library frame.
	var metaImageFrame;

	// Runs when the media button is clicked.
	$('body').click(function (e) {

		// Get the btn
		var btn = e.target;

		// Check if it's the upload button
		if (!btn || !$(btn).attr('data-woofv-uploader-target')) return;

		// Get the field target
		var field = $(btn).data('woofv-uploader-target');

		// Prevents the default action from occuring.
		e.preventDefault();

		// Sets up the media library frame
		console.log(field);
		if ('#woofv_video_embed_url' == field){
			metaImageFrame = wp.media.frames.metaImageFrame = wp.media({
				title: meta_image.title,
				button: {
					text: meta_image.button
				},
				library: {
					type: 'video/MP4'
				},
				multiple: false
			});
		}else{
			metaImageFrame = wp.media.frames.metaImageFrame = wp.media({
				title: meta_image.title,
				button: {
					text: meta_image.button
				},
			});
		}


		// Runs when an image is selected.
		metaImageFrame.on('select', function () {

			// Grabs the attachment selection and creates a JSON representation of the model.
			var media_attachment = metaImageFrame.state().get('selection').first().toJSON();

			// Sends the attachment URL to our custom image input field.
			$(field).val(media_attachment.url);

		});

		// Opens the media library frame.
		metaImageFrame.open();

	});

});