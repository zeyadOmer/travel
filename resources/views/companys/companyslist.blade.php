@include('layout.sidebar')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- partial -->
   
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Companys
                </h3>
              
           
                <a href="{{route('company.new')}}"> Add Company</a>
            </div>

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Companys list</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>  Company </th>
                                            <th> Services </th>
                                            <th>Address </th>
                                            <th>email </th>
                                            <th>phone </th>
                                        
                                            <th> <input type="text" placeholder="Search"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($companys as $company )

                                        <tr>
                                            <td>
                                   
                                                <img src="{{Storage::url($company->logo) }}"
                                                class="me-2"
                                                alt="image"> {{$company->name}}
                                            </td>
                                            <td>
                                                @if($company->service_id == 1)
                                                Trips
                                            @elseif($company->service_id == 2)
                                                Cargo
                                            @else
                                                Both
                                            @endif
                                            </td>
                                          
                                            <td> {{$company->address}} </td>
                                            <td> {{$company->email}} </td>
                                            <td> {{$company->phone}} </td>
                                            <td>   <i class="fa fa-eye fa-2x"></i>
                                                <a href="{{route('company.edit.view',$company->id)}}"><i class="fa fa-edit fa-2x"></i></a>
                                               <a href="{{route('company.delete',$company->id)}}"><i class="fa fa-trash fa-2x"></i></a>

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