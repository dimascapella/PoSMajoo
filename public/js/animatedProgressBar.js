$('.uploadButton').click(function(){
   setTimeout(function(){
    $('.progress-bar').css('width', '20%')
    setTimeout(function(){
        $('.progress-bar').css('width', '50%')
        setTimeout(function(){
            $('.progress-bar').css('width', '70%')
            setTimeout(function(){
                $('.progress-bar').css('width', '100%')
               }, 1000)
           }, 1000)
       }, 1000)
   }, 1000)
})