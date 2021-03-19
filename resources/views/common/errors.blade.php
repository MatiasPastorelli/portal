@if ($errors->any())

<div class="col-lg-5 col-md-5 mx-auto">
	<div class="container pt-3">
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<ul>
			@foreach($errors->all() as $error)
			<li><strong>Error!</strong> {{ $error }}</li>
			@endforeach
			</ul>
		</div>
	</div>
</div>


@endif
