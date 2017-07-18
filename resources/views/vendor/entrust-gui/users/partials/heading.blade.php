<div class="panel-heading">
	<h4>
		<i class="fa fa-briefcase" aria-hidden="true"></i>
		{{ trans("entrust-gui::navigation.users" ) }}

		@if ($index && Auth::user()->can('utilisateur-write'))
			<a class="btn btn-sm btn-primary pull-right" href="{{ route('entrust-gui::users.create') }}"><span
						class="btn-label"></span>{{ trans('entrust-gui::button.create-user') }}
			</a>
		@endif
	</h4>
</div>
<div class="col-sm-12 margin-top-10">
	@include('entrust-gui::partials.notifications')
</div>