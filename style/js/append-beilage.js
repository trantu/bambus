$(document).ready(function(){

    var numcl=0;
    var total_num=0; 
    var cl;//lay class parent
	var arrDS=new Array();
    var name_dsall='';
    var stt=1;//trang thai khi order buoc 2.1 la moi.2 la cu
    var onceclass,onceclass_new;
    var chilclass;
    var lengthclass=0;//độ dài của nhóm
    var length_old=new Array();
    var active=1;
    var clas_childs;
    $(".appends-beilage").on('click',function(){
        $('.error-beilage').text('');
        arrDS=[];
        active=1;
        total_num=$(this).attr('item');
        cl=$(this).parent().parent().parent().children(".beilage-list");
		$(cl).css("display","block");
        numcl=0;
        name_dsall='';
        $(cl).children('ul').css("display","none");
        onceclass=$(cl).children('ul').eq(numcl).attr("onceclass");
        chilclass=$(cl).children('.' + onceclass);
        lengthclass=chilclass.length;
        $(chilclass).css("display","block");
        clas_childs=$(cl).children('.count_ds');
        $(clas_childs).children('.count_ds_c').removeClass('active');
        $(clas_childs).children('.count_ds_c').removeClass('require');
        $(clas_childs).children('.count_ds' +active).addClass('require');
        $('.opacity-body').css("display","block");
		return false; 
	})
    

    $('.boquads').on('click',function(){

        var display_n=$(cl).children('.'+ onceclass).attr('display');
        var anext=$('.'+ onceclass +' input:checkbox:checked').length;
        if(anext < 1 && display_n==1 ) {$('.error-beilage').text("Please! Require check checkbox.");return false;}
        else {

            $('.error-beilage').text('');
            length_old[length_old.length]=numcl;
            numcl=numcl + lengthclass;
            
            if(total_num >numcl){
                active=active+1;
                $(clas_childs).children('.count_ds_c').removeClass('active');
                $(clas_childs).children('.count_ds_c').removeClass('require');
                  
                $(chilclass).css("display","none");
                onceclass=$(cl).children('ul').eq(numcl).attr("onceclass");
                var display_nac=$(cl).children('.'+ onceclass).attr('display');
                if(display_nac==1){
                    $(clas_childs).children('.count_ds' +active).addClass('require');
                }
                else{
                    $(clas_childs).children('.count_ds' +active).addClass('active');
                }
                chilclass=$(cl).children('.' + onceclass);
                lengthclass=chilclass.length;
                $(chilclass).css("display","block");
            }
            else{   
                   $(cl).css("display","none");
                   $('.opacity-body').css("display","none");
                   var parent_cl= $(cl).parent();
                   $(parent_cl).children('.note_ones').css('display','block');
                   $('.opacity-body').css('display','block');              
            }
        }   return false; 
    });

 
        /***Button order mon an **/
    $('.note-ok-beilage').on('click',function(){
        
        var parentnote=$(this).closest('.note_ones');
        var idSPs=$(this).attr('idSP');
        var note=$(parentnote).children('.note-text').val();
        $("input:checkbox").each(function(){
            var $this = $(this);    
            if($this.is(":checked")){
                var price_s=$this.attr('price');
                var name_s=$this.val();
                name_dsall=name_dsall.concat(name_s);
                arrDS[arrDS.length]=[price_s,name_s];
                $this.removeAttr('checked');
            }

        });

        var parent_cl= $(cl).parent();
        $(parent_cl).children('.note_ones').css('display','none');
        $.ajax({    
                type:'POST',
                url:'index.php?mod=j_wadd_beilge',
                data:{arrDS:arrDS,idSPs:idSPs,note:note},
                success:function(hn){
                    idSP=name_dsall.concat(idSPs);
                    $('.sum_total').html(hn + '' + ICONPRICE);
                    $.ajax({    
                        type:'POST',
                        url: "index.php?mod=j_showcart",
                        data:'idSP='+ idSP,
                        success:function(smgs){
                            $('#order_summary').css('display','block');
                            $('.opacity-body').css("display","none");
                            if($.isNumeric(smgs)==true){    
                                var sl=$('.quantity'+idSP).eq(-1).text();
                                sl=parseInt(sl);
                                var quantt=sl + 1;
                                var total_price1=(quantt*smgs).toFixed(2);
                                total_price1=total_price1.replace('.',',');
                                $('.price'+idSP).eq(-1).html(total_price1 + '' + ICONPRICE);
                                $('.quantity'+idSP).eq(-1).html(quantt);
                            }
                            else{
                                $('#order_summary').append(smgs);
                            }

                            $('.opacity-body').css("display","none");
                        }
                    })
                }
        })    
    })


    //click tro ve nhom mon an phu truoc
    $('.backds').on('click',function(){
           
        if(numcl<=0 || numcl==="undefined"){
            numcl=0;
            alert("can't back");
        }
        else{
            $('.error-beilage').text('');
            active=active-1;
            $(clas_childs).children('.count_ds_c').removeClass('active');
            $(clas_childs).children('.count_ds_c').removeClass('require');
            $(clas_childs).children('.count_ds' +active).addClass('active');
            numcl=length_old[length_old.length-1];
            length_old.splice(length_old.length-1,1);
            $(chilclass).css("display","none");
            onceclass=$(cl).children('ul').eq(numcl).attr("onceclass");
            chilclass=$(cl).children('.' + onceclass);
            lengthclass=chilclass.length;
            $(chilclass).css("display","block"); return false;
        }

        return false;

    });  


    $('.quitds').on('click',function(){
        $(cl).css("display","none");
        $('.opacity-body').css("display","none");
        $("input:checkbox").each(function(){
            var $this = $(this);    
            if($this.is(":checked")){  
                $this.removeAttr('checked');
            }
        })
        return false;
    })






})