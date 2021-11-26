@if($paginator->hasPages())
<div class="col-sm-12 col-md-5">
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    <ul class="pagination">
                    @if(!$paginator->onFirstPage())  
                        <li class="paginate_button page-item previous" id="example2_previous">
                            <a href="{{$paginator->previousPageUrl()}}" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                        </li>
                    @endif
                    @if(is_array($elements[0]))
                        @foreach($elements[0] as $page=>$url)
                            <li class="paginate_button page-item">
                                <a href="{{$url}}" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">{{$page}}</a>
                            </li>
                        @endforeach
                    @endif 
                    @if($paginator->hasMorePages())  
                        <li class="paginate_button page-item next" id="example2_next">
                            <a href="{{$paginator->nextPageUrl()}}" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
</div>
@endif