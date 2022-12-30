@extends('layouts.app')

@section('content')

    @if(Session::has('error'))
        <p class="text-danger">{{Session::get('error')}}</p>
    @endif

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

					<button>Login</button>
				</form>
			</div>

            <div class="loginSignUp">
                <label onclick="window.location='{{url('register')}}'">Sign up</label>
			</div>
	</div>
@stop