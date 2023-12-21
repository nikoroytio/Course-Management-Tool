//scripts for using wp media library as part of custom post type image and thumbnail
jQuery(document).ready(function($){
    $('#upload_image_button').click(function(e) {
        e.preventDefault();
        var image_frame;
        if(image_frame){
            image_frame.open();
        }
        // Define image_frame as wp.media object
        image_frame = wp.media({
            title: 'Select Media',
            multiple : false,
            library : {
                type : 'image',
            }
        });

        image_frame.on('select', function() {
            var selection = image_frame.state().get('selection').first().toJSON();
            $('#course_image').val(selection.url);
            $('#image_preview').html('<img src="' + selection.url + '" style="max-width:250px;"/>');
            $('#remove_image_button').show();
        });
        
        image_frame.open();
    });

    $('#remove_image_button').click(function(e){
        e.preventDefault();
        $('#course_image').val('');
        $('#image_preview').html('');
        $(this).hide();
    });

    // Hide or show the remove image button
    if($('#course_image').val() != ''){
        $('#remove_image_button').show();
    }
});