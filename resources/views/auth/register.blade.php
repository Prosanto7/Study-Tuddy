@extends('layouts.app')

@section('content')
    <div class="container main mt-5 mb-5" style="height:800px;">  	
            <div class="login">
                <label style="transform: scale(.6);" onclick="window.location='{{url('login')}}'">Login</label>
			</div>

            <div class="signup">
				<form action="{{url('register')}}" method="POST">
                    @csrf
					<label for="chk" aria-hidden="true">Sign up</label>

					<input type="text" name="name" placeholder="Name" value="{{old('name')}}">
                    @error('name')
                        <span class="warning">{{$message}}</span>
                    @enderror

					<input type="text" name="email" placeholder="Email" value="{{old('email')}}">
                    @error('email')
                        <span class="warning">{{$message}}</span>
                    @enderror

					<input type="password" name="rpassword" placeholder="Password" value="{{old('rpassword')}}">
                    @error('rpassword')
                        <span class="warning">{{$message}}</span>
                    @enderror

                    <input type="password" name="repassword" placeholder="Re-enter Password" value="{{old('repassword')}}">
                    @error('repassword')
                        <span class="warning">{{$message}}</span>
                    @enderror

					<button style="width: 70%;height: 40px;margin: 10px auto;justify-content: center;display: block;color: #fff;background: #573b8a;font-size: 1em;font-weight: bold;margin-top: 20px;outline: none;border: none;border-radius: 5px;transition: .2s ease-in;cursor: pointer;">Sign Up</button>
				</form>
			</div>
	</div>
@stop