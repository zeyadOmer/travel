@include('layout.sidebar')

    <!-- partial -->
   





    <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Trips
                </h3>
                <a href="{{route('ticket.new')}}"> Add ticket</a>
            </div>

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Tickets list</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>  customer name </th>
                                            <th> Route </th>
                                         
                                            <th> Trip start </th>
                                            <th> Estimated </th>
                                            <th> Controls </th>
                                            <th> <input type="text" placeholder="Search"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as $trip)
                                        <tr>
                                            <td>
                                                <img src="{{asset('images/faces/face1.jpg')}}"  class="me-2"
                                                alt="image"> 
                                                {{App\Models\user::where('id',$trip->customer_id)->value('name')}}
                                            </td>
                                           <td>
                                            <?php
                                            $route = App\Models\Trip::where('id', $trip->trip_id)->first();
                                            if ($route) {
                                                $locationName = App\Models\Location::where('id', $route->location_id)->value('location');
                                                $destinationName = App\Models\Location::where('id', $route->destination_id)->value('location');
                                                echo $locationName . ' -- ' . $destinationName;
                                            } else {
                                                echo 'Trip not found';
                                            }
                                            ?>

                                          
                                            <td> {{$route->start_date}}</td>
                                            <td> {{$route->estimated_date}}</td>
                                            <td>
                                                <a href="{{route('ticket.view',$trip->id)}}" target="[]"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('ticket.pdf',$trip->id)}}">
                                                    <i class="fa fa-file-o"></i>
                                                
                                                </a>
                                                <i class="fa fa-edit"></i>
                                               <a href="{{route('ticket.delete',$trip->id)}}"> <i class="fa fa-trash"></i></a>
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