@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         <tweets :tweets="{{$tweets}}"></tweets>
    </div>
</div>
@endsection
