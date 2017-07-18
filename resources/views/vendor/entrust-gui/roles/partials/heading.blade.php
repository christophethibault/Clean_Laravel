<div class="panel-heading">
	<h4>
		<i class="fa fa-briefcase" aria-hidden="true"></i>
		{{ trans("entrust-gui::navigation.roles" ) }}

		@if ($index && Auth::user()->can('role-write'))
			<a class="btn btn-sm btn-primary pull-right" href="{{ route('entrust-gui::roles.create') }}"><span
						class="btn-label"></span>{{ trans('entrust-gui::button.create-role') }}
			</a>
		@endif
	</h4>
</div>
<div class="col-sm-12 margin-top-10">
	@include('entrust-gui::partials.notifications')
</div>