@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
@if ($message = Session::get('success'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ $message }}
        </div>
    </div>
</div>
@endif
@if ($message = Session::get('error'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ $message }}
        </div>
    </div>
</div>
@endif