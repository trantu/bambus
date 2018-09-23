
   <!-- BEGIN:name -->
        <li class='root_append root_append_notbeilage' idsp="{IDSP}" style="margin: 0 12px 30px 0;">
            <div class="circle tiny appendsall">
                <figure class="imgLiquidFill">
                    <img src="upload/products/{ONLINEBILD}" alt="dish">
                </figure>
                <div class="shadow"></div>
                <a href="#">
                    <div class="fill red cart-tip">
                        <img src="style/images/plus-icon.png" alt="star">
                    </div>
                </a>
            </div>
            <article>
                <a href="springtime-sushi.html"><h6 style="color:#{ONLINEFARBE}">(NR. {IDSP}) {NAME}</h6></a>
                 <ul class="rate stars">
                </ul>
                <hr>
                <p>{NAMEONLINE}</p>
            </article>
            <div class="price">
                <!-- <div>
                    <p class="quantity">15</p>
                    <p class="measure">pcs</p>
                </div> -->
                <p>{PRICE}{ICONPRICE}</p>
            </div>
            <a href="#" class="button red appendsall">{LANGUAGECART.addcart}</a>
            <h6>{PRICE}{ICONPRICE}</h6>
        </li>
        <!-- END:name -->
        <!-- BEGIN:names -->
        <li class='root_append root_append_beilage' style="margin: 0 12px 30px 0;">
            <div class="circle tiny appends-beilage" item="{COUNT_DISHIS}">
                <figure class="imgLiquidFill">
                    <img src="upload/products/{ONLINEBILD}" alt="dish">
                </figure>
                <div class="shadow"></div>
                <a href="#">
                    <div class="fill red cart-tip">
                        <img src="style/images/star-hover.png" alt="star">
                    </div>
                </a>
            </div>
            <article class="appends-beilage" item="{COUNT_DISHIS}">
                <a href="#"><h6 style="color:#{ONLINEFARBE}">(NR. {IDSP}) {NAME}</h6></a>
                <ul></ul>
                <hr>
                <p>{NAMEONLINE}</p>
            </article>
            <div class="price">
                <!-- <div>
                    <p class="quantity">15</p>
                    <p class="measure">pcs</p>
                </div> -->
                <p>{PRICE}{ICONPRICE}</p>
            </div>
            <a href="#" class="button red appends-beilage" idSP="{IDSP}" item="{COUNT_DISHIS}">{LANGUAGECART.addcart}</a>

            <div class="beilage-list" style="text-align:center;">
                <h3 style="">{SIDEDISH}</h3>
                <div class="count_ds">
                <!-- BEGIN:demdishis -->
                    <p class="count_ds{DEM_DS} count_ds_c ">{STEP} {DEM_DS} </p>
                <!-- END:demdishis -->
                </div>

                <!-- BEGIN:beilage -->
                <ul beilage="{BEILAGE}" style="display:none;" price="{PRICES}" idSP="{BEILAGE}{IDSP}" idSPs="{IDSP}" classCLick="{CLASSDS}" onceclass="{GROUPCLASS}class" class="beilage-click  {GROUPCLASS}class" display="{DISPLAY_DS}">
                    <li class="list-1s">
                        <input type="checkbox" style="display:inline-block" sttbei="{GROUPCLASS}" class='{GROUPCLASS}classinputs'  idSPs="{IDSP}" price="{PRICES}" value="{BEILAGE}" />
                    </li>
                    <li class="list-2s">
                        <a href="#" style="text-decoration:none;font-weight:bold;font-size:17px;">{BEILAGE}
                        </a>
                    </li>
                    <li class="list-3s">
                        <a href="#" style="text-decoration:none;font-size:17px;">{PRICES}{ICONPRICE}
                        </a>
                    </li>

                </ul>
                <!-- END:beilage -->
                <div class="button_beilage" style="clear:both;display:block;height:100%;margin-top:10px;margin-bottom:15px;">
                    <a href="#" class="button green close backds"><!-- <img src="style/images/tick.png"> -->{LANGUAGEMAIN.btn_back}</a>
                    <a href="#" class="button green close boquads"><!-- <img src="style/images/tick.png" > -->{LANGUAGEMAIN.btn_next}</a>
                    <a href="#" class="button green close quitds"><!-- <img src="style/images/cross.png"> -->{LANGUAGEMAIN.btn_quit}</a>
                </div>
                <p class="error-beilage" style="color:red;width:100%; text-align:center;font-size:14px;margin-bottom:10px;"></p>

            </div>
            <article class="form-box note_ones" style="width: 400px;background-color: #fff;border-radius: 2px;padding: 105px 20px 20px;position: fixed;z-index: 10000;top: 50%;left: 50%;margin-left: -200px;height:auto;">
                <a href="#" class="form-close">
                    <img src="style/images/form-close.png" alt="close">
                </a>
                <img src="{FORM_LOGO}" alt="logo">
                <form>
                    <textarea class="note-text" cols="30" rows="10" placeholder="{NOTECONTENT}"></textarea>
                    <button class="note-ok-beilage" idsp="{IDSP}" type="button"  href='#'  style="background-color: #95c12a;width: 100%;font-size: 1.125em;font-family: 'Source Sans Pro', sans-serif;text-transform: uppercase;font-weight: 900;color: #fff;line-height: 40px;cursor: pointer;margin-bottom: 40px;border-radius: 2px;">{LANGUAGECART.addcart}</button>
                </form>
            </article>
            <h6  class="appends-beilage" item="{COUNT_DISHIS}" >{PRICE}{ICONPRICE}</h6>
        </li>
        <!-- END:names -->

<!-- BEGIN:contentdishis -->
    <script src="style/js/imgLiquid-min.js"></script>
    <!--<script src="style/js/menu.js"></script> -->
    <script>$("figure.imgLiquidFill").imgLiquid();</script>

    <script type="text/javascript" src="style/jsme/append-beilage.js"></script>
    <script type="text/javascript" src="style/jsme/cart.js"></script>
    <script type="text/javascript" src="style/js/forms.js"></script>
<!-- END:contentdishis -->
