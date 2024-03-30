@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

                    <div style="text-align: center">
                        <h1>welcome admin </h1>
                        <h1>go to dashboard from link below </h1>
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{route('admin.dashboard')}}">DashBoard</a>
                        </div>
                    </div>
                    
    </div>
</div>
@endsection
