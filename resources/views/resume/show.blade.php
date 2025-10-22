<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }} - Resume</title>
    @vite('resources/css/app.css')
    <style>
        /* Add print-specific styles */
        @media print {
            body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
            .no-print { display: none; }
            .print-container {
                box-shadow: none;
                margin: 0;
                max-width: 100%;
                border: 0;
            }
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">

    <div class="max-w-4xl mx-auto my-8 print-container">
        {{-- Action Buttons --}}
        <div class="no-print bg-white p-4 rounded-t-lg border-b flex justify-end items-center gap-4">
            <button onclick="window.print()" class="border border-gray-300 rounded px-4 py-1.5 text-sm text-gray-700 hover:bg-gray-100">
                Download PDF
            </button>
        </div>

        <div class="bg-white shadow-lg rounded-b-lg p-8">
            {{-- Header Section --}}
            <header class="mb-8">
                <h1 class="text-4xl font-extrabold text-blue-800 tracking-tight">{{ $user->name }}</h1>
                <p class="text-lg text-gray-600 mt-1">{{ $user->role }}</p>
                <div class="flex flex-wrap gap-x-6 gap-y-1 text-sm text-gray-500 mt-2">
                    <span>{{ $user->address }}</span>
                    <span>{{ $user->phone }}</span>
                    <a href="mailto:{{ $user->email }}" class="text-blue-600 hover:underline">{{ $user->email }}</a>
                </div>
            </header>

            {{-- Main Two-Column Layout --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-12 gap-y-8">
                
                {{-- Left Column (Main Content) --}}
                <div class="md:col-span-2">
                    {{-- Summary Section --}}
                    @if ($user->summary)
                    <section class="mb-8">
                        <h2 class="text-sm font-bold uppercase text-blue-800 border-b-2 border-gray-200 pb-1 mb-3">Summary</h2>
                        <div class="text-gray-700 space-y-2">
                            @foreach(explode("\n", $user->summary) as $line)
                                @if(trim($line))
                                    <p>• {{ trim($line) }}</p>
                                @endif
                            @endforeach
                        </div>
                    </section>
                    @endif

                    {{-- Projects Section --}}
                    @if ($user->projects)
                    <section class="mb-8">
                        <h2 class="text-sm font-bold uppercase text-blue-800 border-b-2 border-gray-200 pb-1 mb-3">Projects</h2>
                        <div class="space-y-6">
                            @foreach ($user->projects as $project)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <h3 class="text-lg font-bold text-gray-800">{{ $project['title'] }}</h3>
                                <p class="text-xs text-gray-500 my-1">{{ $project['period'] }} • {{ $project['description'] }}</p>
                                @if (!empty($project['achievements']))
                                <ul class="list-disc list-inside text-gray-700 mt-2 space-y-1">
                                    @foreach($project['achievements'] as $achievement)
                                        <li>{{ $achievement }}</li>
                                    @endforeach
                                </ul>
                                @endif
                                <a href="{{ $project['link'] }}" target="_blank" rel="noopener" class="text-sm text-blue-600 hover:underline mt-3 inline-block">View Project</a>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                </div>

                {{-- Right Column (Sidebar) --}}
                <div class="md:col-span-1">
                    {{-- Skills Section --}}
                    @if ($user->skills)
                    <section class="mb-8">
                        <h2 class="text-sm font-bold uppercase text-blue-800 border-b-2 border-gray-200 pb-1 mb-3">Technical Skills</h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($user->skills as $skill)
                                <span class="bg-gray-200 text-gray-800 text-xs font-medium px-3 py-1 rounded-full">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </section>
                    @endif

                    {{-- Education Section --}}
                    @if ($user->education)
                    <section class="mb-8">
                        <h2 class="text-sm font-bold uppercase text-blue-800 border-b-2 border-gray-200 pb-1 mb-3">Education</h2>
                        <div class="space-y-4">
                            @foreach ($user->education as $edu)
                            <div>
                                <h3 class="text-base font-bold text-gray-800">{{ $edu['degree'] }}</h3>
                                <p class="text-sm text-gray-600">{{ $edu['institution'] }}</p>
                                <p class="text-xs text-gray-500">{{ $edu['period'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @endif

                    {{-- Certificates Section --}}
                    @if ($user->certificates)
                    <section>
                        <h2 class="text-sm font-bold uppercase text-blue-800 border-b-2 border-gray-200 pb-1 mb-3">Certificates</h2>
                        <ul class="list-disc list-inside space-y-2 text-sm">
                            @foreach ($user->certificates as $cert)
                            <li>
                                <span class="font-semibold">{{ $cert['title'] }}</span> – {{ $cert['issuer'] }} ({{ $cert['year'] }})
                                <a href="{{ $cert['link'] }}" target="_blank" rel="noopener" class="ml-1 text-blue-600 hover:underline">[View]</a>
                            </li>
                            @endforeach
                        </ul>
                    </section
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>