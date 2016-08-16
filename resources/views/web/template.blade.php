<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Home</title>
		{!! Html::style(elixir('css/appweb.css')) !!}

		<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
	</head>
	<body>
	
	<!-- navbar -->
    @yield('navbar')
    @yield('navbar-red')

    <!-- searchbar -->
    @yield('searchbar')

    <!-- content -->
    @yield('content')

    <!-- footer -->
    @yield('footer')
    @yield('simple-footer')
	
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	{!! Html::script('js/tether.js') !!}
	{!! Html::script(elixir('js/appweb.js')) !!}

	<script>
		$(document).ready(function(){
			adapromo.init();
		});
	</script>
        <script type="text/javascript">
            $(function () {
                $("#btnsubmit").click(function () {
                    var password = $("#password").val();
                    var confirmPassword = $("#password2").val();
                    if (password != confirmPassword) {
                        alert("Passwords do not match.");
                        return false;
                    }
                    return true;
                });
            });
        </script>

	<!--<script>
			$('#exampleModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('whatever') // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.modal-title').text('LOGIN FOR ' + recipient)
		})
	</script>-->
    

	@yield('js')
</html>