@extends(Config::get('entrust-gui.layout'))

@section('content')
	<div class="panel panel-default">

		@include('entrust-gui::permissions.partials.heading', ['index' => true])

		<div class="panel-body">
		</div>

		<table class="table table-striped">
			<colgroup>
				<col class="col-md-5">
				<col class="col-md-5">
				<col class="col-md-2">
			</colgroup>
			<thead>
			<tr>
				<th>{{ trans('entrust-gui::label.name') }}</th>
				<th>{{ trans('entrust-gui::navigation.roles') }}</th>
				<th>{{ trans('entrust-gui::navigation.actions') }}</th>
			</tr>
			</thead>
			@foreach($models as $model)
				<tr>
					<td>{{ $model->display_name }}</td>
					<td> {{$model->roles->implode('name', ', ') }}</td>
					<td class="col-xs-3">
						@if (Auth::user()->can('permission-write'))
							<form action="{{ route('entrust-gui::permissions.destroy', $model->id) }}" method="post"
							      class="delete-confirm">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<a class="btn btn-sm btn-default"
								   href="{{ route('entrust-gui::permissions.edit', $model->id) }}"><span
											class="btn-label"></span>{{ trans('entrust-gui::button.edit') }}
								</a>
								<button type="submit" class="btn btn-sm btn-danger"><span
											class="btn-label"></span>{{ trans('entrust-gui::button.delete') }}
								</button>
							</form>
					</td>
					@endif
				</tr>
			@endforeach
		</table>
		<div class="text-right">
			@include('pagination.default', ['paginator' => $models])
		</div>
	</div>
@endsection
