@extends('master')

@section('content')

    <div class="content">

        <div style="margin-left: 30px">
            <a href="{{asset('/survey_list')}}" class="btn btn-success">SURVEY LIST</a>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                        <div class="card card-profile">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">{{$survey->title}}</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-description">
                                    {{$survey->description}}
                                </p>
                            </div>
                        </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Surveys conducted</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                <th>Id</th>
                                <th>Ip Address</th>
                                <th>Created At</th>
                                <th>View</th>
                                </thead>
                                <tbody>
                                @foreach($surveys as $survey)
                                    <tr>
                                        <td>{{$survey->id}}</td>
                                        <td>{{$survey->ip}}</td>
                                        <td>{{$survey->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{asset('/survey_result_/'.$survey->id)}}" class="btn btn-success btn-round">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                @if(count($surveys) == 0)
                                    <tr>
                                        <td>No surveys found</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection