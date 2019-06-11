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
                            <a href="{{asset('/edit_survey/'.$survey->id)}}" class="btn btn-success btn-round">EDIT</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Survey Questions and possible answers</h4>
                        </div>
                        <div class="card-body">
                            @foreach($questions as $question )
                                <label for="exampleFormControlSelect1">{{$question->question}}</label>
                                @foreach($question->answer as $answer)
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="{{$question->id}}" value="{{$answer->answer}}">
                                    {{$answer->answer}}
                                    <span class="circle">
                                       <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                                @endforeach
                            @endforeach
                            <div id="Question">
                                <a href="#" onclick="addQuestion();" class="btn btn-success btn-round">ADD QUESTION</a>
                            </div>

                                <br/>
                                <br/>

                                <form id="createQuestion" method="POST" action="{{asset('/add_question')}}">
                                    @csrf

                            <div id="addQuestion" style="display: none">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                          <span class="input-group-text">
                                              <i class="material-icons">question_answer</i>
                                          </span>
                                    </div>
                                    <input type="text" id="surveyID" name="surveyID" value="{{$survey->id}}" hidden>
                                    <input type="text" name="question" id="question" class="form-control" placeholder="Enter Question">
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First Answer</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" id="answer1" name="answer1" aria-describedby="emailHelp">
                                </div>
                            </div>
                                <div id="answer2" style="display: none">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Second Answer</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" id="answer2" name="answer2" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div id="answer3" style="display: none">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Third Answer</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" id="answer3" name="answer3" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div id="answer4" style="display: none">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Fourth Answer</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" id="answer4" name="answer4" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div id="addAnswer2" style="display: none">
                                     <a href="#" onclick="addAnswer2();" class="btn btn-success btn-round">ADD ANOTHER ANSWER</a>
                                </div>
                                <div id="addAnswer3" style="display: none">
                                    <a href="#" onclick="addAnswer3();" class="btn btn-success btn-round">ADD ANOTHER ANSWER</a>
                                </div>
                                <div id="addAnswer4" style="display: none">
                                    <a href="#" onclick="addAnswer4();" class="btn btn-success btn-round">ADD ANOTHER ANSWER</a>
                                </div>
                                <div id="submit" style="display: none">
                                    <button type="submit" onclick="validateSubmit();" class="btn btn-success btn-round">SUBMIT</button>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<script>
    function addQuestion() {
        document.getElementById('addQuestion').style.display = "block";
        document.getElementById('addAnswer2').style.display = "block";
        document.getElementById('Question').style.display = "none";
        document.getElementById('submit').style.display = "block";

        $('#createQuestion').validate({
            rules: {
                question: {
                    required: true
                },
                answer1: {
                    required: true
                },
            }
        });

    }
    function addAnswer2() {
        document.getElementById('answer2').style.display = "block";
        document.getElementById('addAnswer2').style.display = "none";
        document.getElementById('addAnswer3').style.display = "block";
        $('#createQuestion').validate({
            rules: {
                answer2: {
                    required: true
                },
            }
        });
    }
    function addAnswer3() {
        document.getElementById('answer3').style.display = "block";
        document.getElementById('addAnswer3').style.display = "none";
        document.getElementById('addAnswer4').style.display = "block";
        $('#createQuestion').validate({
            rules: {
                answer3: {
                    required: true
                },
            }
        });
    }
    function addAnswer4() {
        document.getElementById('answer4').style.display = "block";
        document.getElementById('addAnswer4').style.display = "none";
        $('#createQuestion').validate({
            rules: {
                answer4: {
                    required: true
                },
            }
        });
    }


</script>