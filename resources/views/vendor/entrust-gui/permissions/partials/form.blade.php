<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
	<label for="name">{{ trans('entrust-gui::label.name') }}</label>
	<input type="input" class="form-control" id="name" placeholder="{{ trans('entrust-gui::label.name') }}"
	       name="name" value="{{ (Session::has('errors')) ? old('name', '') : $model->name }}">
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
<div class="form-group">
	<label for="roles">Roles</label>
	<select name="roles[]" multiple class="form-control">
		@foreach($relations as $index => $relation)
			<option value="{{ $index }}" {{ ((in_array($index, old('roles', []))) || ( ! Session::has('errors') && $model->roles->contains('id', $index))) ? 'selected' : '' }}>{{ $relation }}</option>
		@endforeach
	</select>
</div>
