@extends(Config::get('entrust-gui.layout'))


@section('content')
	<div class="panel panel-default">
		@include('entrust-gui::users.partials.heading', ['index' => false])
		@if (Auth::user()->can('utilisateur-write'))
			<div class="panel-body">
				<form action="{{ route('entrust-gui::users.update', $user->id) }}" method="post" role="form">
					<input type="hidden" name="_method" value="put">
					@include('entrust-gui::users.partials.form')
					<div class="pull-right">
						<a class="btn btn-sm btn-default" href="{{ route('entrust-gui::users.index') }}"><span
									class="btn-label"></span>{{ trans('entrust-gui::button.cancel') }}
						</a>
						<button type="submit" id="save" class="btn btn-sm btn-primary"><span
									class="btn-label"></span>{{ trans('entrust-gui::button.save') }}</button>
					</div>
				</form>
			</div>
		@endif
	</div>
@endsection

