@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{url('sendcode')}}" method="POST">
        @csrf

			<input type="text" name="email" placeholder="Please Enter Your Email Address" value="{{old('email')}}">
			@error('email')
                <span class="warning">{{$message}}</span>
            @enderror

			<button style="width: 70%;height: 40px;margin: 10px auto;justify-content: center;display: block;color: #fff;background: #573b8a;font-size: 1em;font-weight: bold;margin-top: 20px;outline: none;border: none;border-radius: 5px;transition: .2s ease-in;cursor: pointer;">Get Code</button>
		</form>
    </div>
@stop