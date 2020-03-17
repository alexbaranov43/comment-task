@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Discussion Board</div>

                <div class="card-body welcome">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome {{$user->name}}
                </div>
                <div class="card-body">
                <post-component :name="{{Auth::user()}}"></post-component>
                </div>
    </div>
</div>
<script src="moment.js"></script>
<script>
    moment().format();
</script>
@endsection
