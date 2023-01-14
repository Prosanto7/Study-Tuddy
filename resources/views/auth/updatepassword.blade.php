@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{url('update')}}" method="POST">
        @csrf
                    <input type="password" name="rpassword" placeholder="Password" value="{{old('rpassword')}}">
                    @error('rpassword')
                        <span class="warning">{{$message}}</span>
                    @enderror

                    <input type="password" name="repassword" placeholder="Re-enter Password" value="{{old('repassword')}}">
                    @error('repassword')
                        <span class="warning">{{$message}}</span>
                    @enderror

			<button name="rowId" value="{{$email}}" style="width: 70%;height: 40px;margin: 10px auto;justify-content: center;display: block;color: #fff;background: #573b8a;font-size: 1em;font-weight: bold;margin-top: 20px;outline: none;border: none;border-radius: 5px;transition: .2s ease-in;cursor: pointer;">Reset Password</button>
		</form>
    </div>
@stop