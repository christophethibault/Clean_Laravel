@if ($paginator->lastPage() > 1)


	<ul class="pagination" style="@if(isset($isHorizPaginator)) margin: 0;@endif">
		<li class="">
			<span> {{($paginator->currentpage()-1)*$paginator->perpage()+1}}
				à {{$paginator->currentpage()*$paginator->perpage()}}
				sur {{$paginator->total()}}
	</span>
		</li>
		<li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
			<a href="{{ $paginator->url(1) }}"><i class="fa fa-chevron-left"></i></a>
		</li>
		{{--@for ($i = 1; $i <= $paginator->lastPage(); $i++)--}}
		{{--<li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">--}}
		{{--<a href="{{ $paginator->url($i) }}">{{ $i }}</a>--}}
		{{--</li>--}}
		{{--@endfor--}}
		<li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
			<a href="{{ $paginator->url($paginator->currentPage()+1) }}"> <i class="fa fa-chevron-right"></i> </a>
		</li>
	</ul>
@endif