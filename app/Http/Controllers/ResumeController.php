<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // to get the logged-in user
use Illuminate\Http\RedirectResponse; // use for the redirect response type
use Illuminate\View\View; // for the view response type

class ResumeController extends Controller
{
    public function show(User $user): View
    {
        return view('resume.show', [
            'user' => $user,
        ]);
    }
        
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
            // personal data
            'name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'summary' => ['nullable', 'string'],
            'skills' => ['nullable', 'string'],

            // project data
            'projects' => ['nullable', 'array'],
            'projects.*.title' => ['required_with:projects', 'string', 'max:255'],
            'projects.*.period' => ['nullable', 'string', 'max:255'],
            'projects.*.description' => ['nullable', 'string', 'max:255'],
            'projects.*.link' => ['nullable', 'url', 'max:255'],

            // educ data
            'education' => ['nullable', 'array'],
            'education.*.degree' => ['required_with:education', 'string', 'max:255'],
            'education.*.institution' => ['nullable', 'string', 'max:255'],
            'education.*.period' => ['nullable', 'string', 'max:255'],

            // cert data
            'certificates' => ['nullable', 'array'],
            'certificates.*.title' => ['required_with:certificates', 'string', 'max:255'],
            'certificates.*.issuer' => ['nullable', 'string', 'max:255'],
            'certificates.*.year' => ['nullable', 'string', 'max:255'],
            'certificates.*.link' => ['nullable', 'url', 'max:255'],
        ]);


        // array_filter removes any empty values if the user types ", ,"
        if (!empty($validated['skills'])) {
            $validated['skills'] = array_filter(array_map('trim', explode(',', $validated['skills'])));
        } else {
            $validated['skills'] = []; // empty array if blank
        }

        // get the current user
        $user = $request->user();

        // fill user model w/ validated data and save
        $user->fill($validated);
        $user->save();

        // redirect back to edit page with a success message
        return redirect()->route('resume.edit')->with('status', 'resume-updated');
    }
}
