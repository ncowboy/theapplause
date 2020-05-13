$(document).on('submit', "form.ajax", function () {
    $form = $(this);
    var formData = new FormData($form[0]);
    var enctype = $form.attr('enctype');
    var async = !(enctype === 'multipart/form-data');
    $.ajax({
        url: '/wp-admin/admin-ajax.php',
        type: 'POST',
        data: formData,
        async: async,
        success: function (response) {
            try {
                var obj = jQuery.parseJSON(response);
                switch (obj.action) {
                    case 'alert':
                        alert(obj.mess);
                        break;
                    case 'reload':
                        location.reload();
                        break;
                    case 'data':
                        $('*[' + obj.data.select + '=' + obj.data.val + ']').html(obj.mess);
                        break;
                    case 'update_block':
                        $(obj.selector).html(obj.html);
                        break;
                    case 'remove_select':
                        $(obj.selector).remove();
                        break;
                    default:
                        console.log(obj);
                        break;

                }
            } catch (e) {
                console.log(response);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });


    return false;
});


try {
    var init = false;
    var myShare = document.getElementById('my-share');

    Ya.share2(myShare, {
        hooks: {
            onready: function () {
                init = true;
            },

            onshare: function (name) {
                if (init) {
                    jQuery('#share_form').submit();
                }
            }
        }
    });
} catch (e) {

}