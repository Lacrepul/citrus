@extends('layouts.app')

@section('content')
    @auth
        @foreach ($UserCheckLists as $checkList)
            <div class="container mt-4">
                <div class="card mb-3">
                    <div class="card-body bg-light">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-6 text-center" style="margin: 0 auto;">
                                        <h5 class="card-title"><a href="{{ route('detail', $checkList->id) }}">{{$checkList->name}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 text-center">
                                {{$checkList->description}}
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        @endforeach
    @endauth
@endsection