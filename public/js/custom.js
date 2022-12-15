$(function(){
    $('#ok').on('click', function(){
        $.ajax({
            url: 'http://51.178.86.117:8078/DM//dm_blog/?controller=commentaires&action=addComm',
            method: 'post',
            data: {
                auteur: $('#auteur').val(),
                contenu: $('#contenu').val(),
                idBillet: $('#idBillet').val(),
            },
            success: function( result, status, xhr ){
                // console.log(result);
                $('#result').html('<p>' + result + '</p>')
                if(result){
                    strResult ='OK';//faire afficher 
                }else{

                }
            }
            
        })
    })
});