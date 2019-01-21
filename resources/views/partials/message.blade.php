<div>

    @if(session()->has('success'))
        <div class="alert alert-success alert-styled-left">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            {{session()->get('success') }}
        </div>
    @endif


    @if(session()->has('error'))
        <div class="alert alert-danger alert-styled-left">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            {{ session()->get('error') }}
        </div>
    @endif



</div>