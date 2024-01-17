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
                <h4 class="card-title"> Add Company</h4>

                <form class="tripform" action="{{route('company.add')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <label for="">company name</label>
                    <input type="text" name="name">
                    <label for="">Services</label>
                    <select name="Services" id="">
                        <option value="1" >trips</option>
                        <option value="2">cargo</option>
                        <option value="0">both</option>
                    </select>
                    <label for="">Address</label>
                    <input type="text" name="address">
              
                    <label for="">phone</label>
                    <input type="text" name="phone">
                    <label for="">email</label>
                    <input type="text" name="email">
              
                    <label for="">Logo</label>
                    <input type="file" name="logo">
              

                        
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

