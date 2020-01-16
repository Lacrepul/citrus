@extends('layouts.app')

@section('content')
@foreach ($details as $detail)

{{$detail->id}}
@endforeach
@endsection