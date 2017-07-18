@extends(Config::get('entrust-gui.layout'))

@section('content')

	<div class="panel panel-default">
		@include('entrust-gui::users.partials.heading', ['index' => true])

		<table class="table table-striped">
			<colgroup>
				<col class="col-md-2">
				<col class="col-md-2">
				<col class="col-md-2">
				<col class="col-md-2">
				<col class="col-md-2">
				<col class="col-md-2">
			</colgroup>
			<thead>
			<tr>
				<th>{{ trans('entrust-gui::users.nom') }}</th>
				<th>{{ trans('entrust-gui::users.prenom') }}</th>
				<th>{{ trans('entrust-gui::users.email') }}</th>
				<th>{{ trans('entrust-gui::users.login') }}</th>
				<th>{{ trans('entrust-gui::navigation.roles') }}</th>
				<th>{{ trans('entrust-gui::navigation.actions') }}</th>
			</tr>
			</thead>
			@foreach($users as $user)
				<tr>
					<td> {{ $user->nom }}</td>
					<td> {{ $user->prenom }}</td>
					<td> {{ $user->email }}</td>
					<td> {{ $user->login }}</td>
					<td> {{ $user->roles->implode('name', ', ') }}</td>
					<td class="col-xs-3">
						@if (Auth::user()->can('utilisateur-write'))
							<form action="{{ route('entrust-gui::users.destroy', $user->id) }}" method="post"
							      class="delete-confirm">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<a class="btn btn-sm btn-default"
								   href="{{ route('entrust-gui::users.edit', $user->id) }}"><span
											class="btn-label"></span>{{ trans('entrust-gui::button.edit') }}</a>
								<button type="submit" class="btn btn-sm btn-danger"><span
											class="btn-label"></span>{{ trans('entrust-gui::button.delete') }}
								</button>
							</form>
						@endif
					</td>
				</tr>
			@endforeach
		</table>
		<div class="text-right">
			@include('pagination.default', ['paginator' => $users])
		</div>
	</div>
@endsection
