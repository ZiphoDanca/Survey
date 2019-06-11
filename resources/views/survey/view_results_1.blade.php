@extends('master')

@section('content')

    <div class="content">

        <div style="margin-left: 30px">
            <a href="{{asset('/all_surveys_conducted/'.$userSurvey->surveyID)}}" class="btn btn-success">BACK</a>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Surveys result</h4>
                        </div>
                        <div class="card-body">
                            @foreach($survey as $key )
                                <label for="exampleFormControlSelect1">{{$key->question}}</label>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" checked>
                                        {{$key->answer}}
                                        <span class="circle">
                                       <span class="check"></span>
                                    </span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection