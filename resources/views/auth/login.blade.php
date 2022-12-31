@extends('layouts.app')

@section('content')
    <div class="container main mt-5 mb-5" style="height:550px;">  	
			<div class="login">
				<form action="{{url('login')}}" method="POST">
                    @csrf
					<label for="chk" aria-hidden="true">Login</label>

					<input type="text" name="email" placeholder="Email" value="{{old('email')}}">
					@error('email')
                        <span class="warning">{{$message}}</span>
                    @enderror

                    <input type="password" name="lpassword" placeholder="Password" value="{{old('lpassword')}}">
                    
                    @error('lpassword')
                        <span class="warning">{{$message}}</span>
                    @enderror

					<button style="width: 70%;height: 40px;margin: 10px auto;justify-content: center;display: block;color: #fff;background: #573b8a;font-size: 1em;font-weight: bold;margin-top: 20px;outline: none;border: none;border-radius: 5px;transition: .2s ease-in;cursor: pointer;">Login</button>
				</form>
			</div>

            <div class="loginSignUp">
                <label onclick="window.location='{{url('register')}}'">Sign up</label>
			</div>
	</div>
@stop