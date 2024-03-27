<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Books;
use App\Models\Category;
use App\Models\Student;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $s = request()->query('search');
        $search = Str::lower($s);
        if ($search) {
            $books =
                Books::where('name', 'LIKE', "%{$search}%")
                ->simplePaginate(10);
        } else {
            $books = Books::simplePaginate(10);
        }
        return view('admin.books', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.create', compact('authors', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'author_id' => ['required', 'exists:authors,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'pages_number' => ['required', 'integer'],
            'publisher' => ['nullable'],
            'publisher_date' => ['nullable'],
            'tags' => ['nullable'],
            'image' => ['image', 'nullable'],
        ]);

        $data = $request->except('image', 'tags');
        $data['image'] = $this->uploadImage($request);
        $book = Books::create($data);

        $tags = json_decode($request->post('tags'));
        $saved_tags = Tag::all();
        $tag_ids = [];
        foreach ($tags as $item) {
            $tag = $saved_tags->where('name', $item->value)->first();
            if (!$tag) {
                $tag = Tag::create([
                    'name' => $item->value,
                ]);
            }
            $tag_ids[] = $tag->id;
        }

        $book->tags()->sync($tag_ids);

        return redirect()->route('books.show', $book->id)
            ->with('success', 'Book Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $book)
    {
        // $book = 
        return view('admin.book', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $authors = Author::all();
        $categories = Category::all();
        $book = Books::findOrFail($id);
        $tags = implode(',', $book->tags()->pluck('name')->toArray());

        return view('admin.edit', compact('authors', 'categories', 'book', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'author_id' => ['required', 'exists:authors,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'pages_number' => ['required', 'integer'],
            'publisher' => ['nullable'],
            'publisher_date' => ['required', 'integer'],
            'tags' => ['nullable'],
            'image' => ['image', 'nullable'],
        ]);

        $book = Books::find($id);

        $oldImage = $book->image;

        $data = $request->except('image', 'tags');
        $path = $this->uploadImage($request);

        if ($path) {
            $data['image'] = $path;
        }

        $book->update($data);

        if ($oldImage && $path) {
            Storage::disk('public')->delete($oldImage);
        }

        $tags = json_decode($request->post('tags'));
        $saved_tags = Tag::all();
        $tag_ids = [];
        foreach ($tags as $item) {
            $tag = $saved_tags->where('name', $item->value)->first();
            if (!$tag) {
                $tag = Tag::create([
                    'name' => $item->value,
                ]);
            }
            $tag_ids[] = $tag->id;
        }

        $book->tags()->sync($tag_ids);

        return redirect()->route('books.show', $book->id)
            ->with('success', 'Book Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $category = Category::findOrFail($id);
        // dd($id);
        Books::destroy($id);

        return redirect()->route('books.index')->with('success', 'Book Deleted!');
    }

    public function getBorrow(string $id)
    {
        $book = Books::findOrFail($id);
        $students = Student::simplePaginate(10);
        return view('admin.borrow', compact('book', 'students'));
    }

    public function postBorrow(Request $request, string $bookId, string $studentId)
    {
        $student = Student::find($studentId);
        $book = Books::find($bookId);
        // dd($request);
        $request->merge([
            'availability' => 'unavailable',
        ]);
        $data = $request->except('_token');
        $book->update($data);
        // $student->update($data);
        $book->students()->attach($studentId);
        return redirect()->route("books.index")
            ->with('success');
    }

    public function getReturn(string $id)
    {
        $bookId = Books::find($id);
        return view('admin.return', compact('bookId'));
    }
    public function postReturn(Request $request, string $id)
    {
        $book = Books::find($id);
        $request->merge([
            'availability' => 'available',
        ]);
        $data = $request->except('_token');
        $book->update($data);
        return redirect()->route("books.index")
            ->with('success');
    }

    protected function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')) {
            return;
        }
        $file = $request->file('image');
        $path = $file->store('uploads', [
            'disk' => 'public'
        ]);
        return $path;
    }
}
