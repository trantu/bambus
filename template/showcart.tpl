
<!-- BEGIN:cart -->
<div class="sum-01 removeabc {IDSP}{STTPP}" style="width:264px; float:left; margin:10px; margin-bottom:0;">
	<ul style="list-style:none;">
    	<li style="width:40px; float:left;">
        	<span style="width:24px; height:24px; border:1px solid #ddd; float:left; text-align:center; line-height:24px; background:white;" class ="quantity{IDSP}">{QTY}</span>
            <a href="#" style="float:left; margin:-3px 0 0 2px" class='append' idSP='{IDSP}' stt='{STTPP}'
					onclick=" var idSP=$(this).attr('idSP');var STTPP='{STTPP}';var this_item=$(this);iconmoney='{ICONPRICE}';var price='{PRICE}';return add_item(idSP,STTPP,this_item,iconmoney,price)">
					<img src="style/images/cong.jpg" alt="" />
			</a>

            <a href="#" style="float:left; margin:0px 0 0 2px;" class='remove' idSP='{IDSP}'
					onclick="var idSP=$(this).attr('idSP');var STTPP='{STTPP}';var this_item=$(this);iconmoney='{ICONPRICE}';var divdels=$(this).closest('div');var price='{PRICE}';return remove_item(idSP,STTPP,this_item,iconmoney,divdels,price)">
					<img src="style/images/tru.jpg" alt="" />
			</a>
        </li>
		<!-- BEGIN:namenot -->
		<li style="width:154px; float:left;">
        	<p style="float:left; width:164px; margin:0 0 0 10px; display:block; line-height:26px;height:26px; overflow:hidden;color:#fff;" title="{NAME}">NR. {IDSP}:{NAME}</p>
        <!-- END:namenot -->

        <!-- BEGIN:beilage -->

        <li style="width:154px; float:left;">
        	<p style="float:left; width:164px; margin:0 0 0 10px; display:block; height:16px; overflow:hidden;color:#fff;" title="{NAME}">NR. {IDSP}:{NAME}</p>
            <a href="#"  class="remove_click" idSP='{PLU}'>
            	<!-- BEGIN:dishisshiss -->
            	<p style="float:left; width:164px; margin:0 0 0 10px; display:block; height:16px; overflow:hidden; font-size:11px; font-style:italic;color:#fff;" title="{BEILAGE}">*--------{BEILAGE}---------*</p>
            	<!-- END:dishisshiss -->
            </a>
        <!-- END:beilage -->
        </li>

		<!-- BEGIN:pricenotsession -->
		<li style="width:50px; float:right;" class="licuoicung">
        	<span style="text-align:right; line-height:26px; width:50px; float:right;color:#fff;" class="price{IDSP}">{ICONPRICE}{PRICE}</span>
        	<div style="color:#fff">
        		<a style="color:orange" onclick="var parent_notes=$(this).closest('li');return shownote(parent_notes);" href="#" title="" class="shownote">{LANGUAGEMAIN.notetext}</a>
        	</div>
        	<article class="form-box note_ones" >
				<a href="#" class="form-close">
					<img src="style/images/form-close.png" alt="close">
				</a>
				<img src="{FORM_LOGO}" alt="logo">
				<form>
					<textarea class="note-text"   cols="30" rows="10" placeholder="{NOTECONTENT}">{NOTE}</textarea>
					<button class="note_change_idsp" idsp="{IDSP}" onclick="var parent_note_changes=$(this).closest('form');
						var text_notes=$(parent_note_changes).find('.note-text').val();
						var idSPs=$(this).attr('idsp'); return note_change_idsp(parent_note_changes,text_notes,idSPs,$(this));" type="button"  href='#'  style="background-color: #95c12a;width: 100%;font-size: 1.125em;font-family: 'Source Sans Pro', sans-serif;text-transform: uppercase;font-weight: 900;color: #fff;line-height: 40px;cursor: pointer;margin-bottom: 40px;border-radius: 2px;">{LANGUAGEMAIN.addcart}</button>
				</form>
			</article>
        </li>
      	<!-- END:pricenotsession -->
      	<!-- BEGIN:pricesession -->
		<li style="width:50px; float:right;">
        	<span style="text-align:right; line-height:26px; width:50px; float:right;color:#fff;" class="price{IDSP}">{ICONPRICE}{PRICES}</span>
        </li>
      	<!-- END:pricesession -->
    </ul>
</div>

<script src="style/js/forms.js"></script>

<!-- END:cart -->
