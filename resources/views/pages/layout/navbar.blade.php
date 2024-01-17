<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Add this inside the <head> section of your layout file -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <style>
        .gg{
            display: flex;
            justify-content: space-around;
            gap: 20px;
        }
        .gg img{
            height: 44px;
            width: 44px;
            border-radius: 50%;
        }
        .gg a{
            display: flex;
            margin: auto;
            align-items: center;
            gap: 20px;
            justify-content: space-between;
        }
     
    </style>

@php
    if (session()->has('user')) {
    // Key exists, do something
$user=session('user');
}

@endphp



<body>

    <nav class="navbar navbar-expand-lg">

        <div class="container-fluid">
            <div class="gg">
                <a href="#" class="nav-link">
                   
                    @if (session()->has('user'))
                    <div class="nav-profile-image">
                        <img src="http://127.0.0.1:8000/images/faces/face1.jpg" alt="profile">
                        <span class="login-status online"></span>
                        <!--change to offline or busy as needed-->
                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2">{{$user->name}}</span>
                        <span class="text-secondary text-small"></span>
                    </div>
                </a>
       
                <a class="btn" href="{{route('logout')}}" style="background-color: rgb(251, 1, 2); color: white;"> تسجيل الخروج</a>
            </a>
            @else
            <a class="btn "  href="{{route('signup')}}"
            style="color: rgb(251, 1, 2); border: 1px solid rgb(251, 1, 2);"> اظافة حساب</a>

            <a class="btn" href="{{route('login')}}" style="background-color: rgb(251, 1, 2); color: white;"> تسجيل الدخول</a>
        </a>
                @endif

        
             <a class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon">
                </span>
            </a>
         
        </div>
            <div class="navbar" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="flex-direction: row-reverse;">
                    <li class="nav-item"><a class="nav-link" href="/admin/trip_packages"> الرئيسية</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/trip_tickets"> كيف نعمل</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/trips"> شركاء النجاح</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/users"> اقوال العملاء</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/drivers"> الاسئلة الشائعه</a></li>
                </ul>
              
             </div>
             <span class="navbar-text"><a class="nav-link" href="/">
                <img
                src="data:image/png;base64,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"
                alt="Logo" style="width: 100px;"></a></span>
        </div>

            </div>
    </nav>
