@if ($paginator->lastPage() > 1)
<tfoot>
    <tr>
        <td colspan="5" class="text-center">
            <div class="no-margin ng-isolate-scope" st-displayed-pages="7" st-items-by-page="itemsByPage" st-pagination="">

                <nav ng-if="pages.length &gt;= 2" class="ng-scope">
                    <ul class="pagination">
                        @if($paginator->currentPage() != 1)
                        <li><a href="{{ $paginator->url(1) }}" class="item{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                            <<
                        </a>
                    </li>
                    @endif

                    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <li class="item{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $paginator->url($i) }}">{{ $i }}
                        </a>
                    </li>
                    @endfor

                    @if($paginator->currentPage() != $paginator->lastPage())
                    <li><a href="{{ $paginator->url($paginator->currentPage()+1) }}"
                        class="item{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                        >></a></li>
                        @endif
                    </nav></div>
                </td>
            </tr>
        </tfoot>

        @endif
