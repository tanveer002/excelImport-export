{{-- @if ($paginator->hasPages())
<ul class="flex justify-between">
    <!-- prev -->
    @if ($paginator->onFirstPage())
    <li class="btn btn-sm btn-success shadow border bg-secondary cursor-pointer col-2">Prev</li>
    @else
    <li class=" btn-sm btn-success shadow border bg-info cursor-pointer col-2" wire:click="previousPage">Prev</li>
    @endif
    <!-- prev end -->

    <!-- numbers -->
    @foreach ($elements as $element)
    <div class="flex">
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="btn-sm btn-success shadow border bg-info cursor-pointer col-2" wire:click="gotoPage({{$page}})">{{$page}}</li>
        @else
        <li class="btn-sm btn-success shadow border bg-info cursor-pointer col-2" wire:click="gotoPage({{$page}})">{{$page}}</li>
        @endif
        @endforeach
        @endif
    </div>
    @endforeach
    <!-- end numbers -->


    <!-- next  -->
    @if ($paginator->hasMorePages())
    <li class="btn-sm btn-success shadow border bg-info cursor-pointer col-2" wire:click="nextPage">Next</li>
    @else
    <li class="btn-sm btn-success shadow border bg-info cursor-pointer col-2">Next</li>
    @endif
    <!-- next end -->
</ul>
@endif
 --}}

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
  </nav>