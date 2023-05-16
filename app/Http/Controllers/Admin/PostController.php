<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    public function index(Request $request)
    {

        $search =trim($request->get('search'));
        $posts = Post::where('user_id', auth()->user()->id)
                        ->where('name', 'LIKE', '%' . $search . '%')
                        ->latest('id')
                        ->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::pluck('name','id');
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request)
    {
        /*return Storage::put('posts', $request->file('file'));*/



         $post = Post::create($request->all());

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('posts', $fileName, 'public');

            $post->image()->create([
                'url' => $filePath
            ]);
        }

        Cache::flush();

        if ($request->tags){
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('admin.posts.edit', $post);

    }


    public function edit(Post $post)
    {
        $this->authorize('author', $post);

        $categories = Category::pluck('name','id');
        $tags = Tag::all();


        $resul_tags = [];
        foreach($post->tags as $tag_list){
            array_push($resul_tags, $tag_list->id);
        }

        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'resul_tags'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);

        $post->update($request->all());
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('posts', $fileName, 'public');

            $post->image()->create([
                'url' => $filePath
            ]);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $url = $file->store('posts', 'public');

            if ($post->image) {
                Storage::delete($post->image->url);

                $post->image->update([
                    'url' => $url
                ]);
            } else {
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }
        if ($request->tags){
            $post->tags()->sync($request->tags);
        }

        Cache::flush();

        return redirect()->route('admin.posts.edit',$post)->with('info', 'El post se a actualizó con éxito');

    }

    public function destroy(Post $post)
    {
        $this->authorize('author', $post);

        $post->delete();

        Cache::flush();
        return redirect()->route('admin.posts.index')->with('info', 'El post se a eliminó con éxito');
    }
}
