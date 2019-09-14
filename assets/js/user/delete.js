$(document).ready(function(){
$(document).on('click', '.delete-user', function(e){
    e.preventDefault();
    let id = $(this).data('id');

    $.ajax({
        url: 'models/users/delete.php',
        method: 'GET',
        data: {
            id: id
        },
        dataType: 'json',
        success: function(data, status, request){
            console.warn('successfully');
        }, 
        error: showErrors
    })
});

function showErrors(error, status, statusText){
    console.error('ERROR AJAX: ');
    console.log(status);
    console.log(statusText);
    if(greska.status == 500){
        console.log(error.parseJSON);
        alert(error.parseJSON.message);
    }
    else if(error.status == 400){
        alert('Inserted data is incorrect')
    }
}
});

