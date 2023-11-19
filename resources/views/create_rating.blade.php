<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Rating</title>
    <!-- Gantilah path jQuery sesuai dengan kebutuhan Anda -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    @include('components.navbar')
    <h1>Input Rating</h1>
    <form method="post" action="{{ route('storeRating') }}">
        @csrf
        <select class="browser-default custom-select" name="author" id="author">
            <option selected>Select Author</option>
            @foreach ($authors as $d)
            <option value="{{ $d->id }}">{{ $d->name }}</option>
            @endforeach
        </select>

        <label for="book">Select Book:</label>
        <select class="browser-default custom-select" name="book" id="book">
        </select>



        <label for="rating">Select Rating:</label>
        <select id="rating" name="rating">
            <!-- Tambahkan opsi rating dari 1 sampai 10 -->
            @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}">{{ $i }}</option>
                @endfor
        </select>

        <div class="card-footer">
            <button class="btn btn-primary" type="submit">Create</button>
        </div>
        </div>
    </form>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#author').on('change', function (e) {
                var author_id = e.target.value;
                $.ajax({
                    url: "http://127.0.0.1:8000/api/fetch-author",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        author_id: author_id
                    },
                    success: function (book) {
                        $('#book').empty();
                        $.each(book.book, function (index,
                            book) {
                            $('#book').append('<option value="' + book
                                .id + '">' + book.title + '</option>');
                        })
                    }
                })

            });
        });
    </script>

</body>

</html>