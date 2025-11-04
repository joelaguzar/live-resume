<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // to get the logged-in user
use Illuminate\Http\RedirectResponse; // use for the redirect response type
use Illuminate\View\View; // for the view response type

class ResumeController extends Controller
{
    // show the authenticated user's resume on their dashboard (private view)
    public function dashboard(): View
    {
        $user = Auth::user();
        
        return view('resume.dashboard', [
            'user' => $user,
        ]);
    }

    // show a public resume view for any user
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
            'address' => ['nullable', 'string', 'max:500'],
            'address_line' => ['nullable', 'string', 'max:255'],
            'region' => ['nullable', 'string', 'max:255'],
            'province' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'summary' => ['nullable', 'string'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['required', 'string', 'max:255'],

            // project data
            'projects' => ['nullable', 'array'],
            'projects.*.title' => ['required_with:projects', 'string', 'max:255'],
            'projects.*.start_date' => ['nullable', 'string', 'max:255'],
            'projects.*.end_date' => ['nullable', 'string', 'max:255'],
            'projects.*.description' => ['nullable', 'string', 'max:255'],
            'projects.*.link' => ['nullable', 'url', 'max:255'],
            'projects.*.achievements' => ['nullable', 'array'],
            'projects.*.achievements.*' => ['required', 'string'],

            // educ data
            'education' => ['nullable', 'array'],
            'education.*.degree' => ['required_with:education', 'string', 'max:255'],
            'education.*.institution' => ['nullable', 'string', 'max:255'],
            'education.*.start_year' => ['nullable', 'string', 'max:255'],
            'education.*.end_year' => ['nullable', 'string', 'max:255'],

            // cert data
            'certificates' => ['nullable', 'array'],
            'certificates.*.title' => ['required_with:certificates', 'string', 'max:255'],
            'certificates.*.issuer' => ['nullable', 'string', 'max:255'],
            'certificates.*.issue_date' => ['nullable', 'string', 'max:255'],
            'certificates.*.expiry_date' => ['nullable', 'string', 'max:255'],
            'certificates.*.link' => ['nullable', 'url', 'max:255'],
        ]);


        // Clean up skills array - remove empty values and trim whitespace
        if (!empty($validated['skills'])) {
            $validated['skills'] = array_values(array_filter(array_map('trim', $validated['skills'])));
        } else {
            $validated['skills'] = []; // empty array if blank
        }

        // get the current user
        $user = $request->user();

        // fill user model w/ validated data and save
        $user->fill($validated);
        $user->save();

        // redirect back to dashboard with a success message
        return redirect()->route('dashboard')->with('status', 'resume-updated');
    }
}
