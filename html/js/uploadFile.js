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


$(function() {
    $('#createGalleryButton').click(function(e) {
        var description = document.getElementById("galleryDescription").value;
        var title = document.getElementById("galleryCreateTittle").value;
        if(description.length > 0 && title.length > 0)
        {
            document.getElementById("createGalleryButton").className = "btn btn-default m-progress"; 
            e.preventDefault();
            data = new FormData($('#frmCreateGalleryUpload')[0]);
            console.log('Submitting');
            $.ajax({
                type: 'POST',
                url: 'php/uploadGallery.php',
                data: data,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(data) 
            {
                var res = data.indexOf(";");
                if(res > 0 || !isNaN(data) )
                {
                    console.log('Submitted');
                    console.log(data);
                    createGallery(data);
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
        }
        else
        {
            alert("Debe ingresar todos los datos.");
        }

            
    });
});

$(function() {
    $('#modifyGalleryButton').click(function(e) {
        var description = document.getElementById("modifyGalleryTitle").value;
        var title = document.getElementById("modifyGalleryDescription").value;
        if(description.length > 0 && title.length > 0)
        {
            document.getElementById("modifyGalleryButton").className = "btn btn-default m-progress";
            var galleries =  document.getElementById("modifyGalleryList");
            var selectedGallery = galleries.options[galleries.selectedIndex];
            if(selectedGallery.value > 0)
            { 
                e.preventDefault();
                data = new FormData($('#frmUpdateGalleryUpload')[0]);
                console.log('Submitting');
                $.ajax({
                    type: 'POST',
                    url: 'php/uploadToExistentGallery.php?id='+selectedGallery.value,
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function(data) 
                {
                    var res = data.indexOf(";");
                    if(res > 0 || !isNaN(data) )
                    {
                        console.log('Submitted');
                        console.log(data);
                        modGallery();
                    }
                    else
                    {
                        console.log("NaN");
                        console.log(data);
                    }
                }).fail(function(jqXHR,status, errorThrown) {
                    console.log(errorThrown);
                    console.log(jqXHR.responseText);
                    console.log(jqXHR.status);
                });
            }
            else
            {
                modGallery();
            }
        }
        else
        {
            alert("Debe ingresar todos los datos.");
        }

            
    });
});