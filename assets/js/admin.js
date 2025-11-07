// assets/js/admin.js

jQuery(document).ready(function($) {
    // Media uploader
    let mediaUploader;

    $(document).on('click', '.upload-game-image', function(e) {
        e.preventDefault();

        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Select Game Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('.game-image-id').val(attachment.id);
            $('.game-image-preview').html('<img src="' + attachment.url + '" style="max-width: 300px;">');
        });

        mediaUploader.open();
    });

    // Format currency input
    $('.currency-input').on('blur', function() {
        let value = $(this).val();
        if (value) {
            // Remove any non-numeric characters except decimal
            value = value.replace(/[^0-9.]/g, '');
            // Format as currency
            if (!isNaN(value) && value) {
                $(this).val('$' + parseFloat(value).toFixed(2));
            }
        }
    });
});
