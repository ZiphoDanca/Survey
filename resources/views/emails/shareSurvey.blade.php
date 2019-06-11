<!DOCTYPE html>
<html>
<head>
    <title>Survey</title>
</head>

<body>
<h2>HI</h2>
<br/>
{{$user->name}} has sent you a survey to complete,
<br/>
<br/>
<br/>
Title : {{$survey->title}}
<br/>
Description : {{$survey->description}}
Please click on the below link to complete the survey
<br/>
<a href="{{url('conduct_survey', $survey->key)}}">Start Survey</a>
</body>

</html>