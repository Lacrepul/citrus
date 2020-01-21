@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <a class="btn btn-success" href="{{ route('detailCreate', $str->id) }}">create details</a>
</div>
    @foreach ($details as $detail)
    <div id="mainDiv">
        <div class="container mt-4">
            <div class="card mb-3">
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6 text-center">
                                    <input type="checkbox" class="form-check-input" id="mainCheck" value="{{ $detail->id }}">
                                </div>
                                <div class="col-6 text-center">
                                    <h5 class="card-title">{{ $detail->detailName }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-right" style="margin-left:100px;">
                            <input id='detailId' type="button" class='btn btn-default' value="details..."></input>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div hidden class="container" id='containerId'>
            <div class="col text-center" id="placeForTextId" value="{{ $detail->id }}">
                <div id="description" style="word-wrap: break-word;">
                    {{ $detail->description }}
                </div>
                @if($detail->secondary_input0 != null)
                    <div class="alert alert-secondary">
                        <div class='row'>
                            <div class='col-1'>
                                <input type="checkbox" id="secondCheck" value="{{ $detail->id }}"></input>
                            </div>
                            <div class="col-10 text-left">
                                {{ $detail->secondary_input0 }}
                            </div>
                        </div>
                    </div>
                @endif

                @if($detail->secondary_input1 != null)
                    <div class="alert alert-secondary">
                        <div class='row'>
                            <div class='col-1'>
                                <input type="checkbox" id="secondCheck"  value="{{ $detail->id }}"></input>
                            </div>
                            <div class="col-10 text-left">
                                {{ $detail->secondary_input1 }}
                            </div>
                        </div>
                    </div>
                @endif

                @if($detail->secondary_input2 != null)
                    <div class="alert alert-secondary">
                        <div class='row'>
                            <div class='col-1'>
                                <input type="checkbox" id="secondCheck"  value="{{ $detail->id }}"></input>
                            </div>
                            <div class="col-10 text-left">
                                {{ $detail->secondary_input2 }}
                            </div>
                        </div>
                    </div>
                @endif

                @if($detail->secondary_input3 != null)
                    <div class="alert alert-secondary">
                        <div class='row'>
                            <div class='col-1'>
                                <input type="checkbox" id="secondCheck"  value="{{ $detail->id }}"></input>
                            </div>
                            <div class="col-10 text-left">
                                {{ $detail->secondary_input3 }}
                            </div>
                        </div>
                    </div>
                @endif

                @if($detail->secondary_input4 != null)
                    <div class="alert alert-secondary">
                        <div class='row'>
                            <div class='col-1'>
                                <input type="checkbox" id="secondCheck"  value="{{ $detail->id }}"></input>
                            </div>
                            <div class="col-10 text-left">
                                {{ $detail->secondary_input4 }}
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    @endforeach


@endsection