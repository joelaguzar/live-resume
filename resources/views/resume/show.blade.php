<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }} - Resume</title>
    @vite('resources/css/app.css')
    <style>
        @media print {
            body { -webkit-print-color-adjust: exact; print-color-adjust: exact; background: #fff; }
            .no-print { display: none; }
            .print-container { max-width: 100%; margin: 0; padding: 0; }
            .print-shadow { box-shadow: none; }
        }
    </style>
</head>
<body class="bg-custom-bg text-custom-text font-sans">

    <div class="max-w-[960px] mx-auto my-8 px-5 print-container">
        <div class="bg-white rounded-lg shadow-[0_10px_25px_rgba(20,20,40,0.08)] overflow-hidden print-shadow">
            
            {{-- Header --}}
            <header class="p-7 border-b border-custom-line">
                <h1 class="text-[28px] font-extrabold text-custom-accent m-0">{{ $user->name }}</h1>
                <p class="text-[15px] text-custom-muted mt-1.5 mb-2.5">{{ $user->role }}</p>
                <div class="flex flex-wrap gap-x-3 gap-y-1 text-sm text-custom-muted">
                    <span>{{ $user->address }}</span>
                    <span>{{ $user->phone }}</span>
                    <a href="mailto:{{ $user->email }}" class="text-custom-accent no-underline hover:underline">{{ $user->email }}</a>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-5 no-print">
                    <button onclick="window.print()" class="inline-block text-sm cursor-pointer bg-white border border-custom-line rounded-md px-3 py-2">
                        Download PDF
                    </button>
                </div>
            </header>

            {{-- Main Content Grid --}}
            <main class="grid grid-cols-1 md:grid-cols-[2.2fr_1fr] gap-6 p-5">
                
                {{-- Left Column --}}
                <section>
                    {{-- Summary --}}
                    @if ($user->summary)
                    <div class="mb-2">
                        <h2 class="text-base font-bold text-custom-accent tracking-wide m-0 mb-2.5 pb-1.5 border-b-2 border-custom-line">Summary</h2>
                        <ul class="pl-5 m-2 list-disc text-sm leading-relaxed text-[#222]">
                            @foreach(explode("\n", $user->summary) as $line)
                                @if(trim($line))
                                    <li>{{ trim($line) }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- Projects --}}
                    @if ($user->projects)
                    <div>
                        <h2 class="text-base font-bold text-custom-accent tracking-wide m-0 mb-2.5 pb-1.5 border-b-2 border-custom-line">Projects</h2>
                        <div class="space-y-3">
                            @foreach($user->projects as $project)
                            <div class="border border-custom-line rounded-lg p-3">
                                <h3 class="m-0 mb-1 text-[15px] font-bold">{{ $project['title'] }}</h3>
                                <div class="text-xs text-custom-muted mb-1.5">
                                    @if(!empty($project['start_date']) || !empty($project['end_date']))
                                        {{ $project['start_date'] ?? '' }}{{ !empty($project['start_date']) && !empty($project['end_date']) ? ' – ' : '' }}{{ $project['end_date'] ?? '' }}
                                    @elseif(!empty($project['period']))
                                        {{ $project['period'] }}
                                    @endif
                                    @if(!empty($project['description']))
                                        • {{ $project['description'] }}
                                    @endif
                                </div>
                                @if (!empty($project['achievements']))
                                <ul class="pl-5 list-disc text-sm space-y-1">
                                    @foreach($project['achievements'] as $achievement)
                                        <li>{{ $achievement }}</li>
                                    @endforeach
                                </ul>
                                @endif
                                <a href="{{ $project['link'] }}" target="_blank" rel="noopener" class="text-custom-accent no-underline hover:underline text-sm mt-2 inline-block">View Project</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </section>

                {{-- Right Column (Sidebar) --}}
                <aside>
                    {{-- Skills --}}
                    @if ($user->skills)
                    <div class="mb-2">
                        <h2 class="text-base font-bold text-custom-accent tracking-wide m-0 mb-2.5 pb-1.5 border-b-2 border-custom-line">Technical Skills</h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($user->skills as $skill)
                                <span class="bg-custom-chip-bg border border-custom-chip-border text-custom-chip-text rounded-full px-2.5 py-1.5 text-xs">
                                    {{ $skill }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Education --}}
                    @if ($user->education)
                    <div class="mb-2">
                        <h2 class="text-base font-bold text-custom-accent tracking-wide m-0 mb-2.5 pb-1.5 border-b-2 border-custom-line">Education</h2>
                        @foreach($user->education as $edu)
                        <p class="text-sm m-1.5">
                            <b class="font-bold">{{ $edu['degree'] }}</b><br>
                            {{ $edu['institution'] }}<br>
                            <span class="text-custom-muted">
                                @if(!empty($edu['start_year']) || !empty($edu['end_year']))
                                    {{ $edu['start_year'] ?? '' }}{{ !empty($edu['start_year']) && !empty($edu['end_year']) ? ' - ' : '' }}{{ $edu['end_year'] ?? '' }}
                                @elseif(!empty($edu['period']))
                                    {{ $edu['period'] }}
                                @endif
                            </span>
                        </p>
                        @endforeach
                    </div>
                    @endif

                    {{-- Certificates --}}
                    @if ($user->certificates)
                    <div>
                        <h2 class="text-base font-bold text-custom-accent tracking-wide m-0 mb-2.5 pb-1.5 border-b-2 border-custom-line">Certificates</h2>
                        <ul class="pl-5 m-2 list-disc text-sm space-y-1">
                            @foreach($user->certificates as $cert)
                            <li>
                                <span class="font-semibold">{{ $cert['title'] }}</span> – {{ $cert['issuer'] }}
                                @if(!empty($cert['issue_date']))
                                    ({{ $cert['issue_date'] }}@if(!empty($cert['expiry_date'])) - {{ $cert['expiry_date'] }}@endif)
                                @elseif(!empty($cert['year']))
                                    ({{ $cert['year'] }})
                                @endif
                                @if(!empty($cert['link']))
                                    <a href="{{ $cert['link'] }}" target="_blank" rel="noopener" class="ml-1 text-custom-accent hover:underline">[View]</a>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </aside>
            </main>
        </div>
    </div>
</body>
</html>