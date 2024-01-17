@include('layout.sidebar')

<!-- Minified version -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Slim version (without AJAX and effects) -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>

<!-- partial -->
@php
    $customers = App\Models\User::all();  // Note: Corrected the model name
    $locations = App\Models\Location::all();
    $trips;
@endphp
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

var tid=null;
    function gg(id){
        if(tid==null)
        tid=id;
        document.getElementById('trip_id').value = tid;
        document.getElementById(id).style.backgroundColor = "gray";


        console.log(tid);
        

    }
    function setTrips(event, location,destination) {
        event.preventDefault();
        if (confirm('Are you sure you want to delete this career?')) {
            $.ajax({
                type: 'post',
                url: '{{ route('trip.search2') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'location': location,
                    'destination': destination,
                },
                success: function (response) {
                    console.log(response);

                    // Clear the existing table body
                    $('#gg tbody').empty();

                    // Iterate through the response and add new rows
                    $.each(response, function (index, trip) {
                        var newRow = '<tr + id="'+trip.id+'" + onclick="gg('+trip.id+')"> +' +
                            '<td >' + trip.company.name + '</td>' +
                            '<td>' + trip.location.location +'--'+trip.destination.location + '</td>' +
                            '<td><label class="badge badge-gradient-success">' + trip.status + '</label></td>' +
                            '<td>' + trip.start_date + '</td>' +
                            '<td>' + trip.depart + '</td>' +
                            '<td>' + trip.arrive + '</td>' +
                            '<td>' + trip.estimated_date + '</td>' +
                            '<td>' +
                            '</td>' +
                        '</tr>';

                        $('#gg tbody').append(newRow);
                    });
                },
                error: function (error) {
                    console.error(error);
                    alert('Error finding trips');
                }
            });
        }
    }
</script>


<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Add Ticket</h4>

                {{-- Uncomment the form and update the onclick function --}}
                <form class="tripform" action="{{ route('ticket.add') }}" method="POST">
                    @csrf
                    <label for="">location</label>
                    <select name="location" id="location">
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->location }}</option>
                        @endforeach
                    </select>
                    <label for="">destination</label>
                    <select name="destination" id="destination">
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->location }}</option>
                        @endforeach
                    </select>
                    
                    <div class="control">
                        <button onclick="setTrips(event, $('#location').val(), $('#destination').val())">search trips</button>

                    
                    </div>
                {{-- </form> --}}

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Trips list</h4>
                <div class="table-responsive">
                    <table class="table" id="gg">
                        <thead>
                            <tr>
                                <th> Company </th>
                                <th> Route </th>
                                <th>Status </th>
                                <th> Trip start </th>
                                <th> departs </th>
                                <th> arrive </th>
                                <th> Estimated </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table body content -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> new customer</h4>

                {{-- <form action="{{route('user.add')}}" method="POST" class="form"> --}}
                    @csrf
                    <div class="form" style="display: flex;flex-direction:column;gap:30px">
                  <input type="email"
                    variant="outlined"
                    margin="normal"
                    required
                    fullWidth
                    id="email"
                    label="email"
                    name="email"
                    placeholder=Email
                 
                  />
                  <input type="text"
                    variant="outlined"
                    margin="normal"
                    required
                    fullWidth
                    name="name"
                 
                    placeholder=" full name"
                   
                  />
                  <input type="text"
                    variant="outlined"
                    margin="normal"
                    required
                    fullWidth
                    name="phone"
                 
                    placeholder="phone "
                   
                  />
        
                  <select name="gender" id="">
                    <option value="male">male</option>
                    <option value="female">female</option>
                  </select>
                  <input type="password"
                    variant="outlined"
                    margin="normal"
                    required
                    fullWidth
                    name="password"
                    label="Password"
                    type="password"
                    id="password"
                    placeholder=password
                   
                  />
                  <input type="password"
                    variant="outlined"
                    margin="normal"
                    required
                    fullWidth
                 
                    type="password"
                 
                    placeholder="Retype password"
                   
                  />
                  <button
                    type="submit"
                    fullWidth
                    variant="contained"
                    class="submit"
                  >
                     save ticket 
                  </button>
                  <input type="hidden" name="type" value="customer" >
                  <input type="hidden" name="company_id" value="" >
                  <input type="hidden" name="trip_id" id="trip_id" value="" >
                </div>
                </form>

            </div>
        </div>
    </div>
</div>



@include('layout.footer')
