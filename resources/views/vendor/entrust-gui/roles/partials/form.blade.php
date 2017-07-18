<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
	<label for="name">{{ trans('entrust-gui::label.name') }}</label>
	<input type="input" class="form-control" id="name" placeholder="{{ trans('entrust-gui::label.name') }}" name="name"
	       value="{{ (Session::has('errors')) ? old('name', '') : $model->name }}">
</div>
<div class="form-group">
	<label for="display_name">{{ trans('entrust-gui::label.display-name') }}</label>
	<input type="input" class="form-control" id="display_name"
	       placeholder="{{ trans('entrust-gui::label.display-name') }}" name="display_name"
	       value="{{ (Session::has('errors')) ? old('display_name', '') : $model->display_name }}">
</div>
<div class="form-group">
	<label for="description">{{ trans('entrust-gui::label.description') }}</label>
	<input type="input" class="form-control" id="description"
	       placeholder="{{ trans('entrust-gui::label.description') }}" name="description"
	       value="{{ (Session::has('errors')) ? old('description', '') : $model->description }}">
</div>
{{--<div class="form-group">--}}
{{--<label for="permissions">Permissions</label>--}}
{{--<select name="permissions[]" multiple class="form-control">--}}
{{--@foreach($relations as $index => $relation)--}}
{{--<option value="{{ $index }}" {{ ((in_array($index, old('permissions', []))) || ( ! Session::has('errors') && $model->perms->contains('id', $index))) ? 'selected' : '' }}>{{ $relation }}</option>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--</div>--}}
<table class="table table-striped">
	<colgroup>
		<col class="col-md-4">
		<col class="col-md-3">
		<col class="col-md-3">
		<col class="col-md-3">
	</colgroup>
	<thead>
	<tr>
		<th>{{ trans('entrust-gui::roles.modules') }}</th>
		<th class="text-center">{{ trans('entrust-gui::roles.no-right') }}</th>
		<th class="text-center">{{ trans('entrust-gui::roles.read') }}</th>
		<th class="text-center">{{ trans('entrust-gui::roles.read-write') }}</th>
	</thead>
	<tbody>
	@php  ($permissions = App\Permission::all())

	@forelse(App\Module::all() as $module)
		@php ($moduleDisplayName = $module->display_name )
		@php ($moduleName = $module->name )
		@php ($read = $module->name.'-read' )
		@php ($write = $module->name.'-write' )
		@php ($idRead = isset($permissions->where('name',$read)->first()->id) ? $permissions->where('name',$read)->first()->id : '' )
		@php ($idWrite= isset($permissions->where('name',$write)->first()->id) ? $permissions->where('name',$write)->first()->id : '' )
		<tr>
			<td>{{ $moduleDisplayName }}</td>
			<td class="text-center"><input type="checkbox"
			                               class="checkbox-permissions default"
			                               {{ ($model->perms->contains('id',$idRead) ||  $model->perms->contains('id',$idWrite))? ' ' : 'checked'}}
			                               name="default"
			                               value="">
			</td>
			<td class="text-center"><input type="checkbox"
			                               class="checkbox-permissions read"
			                               name="permissions[]"
			                               value="{{$idRead}}" {{ $model->perms->contains('id',$idRead) ? ' checked' : ''}}>
			</td>
			<td class="text-center"><input type="checkbox"
			                               class="checkbox-permissions write"
			                               name="permissions[]"
			                               value="{{$idWrite}}" {{ $model->perms->contains('id',$idWrite) ? ' checked' : ''}}>
			</td>
		</tr>
	@empty
		<tr>
			<td colspan="6">{{ trans('mission.empty') }}</td>
		</tr>
	@endforelse
	</tbody>
</table>

<script>
	$(function () {
		'use strict';
		$(".checkbox-permissions").change(function () {
//			console.log($(this).hasClass('default'));
//			console.log($(this).hasClass('read'));
			$(this).closest('td').siblings().children('.checkbox-permissions').prop('checked', false);
			if ($(this).hasClass('write')) {
				$(this).closest('td').siblings().children('.checkbox-permissions.read').prop('checked', true);
			}
			$(this).prop('checked', true);
		});
	});
</script>