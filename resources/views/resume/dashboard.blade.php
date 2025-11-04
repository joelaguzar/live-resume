<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Resume') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- Success Message --}}
            @if (session('status') === 'resume-updated')
                <div 
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="bg-green-50 border-l-4 border-green-400 p-4"
                >
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700 font-medium">
                                Resume updated successfully!
                            </p>
                        </div>
                    </div>
                </div>
            @endif
            
            {{-- Action Bar with Edit Button and Share Link --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        {{-- Edit Button --}}
                        <div>
                            <a href="{{ route('resume.edit') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit Resume
                            </a>
                        </div>

                        {{-- Shareable Link Section --}}
                        <div class="flex-1 sm:max-w-md" x-data="{ 
                            copied: false,
                            copyLink() {
                                const link = this.$refs.shareLink.value;
                                navigator.clipboard.writeText(link).then(() => {
                                    this.copied = true;
                                    setTimeout(() => this.copied = false, 2000);
                                });
                            }
                        }">
                            <label for="share-link" class="block text-sm font-medium text-gray-700 mb-2">
                                Share your public resume
                            </label>
                            <div class="flex rounded-md shadow-sm">
                                <input 
                                    type="text" 
                                    id="share-link" 
                                    x-ref="shareLink"
                                    value="{{ route('resume.show', $user) }}" 
                                    readonly 
                                    class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-l-md border-gray-300 bg-gray-50 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                                >
                                <button 
                                    type="button" 
                                    @click="copyLink"
                                    class="inline-flex items-center px-4 py-2 border border-l-0 border-gray-300 rounded-r-md bg-gray-50 text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                >
                                    <span x-show="!copied" class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                        Copy
                                    </span>
                                    <span x-show="copied" class="flex items-center text-green-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Copied!
                                    </span>
                                </button>
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Anyone with this link can view your public resume</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Resume Preview --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8">
                    
                    {{-- Header --}}
                    <header class="pb-6 border-b border-gray-200">
                        <h1 class="text-3xl font-extrabold text-gray-900">{{ $user->name }}</h1>
                        @if($user->role)
                            <p class="text-lg text-gray-600 mt-2">{{ $user->role }}</p>
                        @endif
                        <div class="flex flex-wrap gap-x-4 gap-y-1 text-sm text-gray-500 mt-3">
                            @if($user->address)
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $user->address }}
                                </span>
                            @endif
                            @if($user->phone)
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    {{ $user->phone }}
                                </span>
                            @endif
                            <a href="mailto:{{ $user->email }}" class="flex items-center text-indigo-600 hover:text-indigo-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                {{ $user->email }}
                            </a>
                        </div>
                    </header>

                    {{-- Main Content Grid --}}
                    <main class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-8">
                        
                        {{-- Left Column (Main Content) --}}
                        <section class="lg:col-span-2 space-y-8">
                            
                            {{-- Summary --}}
                            @if ($user->summary)
                            <div>
                                <h2 class="text-xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-indigo-500">Summary</h2>
                                <ul class="list-disc pl-5 space-y-2 text-gray-700">
                                    @foreach(explode("\n", $user->summary) as $line)
                                        @if(trim($line))
                                            <li>{{ trim($line) }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            {{-- Projects --}}
                            @if ($user->projects && count($user->projects) > 0)
                            <div>
                                <h2 class="text-xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-indigo-500">Projects</h2>
                                <div class="space-y-6">
                                    @foreach($user->projects as $project)
                                    <div class="border border-gray-200 rounded-lg p-5 hover:shadow-md transition-shadow">
                                        <h3 class="text-lg font-bold text-gray-900">{{ $project['title'] }}</h3>
                                        <div class="text-sm text-gray-500 mt-1 mb-3">
                                            @if(!empty($project['start_date']) || !empty($project['end_date']))
                                                {{ $project['start_date'] ?? '' }}{{ !empty($project['start_date']) && !empty($project['end_date']) ? ' – ' : '' }}{{ $project['end_date'] ?? '' }}
                                            @elseif(!empty($project['period']))
                                                {{ $project['period'] }}
                                            @endif
                                            @if($project['description'])
                                                • {{ $project['description'] }}
                                            @endif
                                        </div>
                                        @if (!empty($project['achievements']))
                                        <ul class="list-disc pl-5 space-y-1 text-gray-700 text-sm">
                                            @foreach($project['achievements'] as $achievement)
                                                @if(trim($achievement))
                                                    <li>{{ $achievement }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                        @if(!empty($project['link']))
                                        <a href="{{ $project['link'] }}" target="_blank" rel="noopener" class="inline-flex items-center mt-3 text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                                            View Project
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                        </a>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </section>

                        {{-- Right Column (Sidebar) --}}
                        <aside class="space-y-8">
                            
                            {{-- Skills --}}
                            @if ($user->skills && count($user->skills) > 0)
                            <div>
                                <h2 class="text-xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-indigo-500">Technical Skills</h2>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($user->skills as $skill)
                                        @if(trim($skill))
                                            <span class="bg-indigo-100 text-indigo-800 border border-indigo-200 rounded-full px-3 py-1.5 text-xs font-medium">
                                                {{ $skill }}
                                            </span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            {{-- Education --}}
                            @if ($user->education && count($user->education) > 0)
                            <div>
                                <h2 class="text-xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-indigo-500">Education</h2>
                                <div class="space-y-4">
                                    @foreach($user->education as $edu)
                                    <div class="text-sm">
                                        <p class="font-bold text-gray-900">{{ $edu['degree'] }}</p>
                                        <p class="text-gray-700 mt-1">{{ $edu['institution'] }}</p>
                                        <p class="text-gray-500 mt-1">
                                            @if(!empty($edu['start_year']) || !empty($edu['end_year']))
                                                {{ $edu['start_year'] ?? '' }}{{ !empty($edu['start_year']) && !empty($edu['end_year']) ? ' - ' : '' }}{{ $edu['end_year'] ?? '' }}
                                            @elseif(!empty($edu['period']))
                                                {{ $edu['period'] }}
                                            @endif
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            {{-- Certificates --}}
                            @if ($user->certificates && count($user->certificates) > 0)
                            <div>
                                <h2 class="text-xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-indigo-500">Certificates</h2>
                                <ul class="space-y-3 text-sm">
                                    @foreach($user->certificates as $cert)
                                    <li>
                                        <span class="font-semibold text-gray-900">{{ $cert['title'] }}</span>
                                        <span class="text-gray-600"> – {{ $cert['issuer'] }}</span>
                                        @if(!empty($cert['issue_date']))
                                            <span class="text-gray-500">({{ $cert['issue_date'] }}@if(!empty($cert['expiry_date'])) - {{ $cert['expiry_date'] }}@endif)</span>
                                        @elseif(!empty($cert['year']))
                                            <span class="text-gray-500">({{ $cert['year'] }})</span>
                                        @endif
                                        @if(!empty($cert['link']))
                                        <a href="{{ $cert['link'] }}" target="_blank" rel="noopener" class="ml-1 text-indigo-600 hover:text-indigo-800">
                                            [View]
                                        </a>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </aside>
                    </main>

                    {{-- Empty State Message --}}
                    @if(!$user->summary && (!$user->projects || count($user->projects) == 0) && (!$user->skills || count($user->skills) == 0) && (!$user->education || count($user->education) == 0) && (!$user->certificates || count($user->certificates) == 0))
                    <div class="text-center py-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Your resume is empty</h3>
                        <p class="mt-2 text-sm text-gray-500">Get started by adding your information</p>
                        <div class="mt-6">
                            <a href="{{ route('resume.edit') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                                Edit Resume
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
