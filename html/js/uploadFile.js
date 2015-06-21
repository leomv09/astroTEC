$(function() {
    $('#createMemberButton').click(function(e) {
        e.preventDefault();
        data = new FormData($('#frmUpload')[0]);
        console.log('Submitting');
        $.ajax({
            type: 'POST',
            url: 'php/uploadImage.php',
            data: data,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(data) 
        {
            if(data.constructor === Number)
            {
                createMember(data;
            }
            console.log(data);
        }).fail(function(jqXHR,status, errorThrown) {
            console.log(errorThrown);
            console.log(jqXHR.responseText);
            console.log(jqXHR.status);
        });
    });
});