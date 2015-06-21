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
    $('#createEquipmentButton').click(function(e) {
        e.preventDefault();
        data = new FormData($('#frmUploadEquipment')[0]); // igual mas Member
        console.log('Submitting');
        $.ajax({
            type: 'POST',
            url: 'php/uploadImageEquipment.php',
            data: data,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(data) 
        {
            if(!isNaN(data))
            {
                console.log('Submitted');
                createEquipment(data);
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

$(function() {
    $('#modifyEquipmentButton').click(function(e) {
        e.preventDefault();
        data = new FormData($('#frmModifyUploadEquipment')[0]);
        console.log('Submitting');
        $.ajax({
            type: 'POST',
            url: 'php/uploadImageEquipment.php',
            data: data,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(data) 
        {
            if(!isNaN(data))
            {
                console.log('Submitted');
                modifyEquipment(data);
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