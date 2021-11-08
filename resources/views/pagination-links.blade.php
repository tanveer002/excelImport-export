
<nav aria-label="Page navigation example">
    @if ($paginator->hasPages())
        <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="page-item">
                <a class="page-link" wire:click="previousPage" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
                </a>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" wire:click="previousPage" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
                </a>
            </li>
        @endif
 
   
    @foreach ($elements as $element)
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item"><a class="page-link" wire:click="gotoPage({{$page}})">{{$page}}</a></li>
                @else
                    <li class="page-item"><a class="page-link" wire:click="gotoPage({{$page}})">{{$page}}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
      
    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" wire:click="nextPage">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
            </a>
        </li>
        @else
        <li class="page-item">
            <a class="page-link" >
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
            </a>
        </li>
    @endif
    </ul>
    @endif
  </nav>