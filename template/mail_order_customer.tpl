<!-- BEGIN:main -->
<html>
 <meta charset="utf8">
<title> HQTECH </title> 
<head>
    <link href="style/css/style.css" rel="stylesheet" type="text/css" />
    <link href="style/css/paypal.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
    
</head>
<body>
<!-- BEGIN:people -->
<div class="index-in">
    <div class="indexcontent">
        <div class="content">
            <div class="contin">
                <div class="spei">
                    <div class="menuleft"  style="width:98%; float:left;">
                        <div id="pp-register">
                          <div id="ip-register" style="text-align:center;">
                              <h3 style="font-size:24px;padding-top:30px;margin-bottom:20px;">{LTITLECART} {NUMBER}</h3>
                              <table border="1px" style="width:700px;margin:0px auto;text-align:center; ">
                                  <tr>  
                                     <th>{LPLU}</th>
                                     <th>{LNAME}</th> 
                                     <th>{LQTY}</th>
                                     <th>{LTOTALPRICE}</th>
                                     <th>{LBEILAGE}</th>
                                     <th>{LNOTE}</th>
                                  </tr>
                                  <!-- BEGIN:cart -->
                                  <tr> 
                                     <td>{IDSP}</td>
                                     <td>{NAME}</td>
                                     <td>{QTY}</td>
                                     <td>{PRICES} {ICONPRICE}</td>
                                     <td>{BEILAGE}</td>
                                     <td>{NOTE}</td>
                                  </tr>
                                  <!-- END:cart -->
                                  <tr>
                                      <td colspan="2">{LTOTAL}</td>
                                      <td colspan="2">{TOTAL} {ICONPRICE}</td>
                                  </tr>
                              </table>
                          </div>
                            
                        </div>
                    </div>
                                                                    
                </div>
            </div>
        </div>
    </div>  
</div> 
<!-- END:people -->   
</body>
</html>
<!-- End:main -->