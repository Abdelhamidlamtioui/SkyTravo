<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Faq;
use Carbon\Carbon;

class FaqController extends Controller
{
    // Index - Display a listing of the resource.
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq.index', compact('faqs'));
    }

    // Edit - Show the form for editing the specified resource.
    public function edit($id)
    {
        $faqs = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faqs'));
    }

    // Destroy - Remove the specified resource from storage.
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        // Redirect back with a success message
        return back()->with('danger', 'Faq Deleted Successfully');
    }

    // Store - Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
        ]);

        $faq = Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'active' => $request->active,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Faq Added Successfully');
    }

    // Update - Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'active' => $request->active,
            'updated_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Faq Updated Successfully');
    }
}