<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2><center>Konfirmasi User</center></h2>

<div><center>

    Selamat <h4 style="text-transform: uppercase">{!! $name !!}</h4> anda telah berhasil melakukan pembelian KUPON di Serbapon.id<br>
    silahkan simpan atau cetak kupon anda untuk mempergunakannya<br><br>

    @foreach ($detail_transaction as $k => $detail_transactions)
    @if($id_nota == $detail_transactions['id_nota'])
    @foreach ($kupon as $k => $kupons)
    @if($detail_transactions['id_kupon'] == $kupons['_id'])
                        <b><center><div style="border:1px solid black; background:url(http://www.mtovacations.com/sitebuilder/images/dixie-stampede-background-1060x1022.png); padding:25px; width:75%; margin-left:90px">
                            <center>
                            {!! Html::image('images/'.$kupons['images']['originalName'], null, ['class' => 'card-img-top img-fluid', 'style' => 'width:300px; height:300px']) !!}<br>
                                {{ $kupons['title'] }}<br><br>
                            kode kupon anda adalah<br> <b style="font-size:20px"> {!! $detail_transactions['kode_kupon'] !!}</b><br><br>
                                DENGAN PEMBELIAN SEBANYAK <b style="font-size:15px">{!! $detail_transactions['quantity'] !!}</b> KUPON<br>
                                <div style="clear:both;"></div>
                            </center>
                        </div></center></b><br><br><br>
     @endif
    @endforeach
    @endif
    @endforeach
</center>
</div>

</body>
</html>