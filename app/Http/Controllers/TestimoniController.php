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
        $testi = Testimoni::latest()->get();
        return view('user/testimoni/testimoni', compact('testi'));
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
            'testi'     => 'required|min:5',
            'name'     => 'required|min:5',
            // 'content'   => 'required|min:10'
        ]);

        
        Testimoni::create([
            'testi'     => $request->testi,
            'name'     => $request->name,
            // 'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('adminTesti.admin')->with(['successTesti' => 'Data Berhasil Disimpan!']);
    }
    
    public function user() {
        $testi = Testimoni::latest()->get();
        return view('User.testimoni.testimoni', compact('testi'));
    }

    public function destroy($id): RedirectResponse {
        $testi = Testimoni::withTrashed()->findOrFail($id);
        $testi->forceDelete(); 
        return redirect()->route('history.onlyTrashTestimoni')->with('success', 'Data berhasil dihapus secara permanen.');
    }

    public function softDelete($id) {
        $testi = Testimoni::findOrFail($id);
        $testi->delete(); 

        return redirect()->route('adminTesti.admin')->with('success', 'Data berhasil dihapus secara lembut.');
    }

    public function onlyTrashTestimoni() :view {
        $testiTrash = Testimoni::onlyTrashed()->latest()->get();

        return view('admin.testimoni.softDeleteTestimoni', compact('testiTrash'));
    }

    public function restore($id) {
        $testi = Testimoni::withTrashed()->findOrFail($id);
        $testi->restore(); 

        return redirect()->route('history.onlyTrashTestimoni')->with('success', 'Data berhasil dipulihkan.');
    }
   
}