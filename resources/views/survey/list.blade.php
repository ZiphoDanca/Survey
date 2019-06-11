@extends('master')

@section('content')

    <div class="content">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div style="margin-left: 30px">
            <a href="{{asset('/create_survey')}}" class="btn btn-success">ADD NEW SURVEY</a>
        </div>

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Surveys</h4>
                            <p class="card-category">Surveys that i have created</p>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                <th>Tittle</th>
                                <th>Description</th>
                                <th>Questions</th>
                                <th>Time</th>
                                <th>View Results</th>
                                <th>View</th>
                                <th>Share</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                @foreach($surveys as $survey)
                                    <tr>
                                        <td>{{$survey->title}}</td>
                                        <td>{{$survey->description}}</td>
                                        <td>{{count($survey->question)}}</td>
                                        @if($survey->time == "00:00:00")
                                            <td>Not Specified</td>
                                        @else
                                            <td>{{$survey->time}} minutes</td>
                                        @endif
                                        <td>
                                            <a href="{{asset('/all_surveys_conducted/'.$survey->id)}}" class="btn btn-success btn-fab btn-fab-mini btn-round">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{asset('/show_survey/'.$survey->id)}}" class="btn btn-success btn-fab btn-fab-mini btn-round">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" onclick="shareSurvey({{$survey->id}})" class="btn btn-success btn-fab btn-fab-mini btn-round" data-toggle="modal" data-target="#exampleModalLong">
                                                <i class="material-icons">share</i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{asset('/edit_survey/'.$survey->id)}}" class="btn btn-warning btn-fab btn-fab-mini btn-round">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" onclick="deleteSurvey({{$survey->id}});" class="btn btn-danger btn-fab btn-fab-mini btn-round">
                                                <i class="material-icons">delete</i>
                                            </a>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Share Survey</h5>
                    <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="surveyID" name="surveyID" hidden>
                    <label class="bmd-label-floating">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="material-icons">group</i>
                              </span>
                        </div>
                        <input type="email" class="form-control" id="shareEmail" name="shareEmail" placeholder="example@gmail.com">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="share();" type="button" class="btn btn-success">Share</button>
                </div>
            </div>
        </div>
    </div>

    <div class="loading" id="loading" style="display: none">
        <div class="spinner-wrapper">
            <span class="spinner-text">LOADING</span>
            <span class="spinner"></span>
        </div>
    </div>

@endsection

<script>
    function deleteSurvey(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.get('{{url('/delete_survey')}}'+ '/' + id, function (data) {
                    Swal.fire(
                        'Deleted!',
                        'Survey has been deleted.',
                        'success'
                    )
                        .then((value) => {
                            location.reload();
                        });
                });
            }
        })
    };

    function shareSurvey(id) {
        document.getElementById('surveyID').value = id;
    }
    function share() {

        $('#close').click();
        document.getElementById('loading').style.display = "block";

        id = $('#surveyID').val();

        $.ajax({
            type: 'POST',
            url: '{{asset('share_survey/')}}'+'/'+id,
            data: {
                '_token': $('input[name=_token]').val(),
                'surveyID': $('#surveyID').val(),
                'shareEmail': $('#shareEmail').val()
            },
            success: function (data) {
                showNotification();
                document.getElementById('shareEmail').value = null;
                document.getElementById('loading').style.display = "none";
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                document.getElementById('loading').style.display = "none";
                showErrorNotification();
            }
        });

    }
    function showNotification(){

        $.notify({
            icon: "add_alert",
            message: "Successfully sent the survey."

        },{
            type: 'success',
            timer: 4000,
            placement: {
                from: 'top',
                align: 'center'
            }
        });
    }
    function showErrorNotification(){

        $.notify({
            icon: "add_alert",
            message: "Unsuccessful, please enter a valid email address."

        },{
            type: 'warning',
            timer: 4000,
            placement: {
                from: 'top',
                align: 'center'
            }
        });
    }

</script>