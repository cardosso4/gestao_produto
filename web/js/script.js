$('.imagem').click(function (e) { 

   img = $(this).data('img');
   $('.modal-body').css('background-image', "url(../"+img+")");
   $('#modal_img').modal('show');
    
});   