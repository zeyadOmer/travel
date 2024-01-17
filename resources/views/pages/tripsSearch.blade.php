<title>Trip Search</title>
@include('pages.layout.navbar')


<!-- Materialize CSS CDN -->


@php
    
    $companys=App\Models\Company::all();
    $locations=App\Models\Location::all();


@endphp
<div class="bigContainer" dir="rtl">
    <div class="overlay"></div>
    <div class="searchBox">
        <h2>
            إحجز تذكرة رحلتك<span style="color:#F99A0E"> الآن ..!</span>
        </h2>
        <p>
            إبحث عن افضل الحجوزات سعرا ووقتا
        </p>

        <div class="searchContainer">
            <form action="{{route('trips.search')}}" method="POST">
                @csrf
            <div class="searchSeactionOne">
                <div>
                    بحث عن رحلات الحافلات
                </div>
                <div>
                    <label>
                        <input type="radio" value="cargo" 
                           />
                        ارسال طرود
                    </label>
                    <label>
                        <input type="radio" value="trip"
                           />
                        حجز تذكرة
                    </label>
                </div>
            </div>
            <div class="searchSeactionTwo">
                <select class="form-control" placeholder='from' name="location[location]">
                 @foreach ($locations as $location)
                     <option value="{{$location->id}}">{{$location->location}}</option>
                 @endforeach
                </select>
                <select class="form-control"  name="location[destination]">
                    @foreach ($locations as $location)
                     <option value="{{$location->id}}">{{$location->location}}</option>
                 @endforeach 
                </select>
                <input type="date" class='form-control' placeholder='تاريخ الحجز' name="location[date]"></input>
                <button
                    style="background-Color:#fb0102; color:white; border:none; border-radius:2px; padding:10px 25px;"
                    type="submit">بحث</button>
            </div>
        </div>
    </div>
</div>

<style>
    .c{
        
    display: flex;
    flex-direction: row-reverse;
    text-align: right;
    justify-content: space-around;
    float: right;
    width: 350px;
        height: 100vh;;
    }
    .filter{
        margin-top: 100px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        }
        .com{
            display: grid;
            grid-template-columns: 80% 10%;
            gap: 10px;
            font-size: medium;
            justify-content: flex-end;
        }
        .com input[type=checkbox]{
            color: rgba(128, 128, 128, 0.322)
        }
        .com label{
            color: rgba(128, 128, 128, 0.829)
        }
        .list{
          
            display:flex ;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .trip-card{
            margin: auto;
            margin-top: 8vh;
            width: 90%;
            justify-content: space-around;
            align-items: center;
            direction: rtl;
            display: flex;
        }
        .duration{
            position: absolute;
            color: gray;
            display: flex;
            justify-content: center;
        }
        .duration strong{
            display: flex;
            align-items: center;
            vertical-align: middle
        }
        .details{
            display: flex;
            width: 60%;
            justify-content: space-around;
            border:  dotted rgba(128, 128, 128, 0.36);
            border-radius: 15px;
            gap: 30px;
            padding: 30px;


        }
        .time{
            display: flex;
            justify-content: space-around;
            width:100%;
        }
        .details .right{
            display: flex;
            flex-direction: column;
            align-items: flex-start;

        }
        .details  hr{
            border: 1px solid rgba(128, 128, 128, 0.322);
            width: 100%;
            float: left;
        }
        .details .left{
            display: flex;
            flex-direction: column;
            align-items: flex-end;

        }
        .trip-card img{
            border-radius: 10px;
            max-height: 100px;
            max-width: 100px;
            min-height: 100px;
            min-width: 100px;
            object-fit: contain;
        }
        .details:hover{
            box-shadow:  0px 0px 10px #fb0102;
            border-color: #fb0102;
            color: #fb0102;
            cursor: pointer;
        }
       .reserve{
        margin: auto;
            color: gray;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 40%;
            color: #fff;
            background: #fb0102;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            cursor: pointer;
            display: none;
            transition: all 0.5s ease-in-out;

       }
       .reserve:hover{
        box-shadow:  0px 0px 10px #fb0102;
       }
       .reserve a{
       color: #fff;
       font-size: large;
       }
</style>

<div class="c">
    <div class="filter">
        <form action="">
        @csrf

            <div class="mdc-slider mdc-slider--range">
                <input class="mdc-slider__input" type="range" min="0" max="70" value="30" name="rangeStart" aria-label="Continuous range slider demo">
                <input class="mdc-slider__input" type="range" min="30" max="100" value="70" name="rangeEnd" aria-label="Continuous range slider demo">
                <div class="mdc-slider__track">
                  <div class="mdc-slider__track--inactive"></div>
                  <div class="mdc-slider__track--active">
                    <div class="mdc-slider__track--active_fill"></div>
                  </div>
                </div>
                <div class="mdc-slider__thumb">
                  <div class="mdc-slider__thumb-knob"></div>
                </div>
                <div class="mdc-slider__thumb">
                  <div class="mdc-slider__thumb-knob"></div>
                </div>
              </div>
            <h4>الشركات</h4>


              <div class="com">
                @foreach ($companys as $com)
                    
                <label for="">  {{$com->name}}</label>
                <input type="checkbox" name="" id="" checked>
                @endforeach
                
              </div>
              <h4>ساعة الانطلاق</h4>
              <div class="com">
                <label for=""> الصباح الى 11:00</label>
                <input type="checkbox" name="" id="" checked>
                <label for=""> الظهيرة من 11:00 الى 15:00 </label>
                <input type="checkbox" name="" id="">
                <label for="">  المساء من 15:00 الى 22:00</label>
                <input type="checkbox" name="" id="">
          
              </div>
        </form>
    </div>
</div>


@foreach ($trips as $trip)
    

<div class="list">
    
    <div class="trip-card" id="trip-card" onclick="gg({{$loop->index}})">
        <img src="{{Storage::url(App\Models\Company::find($trip->company_id)->getAttribute('logo')) }}" alt="">
     
        <div class="details">
          
            <div class="duration">
                <strong>
                    <span class="material-symbols-outlined">
                        schedule
                        </span>
                    2h20
                    
                </strong>
            </div>
          
            <div class="right">
                <div class="time">
                    <h4>{{ \Carbon\Carbon::parse($trip->departs)->format('H:i') }}</h4>

                </h4>
                <hr>

            </div>
                <small> <span class="material-symbols-outlined">
                    location_on
                    </span> {{App\Models\Location::find($trip->location_id)->value('location')}} -- {{App\Models\Location::find($trip->location_id)->value('station')}}  </small>
                <small>رحلة غير مباشرة - 3 ساعات توقف </small>
            </div>
            <div class="left">
                <div class="time">
            <hr style="float:right">

            <h4>{{ \Carbon\Carbon::parse($trip->arrive)->format('H:i') }}</h4>

                 </div>
                 <small> <span class="material-symbols-outlined">
                    location_on
                </span> {{App\Models\Location::find($trip->destination_id)->value('location')}} -- {{App\Models\Location::find($trip->destination_id)->value('station')}}  </small>

            </div>
          
        </div>
      
        <h2>{{$trip->price}} OMR</h2>
    </div>
    <div class="reserve"  id="{{$loop->index}}">
        <a href="">احجز</a>
    </div>
    
   
</div>
@endforeach


<script>
function gg(id) {
    document.getElementById(id).style.display = 'flex';
}

</script>

<div class=""style="margin-top:20vh"></div>


@include('pages.layout.footer')