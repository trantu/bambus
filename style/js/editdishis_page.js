$(document).ready(function(){

   var numcl=0;
    var cl =$('.abc-list');//lay class parent
    var total_num=$(cl).attr('item'); 
    var arrDS=new Array();
    var name_dsall='';
    var stt=1;//trang thai khi order buoc 2.1 la moi.2 la cu
    var onceclass="1class";
    var onceclass_new;
    var chilclass=$(cl).children('.' + onceclass);
    var lengthclass=chilclass.length;//độ dài của nhóm
    var length_old=new Array();
    var active=1;
    var clas_childs=$(cl).children('.count_ds');

    $('.boquads_1').on('click',function(){
  
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



    //click tro ve nhom mon an phu truoc
    $('.backds_1').on('click',function(){
           
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


    $('.quitds_1').on('click',function(){
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


      /***Button order mon an **/
    $('.note-ok-beilage_1').on('click',function(){
     
        var parentnote=$(this).closest('.note_ones');
        var idSPs=$(this).attr('idSP');
        var note=$(parentnote).children('.note-text').val();
        var stt=$(this).attr('sttss');
        var ids=$(this).attr('ids');
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
                url:'index.php?mod=j_wadd_beilge_ss',
                data:{arrDS:arrDS,idSPs:idSPs,note:note,stt:stt},
                success:function(hn){        
                    idSP=name_dsall.concat(idSPs);
                    $('.sum_total').html(hn + '' + ICONPRICE);
                    $.ajax({    
                        type:'POST',
                        url: "index.php?mod=j_showcart",
                        data:{idSP:idSP,stt:stt},
                        success:function(smgs){
                            var clapp=ids.concat(stt);
                            var clappnew=idSP.concat(stt);
                            var dl=$('#order_summary').children('.'+clapp);
                            var dlnew=$('#order_summary').children('.'+clappnew);
                            $(dl).after(smgs);
                            $(dl).remove();
                            $(dlnew).remove();
                            $('.opacity-body').css("display","none");
                            
                        }
                    })
                }
        })    
    })


 });