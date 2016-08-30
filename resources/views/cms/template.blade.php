<!DOCTYPE html>
@if(is_null(Session::get('Admin')) && is_null(Session::get('Editor')))
    <script>
        window.location.href = '{{url("/cms/login")}}'; 
    </script>
@endif
<html lang="en">
    <head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{!! Html::style(elixir('css/appcms.css')) !!}
        <title>@section('title','Dashboard')</title>
    </head>
    <body>
        @include('cms.widgets.topbar')
        @yield('content')
		@yield('modal')
    </body>
    {!! Html::script(elixir('js/appcms.js')) !!}
    <script>
        @yield('scripts')
    </script>
    
<script>
function goBack() {
    window.history.back();
}
</script>
    <script>
  $( function() {
    var availableTags = [
      " Airmadidi   "   ,
"   Ampana  "   ,
"   Amurang "   ,
"   Andolo  "   ,
"   Banggai "   ,
"   Bantaeng    "   ,
"   Barru   "   ,
"   Bau-Bau "   ,
"   Benteng "   ,
"   Bitung  "   ,
"   Bolaang Uki "   ,
"   Boroko  "   ,
"   Bulukumba   "   ,
"   Bungku  "   ,
"   Buol    "   ,
"   Buranga "   ,
"   Donggala    "   ,
"   Enrekang    "   ,
"   Gorontalo   "   ,
"   Jeneponto   "   ,
"   Kawangkoan  "   ,
"   Kendari "   ,
"   Kolaka  "   ,
"   Kotamobagu  "   ,
"   Kota Raha   "   ,
"   Kwandang    "   ,
"   Lasusua "   ,
"   Luwuk   "   ,
"   Majene  "   ,
"   Makale  "   ,
"   Makassar (Ujung Pandang)    "   ,
"   Malili  "   ,
"   Mamasa  "   ,
"   Mamuju  "   ,
"   Manado (Menado) "   ,
"   Marisa  "   ,
"   Maros   "   ,
"   Masamba "   ,
"   Melonguane  "   ,
"   Ondong Siau "   ,
"   Palopo  "   ,
"   Palu    "   ,
"   Pangkajene  "   ,
"   Pare-Pare   "   ,
"   Parigi  "   ,
"   Pasangkayu  "   ,
"   Pinrang "   ,
"   Polewali    "   ,
"   Poso    "   ,
"   Rantepao    "   ,
"   Ratahan "   ,
"   Rumbia  "   ,
"   Sengkang    "   ,
"   Sidenreng   "   ,
"   Sigi Biromaru   "   ,
"   Sinjai  "   ,
"   Sunggu Minasa   "   ,
"   Suwawa  "   ,
"   Tahuna  "   ,
"   Takalar "   ,
"   Tilamuta    "   ,
"   Toli Toli   "   ,
"   Tomohon "   ,
"   Tondano "   ,
"   Tutuyan "   ,
"   Unaaha  "   ,
"   Wangi Wangi "   ,
"   Wanggudu    "   ,
"   Watampone   "   ,
"   Watan Soppeng   "   ,
"   Cliquers    "   ,
"   Libuo Palma "   ,
"   Aek Kanopan "   ,
"   Arga Makmur "   ,
"   Arosuka "   ,
"   Balige  "   ,
"   Banda Aceh  "   ,
"   Bandar Lampung  "   ,
"   Bagansiapiapi   "   ,
"   Baganbatu   "   ,
"   Bandar Seri Bintan  "   ,
"   Bangkinang  "   ,
"   Bangko  "   ,
"   Banyuasin   "   ,
"   Batam   "   ,
"   Baturaja    "   ,
"   Batusangkar "   ,
"   Bengkalis   "   ,
"   Bengkulu    "   ,
"   Binjai  "   ,
"   Bintuhan    "   ,
"   Bireuen "   ,
"   Blambangan Umpu "   ,
"   Blangpidie  "   ,
"   Blang Kejeren   "   ,
"   Bukittinggi "   ,
"   Calang  "   ,
"   Curup   "   ,
"   Daik    "   ,
"   Dolok Marawa    "   ,
"   Dumai   "   ,
"   Gedong Tataan   "   ,
"   Gunung Sitoli   "   ,
"   Gunung Sugih    "   ,
"   Gunung Tua  "   ,
"   Idi Rayeuk  "   ,
"   Indralaya   "   ,
"   Jambi   "   ,
"   Jantho  "   ,
"   Kabanjahe   "   ,
"   Kalianda    "   ,
"   Karang Baru "   ,
"   Karang Tinggi   "   ,
"   Kayu Agung  "   ,
"   Kepahiang   "   ,
"   Kisaran "   ,
"   Koba    "   ,
"   Kota Agung  "   ,
"   Kotabumi    "   ,
"   Kota Pinang "   ,
"   Kuala Tungkal   "   ,
"   Kutacane    "   ,
"   Lahat   "   ,
"   Lahomi  "   ,
"   Langsa  "   ,
"   Lhokseumawe "   ,
"   Lhoksukon   "   ,
"   Limapuluh   "   ,
"   Liwa    "   ,
"   Lotu    "   ,
"   Lubuk Basung    "   ,
"   Lubuk Bendaharo "   ,
"   Lubuk Linggau   "   ,
"   Lubuk Pakam "   ,
"   Lubuk Sikaping  "   ,
"   Manggar "   ,
"   Manna   "   ,
"   Martapura (Sumatera Selatan)    "   ,
"   Medan   "   ,
"   Menggala    "   ,
"   Mentok  "   ,
"   Metro   "   ,
"   Meulaboh    "   ,
"   Meureude    "   ,
"   Muara Aman  "   ,
"   Muara Bulian    "   ,
"   Muara Bungo "   ,
"   Muara Dua   "   ,
"   Muara Enim  "   ,
"   Muara Sabak "   ,
"   Muara Tebo  "   ,
"   Muaro Sijunjung "   ,
"   Mukomuko    "   ,
"   Padang  "   ,
"   Padang Aro  "   ,
"   Padang Panjang  "   ,
"   Padang Sidempuan    "   ,
"   Pagaralam   "   ,
"   Painan  "   ,
"   Palembang   "   ,
"   Pandan  "   ,
"   Pangkalan Kerinci   "   ,
"   Pangkal Pinang  "   ,
"   Panguruan   "   ,
"   Panyabungan "   ,
"   Pariaman    "   ,
"   Parit Malintang "   ,
"   Pasir Pengarayan    "   ,
"   Payakumbuh  "   ,
"   Pekanbaru   "   ,
"   Pematang Siantar    "   ,
"   Prabumulih  "   ,
"   Pringsewu   "   ,
"   Pulau Punjung   "   ,
"   Ranai   "   ,
"   Rantau Prapat   "   ,
"   Raya    "   ,
"   Rengat  "   ,
"   Sabang  "   ,
"   Salak   "   ,
"   Sarila  "   ,
"   Sarolangun  "   ,
"   Sawahlunto  "   ,
"   Sei Rampah  "   ,
"   Sekayu  "   ,
"   Selat Panjang   "   ,
"   Sengeti "   ,
"   Siak Sri Indrapura  "   ,
"   Sibolga "   ,
"   Sibuhuan    "   ,
"   Sidikalang  "   ,
"   Sigli   "   ,
"   Simpang Ampek   "   ,
"   Simpang Tiga Redelong   "   ,
"   Sinabang    "   ,
"   Singkil "   ,
"   Sipirok "   ,
"   Solok   "   ,
"   Stabat  "   ,
"   Subulussalam    "   ,
"   Sukadana    "   ,
"   Suka Makmue "   ,
"   Sungailiat  "   ,
"   Sungai Penuh    "   ,
"   Takengon    "   ,
"   Tais    "   ,
"   Tanjung Balai (Sumatera Utara)  "   ,
"   Tanjung Balai Karimun (Kepulauan Riau)  "   ,
"   Tanjung Enim    "   ,
"   Tanjung Pandan  "   ,
"   Tanjung Pinang  "   ,
"   Tapaktuan   "   ,
"   Tarempa "   ,
"   Tarutung    "   ,
"   Tebing Tinggi (Sumatera Utara)  "   ,
"   Tebing Tinggi (Sumatera Selatan)    "   ,
"   Teluk Dalam "   ,
"   Teluk Kuantan   "   ,
"   Tembilahan  "   ,
"   Toboali "   ,
"   Tuapejat    "   ,
"   Ujung Tanjung   "   ,
"   Ambarawa    "   ,
"   Anyer   "   ,
"   Bandung "   ,
"   Bangil  "   ,
"   Banjar (Jawa Barat) "   ,
"   Banjarnegara    "   ,
"   Bangkalan   "   ,
"   Bantul  "   ,
"   Banyumas    "   ,
"   Banyuwangi  "   ,
"   Batang  "   ,
"   Batu    "   ,
"   Bekasi  "   ,
"   Blitar  "   ,
"   Blora   "   ,
"   Bogor   "   ,
"   Bojonegoro  "   ,
"   Bondowoso   "   ,
"   Boyolali    "   ,
"   Bumiayu "   ,
"   Brebes  "   ,
"   Caruban "   ,
"   Cianjur "   ,
"   Ciamis  "   ,
"   Cibinong    "   ,
"   Cikampek    "   ,
"   Cikarang    "   ,
"   Cilacap "   ,
"   Cilegon "   ,
"   Cirebon "   ,
"   Demak   "   ,
"   Depok   "   ,
"   Garut   "   ,
"   Gresik  "   ,
"   Indramayu   "   ,
"   Jakarta "   ,
"   Jember  "   ,
"   Jepara  "   ,
"   Jombang "   ,
"   Kajen   "   ,
"   Karanganyar "   ,
"   Kebumen "   ,
"   Kediri  "   ,
"   Kendal  "   ,
"   Kepanjen    "   ,
"   Klaten  "   ,
"   Kota Palabuhanratu  "   ,
"   Kraksaan    "   ,
"   Kudus   "   ,
"   Kuningan    "   ,
"   Lamongan    "   ,
"   Lumajang    "   ,
"   Madiun  "   ,
"   Magelang    "   ,
"   Magetan "   ,
"   Majalengka  "   ,
"   Malang  "   ,
"   Mojokerto   "   ,
"   Mojosari    "   ,
"   Mungkid "   ,
"   Ngamprah    "   ,
"   Nganjuk "   ,
"   Ngawi   "   ,
"   Pacitan "   ,
"   Palabuhanratu   "   ,
"   Pamekasan   "   ,
"   Pandeglang  "   ,
"   Pare    "   ,
"   Pati    "   ,
"   Pasuruan    "   ,
"   Pekalongan  "   ,
"   Pelabuhan Ratu  "   ,
"   Pemalang    "   ,
"   Ponorogo    "   ,
"   Probolinggo "   ,
"   Purbalingga "   ,
"   Purwakarta  "   ,
"   Purwodadi   "   ,
"   Purwokerto  "   ,
"   Purworejo   "   ,
"   Rangkasbitung   "   ,
"   Rembang "   ,
"   Salatiga    "   ,
"   Sampang "   ,
"   Semarang    "   ,
"   Serang  "   ,
"   Sidayu  "   ,
"   Sidoarjo    "   ,
"   Singaparna  "   ,
"   Situbondo   "   ,
"   Slawi   "   ,
"   Sleman  "   ,
"   Soreang "   ,
"   Sragen  "   ,
"   Subang  "   ,
"   Sukabumi    "   ,
"   Sukoharjo   "   ,
"   Sumber  "   ,
"   Sumedang    "   ,
"   Sumenep "   ,
"   Surabaya    "   ,
"   Surakarta   "   ,
"   Tasikmalaya "   ,
"   Tangerang   "   ,
"   Tangerang Selatan   "   ,
"   Tegal   "   ,
"   Temanggung  "   ,
"   Tigaraksa   "   ,
"   Trenggalek  "   ,
"   Tuban   "   ,
"   Tulungagung "   ,
"   Ungaran "   ,
"   Wates   "   ,
"   Wlingi  "   ,
"   Wonogiri    "   ,
"   Wonosari    "   ,
"   Wonosobo    "   ,
"   Yogyakarta  "   ,
"   Atambua "   ,
"   Baa "   ,
"   Badung  "   ,
"   Bajawa  "   ,
"   Bangli  "   ,
"   Bima    "   ,
"   Denpasar    "   ,
"   Dompu   "   ,
"   Ende    "   ,
"   Gianyar "   ,
"   Kalabahi    "   ,
"   Karangasem  "   ,
"   Kefamenanu  "   ,
"   Klungkung   "   ,
"   Kupang  "   ,
"   Labuhan Bajo    "   ,
"   Larantuka   "   ,
"   Lewoleba    "   ,
"   Maumere "   ,
"   Mataram "   ,
"   Mbay    "   ,
"   Negara  "   ,
"   Praya   "   ,
"   Raba    "   ,
"   Ruteng  "   ,
"   Selong  "   ,
"   Singaraja   "   ,
"   Soe "   ,
"   Sumbawa Besar   "   ,
"   Tabanan "   ,
"   Taliwang    "   ,
"   Tambolaka   "   ,
"   Tanjung (Nusa Tenggara Barat)   "   ,
"   Waibakul    "   ,
"   Waikabubak  "   ,
"   Waingapu    "   ,
"   Denpasar    "   ,
"   Negara,Bali "   ,
"   Singaraja   "   ,
"   Tabanan "   ,
"   Bangli  "   ,
"   Pontianak   "   ,
"   Samarinda   "   ,
"   Banjarmasin "   ,
"   Balikpapan  "   ,
"   Singkawang  "   ,
"   Palangkaraya    "   ,
"   Mempawah    "   ,
"   Ketapang    "   ,
"   Sintang "   ,
"   Tarakan "   ,
"   Putussibau  "   ,
"   Sambas  "   ,
"   Sampit  "   ,
"   Banjarbaru  "   ,
"   Barabai "   ,
"   Batang Tarang   "   ,
"   Batulicin   "   ,
"   Bengkayang  "   ,
"   Bontang "   ,
"   Buntok  "   ,
"   Kandangan   "   ,
"   Kendawangan "   ,
"   Kotabaru    "   ,
"   Kuala Kapuas    "   ,
"   Kuala Kurun "   ,
"   Kuala Pembuang  "   ,
"   Malinau "   ,
"   Marabahan   "   ,
"   Martapura   "   ,
"   Muara Teweh "   ,
"   Nanga Bulik "   ,
"   Nanga Pinoh "   ,
"   Ngabang "   ,
"   Nunukan "   ,
"   Pangkalan Bun   "   ,
"   Paringin    "   ,
"   Pelaihari   "   ,
"   Penajam "   ,
"   Pulang Pisau    "   ,
"   Purukcahu   "   ,
"   Rantau  "   ,
"   Sangatta    "   ,
"   Sebatik "   ,
"   Sekadau "   ,
"   Sendawar    "   ,
"   Sukadana    "   ,
"   Sukamara    "   ,
"   Sungai Raya "   ,
"   Tamiang Layang  "   ,
"   Tanah Grogot    "   ,
"   Tanjung "   ,
"   Tanjung Selor   "   ,
"   Tanjung Redeb   "   ,
"   Tenggarong  "   ,
"   Ambon   "   ,
"   Asmat   "   ,
"   Biak    "   ,
"   Bintuni "   ,
"   Boven Digoel    "   ,
"   Buru Selatan    "   ,
"   Buru    "   ,
"   Deiyai  "   ,
"   Dogiyai "   ,
"   Fakfak  "   ,
"   Halmahera Barat "   ,
"   Halmahera Selatan   "   ,
"   Halmahera Tengah    "   ,
"   Halmahera Timur "   ,
"   Halmahera Utara "   ,
"   Intan Jaya  "   ,
"   Jayapura    "   ,
"   Jayapura (kota) "   ,
"   Jayawijaya  "   ,
"   Kaimana "   ,
"   Keerom  "   ,
"   Kepulauan Aru   "   ,
"   Kepulauan Sula  "   ,
"   Kepulauan Yapen "   ,
"   Lanny Jaya  "   ,
"   Maluku Barat Daya   "   ,
"   Maluku Tengah   "   ,
"   Maluku Tenggara "   ,
"   Maluku Tenggara Barat   "   ,
"   Mamberamo Raya  "   ,
"   Mamberamo Tengah    "   ,
"   Manokwari   "   ,
"   Manokwari Selatan   "   ,
"   Mappi   "   ,
"   Maybrat "   ,
"   Merauke "   ,
"   Mimika  "   ,
"   Nabire  "   ,
"   Nduga   "   ,
"   Paniai  "   ,
"   Pegunungan Arfak    "   ,
"   Pegunungan Bintang  "   ,
"   Pulau Morotai   "   ,
"   Pulau Taliabu   "   ,
"   Puncak  "   ,
"   Puncak Jaya "   ,
"   Raja Ampat  "   ,
"   Sarmi   "   ,
"   Seram Bagian Barat  "   ,
"   Seram Bagian Timur  "   ,
"   Sorong  "   ,
"   Sorong Selatan  "   ,
"   Supiori "   ,
"   Tambrauw    "   ,
"   Teluk Bintuni   "   ,
"   Teluk Wondama   "   ,
"   Ternate "   ,
"   Tidore  "   ,
"   Tolikara    "   ,
"   Tual    "   ,
"   Waropen "   ,
"   Yahukimo    "   ,
"   Yalimo  "   

    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
  <script type="text/javascript" src='//cdn.tinymce.com/4/tinymce.min.js'></script>
      <script type="text/javascript">
      tinymce.init({
        selector: '#myTextarea',
        theme: 'modern',
        width: 600,
        height: 300,
        plugins: [
          'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
          'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
          'save table contextmenu directionality emoticons template paste textcolor'
        ],
        content_css: 'css/content.css',
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
      });
      </script>
</html>