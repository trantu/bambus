<!-- BEGIN:main -->
<html>
 <meta charset="utf8">
<title> HQTECH </title>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="style/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="style/css/bootstrap/custom.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>

</head>
<body>
    <div class="index-in" >

        <div class="indexheader-in">
            <div class="header">
                <div class="logo"><a href="index.php?mod=m/main"><img src="style/images/logo.png" alt=""/></a></div>
                <div class="titin">
                    <p>Klick ein Gericht an, um es in den Warenkorb zu legen</p>
                </div>
            </div>
        </div>

        <div class="indexcontent">

            <div id="pp-register" >

                <div id="signup-header" class="col-sm-12 col-xs-12"  style="margin-bottom:10px; text-align:center;height:12em;">
                    <h2 style="font-size:1.6em;">{PPTITLE}</h2>
                    <p>{PPTITLEP} <a href="index.php?mod=m/main"> {PPTITLEA} </a> {PPTITLEPN} </p>
                </div>

                <div id="ip-register" class="col-sm-12 col-xs-12" style="text-align:center;font-family: 'PT Sans Narrow', sans-serif;">
                    <h3 style="font-size:24px;padding-top:30px;margin-bottom:20px;">{IFTITLEADDRESS}</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered  table-striped">
                            <tr>
                               <th>{IFNAME}</th>
                               <th>{IFSTRESS}</th>
                               <th>{IFPHONE}</th>
                            </tr>
                            <tr>
                               <td>{NAMEUSER}</td>
                               <td>{ADDRESSUSER}</td>
                               <td>{PHONEUSER}</td>
                            </tr>

                        </table>
                    </div>
                </div>

                <div id="ip-register" class="col-sm-12 col-xs-12"  style="text-align:center;font-family: 'PT Sans Narrow', sans-serif;">
                    <h3 style="font-size:24px;padding-top:30px;margin-bottom:20px;">{LTITLECART}</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <tr>
                               <th>{LNAME}</th>
                               <th>{LQTY}</th>
                               <th>{LTOTALPRICE}</th>
                            </tr>
                            <!-- BEGIN:cart -->
                            <tr>
                               <td>(NR. {IDSP}) {NAME} {BEILAGE}</td>
                               <td>{QTY}</td>
                               <td>{PRICES} {ICONPRICE}</td>
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

        <div class="indextopfoot2">
            <div class="topfoot2">
                <div class="topfoot2-1">
                    <ul>
                        <li> <!-- BEGIN:addressstore -->
                            <a href="#">{NAMESTORE}</a></br>
                            <a href="#">{ADDRESSSTORE}</a></br>
                            <a href="#">{REGIONSTORE}</a>
                            <!-- END:addressstore -->
                        </li>
                    </ul>
                </div>
                <div class="topfoot2-2">
                    <ul>
                        <li>
                        <!-- BEGIN:contactus -->
                            <a href="#">{TELEPHONE}</a></br>
                            <a href="#">{EMAILCONTACT}</a>
                        <!-- END:contactus -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</div>

</body>
</html>
<!-- END:main -->
