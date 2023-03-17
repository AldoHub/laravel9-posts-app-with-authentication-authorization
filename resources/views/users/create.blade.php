@extends("layout")
@section("content")

   
<div>
    <h2>Fill the form below to create an account</h2>

    <form action='/users' enctype='multipart/form-data' method="POST">
        @csrf
        <div class='form-control'>
            <label for="title">Username </label>
            <input type="text" name='name' id="name" value="{{old('name')}}" />  
            
            @error('username')
                <span class='error-message'>{{$message}}</span>
            @enderror
        </div>

        <div class='form-control'>
            <label for="title">Email </label>
            <input type="email" name='email' id="email" value="{{old('email')}}" />  
            
            @error('email')
                <span class='error-message'>{{$message}}</span>
            @enderror
        </div>

        <div class='form-control'>
            <label for="title">Password </label>
            <input type="password" name='password' id="password" />  
            
            @error('password')
                <span class='error-message'>{{$message}}</span>
            @enderror
        </div>

        <div class='form-control'>
            <label for="title">Confirm Password </label>
            <input type="password" name='password_confirmation' id="password_confirmation" />  
            
            @error('password_confirmation')
                <span class='error-message'>{{$message}}</span>
            @enderror
        </div>

        <input type="submit" value='Create Account'>

    </form>
</div>

@endsection