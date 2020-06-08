<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert @if (session()->has('message-type'))alert-{{session('message-type')}}@endif alert-dismissible">
                 {{session('message')}}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
            </div>
        </div>
    </div>
</div>
