<div class="container-fluid">
    <nav>
        <ul class="pagination">
            <li class="page-item">
                <a href="{{(($pagination['back']!='')?($pagination['url_page'].$pagination['back']):'')}}"
                   class="page-link"
                   aria-label="Previous">
                    <i class="icn icon-arrow_dropdown_left"></i>
                </a>
            </li>
            @foreach($pagination['listPages'] as $page)
                <li class="page-item {{ (($pagination['correntPage'] == $page)? 'active':'') }}"><a
                            href="{{$pagination['url_page']}}{{$page}}" class="page-link">{{$page}}</a>
                </li>
            @endforeach
            <li class="page-item">
                <a href="{{(($pagination['next']!='')?($pagination['url_page'].$pagination['next']):'')}}" class="page-link" aria-label="Next">
                    <i class="icn icon-arrow_dropdown_right"></i>
                </a>
            </li>
        </ul>
    </nav>
</div>