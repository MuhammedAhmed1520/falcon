<!doctype html>
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
        <h6 class="text-danger">Payment Not Found</h6>
    <br>
  </div>
</div>  
</body>
</html>