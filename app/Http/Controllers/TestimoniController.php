<?php

namespace App\Http\Controllers;
use App\Models\Testimoni;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View {
        return view('user/testimoni/testimoni');
    }
    

    public function admin() {
        $testi = Testimoni::latest()->get();
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

        
        Testimoni::create([
            'testi'     => $request->testi,
            // 'title'     => $request->title,
            // 'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('adminTesti.admin')->with(['successTesti' => 'Data Berhasil Disimpan!']);
    }

   
}