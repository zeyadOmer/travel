@include('layout.sidebar')


    <!-- partial -->
   
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Buses
                </h3>
              
           
                <a href="{{route('bus.new')}}"> Add Bus</a>
            </div>

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Bus list</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>  Bus ID </th>
                                            <th> Company </th>
                                            <th>Driver </th>
                                            <th>Plate Number </th>
                                            <th>Color </th>
                                            <th>Manufacture </th>
                                            <th>Capacity </th>
                                            <th>Address </th>
                                        
                                            <th> <input type="text" placeholder="Search"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($buss as $bus )

                                        <tr>
                                            <td>
                                   
                                                {{-- <img src="{{Storage::url($company->logo) }}"  class="me-2"
                                                alt="image"> --}}
                                                {{$bus->id}}
                                            </td>
                                            <td>
                                                {{App\Models\Company::where('id',$bus->company_id)->value('name')}}

                                            </td>
                                            <td>
                                                {{$bus->driver_id}}
                                            </td>
                                          
                                            <td> {{$bus->plate}} </td>
                                            <td> {{$bus->color}} </td>
                                            <td>{{$bus->Manufacture}}</td>
                                            <td> {{$bus->capacity}} </td>
                                            <td> {{$bus->address}} </td>

                                            <td>   <i class="fa fa-eye fa-2x"></i>
                                                <a href="{{route('bus.edit.view',$bus->id)}}"><i class="fa fa-edit fa-2x"></i></a>
                                               <a href="{{route('bus.delete',$bus->id)}}"> <i class="fa fa-trash fa-2x"></i></a>
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