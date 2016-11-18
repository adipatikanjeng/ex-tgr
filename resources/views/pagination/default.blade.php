@if ($paginator->lastPage() > 1)
<div class="boxPagination after_clear" style="margin-top:40px;">
	<ul class="after_clear">
		@if($paginator->currentPage() != 1)
		<li><a href="{{ $paginator->url(1) }}" class="item{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
			<<
		</a>
	</li>
	@endif

	@for ($i = 1; $i <= $paginator->lastPage(); $i++)
	<li>
		<a href="{{ $paginator->url($i) }}"	class="item{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">{{ $i }}
		</a>
	</li>
	@endfor

	@if($paginator->currentPage() != $paginator->lastPage())
	<li><a href="{{ $paginator->url($paginator->currentPage()+1) }}"
		class="item{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
		>></a></li>
		@endif
	</ul>
</div>
@endif
