
@if(\Illuminate\Support\Facades\Session::has("Success"))


<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Alert!</h5>
    {{\Illuminate\Support\Facades\Session::get("Success")}}
</div>

@endif


@if(\Illuminate\Support\Facades\Session::has("message"))


    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        {{\Illuminate\Support\Facades\Session::get("message")}}
    </div>

@endif


@if(\Illuminate\Support\Facades\Session::has("login_fail"))


    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        {{\Illuminate\Support\Facades\Session::get("login_fail")}}
    </div>

@endif


@if(\Illuminate\Support\Facades\Session::has("success_register"))


    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        {{\Illuminate\Support\Facades\Session::get("success_register")}}
    </div>

@endif
@if($errors->any())

    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        @foreach($errors->all() as $error)
            {{$error}} <br>
        @endforeach
    </div>
    @endif
