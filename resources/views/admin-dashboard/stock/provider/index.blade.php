@extends('templates.admin-dashboard')
@section('title') Fonecedor @endsection
@section('content')
<div class="container-fluid">

	<div class="row">
		<div class="col-md-12">
			<hb-provider 
				route-create="{{ route('admin-dashboard.providers.create') }}"
				user_id="{{ Auth::user()->id }}"
			>
			</hb-provider>
		</div>
	</div>

</div>
@endsection
@section('scripts') 

@endsection