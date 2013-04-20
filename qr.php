<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>QRコードメーカー</title>
</head>
<body>
	<h1>QRコード作るだけ</h1>
	<form method="post" action="">
		<input type="text" name="siteURL" value="http://" />
		<input type="submit" value="作成" />
	</form>
<?php
 // QRコード文字列
 //$string = "http://hoguhogu.net";
 $string = $_POST['siteURL'];
 $encString = rawurlencode($string);
 
 // QRコード設定
 $parts = array(
 	'cht' => 'qr', // QRコード
 	'chs' => '150x150', // QRコード
 	'choe' => 'Shift_JIS', // QRコード
 	'chl' => $encString, // QRコード

 	 );

 $qrcode = assembledUri($parts);
 
 if($string!=null) {
 	echo '<img src="'.$qrcode.'"alt="QRコード" />';
 }

 function assembledUri($parts) {
 	$uri = 'http://chart.apis.google.com/chart?';
 	$query = '';
 	foreach ($parts as $key => $val) {
 		if($query != '' ) {
 			$query .= '&amp;';
 		}
 		$query .= "$key=$val";
 	}
 	$uri .= $query;
 	return $uri;
 }

?>
</body>
</html>