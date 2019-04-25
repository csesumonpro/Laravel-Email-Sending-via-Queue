
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <img class="card-img-top" src="holder.js/100x180/" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Admin Dashboard</h4>
                        <p class="card-text">{{auth()->user()->name}} - <a href="{{route('admin.logout')}}">Logout</a></p>
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
                <div class="col-md-12">
                    <div class="card">
                       
                        <ul class="list-group list-group-flush">
                            @foreach (auth()->user()->notifications as $notification)
                        <li class="list-group-item">{{strtoupper($notification->data['name'])}} Registered Now </li>
                            @endforeach    
                            
                            
                        </ul>
                    </div>
                </div>
          </div>
         
    </div>
    
</body>
</html>