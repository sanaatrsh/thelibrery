<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Intl\Countries;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::simplePaginate(10);
        $author = new Author();
        $booksNum = 0;
        // foreach ($author->books as $book) {
        //     $booksNum++;
        // }
        return view('admin.author.authors', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.author.create', [
            'countries' => Countries::getNames()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'image' => ['image'],
        ]);
        $data = $request->except('image');
        $data['image'] = $this->uploadImage($request);
        $author = Author::create($data);

        return redirect()->route('authors.show', $author->id)
            ->with('success', 'Author Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('admin.author.author', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('admin.author.edit', [
            'countries' => Countries::getNames(),
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'image' => ['image'],
        ]);

        $author = Author::find($id);

        $oldImage = $author->image;

        $data = $request->except('image');
        $path = $this->uploadImage($request);

        if($path){
            $data['image'] = $path;
        }

        $author->update($data);

        if($oldImage && $path){
            Storage::disk('public')->delete($oldImage);
        }

        return redirect()->route('authors.index')
            ->with('success', 'author Updated!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Author::destroy($id);

        return redirect()->route('authors.index')->with('success', 'Author Deleted!');
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
