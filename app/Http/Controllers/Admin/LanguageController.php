<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages =  DB::table('languages')->paginate(4);

        return view('admin.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLanguageRequest $request)
    {
        $val_data = $request->validated();

        if ($request->hasFile('lang_image')) {
            $lang_image = Storage::disk('public')->put('uploads', $val_data['lang_image']);
            $val_data['lang_image'] = $lang_image;
        }
        $language = Language::create($val_data);

        //Many to many relationship
        // if ($request->has('technologies')) {
        //     $project->technologies()->attach($val_data['technologies']);
        // }


        return to_route('admin.languages.index')->with('message', "Linguaggio aggiunto correttamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        return view('admin.languages.show', compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        return view('admin.languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLanguageRequest $request, Language $language)
    {
        $val_data = $request->validated();
        if ($request->hasFile('lang_image')) {
            if ($language->lang_image) {
                Storage::delete($language->lang_image);
            }
            $lang_image = Storage::disk('public')->put('uploads', $val_data['lang_image']);
            $val_data['lang_image'] = $lang_image;
        }


        $language->update($val_data);

        //Many to many relationship
        //if ($request->has('technologies')) {
        //$project->technologies()->sync($val_data['technologies']);
        //} else {
        //$project->technologies()->sync([]);
        //}

        return to_route('admin.languages.index')->with('message', "Linguaggio aggiornato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        if ($language->cover_image) {
            Storage::delete($language->cover_image);
        }


        $language->delete();


        return to_route('admin.languages.index')->with('message', "Linguaggio cancellato correttamente");
    }
}
