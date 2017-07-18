<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
	<label for="nom">{{ trans('entrust-gui::users.nom') }}</label>
	<input type="input" class="form-control" id="nom" placeholder="{{ trans('entrust-gui::users.nom') }}" name="nom"
	       value="{{ (Session::has('errors')) ? old('nom', '') : $user->nom }}">
</div>
<div class="form-group">
	<label for="prenom">{{ trans('entrust-gui::users.prenom') }}</label>
	<input type="input" class="form-control" id="prenom" placeholder="{{ trans('entrust-gui::users.prenom') }}"
	       name="prenom"
	       value="{{ (Session::has('errors')) ? old('prenom', '') : $user->prenom }}">
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
	<label for="email">{{ trans('entrust-gui::users.email') }}</label>
	<input type="input" class="form-control" id="email" placeholder="{{ trans('entrust-gui::users.email') }}"
	       name="email"
	       value="{{ (Session::has('errors')) ? old('email', '') : $user->email }}">
	{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
	<label for="login">{{ trans('entrust-gui::users.login') }}</label>
	<input type="input" class="form-control" id="login" placeholder="{{ trans('entrust-gui::users.login') }}"
	       name="login"
	       value="{{ (Session::has('errors')) ? old('login', '') : $user->login }}">
</div>
<div class="form-group">
	<label for="password">{{ trans('entrust-gui::users.password') }}</label>
	<input type="password" class="form-control" id="password" placeholder="{{ trans('entrust-gui::users.password') }}"
	       name="password">
	@if(Route::currentRouteName() == 'entrust-gui::users.edit')
		<div class="alert alert-info">
			<span class="fa fa-info-circle"></span> {{ trans('entrust-gui::users.keep-password') }}
		</div>
	@endif
</div>
@if(Config::get('entrust-gui.confirmable') === true)
	<div class="form-group">
		<label for="password">Confirm Password</label>
		<input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password"
		       name="password_confirmation">
	</div>
@endif
<div class="form-group">
	<label for="roles">Roles</label>
	<select name="roles[]" id="roles" multiple class="form-control">
		@foreach($roles as $index => $role)
			<option value="{{ $index }}" {{ ((in_array($index, old('roles', []))) || ( ! Session::has('errors') && $user->roles->contains('id', $index))) ? 'selected' : '' }}>{{ $role }}</option>
		@endforeach
	</select>
</div>
