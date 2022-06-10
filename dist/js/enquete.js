
$(document).ready(function(){
    $(document).on('submit','#form1',function(event){
        event.preventDefault();
        var dados=$(this).serialize();

        $.ajax({
            url: './functions/InserirEnquete.php',
            method: 'post',
            dataType: 'html',
            data: dados,
            success: function(data){
                $('#mostrarAvaliacao').html(data);
            }
        });
    });
});