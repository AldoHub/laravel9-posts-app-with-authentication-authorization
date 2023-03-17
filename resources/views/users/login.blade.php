@extends("layout")
@section("content")

   
<div>
    <h2>Login to your account</h2>

    <form action='/users/authenticate' enctype='multipart/form-data' method="POST">
        @csrf
      
        <div class='form-control'>
            <label for="title">Email </label>
            <input type="email" name='email' id="email" value="{{old('email')}}" />  
            
            @error('email')
                <span class='error-message'>{{$message}}</span>
            @enderror
        </div>

        <div class='form-control'>
            <label for="password">Password </label>
            <input type="password" name='password' id="password" />  
            
            @error('password')
                <span class='error-message'>{{$message}}</span>
            @enderror
        </div>

      

        <input type="submit" value='Login'>

    </form>
</div>

@endsection