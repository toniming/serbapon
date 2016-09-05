<!-- menu -->
<nav class="navbar navbar-light bg-inverse" style="line-height: 50px;">
	<div class="container">
		<a class="navbar-brand" href="#">
			{!! Html::image('images/serbapon.png', null, ['class' => 'img-fluid'] ) !!}
		</a>
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="modal" data-target="#myModal2">
      &#9776;
    </button>
    <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
  		<ul class="nav navbar-nav pull-xs-right ">
  			<li class="nav-item active">
  				<a href="/" class="nav-link white-text m-r-2 p-b-0"><strong>HOME</strong></a>
  			</li>
  			<li class="nav-item">
  				<a href="{{ url('/kupon') }}" class="nav-link white-text m-r-2 p-b-0"><strong>ALL DEALS</strong></a>
  			</li>
        @if(is_null(Session::get('User')))
  			<li class="nav-item">
  				<a href ="{{ url('/signin') }}" class="nav-link white-text m-r-2 p-b-0"><strong>SIGN UP / SIGN IN</strong></a>
  			</li>
        @endif
  			<li class="nav-item">
  				<a href="{{ url('/contact_us') }}" class="nav-link white-text m-r-2 p-b-0"><strong>CONTACT US</strong></a>
  			</li>
        @if(Session::has('User'))
        <li class="nav-item">
          <a class="nav-link white-text m-r-2 p-b-0 w-100" href="/profil"><strong><i class="fa fa-user fa-lg"></i></strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link white-text m-r-2 p-b-0 w-100" href="/metode_pembayaran"><strong><i class="fa fa-shopping-cart fa-lg"></i></strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link white-text m-r-2 p-b-0 w-100" href="{{ url('/logout') }}"><strong><i class="fa fa-sign-out"></i>Logout</strong></a>
        </li>
        @endif
  		</ul>
    </div>
	</div>
</nav>

<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel2">Menu</h4>
                  </div>
                  <div class="modal-body">
                      <a href=""><div class="modal-menu menu-active2">HOME</div></a>
                      <a href=""><div class="modal-menu">PROMO</div></a>
                      <a href=""><div class="modal-menu">SIGN UP / SIGN IN</div></a>
                      <a href=""><div class="modal-menu">CONTACT US</div></a>
                  </div>
              </div><!-- modal-content -->
      </div><!-- modal-dialog -->
</div><!-- modal -->