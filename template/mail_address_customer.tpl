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
  <div class="index-in">
    <div class="indexcontent">
        <div class="content">
            <div class="contin">
                <div class="spei">
                    <div class="menuleft"  style="width:98%; float:left;">
                        <div id="pp-register">
                          <div id="ip-register" style="text-align:center;">
                              <h3 style="font-size:24px;padding-top:30px;margin-bottom:20px;">{IFTITLEADDRESS}</h3>
                              <table border="1px" style="width:700px;margin:0px auto;text-align:center; ">
                                  <!-- BEGIN:login -->
                                  <tr> 
                                     <th>{IFNAME}</th> 
                                     <th>{IFNUMBERHOUSE}</th>
                                     <th>{IFSTRESS}</th>
                                     <th>{IFREGION}</th>
                                     <th>{IFPOSTAL}</th> 
                                     <th>{IFPHONE}</th>
                                     <th>{IFNOTEPOSITON}</th>
                                     <th>{IFCOMPANY}</th> 
                                     <th>{IFNOTE}</th>
                                  </tr>
                                  <!-- BEGIN:address -->
                                  <tr> 
                                     <td>{NAME}</td>
                                     <td>{NUMBERHOUSE}</td>
                                     <td>{STRESS}</td>
                                     <td>{REGION}</td>
                                     <td>{POSTALCODE}</td>
                                     <td>{PHONE}</td>
                                     <td>{NOTEPOSITION}</td>
                                     <td>{COMPANY}</td>
                                     
                                     <td>{NOTE}</td>
                                  </tr>
                                  <!-- END:address -->

                                  <!-- END:login -->

                                  <!-- BEGIN:notlogin -->
                                  <tr> 
                                     <th>{IFNAME}</th> 
                                     <th>{IFADDRESS}</th>
                                     <th>{IFPHONE}</th>
                                     <th>{IFNOTEPOSITON}</th>
                                     <th>{IFCOMPANY}</th> 
                                     
                                     <th>{IFNOTE}</th>
                                  </tr>
                                  <!-- BEGIN:address -->
                                  <tr> 
                                     <td>{NAME}</td>
                                     <td>{ADDRESS}</td>
                                     <td>{PHONE}</td>
                                     <td>{NOTEPOSITION}</td>
                                     <td>{COMPANY}</td>                        
                                     <td>{NOTE}</td>
                                  </tr>
                                    <!-- END:address -->
                                  <!-- END:notlogin -->

                                  <tr>
                                    <td colspan="2">Type Payment</td>
                                    <td colspan="2">{TYPEPAYMENT}</td>
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
    
</body>
</html>
<!-- End:main -->