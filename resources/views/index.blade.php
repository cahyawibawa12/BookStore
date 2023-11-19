<!DOCTYPE html>
<html lang="en">
<head>
    <title>Top 10 Most Famous Author</title>
</head>
<body>
@include('components.navbar')
<h1>Input Rating</h1>
    <div class = "contrainer">
        <table border = "1">
            <tr>
                <td>No</td>
                <td>Author Name</td>
                <td>Voter</td>
            </tr>
            @php $no = 1; @endphp
            @foreach ($authorWithMostRatings as $d)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$d->name}}</td>
                <td>{{$d->total_ratings}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>