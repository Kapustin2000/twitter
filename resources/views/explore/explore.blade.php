@extends('layouts.app')

@section('content')
    <explore-wall :users="{{$users}}"></explore-wall>
@endsection
