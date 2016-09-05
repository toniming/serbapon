<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
	<div style="width:100%">
		<div style="width:50%; float:left; padding-top:10px;">
			{!! Html::image('images/serbapon-footer.png', null, ['class' => 'card-img-top img-fluid']) !!}
		</div>
		<div style="width:50%;  float:left; text-align:right;">
			<h3>Serbapon.id</h3>
			<h6>Perum Araya Blok A, Blimbing, Malang.</h6>
		</div>
	</div>
	<div style="width:100%">
		<center><h4>Selamat! Anda berhasil berlangganan untuk kupon-kupon yang ada di <a href="http://adapromo.id/">serbapon.id</a>. Anda akan dikirimi kupon-kupon terbaru melalui email ini.</h4></center>
	</div>
	<div style="width:100%"><h5>
		<div style="width:30%;float:left; font-size:10px;">Serbapon.id &copy; 2016</div>
		<div style="width:40%;float:left; font-size:10px;text-align:center;">Untuk berhenti berlangganan, silahkan klik <a href="http://localhost:8000/unsubscribe/{!! $unsubscribe_token !!}">disini</a>.</div>
		<div style="width:30%;float:left; font-size:10px;text-align:right;">Newsletter Serbapon.id</div></h5>
	</div>
</body>
</html>