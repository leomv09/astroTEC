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
            if(!isNaN(data))
            {
                console.log('Submitted');
                createMember(data);
            }
            else
            {
                console.log("NaN");
            }
            console.log(data);
        }).fail(function(jqXHR,status, errorThrown) {
            console.log(errorThrown);
            console.log(jqXHR.responseText);
            console.log(jqXHR.status);
        });
    });
});

$(function() {
    $('#modifyMemberButton').click(function(e) {
        e.preventDefault();
        data = new FormData($('#frmModifyUpload')[0]);
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
            if(!isNaN(data))
            {
                console.log('Submitted');
                modifyMember(data);
            }
            else
            {
                console.log("NaN");
            }
            console.log(data);
        }).fail(function(jqXHR,status, errorThrown) {
            console.log(errorThrown);
            console.log(jqXHR.responseText);
            console.log(jqXHR.status);
        });
    });
});