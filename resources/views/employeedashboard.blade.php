<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>employee dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Employee Dashboard</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{route('home')}}">Back</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>EMAIL</th>
                    <th>ROLE</th>
                </tr>
            </thead>
            <tbody>
                @php 
                $i=0;
                @endphp
                @if (count($employees) > 0)
                @foreach ($employees as $employee)
                <tr>
                    <td>{{++$i}}</td>        
                    <td>{{$employee->name}}</td>        
                    <td>{{$employee->email}}</td>                
                    <td>{{$employee->role}}</td>       
                </tr>
                @endforeach
                @else
                <div style="text-align: center">
                    <tr>
                        <th rowspan="7">No Items To Show</th>
                    </tr>
                </div>
                @endif
            </tbody>
            <tbody>
                
            </tbody>
        </table>
    
    </div>
</body>
</html>
