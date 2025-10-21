<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // to get the logged-in user
use Illuminate\Http\RedirectResponse; // use for the redirect response type
use Illuminate\View\View; // for the view response type

class ResumeController extends Controller
{
    // show the form for editing the user's resume.
    public function edit(): View
    {
        // get the currently authenticated user
        $user = Auth::user();

        // return the view and pass the user's data to it
        return view('resume.edit', [
            'user' => $user,
        ]);
    }

    // update the user's resume information.
    public function update(Request $request): RedirectResponse
    {
        // validate incoming data request
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'summary' => ['nullable', 'string'],
        ]);

        // get the current user
        $user = $request->user();

        // fill user model w/ validated data and save
        $user->fill($validated);
        $user->save();

        // redirect back to edit page with a success message
        return redirect()->route('resume.edit')->with('status', 'resume-updated');
    }
}
