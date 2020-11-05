<html>
	<head>
		<title>Knet Merchant Demo</title>
		<meta http-equiv="pragma" content="no-cache">
        <link href="st.css" rel="stylesheet" type="text/css" />
        {{Html::style('assets/css/bootstrap.min.css')}}
        
        <style>
            body {
  background: #ccc;
  padding: 30px;
}

.container {
  width: 21cm;
  min-height: 29.7cm;
}

.invoice {
  background: #fff;
  width: 100%;
  padding: 50px;
}

.logo {
  width: 2.5cm;
}

.document-type {
  text-align: right;
  color: #444;
}

.conditions {
  font-size: 0.7em;
  color: #666;
}

.bottom-page {
  font-size: 0.7em;
}
        </style>
    </head>
<body>
  <div class="container">
  <div class="invoice">
    <div class="row">
      <div class="col-5">
        <img src="{{asset('/front_assets/images/logo-alt.png')}}" class="logo">
      </div>
      <div class="col-7">
        <h3 class="document-type display-6">موقع الهيئة العامة للبيئة </h3>
        <p class="text-right"><strong>دولة الكويت</strong></p>
      </div>
    </div> 
    <br>
    <br>
    
    @if($data['result'] == "CAPTURED")
    <h6 class="text-success">Transaction Completed Successfully</h6>
    @elseif($data['result'] == "CANCELLED")
        <h6 class="text-danger">Transaction Cancelled By User</h6>
    @else
         <h6 class="text-danger">Transaction Error Please Try Again Later</h6>
    @endif
    <br>
    
    <table class="table table-striped"> 
      <tbody> 
            <tr>
                <td colspan="2" align="center" class="msg"><strong class="text">Transaction Details</strong></td>
            </tr>
            <tr>
                <td width=26% class="tdfixed">Payment ID :</td>
                <td width=74% class="tdwhite">{{$data['paymentid'] ?? 0}}</td>
            </tr>
            <tr>
                <td class="tdfixed">Post Date :</td>
                <td class="tdwhite">{{$data['postdate']  ?? 0}}</td>
            </tr>
            <tr>
                <td class="tdfixed">Result Code :</td>
                <td class="tdwhite">{{$data['result'] ?? 0}}</td>
            </tr>
            <tr>
                <td class="tdfixed">Transaction ID :</td>
                <td class="tdwhite">{{$data['tranid'] ?? 0}}</td>
            </tr>
            <tr>
                <td class="tdfixed">Track ID :</td>
                <td class="tdwhite">{{$data['trackid'] ?? 0}}</td>
            </tr>
            <tr>
                <td class="tdfixed">Ref No :</td>
                <td class="tdwhite">{{$data['ref'] ?? 0}}</td>
            </tr>
            <tr>
                <td class="tdfixed">Amount :</td>
                <td class="tdwhite">{{$data['amt'] ?? 0}}</td>
            </tr>
      </tbody>
    </table> 
     @if($data['callBackLink'])
<a href="{{$data['callBackLink'] ?? null}}" class="btn btn-success">Back</a>
@else
    <a href="{{url('/')}}" class="btn btn-success">Back To Site</a>
@endif
     
  </div>
</div>  
    
    
    
    
</body>
</html>