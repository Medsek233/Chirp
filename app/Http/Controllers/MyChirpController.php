<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class MyChirpController extends Controller
{


    public function index()
    {
        return view('Mychirps.index', [
            'Mychirps' => Chirp::with('user')->latest()->get(),
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->chirps()->create($validated);

        return redirect(route('Mychirps.index'));
    }


    public function show(Chirp $chirp)
    {
        //
    }


    /**
     * @throws AuthorizationException
     */
    public function edit(Chirp $MyChirp)
    {


        return view('Mychirps.edit', [
            'MyChirp' => $MyChirp,
        ]);
    }


    /**
     * @throws AuthorizationException
     * @throws Exception
     */
    public function update(Request $request, Chirp $MyChirp)
    {


        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $MyChirp->update($validated);


        return redirect(route('Mychirps.index'));
    }


    /**
     * @throws AuthorizationException
     */
    public function destroy(Chirp $MyChirp)
    {


        $MyChirp->delete();

        return redirect(route('Mychirps.index'));
    }
}
