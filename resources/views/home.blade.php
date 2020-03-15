@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome {{$user->name}}
                </div>
                <div class="card-body">
                    <post-component></post-component>
                </div>
                <div class="card-body">
                    <button class="btn btn-secondary">Leave a comment.</button>
                    <br><br>
                    <!-- Comment form -->
                    <div>
                        <form action="" method="post">
                            <div class="form-group">
                            <label>Comment</label>
                            <textarea class="form-control" id="comment" rows="3"></textarea>
                        </div>
                        <button class="btn btn-info" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
