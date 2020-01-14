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
                                    <div class="col-6 text-center">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    </div>
                                    <div class="col-6 text-center">
                                    <h5 class="card-title"><a href="">{{$checkList->name}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 text-center">
                                {{$checkList->description}}
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        @endforeach
    @endauth
@endsection