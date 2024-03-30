@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

                    @if(session()->has('error'))
                    <div class="alert alert-success" role="alert" style="color:red;background-color:whitesmoke">
                        {{ session('error') }}
                    </div>
                    @endif
                    <div style="text-align: center">
                        <h1>welcome to employee dashboard</h1>
                        <h1>go to dashboard from link below </h1>
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{route('employee.home')}}">DashBoard</a>
                        </div>
                    </div>
</div>
</div>
@endsection
