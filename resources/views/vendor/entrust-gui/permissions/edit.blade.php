@extends(Config::get('entrust-gui.layout'))

@section('heading', 'Edit Permission')

@section('content')
	<div class="panel panel-default">
		@include('entrust-gui::permissions.partials.heading', ['index' => false])
		@if (Auth::user()->can('permission-write'))
			<div class="panel-body">
				<form action="{{ route('entrust-gui::permissions.update', $model->id) }}" method="post" role="form">
					<input type="hidden" name="_method" value="put">
					@include('entrust-gui::permissions.partials.form')
					<div class="pull-right">
						<a class="btn btn-sm btn-default" href="{{ route('entrust-gui::permissions.index') }}"><span
									class="btn-label"></span>{{ trans('entrust-gui::button.cancel') }}</a>
						<button type="submit" class="btn btn-sm btn-primary"><span
									class="btn-label"></span>{{ trans('entrust-gui::button.save') }}</button>
					</div>
				</form>
			</div>
		@endif
	</div>
@endsection
