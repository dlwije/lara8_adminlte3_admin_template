@if (count($errors) > 0)
	<!-- Start Box Body -->
  <div class="box-body">
	<div class="callout callout-danger text-danger" id="dangerAlert" style="padding: 10px 5px 5px 10px;">

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
        </button>

        <b>Whoops! There were some problems with your input. </b>
        <br>

		<ul class="list-unstyled">
			@foreach ($errors->all() as $error)
				<li class=""><i class="far fa-times-circle"></i> {{$error}}</li>
			@endforeach
		</ul>
	</div>
</div><!-- /.box-body -->
@endif
