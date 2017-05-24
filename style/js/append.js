$(document).ready(function(){

    // img order mon an 
    $('.appendsall').click(function(){
        
        $(this).children('.note_ones').css('display','block');
        $('.opacity-body').css('display','block');
        return false;
    });
    

    /***Button order mon an **/
    $('.note-ok').on('click',function(){

        var parentsb=$(this).closest('.appendsall');
        $(parentsb).children('.note_ones').css('display','none');
        var parentnote=$(this).closest('.note_ones');
        var idSP=$(this).attr('idSP');
        var note=$(parentnote).children('.note-text').val();
        var imgtodrag = $(parentsb).find("img").eq(0);
        $.ajax({    
            type:'POST',
            url:'index.php?mod=j_add',
            data:{idSP:idSP,note:note},
            success:function(hn){
                $('.sum_total').html(hn + '' + ICONPRICE);
                $('.opacity-body').css('display','none');
                $.ajax({    
                    type:'POST',
                    url: "index.php?mod=j_showcart",
                    data:'idSP='+ idSP,
                    success:function(smgs){
                        $('#order_summary').css('display','block');
                        var smg=smgs.replace(',','.');
                        if(smg.length <5){
                            smg=parseFloat(smg);
                        }
                        if(typeof(smg)=='number'){    
                            var sl=$('.quantity'+idSP).eq(-1).text();
                            sl=parseInt(sl);
                            var quantt=sl + 1;
                            var total_price1=(quantt*smgs).toFixed(2);
                            total_price1=total_price1.replace('.',',');
                            $('.price'+idSP).eq(-1).html(total_price1);
                            $('.quantity'+idSP).eq(-1).html(quantt);

                        }
                        else{
                            $('#order_summary').append(smgs);
                        }
                            var clas='.quantity'+idSP;
                            var cart = $(clas).eq(-1);
                           if (imgtodrag) {
                                var imgclone = imgtodrag.clone()
                                    .offset({
                                    top: imgtodrag.offset().top,
                                    left: imgtodrag.offset().left
                                })
                                    .css({
                                    'opacity': '0.5',
                                        'position': 'absolute',
                                        'height': '40px',
                                        'width': '40px',
                                        'z-index': '100'
                                })
                                    .appendTo($('body'))
                                    .animate({
                                    'top': cart.offset().top + 10,
                                        'left': cart.offset().left + 10,
                                        'width': 30,
                                        'height': 30
                                }, 500, 'easeInOutExpo');
                                
                                setTimeout(function () {
                                    cart.effect("shake", {
                                        times: 2
                                    }, 200);
                                }, 500);

                                imgclone.animate({
                                    'width': 0,
                                        'height': 0
                                }, function () {
                                    $(this).detach()
                                });
                            }
                    }
                }); 
            }
        }); return false;
    });
        

}) 