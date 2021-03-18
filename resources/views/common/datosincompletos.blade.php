@if (isset($errors))
	@if ($errors->any())
	<script>
		toastr.warning("Favor registre toda la información solicitada");
	</script>
	@endif
@endif