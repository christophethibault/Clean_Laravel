@extends(Config::get('entrust-gui.layout'))

@section('content')
	<div class="panel panel-default">
		@include('entrust-gui::roles.partials.heading', ['index' => false])
		@if (Auth::user()->can('role-write'))
			<div class="panel-body">
				<form action="{{ route('entrust-gui::roles.store') }}" method="post" role="form">
					@include('entrust-gui::roles.partials.form', ['index' => false])
					<div class="pull-right">
						<a class="btn btn-sm btn-default" href="{{ route('entrust-gui::roles.index') }}"><span
									class="btn-label"></span>{{ trans('entrust-gui::button.cancel') }}</a>
						<button type="submit" class="btn btn-sm btn-primary"><span
									class="btn-label"></span>{{ trans('entrust-gui::button.create') }}</button>
					</div>
				</form>
			</div>
		@endif
	</div>
@endsection
