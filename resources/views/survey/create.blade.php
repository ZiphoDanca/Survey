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
                            <h4 class="card-title">Create Survey</h4>
                        </div>
                        <div class="card-body">
                            <form id="createSurveyForm" method="POST" action="{{asset('store_survey')}}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Tittle</label>
                                            <input type="text" class="form-control" name="title" id="title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="bmd-label-floating"> Description</label>
                                                <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" onchange="here();" value="">
                                            Duration Time(optional)
                                            <span class="form-check-sign">
                                                 <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row" id="DurationTime" style="display: none">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating">Duration Time (in minutes)</label>
                                        <input id="time" name="time" type="text" class="form-control" placeholder="0">
                                    </div>
                                </div>
                                <a href="{{asset('/survey_list')}}" class="btn btn-danger pull-right">CANCEL</a>
                                <button type="submit" onclick="validate()" class="btn btn-success pull-right">SAVE</button>
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

    function here() {
        document.getElementById('DurationTime').style = null;
    }

</script>