<div class="modal fade" role="dialog" id={{ $id or "modal" }}>
	<div class="modal-dialog {{ $size or 'modal-lg' }}" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title text-center">{{ $title or "Informations" }}</h4>
			</div>

			{{ $slot }}

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
