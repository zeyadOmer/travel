@include('layout.sidebar')

<style>
    .tripform{
        display: grid;
        grid-template-columns: 20% 70%;
        gap: 30px
    }
</style>

@php
                        $companies = App\Models\Company::get();
                        $drivers=App\Models\Driver::get()
    
@endphp

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Add Bus</h4>

                <form class="tripform" action="{{route('bus.add')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <label for="">company name</label>
                    <select name="company" id="">
                        @foreach ($companies as $company)
                        <option value="{{$company->id}}"> {{$company->name}} </option>
                            @endforeach
                    </select>
                  
                    <label for="">Address</label>
                    <input type="text" name="address">
              
                    <label for="">plate number</label>
                    <input type="text" name="plate">
                    <label for="">color</label>
                    <input type="text" name="color">
                    
                    <label for="">Manufacturer</label>
                    <input type="text" name="manufacturer">
                    
                    <label for="">capacity</label>
                    <input type="text" name="capacity">
                    
                    <label for="">class</label>
                    <select name="level" id="">
                        <option value="1">Economey</option>
                        <option value="2">Vip</option>
                        <option value="3">star</option>
                    </select>

                        <label for="">Driver</label>
                        @foreach ($drivers as $driver)
                            
                        <select name="driver" id="">
                            <option value="{{$driver->id}}">{{$driver->name}}</option>
                        </select>
                        @endforeach
                        
                        <span></span>
                        <div class="control">
                        <input type="submit">
                        <button>Cancel</button>
                    </div>
                </form>



            </div>

        </div>
    </div>


</div>

