@extends('master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Edit Survey</h4>
                        </div>
                        <div class="card-body">
                            <form id="createSurveyForm" method="POST" action="{{asset('/edit_survey/'.$survey->id)}}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Tittle</label>
                                            <input type="text" class="form-control" name="title" id="title" value="{{$survey->title}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="bmd-label-floating"> Description</label>
                                                <textarea class="form-control" rows="5" name="description" id="description">{{$survey->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row" id="DurationTime">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating">Duration Time</label>
                                        <input id="time" name="time" type="text" class="form-control" placeholder="00:00:00" value="{{$survey->time}}">
                                    </div>
                                </div>
                                <a href="{{asset('/survey_list')}}" class="btn btn-danger pull-right">CANCEL</a>
                                <button type="submit" onclick="validate()" class="btn btn-success pull-right">UPDATE</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<script>
    function validate() {
        $('#createSurveyForm').validate({
            rules: {
                title: {
                    required: true
                },
                description: {
                    required: true
                },
            }
        });
    }

</script>