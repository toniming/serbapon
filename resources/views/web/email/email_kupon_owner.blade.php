<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2><center>Konfirmasi User</center></h2>

<div><center>

    Kupon anda telah laku <h4 style="text-transform: uppercase"><br>
    silahkan simpan data dibawah ini untuk mengkonfirmasi apply kupon<br><br>

                        <b><center><div style="border:1px solid black; background:url(http://www.mtovacations.com/sitebuilder/images/dixie-stampede-background-1060x1022.png); padding:25px; width:75%; margin-left:90px">
                            <center>
                            {!! Html::image('images/'.$kupon['images']['originalName'], null, ['class' => 'card-img-top img-fluid', 'style' => 'width:300px; height:300px']) !!}<br>
                                {{ $kupon['title'] }}<br><br>
                            kode kupon anda adalah<br> <b style="font-size:20px"> {!! $detail_transaction['kode_kupon'] !!}</b><br><br>
                                DENGAN PEMBELIAN SEBANYAK <b style="font-size:15px">{!! $detail_transaction['quantity'] !!}</b> KUPON<br>
                                <div style="clear:both;"></div>
                            </center>
                        </div></center></b><br><br><br>
</center>
</div>

</body>
</html>