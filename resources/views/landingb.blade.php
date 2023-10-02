<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Landing page</title>
</head>
<body>
    <h1> Welcome to ITI landing page </h1>


    @dump($students)


        <h1 style="color: red"> {{$name}}</h1>

    <table class="table">
       <tr> <th>ID</th> <th> Name</th></tr>

        @foreach($students as $student)
            <tr> <td>{{$student['id']}}</td> <td>{{$student['name']}}</td></tr>
        @endforeach

    </table>

    <footer> copyrights@iti2023</footer>
</body>
</html>
