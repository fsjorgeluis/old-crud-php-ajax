$( document ).ready(function() {
    getAllData();
    console.log( "ready!" );
});

$("#appForm").submit(function( event ){
    event.preventDefault();

    var name = $("#name").val();
    var address = $("#address").val();
    var image = $("#image")[0].files[0].name;
  
    // TODO: find how to handle file someway with ajax XMLHttpRequest Lv 1
    // var image = $("#image").change(function() {
    //     var validExtension = ["jpg", "JPG", "png", "PNG"];
    //     if ( $.inArray($( this ).val().split('.').pop().toLowerCase(), validExtension ) == -1) {
    //         alert( "Sorry !!! Allowed image formats are '.jpg', '.png'" );
    //     }
    // })

    // console.log(image[0].files[0])
    
    var dataId = $("#dataId").val();
    if ( name == "" ) {
        alert("Please enter name");
        $("#name").focus();
    }
    else if (address == "") {
        alert("Please enter address");
        $("#address").focus();
    }
    else {
        $.post("./crud.php", { 
            operation: "saveData",
            name: name,
            address: address,
            image: image,
            dataId: dataId
        }, function( response ) {
            if ( response == "saved" ) {
                $("#buttonLabel").html("Save");
                $("#spinnerLoader").hide('fast');
                $("#myModal").modal('hide');
                $("#appForm").each(function () {
                    this.reset();
                });
                getAllData();
            }
        })
    }

});

function getAllData() {
    $.post( "./crud.php", { operation:"getData" },function ( allData ) {
        $( "#crudData" ).html( allData );
    });
}

function updateData( id, name, address, image ) {
    $("#dataId").val(id);
    $("#name").val(name);
    $("#address").val(address);
    // TODO: check if image is valid after submit

}

function deleteData( id ) {
    if(confirm( "Are you sure to delete this ?" )) {
        $( '#deleteSpinner'+id ).show( 'fast' );
        $.post( "./crud.php", { 
            operation:"deleteData", 
            dataId: id 
        }, function ( response ) {
            if ( response == "deleted" ) {
                $( '#deleteSpinner'+id ).hide( 'fast' );
                getAllData();
            }
        });
    }
}