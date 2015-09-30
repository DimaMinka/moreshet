/**
 *
 * -------------------------------------------
 * Script for the metaboxes
 * -------------------------------------------
 *
 **/
(function ($) {
    "use strict";
    $('.sg_upload_image_button').each( function () {
        // Uploading files
        var file_frame;
        $(this).live('click', function( event ){
            event.preventDefault();
            var preview = $(this).siblings('.sg_preview_image');
            var formfield = $(this).siblings('.sg_upload_image');
            // If the media frame already exists, reopen it.
            if ( file_frame ) {
                file_frame.open();
                return;
            }
            // Create the media frame.
            file_frame = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                multiple: false,
                library: {
                    type: 'image'
                },
                button: {
                    text: 'Use This Image'
                }
            });
            // When an image is selected, run a callback.
            file_frame.on( 'select', function() {
                // We set multiple to false so only get one image from the uploader
                var attachment = file_frame.state().get('selection').first().toJSON();
                formfield.val(attachment.id);
                preview.attr('src', attachment.url);
                // Do something with attachment.id and/or attachment.url here
            });

            // Finally, open the modal
            file_frame.open();

        });
    });

    // clear image to the default
    $(document).ready(function () {
        $('.sg_clear_image').each( function () {
                $(this).click(function (event) {
                    event.preventDefault();
                    var defaultImage = $(this).parent().siblings('.sg_default_image').text();
                    $(this).parent().siblings('.sg_upload_image').val('');
                    $(this).parent().siblings('.sg_preview_image').attr('src', defaultImage);
                    return false;
                });
            });
    });

}(jQuery));