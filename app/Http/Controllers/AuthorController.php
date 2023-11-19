<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return response()->json(['authors' => $authors], 200);
    }

    public function fetchBook(Request $request)
    {
        $book = Book::where('author_id', $request->author_id)->get();
        return response()->json([
            'book' => $book
        ]);
    }

    public function create()
    {
        $authors = Author::with('authors')->get();

        return view('create_rating', compact('authors'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $author = Author::create($request->all());

        return response()->json(['author' => $author], 201);
    }

    public function show(Author $author)
    {
        return response()->json(['author' => $author], 200);
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $author->update($request->all());

        return response()->json(['author' => $author], 200);
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return response()->json(null, 204);
    }

    public function listBook()
    {
        $listbook = DB::table('tb_books')
            ->join('tb_authors', 'tb_books.author_id', '=', 'tb_authors.id')
            ->join('tb_books_category', 'tb_books.category_id', '=', 'tb_books_category.id')
            ->leftjoin('tb_rating', 'tb_books.id', '=', 'tb_rating.book_id')
            ->groupBy('tb_books.id', 'book_title', 'author_name', 'category_name')
            ->select(
                'tb_books.title as book_title',
                'tb_authors.name as author_name',
                'tb_books_category.category_name',
                DB::raw('AVG(tb_rating.rating) as avg_rating'),
                DB::raw('COUNT(tb_rating.id) as total_ratings')
            )
            ->get();

            // return response()->json(['list_book' => $listbook], 200);
        return view('welcome', compact('listbook'));
    }

    public function findAuthorWithMostRatings(Request $request)
    {
        $minRating = $request->input('min_total_ratings', 5);

        $authorWithMostRatings = DB::table('tb_authors')
            ->join('tb_books', 'tb_authors.id', '=', 'tb_books.author_id')
            ->join('tb_rating', 'tb_books.id', '=', 'tb_rating.book_id')
            ->groupBy('tb_authors.id')
            ->havingRaw('COUNT(tb_rating.id) >= ?', [$minRating])
            ->orderByDesc(DB::raw('COUNT(tb_rating.id)'))
            ->select('tb_authors.id', 'tb_authors.name', DB::raw('COUNT(tb_rating.id) as total_ratings'))
            ->limit(10)
            ->get();

        return view('index', compact('authorWithMostRatings'));
    }

    public function storeRating(Request $request)
    {
        $validasi = $request->validate([
            'rating' => 'required',
            'book' => 'required',
        ]);
        
        $rating = new Rating;

        $rating->rating = $request->rating;
        $rating->book_id = $request->book;
        $rating->save();
       
        return redirect()->route('listBook')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
