jQuery.getScript('https://cdn.getparkave.com/' + 'integration.js');
jQuery.getScript('https://cdn.getparkave.com/' + 'go-sell.js');

jQuery(function($) {

    // this ads parkave to the widgets - we need an interval because we
    // need to handle the case of new widgets
    setInterval(function () {

        $('#widgets-right [id*="adwidget_"] [id*="parkave_button"]').each(function (i, o) {
            if (o.dataset && o.dataset.tracked) return;
            if (o.dataset) o.dataset.tracked = true;

            var el = o;
            var widget = jQuery(o).parents('.widget-content');
            var txt = widget.find('textarea')[0];

            ParkAve.button(el, {
                callback: (code) => {
                    jQuery(o).parents('form').first().trigger('change');
                },
                codeElement: txt,
                partner: 'adwidget'
            });
        });

    }, 1000);

    $('#widgets-right').on('click', '.upload-button', function(e) {
        window.adcode_id      = $(e.target).attr('rel');
        window.send_to_editor = image_upload_handler;

        tb_show('', 'media-upload.php?type=image&amp;amp;amp;TB_iframe=true');

        return false;
    });

    function image_upload_handler(html) {
        imgurl = $('img',html).attr('src');
        if(!imgurl) imgurl = $(html).attr('src');

        var el = $('#' + window.adcode_id);
        el.val(imgurl);
        el.parents('form').first().trigger('change');

        tb_remove();
    };
});