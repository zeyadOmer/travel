@include('layout.sidebar')

<style>
    .tripform{
        display: grid;
        grid-template-columns: 20% 70%;
        gap: 30px
    }
</style>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Add Location</h4>

                <form class="tripform" action="{{route('location.edit',$location->id    )}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <label for="">Location name</label>
                    <input type="text" name="location" value="{{$location->location}}">
                    <label for="">Station</label>
                    <input type="text" name="station" id="" value="{{$location->station}}">
                      
                    <label for="">image</label>
                    <input type="file" name="image">
              
              

                        
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

