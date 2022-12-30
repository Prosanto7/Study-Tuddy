@extends('layouts.app')

@section('content')

    @if(Session::has('error'))
        <p class="text-danger">{{Session::get('error')}}</p>
    @endif

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

					<button>Sign up</button>
				</form>
			</div>
	</div>
@stop