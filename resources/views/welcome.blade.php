<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"> -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>List Book</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script defer src="script.js"></script> -->
</head>

<body>
@include('components.navbar')
<table id="myTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Category Name </th>
                <th>Author Name</th>
                <th>Average Rating</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listbook as $item)
            <tr>
                <td>{{$item->book_title}}</td>
                <td>{{$item->category_name}}</td>
                <td>{{$item->author_name}}</td>
                <td>{{$item->avg_rating}}</td>
                <td>{{$item->total_ratings}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
            <th>Book Name</th>
                <th>Category Name </th>
                <th>Author Name</th>
                <th>Average Rating</th>
                <th>Voter</th>
            </tr>
        </tfoot>
    </table>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    let table = new DataTable('#myTable');
</script>

</html>