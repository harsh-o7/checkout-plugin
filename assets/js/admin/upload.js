jQuery(document).ready(function($) {

    var mediaUploaderStoreLogo;

    // Store Logo
    $('#upload-logo-btn').on('click', function(e) {
        e.preventDefault();
        if(mediaUploaderStoreLogo) {
            mediaUploaderStoreLogo.open();
            return;
        }

        mediaUploaderStoreLogo = wp.media.frames.file_frame = wp.media({
            title: 'Upload Store Logo',
            button: {
                text: 'Upload Picture'
            },
            multiple: false
        });

        mediaUploaderStoreLogo.on('select', function() {
           attachment = mediaUploaderStoreLogo.state().get('selection').first().toJSON();
           $('#ic_checkout_logo').val(attachment.url);
           $('.ic_checkout_logo img').attr('src', attachment.url);
        });

        mediaUploaderStoreLogo.open();
    });


});