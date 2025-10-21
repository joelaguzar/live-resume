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

                        {{-- We will add fields for Skills, Projects, etc. later --}}

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