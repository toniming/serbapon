<!-- top liner -->
<nav class="navbar navbar-dark navbar-fixed-top navbar-full bg-primary bg-faded main-nav">
	<a class="navbar-brand" href="#">CMS</a>
	<div class="nav navbar-nav">
		<a href="{{ route('cms.logoutcms') }}" class="pull-xs-right nav-link"><i class="fa fa-sign-out"></i> Logout
		</a>
	</div>
</nav>

<!-- second liner -->
<nav class="navbar navbar-fixed-top navbar-full bg-faded navbar2">
	<div class="nav navbar-nav">
		<ul class="list-inline">
			<li class="list-inline-item text-xs-center">
				<a href="{{ route('cms.home') }}" class="block p-y-1 p-x-0 ">
					<i class="fa fa-dashboard fa-2x fa-fw"></i><br>Dashboard
				</a>
			</li>
			<li class="list-inline-item text-xs-center">
				<a href="{{ route('cms.FAQ.FAQ.index') }}" class="block p-y-1 p-x-0 ">
					<i class="fa fa-desktop fa-2x fa-fw"></i><br>Website
				</a>
			</li>
			<li class="list-inline-item text-xs-center">
				<a href="{{ route('cms.kupon.kupon.index') }}" class="block p-y-1 p-x-0 ">
					<i class="fa fa-list-alt fa-2x fa-fw"></i><br>KUPON
				</a>
			</li>
			@if(Session::has('Admin'))
			<li class="list-inline-item text-xs-center">
				<a href="{{ route('cms.user.user.index') }}" class="block p-y-1 p-x-0 ">
					<i class="fa fa-users fa-2x fa-fw"></i><br>Users
				</a>
			</li>
			<li class="list-inline-item text-xs-center">
				<a href="{{ route('cms.transaction.transaction.index') }}" class="block p-y-1 p-x-0 ">
					<i class="fa fa-cart-arrow-down fa-2x fa-fw"></i><br>Transaction
				</a>
			</li>
			@endif
		</ul>
	</div>
</nav>