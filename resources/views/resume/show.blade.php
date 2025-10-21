<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }} - Resume</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">

    <div class="max-w-4xl mx-auto my-8 p-8 bg-white shadow-lg rounded-lg">
        {{-- Header Section --}}
        <header class="text-center border-b pb-4 mb-6">
            <h1 class="text-4xl font-bold text-gray-800">{{ $user->name }}</h1>
            <p class="text-xl text-gray-600 mt-2">{{ $user->role }}</p>
            <div class="flex flex-wrap justify-center gap-x-6 gap-y-2 text-sm text-gray-500 mt-4">
                <span>{{ $user->address }}</span>
                <span>{{ $user->phone }}</span>
                <a href="mailto:{{ $user->email }}" class="text-blue-600 hover:underline">{{ $user->email }}</a>
            </div>
        </header>

        {{-- Main Content --}}
        <main>
            {{-- Summary Section --}}
            @if ($user->summary)
            <section class="mb-8">
                <h2 class="text-2xl font-semibold border-b pb-2 mb-3 text-gray-700">Summary</h2>
                <p class="text-gray-600 whitespace-pre-line">{{ $user->summary }}</p>
            </section>
            @endif

            {{-- Skills Section --}}
            @if ($user->skills)
            <section class="mb-8">
                <h2 class="text-2xl font-semibold border-b pb-2 mb-3 text-gray-700">Technical Skills</h2>
                <div class="flex flex-wrap gap-2">
                    @foreach ($user->skills as $skill)
                        <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">{{ $skill }}</span>
                    @endforeach
                </div>
            </section>
            @endif

            {{-- Projects Section --}}
            @if ($user->projects)
            <section class="mb-8">
                <h2 class="text-2xl font-semibold border-b pb-2 mb-3 text-gray-700">Projects</h2>
                <div class="space-y-4">
                    @foreach ($user->projects as $project)
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ $project['title'] }}</h3>
                        <p class="text-sm text-gray-500">{{ $project['period'] }} • {{ $project['description'] }}</p>
                        <a href="{{ $project['link'] }}" target="_blank" rel="noopener" class="text-sm text-blue-600 hover:underline">View Project</a>
                    </div>
                    @endforeach
                </div>
            </section>
            @endif

            {{-- Education Section --}}
            @if ($user->education)
            <section class="mb-8">
                <h2 class="text-2xl font-semibold border-b pb-2 mb-3 text-gray-700">Education</h2>
                <div class="space-y-4">
                    @foreach ($user->education as $edu)
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ $edu['degree'] }}</h3>
                        <p class="text-gray-600">{{ $edu['institution'] }}</p>
                        <p class="text-sm text-gray-500">{{ $edu['period'] }}</p>
                    </div>
                    @endforeach
                </div>
            </section>
            @endif

            {{-- Certificates Section --}}
            @if ($user->certificates)
            <section>
                <h2 class="text-2xl font-semibold border-b pb-2 mb-3 text-gray-700">Certificates</h2>
                <ul class="list-disc list-inside space-y-2">
                    @foreach ($user->certificates as $cert)
                    <li>
                        <span class="font-semibold">{{ $cert['title'] }}</span> – {{ $cert['issuer'] }} ({{ $cert['year'] }})
                        <a href="{{ $cert['link'] }}" target="_blank" rel="noopener" class="ml-2 text-sm text-blue-600 hover:underline">[View]</a>
                    </li>
                    @endforeach
                </ul>
            </section>
            @endif
        </main>
    </div>

</body>
</html>