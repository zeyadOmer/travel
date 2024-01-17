<head>
    <title>Ticket</title>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap"> --}}

</head>
    <!-- partial -->
<style>
/* @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap"); */
body,
p,
h1 {
  margin: 0;
  padding: 0;
  font-family: "Open Sans", sans-serif;
}

body {
  font-family: 'Open Sans', sans-serif;
}

@page{
  size: A4;
  
}

.container{
  margin-left: 4%;

}


.container .basic {
  display: none;
}

.airline {
  display: block;
  height: 575px;
  width: 270px;
  border-radius: 25px;
  z-index: 3;
}
.airline .top {
  height: 220px;
  background: #ffcc05;
  border-top-right-radius: 25px;
  border-top-left-radius: 25px;
}
.airline .top h1 {
  text-transform: uppercase;
  font-size: 12px;
  letter-spacing: 2;
  text-align: center;
  position: absolute;
  top: 30px;
  left: 50%;
  transform: translateX(-50%);
}
.airline .bottom {
  background: #fff;
  border-bottom-right-radius: 25px;
  border-bottom-left-radius: 25px;
}

.top .big {
  position: absolute;
  top: 100px;
  font-size: 65px;
  font-weight: 700;
  line-height: 0.8;
}
.top .big .from {
  color: #ffcc05;
  text-shadow: -1px 0 #000, 0 1px #000, 1px 0 #000, 0 -1px #000;
}
.top .big .to {
  position: absolute;
  left: 32px;
  font-size: 35px;
  display: flex;
  flex-direction: row;
  align-items: center;
}
.top .big .to i {
  margin-top: 5px;
  margin-right: 10px;
  font-size: 15px;
}
.top--side {
  position: absolute;
  right: 35px;
  top: 110px;
  text-align: right;
}
.top--side i {
  font-size: 25px;
  margin-bottom: 18px;
}
.top--side p {
  font-size: 10px;
  font-weight: 700;
}
.top--side p + p {
  margin-bottom: 8px;
}

.bottom p {
  display: flex;
  flex-direction: column;
  font-size: 13px;
  font-weight: 700;
}
.bottom p span {
  font-weight: 400;
  font-size: 11px;
  color: #6c6c6c;
}
.bottom .column {
  margin: 0 auto;
  width: 100%;
  padding: 1rem .5rem;
}
table{
    text-align: left;
}
.bottom .row {
  display: flex;
  justify-content: space-between;
}
.bottom .row--right {
  text-align: right;
}
.bottom .row--center {
  text-align: center;
}
.bottom .row-2 {
  margin: 30px 0 60px 0;
  position: relative;
}
.bottom .row-2::after {
  content: "";
  position: absolute;
  width: 100%;
  bottom: -30px;
  left: 0;
  background: #000;
  height: 1px;
}

.bottom .bar--code {
  height: 50px;
  width: 80%;
  margin: 0 auto;
  position: relative;
}
.bottom .bar--code::after {
  content: "";
  position: absolute;
  width: 6px;
  height: 100%;
  background: #000;
  top: 0;
  left: 0;
  box-shadow: 10px 0 #000, 30px 0 #000, 40px 0 #000, 67px 0 #000, 90px 0 #000, 100px 0 #000, 180px 0 #000, 165px 0 #000, 200px 0 #000, 210px 0 #000, 135px 0 #000, 120px 0 #000;
}
.bottom .bar--code::before {
  content: "";
  position: absolute;
  width: 3px;
  height: 100%;
  background: #000;
  top: 0;
  left: 11px;
  box-shadow: 12px 0 #000, -4px 0 #000, 45px 0 #000, 65px 0 #000, 72px 0 #000, 78px 0 #000, 97px 0 #000, 150px 0 #000, 165px 0 #000, 180px 0 #000, 135px 0 #000, 120px 0 #000;
}

.info {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  bottom: 10px;
  font-size: 14px;
  text-align: center;
  z-index: 1;
}
.info a {
  text-decoration: none;
  color: #000;
  background: #ffcc05;
}
</style>






            <?php
            $route = App\Models\Trip::where('id', $ticket->trip_id)->first();
            if ($route) {
                $locationName = App\Models\Location::where('id', $route->location_id)->value('location');
                $destinationName = App\Models\Location::where('id', $route->destination_id)->value('location');
            } else {
                echo 'Trip not found';
            }
            ?>

    
             
                    <!-- partial:index.partial.html -->
                    <div class="container">
                    
                        
                    
                        <div class="ticket airline" style="box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.3);">
                            <div class="top">
                                <div class="big">
                                    <p class="from">{{ $locationName}}</p>
                                    <p class="to"><i class="fas fa-arrow-right"></i>{{$destinationName}}</p>
                                </div>
                               
                            </div>
                            <div class="bottom">
                                <div class="column">
                                        <table>
                                            <tr>
                                                <th><span>Trip</span></th>

                                            </tr>
                                            <tr>

                                            </tr>
                                            <td>
                                                00{{$ticket->trip_id}}
    
                                                    </td>
                                            <tr>
                                                <th>Boards</th>
                                                <th>Departs</th>
                                                <th>Arrives</th>
                                            </tr>
                                            <tr>
                                                <td>
                                        <p>10:25 AM</p>

                                                </td>
                                                <td>
                                        <p >{{$route->start_date}}</p>
                                                    
                                                </td>
                                                <td>
                                        <p >{{$route->estimated_date}}</p>

                                                </td>
                                            </tr>
                                            <tr>

                                            </tr>
                                     
                                   
                                     
                                            <tr>
                                                <th>Bus Company</th>
                                                <th>Level</th>

                                            </tr>
                                            <tr>
                                                <td>

                                            {{App\Models\company::where('id',$route->company_id)->value('name')}}
                                            <hr>

                                                </td>
                                                <td>
                                                    {{App\Models\Bus::where('id',$route->bus_id)->value('level')}}
                                            <hr>

                                                </td>
                                   
                                            </tr>
                                            <tr>
                                                <th>Passenger</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    {{App\Models\user::where('id',$ticket->customer_id)->value('name')}}
                                                    badri hago  
                                                </td>
                                            </tr>
                                            
                                        
                                        </table>
                                      
                                        
                                      
                                 
                                    </div>
                                </div>
                                <div class="" style="position: absolute;left: 120px;"><img src="data:image/png;base64,{{ base64_encode($ticket->barcode) }}" height="100px" width="100px" alt=""></div>


                                {{-- <div class="bar--code"><img src="{{$ticket->barcode}}" alt=""></div> --}}
                            </div>
                        </div>
                    
                    
                    
                    </div>
                    <!-- partial -->
        
               
                    
            </div>
  

