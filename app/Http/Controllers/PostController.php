<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{   

    public function index()
    {
        //get posts
        $posts = Post::latest()->paginate(5);

        //render view with posts
        return view('posts.index', compact('posts'));
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
    $this->validate ($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'nama'     => 'required|min:5',
            'nim'     => 'required|min:5',
            'jurusan'   => 'required|min:1',
            'semester'   => 'required|min:1',
            'jenis_kelamin'   => 'required|min:1',
            'alamat'   => 'required|min:1',
        ]);
    
        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        Post::create([
            'image'     => $image->hashName(),
            'nama'     => $request->nama,
            'nim'     => $request->nim,
            'jurusan'   => $request->jurusan,
            'semester'   => $request->semester,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'alamat'   => $request->alamat,
        ]);

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }
    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Post $post)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'nama'     => 'required|min:5',
            'nim'     => 'required|min:5',
            'jurusan'   => 'required|min:1',
            'semester'   => 'required|min:1',
            'jenis_kelamin'   => 'required|min:1',
            'alamat'   => 'required|min:1',
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'nama'     => $request->nama,
                'nim'     => $request->nim,
                'jurusan'   => $request->jurusan,
                'semester'   => $request->semester,
                'jenis_kelamin'   => $request->jenis_kelamin,
                'alamat'   => $request->alamat,
            ]);

        } else {

            //update post without image
            $post->update([
                'nama'     => $request->nama,
                'nim'     => $request->nim,
                'jurusan'   => $request->jurusan,
                'semester'   => $request->semester,
                'jenis_kelamin'   => $request->jenis_kelamin,
                'alamat'   => $request->alamat,
            ]);
        }

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Post $post)
    {
        //delete image
        Storage::delete('public/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}