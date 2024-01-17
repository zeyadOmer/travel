@include('layout.sidebar')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- partial -->
   
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Locations
                </h3>
              
           
                <a href="{{route('location.new')}}"> Add Location</a>
            </div>

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Location list</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>  image </th>
                                            <th> location </th>
                                            <th> station </th>
                                            <th> <input type="text" placeholder="Search"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($locations as $location )

                                        <tr>
                                            <td>
                                                <img src="{{ url("images/$location->image") }}" alt="Location Image"
                                                class="me-2"
                                                alt="image"> 
                                            </td>
                                            <td>
                                                {{$location->location}}
                                            </td>
                                            <td>
                                                {{$location->station}}
                                            </td>
                                            <td> 
                                                <a href="{{route('location.edit.view',$location->id)}}"><i class="fa fa-edit fa-2x"></i></a>
                                              <a href="{{route('location.delete',$location->id)}}">  <i class="fa fa-trash fa-2x"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                     
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  


@include('layout.footer')