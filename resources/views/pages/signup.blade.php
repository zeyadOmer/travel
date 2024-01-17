@include('pages.layout.navbar')

<style>
    input{
        height: 50px;
    }

    .container{
        width: 450px;
    }
.form {
    display:flex;
    flex-direction: column;
    gap: 30px;
    width: 100%,;
    margin-Top:1px;
  }
  .submit{
    border: none;
    font-size: 2rem;
    border-radius: 5px;
    margin: 3, 0, 2;
    background-Color:#fb0102;
    color:white;
    cursor: pointer;
  },
</style>

<div style="background-Color:rgba(51, 51, 51, 0.01)">
    <div  class=container style="margin-Top:0px;padding-Top:85px;padding-Bottom:85px;">
        <h1 variant="h5" style="text-Align:center">
          تسجيل حساب
        </h1>
        <form action="{{route('user.add')}}" method="POST" class="form">
            @csrf
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
         
            placeholder="phone number"
           
          />
          <input type="text"
            variant="outlined"
            margin="normal"
            required
            fullWidth
            name="phone"
         
            placeholder="Full name"
           
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
             تسجيل 
          </button>
          <input type="hidden" name="type" value="customer" >
          <input type="hidden" name="company_id" value="" >
        </form>
      </div>
    </div>














@include('pages.layout.footer')