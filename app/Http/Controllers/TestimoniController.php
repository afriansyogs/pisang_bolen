<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Testimoni;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $testi = Testimoni::latest()->get();

        //render view with posts
        return view('admin.testimoni.admTesti', compact('testi'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.testimoni.formTesti');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'testi'     => 'required',
            // 'title'     => 'required|min:5',
            // 'content'   => 'required|min:10'
        ]);

        //create post
        Testimoni::create([
            'testi'     => $request->testi,
            // 'title'     => $request->title,
            // 'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('admin.testimoni.admTesti')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}