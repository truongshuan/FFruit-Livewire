@if ($paginator->hasPages())
<div class="pagination-wrap">
    <ul>
        @if ($paginator->onFirstPage())
        <li><a href="javascript:;" class="" wire:click="previousPage">Prev</a></li>
        @else
        <li><a href="javascript:;" class="disable" wire:click="previousPage">Prev</a></li>
        @endif
        @foreach ($elements as $element)
        @if (is_string($element))
        <li><a href="javascript:;">{{
                $element }}</a></li>
        @endif
        @if (is_array($element))
        @foreach ($element as $page=>$url)
        @if ($page == $paginator->currentPage())
        <li><a class="" href="javascript:;" wire:click=" gotoPage({{$page}})">{{
                $page }}</a></li>
        @else
        <li><a class="" href="javascript:;" wire:click="gotoPage({{$page}})">{{
                $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach
        @if ($paginator->hasMorePages())
        <li><a href="javascript:;" wire:click="nextPage">Next</a></li>
        @else
        <li><a href="javascript:;" class="disable">Next</a></li>
        @endif
    </ul>
</div>
@endif