
@include('layout.sidebar')

<style>
    .tripform {
        display: grid;
        grid-template-columns: 20% 70%;
        gap: 30px;
    }
</style>

@php
    $companies = App\Models\Company::all();
    $locations = App\Models\Location::all();
@endphp

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Trip</h4>

                <form class="tripform" action="{{ route('trip.edit',$trip->id) }}" method="POST">
                    @csrf

                    <label for="company_id">Company</label>
                    <select name="company_id" id="company_id" onchange="getBuses()" >
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>

                    <label for="location_id">Starting Location</label>
                    <select name="location_id" id="location_id" >
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->location }}</option>
                        @endforeach
                    </select>

                    <label for="destination_id">Destination</label>
                    <select name="destination_id" id="destination_id">
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->location }}</option>
                        @endforeach
                    </select>

                    <label for="bus_id">Bus</label>
                    <select name="bus_id" id="bus_id">
                        <!-- Options will be dynamically updated using JavaScript -->
                    </select>
                    <label for="">trip type</label>
                    <select name="service_id" id="service" value="2">
                        <option value="1">trip</option>
                        <option value="2">cargo</option>
                        <option value="3">both</option>
                    </select>

                    <label for="start_date">Starting Date</label>
                    <input type="date" name="start_date" value="{{$trip->start_date}}">

                    <label for="depart">Departs</label>
                    <input type="time" name="depart" value="{{$trip->depart}}">

                    <label for="estimated_date">Estimated Date</label>
                    <input type="date" name="estimated_date" value="{{$trip->estimated_date}}">

                    <label for="arrive">Arrive</label>
                    <input type="time" name="arrive" value="{{$trip->arrive}}">

                    <span></span>
                    <div class="control">
                        <input type="submit">
                        <button>Cancel</button>
                    </div>
                </form>

                <script>
                    function getBuses() {
                        var companyId = document.getElementById('company_id').value;
                        var url = '{{ route("getBuses", ":id") }}';
                        url = url.replace(':id', companyId);

                        // Make an AJAX request to fetch buses for the selected company
                        fetch(url)
                            .then(response => response.json())
                            .then(data => {
                                // Clear existing options
                        console.log(data)
                                var busSelect = document.getElementById('bus_id');
                                busSelect.innerHTML = '';

                                // Add new options based on the response
                                data.forEach(bus => {
                                    var option = document.createElement('option');
                                    option.value = bus.id;
                                    option.text = bus.address;
                                    busSelect.add(option);
                                });
                            });
                    }
                </script>
            </div>
        </div>
    </div>
</div>



<script>
   gg=document.getElementById('service')
   let xx= {{$trip->service_id}}
console.log('xx='+xx)
for (let i = 0; i < gg.options.length; i++) {
        if (gg.options[i].value == xx) {
            console.log(gg.options[i].value);
            gg.options[i].selected = true;
            break; // Break the loop once the correct option is found
        }
    }

    gg=document.getElementById('destination_id')
   xx= {{$trip->destination_id}}
console.log('xx='+xx)
for (let i = 0; i < gg.options.length; i++) {
        if (gg.options[i].value == xx) {
            console.log(gg.options[i].value);
            gg.options[i].selected = true;
            break; // Break the loop once the correct option is found
        }
    }

    gg=document.getElementById('location_id')
    xx= {{$trip->location_id}}
console.log('xx='+xx)
for (let i = 0; i < gg.options.length; i++) {
        if (gg.options[i].value == xx) {
            console.log(gg.options[i].value);
            gg.options[i].selected = true;
            break; // Break the loop once the correct option is found
        }
    }
</script>

    
   