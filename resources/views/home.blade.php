@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Dashboard</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('home') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Post Your Link</label>
                            <input type="text" class="form-control" name="link_url" id="link_url">
                        </div>
                        <div class="form-group text-center">    
                            <button type="submit" class="btn btn-success">Check the response time</button>
                        </div>
                    </form>
                </div>
            
            </div>
        </div>
    </div>
</div>
@endsection
