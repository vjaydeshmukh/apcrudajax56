<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
	<!--
Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

Tip 2: you can also add an image using data-image tag
-->
	<div class="logo">
		<a href="http://www.creative-tim.com" class="simple-text logo-normal">
			Laravel Ajax - Modal
		</a>
	</div>
	<div class="sidebar-wrapper">
		<ul class="nav">
			<li class="nav-item active ">
				<a class="nav-link" href="/">
					<i class="material-icons">dashboard</i>
					<p>Dashboard</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="{{ url('students') }}">
					<i class="material-icons">person</i>
					<p>Students - Ajax</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="{{ url('ajaxCRUD') }}">
					<i class="material-icons">content_paste</i>
					<p>Products - Ajax-Route</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="{{ route('product.index') }}">
					<i class="material-icons">library_books</i>
					<p>Products Ajax-Controller</p>
				</a>
			</li>
		</ul>
	</div>
</div>