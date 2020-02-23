<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    //
    public function index(Request $request) {
        return Book::all();
    }

    public function delete($id) {
        $book = Book::find($id);
        if ($book) {
            $rc = $book->delete();
            if ($rc) {
                return response()->json("Object deleted successfully.", 204);
            }
            else {
                return response()->json("Error deleting object.", 500);
            }
        }
        else {
            return response()->json("Object not found.", 404);
        }
    }

    public function add(Request $request) {
        return Book::create($request->all());

    }


}
