$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
/**
 * function delete a row in table
 * @param e
 * @param route
 */
function ajaxDeleteItemTable(id,model,message)
{
    // Set message
    if (message) {
        $('#msg-confirm').text(message);
    }

    // show form confirm
    $('.divMessageBox').removeClass('display-none');

    // if you click yes to delete
    $('#btn-yes-confirm').click(function () {
        $.ajax({
            type : 'DELETE',
            url : 'backend/'+ model +'/'+id,
            success: function (data) {
                $('.item-'+id).closest('tr').remove();
                $('.divMessageBox').addClass('display-none');
            }

        });
    });
}

/**
 * FUNCTION CHANGE STATUS
 */
function ajaxChangeStatus(id,model,message)
{
    // Set message
    if (message) {
        $('#msg-confirm').text(message);
    }

    // show form confirm
    $('.divMessageBox').removeClass('display-none');

    $('#btn-yes-confirm').click(function () {
        $.ajax({
            type : 'POST',
            url : 'backend/'+ model +'/' + id,
            success: function (response) {
                $('.divMessageBox').addClass('display-none');
            }

        });
    });
}