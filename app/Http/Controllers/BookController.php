<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

    public function edit($id) {
        $book = Book::find($id);
        return response()->json($book);
    }

    public function update($id, Request $request) {
        Log::debug($request);
        $book = Book::find($id);
        $book->update($request->all());
       
        return response()->json('Object updated successfully.');
    }

    public function update_all(Request $request) {
        Log::debug($request);
        foreach ($request->data as $data) {
            Log::debug($data);
            $book = Book::find($data["id"]);
            Log::debug($book);
            $rc = $book->update($data);
            Log::debug($rc);
        }
        return response()->json('Objects saved successfully.');
    }
}
