@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form action="{{url('checkcode')}}" method="POST">
        @csrf
			<input type="number" name="code" placeholder="Please Enter the Code" value="{{old('code')}}">
			@error('code')
                <span class="warning">{{$message}}</span>
            @enderror

			<button value="{{$email}}" name="rowId" style="width: 70%;height: 40px;margin: 10px auto;justify-content: center;display: block;color: #fff;background: #573b8a;font-size: 1em;font-weight: bold;margin-top: 20px;outline: none;border: none;border-radius: 5px;transition: .2s ease-in;cursor: pointer;">Send Code</button>
		</form>
    </div>
@stop