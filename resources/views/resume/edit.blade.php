<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Your Resume') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- This is the main form for updating the resume --}}
                    <form method="POST" action="{{ route('resume.update') }}">
                        @csrf
                        @method('PATCH')

                        {{-- Personal Information Section --}}
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-medium">Personal Information</h3>
                                <p class="text-sm text-gray-500">Update your public name and contact details.</p>
                            </div>

                            {{-- Name --}}
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>

                            {{-- Email (Read-only for this form) --}}
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                <input type="email" name="email" id="email" value="{{ $user->email }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100" disabled>
                                <p class="text-xs text-gray-500 mt-1">Email cannot be changed here. Go to profile settings.</p>
                            </div>
                            
                            {{-- Role / Headline --}}
                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-700">Role / Headline</label>
                                <input type="text" name="role" id="role" value="{{ old('role', $user->role) }}" placeholder="e.g., Full Stack Web Developer" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Phone --}}
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            {{-- Address --}}
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>

                        <hr class="my-8">

                        {{-- Summary Section --}}
                        <div class="space-y-4">
                             <div>
                                <h3 class="text-lg font-medium">Summary</h3>
                                <p class="text-sm text-gray-500">A brief professional summary about yourself.</p>
                            </div>
                            <div>
                                <label for="summary" class="block text-sm font-medium text-gray-700">Summary</label>
                                <textarea name="summary" id="summary" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('summary', $user->summary) }}</textarea>
                            </div>
                        </div>

                        <hr class="my-8">

                        {{-- Skills Section --}}
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-medium">Skills</h3>
                                <p class="text-sm text-gray-500">Enter your skills separated by a comma.</p>
                            </div>
                            <div>
                                <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
                                {{-- We join the array into a string for the input, and will split it back in the controller --}}
                                <input type="text" name="skills" id="skills" value="{{ old('skills', implode(', ', $user->skills ?? [])) }}" placeholder="e.g., PHP, Laravel, PostgreSQL, CSS" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>

                        <hr class="my-8">
                        
                        {{-- Projects Section - Powered by Alpine.js --}}
                        <div x-data='{
                            projects: {{ json_encode(old('projects', $user->projects ?? [['title' => '', 'period' => '', 'description' => '', 'link' => '']])) }}
                        }'>
                            <h3 class="text-lg font-medium">Projects</h3>

                            {{-- This is a template for a single project form. Alpine will use this to create new ones. --}}
                            <template x-for="(project, index) in projects" :key="index">
                                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 mt-4 p-4 border rounded-md">
                                    
                                    {{-- Input for Project Title --}}
                                    <div class="sm:col-span-6">
                                        <label :for="'project_title_' + index" class="block text-sm font-medium text-gray-700">Project Title</label>
                                        <input type="text" :name="'projects[' + index + '][title]'" :id="'project_title_' + index" x-model="project.title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>

                                    {{-- Input for Project Period --}}
                                    <div class="sm:col-span-3">
                                        <label :for="'project_period_' + index" class="block text-sm font-medium text-gray-700">Period</label>
                                        <input type="text" :name="'projects[' + index + '][period]'" :id="'project_period_' + index" x-model="project.period" placeholder="e.g., Oct 2024 – Dec 2024" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>

                                    {{-- Input for Project Description --}}
                                    <div class="sm:col-span-3">
                                        <label :for="'project_description_' + index" class="block text-sm font-medium text-gray-700">Description</label>
                                        <input type="text" :name="'projects[' + index + '][description]'" :id="'project_description_' + index" x-model="project.description" placeholder="e.g., Java + MySQL console application" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    
                                    {{-- Input for Project Link --}}
                                    <div class="sm:col-span-6">
                                        <label :for="'project_link_' + index" class="block text-sm font-medium text-gray-700">Link</label>
                                        <input type="url" :name="'projects[' + index + '][link]'" :id="'project_link_' + index" x-model="project.link" placeholder="https://github.com/..." class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>

                                    {{-- Button to Remove a Project --}}
                                    <div class="sm:col-span-6">
                                        <button type="button" @click="projects.splice(index, 1)" class="text-red-600 hover:text-red-800 text-sm">
                                            Remove Project
                                        </button>
                                    </div>
                                </div>
                            </template>

                            {{-- Button to Add a New Project --}}
                            <div class="mt-4">
                                <button type="button" @click="projects.push({ title: '', period: '', description: '', link: '' })" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md shadow-sm hover:bg-gray-300 text-sm">
                                    + Add Project
                                </button>
                            </div>
                        </div>

                        <hr class="my-8">
                        {{-- Education Section - Powered by Alpine.js --}}
                        <div x-data='{
                            education: {{ json_encode(old('education', $user->education ?? [['degree' => '', 'institution' => '', 'period' => '']])) }}
                        }'>
                            <h3 class="text-lg font-medium">Education</h3>

                            <template x-for="(edu, index) in education" :key="index">
                                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 mt-4 p-4 border rounded-md">
                                    <div class="sm:col-span-6">
                                        <label :for="'edu_degree_' + index" class="block text-sm font-medium text-gray-700">Degree</label>
                                        <input type="text" :name="'education[' + index + '][degree]'" :id="'edu_degree_' + index" x-model="edu.degree" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label :for="'edu_institution_' + index" class="block text-sm font-medium text-gray-700">Institution</label>
                                        <input type="text" :name="'education[' + index + '][institution]'" :id="'edu_institution_' + index" x-model="edu.institution" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label :for="'edu_period_' + index" class="block text-sm font-medium text-gray-700">Period</label>
                                        <input type="text" :name="'education[' + index + '][period]'" :id="'edu_period_' + index" x-model="edu.period" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="sm:col-span-6">
                                        <button type="button" @click="education.splice(index, 1)" class="text-red-600 hover:text-red-800 text-sm">Remove Entry</button>
                                    </div>
                                </div>
                            </template>
                            <div class="mt-4">
                                <button type="button" @click="education.push({ degree: '', institution: '', period: '' })" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md shadow-sm hover:bg-gray-300 text-sm">+ Add Education</button>
                            </div>
                        </div>

                        <hr class="my-8">
                        {{-- Certificates Section - Powered by Alpine.js --}}
                        <div x-data='{
                            certificates: {{ json_encode(old('certificates', $user->certificates ?? [['title' => '', 'issuer' => '', 'year' => '', 'link' => '']])) }}
                        }'>
                            <h3 class="text-lg font-medium">Certificates</h3>

                            <template x-for="(cert, index) in certificates" :key="index">
                                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 mt-4 p-4 border rounded-md">
                                    <div class="sm:col-span-6">
                                        <label :for="'cert_title_' + index" class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" :name="'certificates[' + index + '][title]'" :id="'cert_title_' + index" x-model="cert.title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label :for="'cert_issuer_' + index" class="block text-sm font-medium text-gray-700">Issuer</label>
                                        <input type="text" :name="'certificates[' + index + '][issuer]'" :id="'cert_issuer_' + index" x-model="cert.issuer" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label :for="'cert_year_' + index" class="block text-sm font-medium text-gray-700">Year</label>
                                        <input type="text" :name="'certificates[' + index + '][year]'" :id="'cert_year_' + index" x-model="cert.year" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label :for="'cert_link_' + index" class="block text-sm font-medium text-gray-700">Link</label>
                                        <input type="url" :name="'certificates[' + index + '][link]'" :id="'cert_link_' + index" x-model="cert.link" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="sm:col-span-6">
                                        <button type="button" @click="certificates.splice(index, 1)" class="text-red-600 hover:text-red-800 text-sm">Remove Certificate</button>
                                    </div>
                                </div>
                            </template>
                            <div class="mt-4">
                                <button type="button" @click="certificates.push({ title: '', issuer: '', year: '', link: '' })" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md shadow-sm hover:bg-gray-300 text-sm">+ Add Certificate</button>
                            </div>
                        </div>

                        {{-- Save Button --}}
                        <div class="mt-8 flex items-center gap-4">
                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Save Changes') }}
                            </button>

                            {{-- This part is for showing a "Saved." message after a successful update --}}
                            @if (session('status') === 'resume-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>