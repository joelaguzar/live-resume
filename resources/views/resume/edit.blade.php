<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Your Resume') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12" x-data="{
        currentStep: 1,
        totalSteps: 6,
        maxReachedStep: 1,
        steps: [
            { number: 1, name: 'Personal Info', icon: 'user' },
            { number: 2, name: 'Summary', icon: 'document' },
            { number: 3, name: 'Skills', icon: 'star' },
            { number: 4, name: 'Projects', icon: 'briefcase' },
            { number: 5, name: 'Education', icon: 'academic' },
            { number: 6, name: 'Certificates', icon: 'badge' }
        ],
        projects: {{ json_encode(old('projects', $user->projects ?? [['title' => '', 'start_date' => '', 'end_date' => '', 'description' => '', 'link' => '', 'achievements' => ['']]])) }},
        education: {{ json_encode(old('education', $user->education ?? [['degree' => '', 'institution' => '', 'start_year' => '', 'end_year' => '']])) }},
        certificates: {{ json_encode(old('certificates', $user->certificates ?? [['title' => '', 'issuer' => '', 'issue_date' => '', 'expiry_date' => '', 'link' => '']])) }},
        skills: {{ json_encode(old('skills', $user->skills ?? [])) }},
        newSkill: '',
        hasExistingData: false,
        init() {
            // Check if user has existing resume data
            this.hasExistingData = this.checkExistingData();
            // If user has data, allow access to all steps
            if (this.hasExistingData) {
                this.maxReachedStep = this.totalSteps;
            }
        },
        checkExistingData() {
            // Check if user has any meaningful resume data
            const hasName = '{{ $user->name }}' && '{{ $user->name }}' !== '';
            const hasRole = '{{ $user->role ?? "" }}' !== '';
            const hasSummary = '{{ $user->summary ?? "" }}' !== '';
            const hasSkills = this.skills && this.skills.length > 0;
            const hasProjects = this.projects && this.projects.length > 0 && this.projects[0].title !== '';
            const hasEducation = this.education && this.education.length > 0 && this.education[0].degree !== '';
            const hasCertificates = this.certificates && this.certificates.length > 0 && this.certificates[0].title !== '';
            
            // If user has data in any section beyond basic info, consider it existing data
            return hasRole || hasSummary || hasSkills || hasProjects || hasEducation || hasCertificates;
        },
        goToStep(step) {
            // Allow navigation to visited steps OR all steps if user has existing data
            if (step >= 1 && step <= this.totalSteps && (step <= this.maxReachedStep || this.hasExistingData)) {
                this.currentStep = step;
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        },
        nextStep() {
            if (this.currentStep < this.totalSteps) {
                this.currentStep++;
                // Track the maximum step reached
                if (this.currentStep > this.maxReachedStep) {
                    this.maxReachedStep = this.currentStep;
                }
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        },
        previousStep() {
            if (this.currentStep > 1) {
                this.currentStep--;
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        },
        getStepStatus(stepNumber) {
            if (stepNumber === this.currentStep) return 'current';
            if (stepNumber < this.currentStep) return 'completed';
            if (stepNumber <= this.maxReachedStep || this.hasExistingData) return 'visited';
            return 'upcoming';
        },
        canAccessStep(stepNumber) {
            return stepNumber <= this.maxReachedStep || this.hasExistingData;
        }
    }">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            {{-- Progress Indicator --}}
            <div class="mb-8">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    {{-- Progress Bar --}}
                    <div class="mb-6">
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">Progress</span>
                            <span class="text-sm font-medium text-indigo-600" x-text="Math.round((currentStep / totalSteps) * 100) + '%'"></span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-indigo-600 h-2.5 rounded-full transition-all duration-300" :style="'width: ' + ((currentStep / totalSteps) * 100) + '%'"></div>
                        </div>
                    </div>

                    {{-- Step Navigation --}}
                    <div class="flex justify-between items-center space-x-2 overflow-x-auto pb-2">
                        <template x-for="step in steps" :key="step.number">
                            <button 
                                type="button"
                                @click="goToStep(step.number)"
                                :disabled="!canAccessStep(step.number)"
                                class="flex-1 min-w-[100px] text-center transition-all duration-200"
                                :class="{
                                    'opacity-40 cursor-not-allowed': !canAccessStep(step.number),
                                    'cursor-pointer hover:scale-105': canAccessStep(step.number) && getStepStatus(step.number) !== 'current',
                                    'cursor-default': getStepStatus(step.number) === 'current'
                                }"
                            >
                                <div class="flex flex-col items-center">
                                    <div 
                                        class="w-10 h-10 rounded-full flex items-center justify-center mb-2 transition-all duration-200 relative"
                                        :class="{
                                            'bg-indigo-600 text-white shadow-lg ring-2 ring-indigo-300 ring-offset-2': getStepStatus(step.number) === 'current',
                                            'bg-green-500 text-white': getStepStatus(step.number) === 'completed',
                                            'bg-indigo-400 text-white': getStepStatus(step.number) === 'visited',
                                            'bg-gray-200 text-gray-400': getStepStatus(step.number) === 'upcoming'
                                        }"
                                    >
                                        <template x-if="getStepStatus(step.number) === 'completed'">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </template>
                                        <template x-if="getStepStatus(step.number) !== 'completed'">
                                            <span x-text="step.number" class="font-semibold"></span>
                                        </template>
                                        {{-- Lock icon for inaccessible steps --}}
                                        <template x-if="!canAccessStep(step.number)">
                                            <svg class="w-3 h-3 absolute -bottom-1 -right-1 bg-gray-600 text-white rounded-full p-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                            </svg>
                                        </template>
                                    </div>
                                    <span 
                                        class="text-xs font-medium transition-colors"
                                        :class="{
                                            'text-indigo-600': getStepStatus(step.number) === 'current',
                                            'text-green-600': getStepStatus(step.number) === 'completed',
                                            'text-indigo-500': getStepStatus(step.number) === 'visited',
                                            'text-gray-400': getStepStatus(step.number) === 'upcoming'
                                        }"
                                        x-text="step.name"
                                    ></span>
                                </div>
                            </button>
                        </template>
                    </div>
                </div>
            </div>

            {{-- Form Container --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <form method="POST" action="{{ route('resume.update') }}">
                        @csrf
                        @method('PATCH')

                        {{-- Step 1: Personal Information --}}
                        <div x-show="currentStep === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-8" x-transition:enter-end="opacity-100 transform translate-x-0">
                            <div class="mb-6">
                                <h3 class="text-2xl font-bold text-gray-900">Personal Information</h3>
                                <p class="mt-1 text-sm text-gray-500">Let's start with your basic contact details. This information will be visible on your public resume.</p>
                            </div>

                            <div class="space-y-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-3" required placeholder="John Doe">
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                    <input type="email" id="email" value="{{ $user->email }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm bg-gray-50 text-lg p-3" disabled>
                                    <p class="text-xs text-gray-500 mt-2 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Email cannot be changed here. Go to profile settings.
                                    </p>
                                </div>
                                
                                <div>
                                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role / Professional Headline</label>
                                    <input type="text" name="role" id="role" value="{{ old('role', $user->role) }}" placeholder="e.g., Full Stack Web Developer" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-3">
                                    <p class="text-xs text-gray-500 mt-1">Your professional title or role</p>
                                </div>

                                {{-- Phone Number --}}
                                <div x-data="phoneInput()" x-init="initPhone()">
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                    <input type="tel" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-3" placeholder="Enter phone number">
                                    <p class="text-xs text-gray-500 mt-1">Select your country code and enter your number</p>
                                </div>

                                {{-- Address Section --}}
                                <div x-data="addressInput()" class="space-y-4">
                                    <h4 class="text-lg font-semibold text-gray-900 mt-6 mb-2">Address Details</h4>
                                    
                                    {{-- Address Line --}}
                                    <div>
                                        <label for="address_line" class="block text-sm font-medium text-gray-700 mb-1">Address Line</label>
                                        <input 
                                            type="text" 
                                            name="address_line" 
                                            id="address_line" 
                                            x-model="addressLine"
                                            @input="updateFullAddress()"
                                            value="{{ old('address_line', $user->address_line ?? '') }}" 
                                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-3" 
                                            placeholder="Street, Building, House Number"
                                        >
                                        <p class="text-xs text-gray-500 mt-1">Your street address or building details</p>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        {{-- Region Dropdown with Search --}}
                                        <div>
                                            <label for="region" class="block text-sm font-medium text-gray-700 mb-1">Region</label>
                                            <div class="relative">
                                                <input 
                                                    type="text" 
                                                    id="region_search"
                                                    x-model="regionSearch"
                                                    @input="filterRegions()"
                                                    @focus="showRegionDropdown = true"
                                                    @click="showRegionDropdown = true"
                                                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-3"
                                                    placeholder="Search or select region"
                                                    autocomplete="off"
                                                >
                                                <input type="hidden" name="region" x-model="selectedRegion">
                                                <div 
                                                    x-show="showRegionDropdown"
                                                    @click.outside="showRegionDropdown = false"
                                                    class="address-dropdown absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg max-h-60 overflow-y-auto"
                                                >
                                                    <template x-if="filteredRegions.length === 0">
                                                        <div class="px-4 py-3 text-sm text-gray-500">No regions found</div>
                                                    </template>
                                                    <template x-for="region in filteredRegions" :key="region.code">
                                                        <button
                                                            type="button"
                                                            @click="selectRegion(region)"
                                                            @mousedown.prevent
                                                            class="w-full text-left px-4 py-2 hover:bg-indigo-50 focus:bg-indigo-50 focus:outline-none"
                                                            x-text="region.name"
                                                        ></button>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Province Dropdown with Search --}}
                                        <div>
                                            <label for="province" class="block text-sm font-medium text-gray-700 mb-1">Province</label>
                                            <div class="relative">
                                                <input 
                                                    type="text" 
                                                    id="province_search"
                                                    x-model="provinceSearch"
                                                    @input="filterProvinces()"
                                                    @focus="showProvinceDropdown = true"
                                                    @click="showProvinceDropdown = true"
                                                    :disabled="!selectedRegion"
                                                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-3 disabled:bg-gray-100 disabled:cursor-not-allowed"
                                                    placeholder="Search or select province"
                                                    autocomplete="off"
                                                >
                                                <input type="hidden" name="province" x-model="selectedProvince">
                                                <div 
                                                    x-show="showProvinceDropdown && selectedRegion"
                                                    @click.outside="showProvinceDropdown = false"
                                                    class="address-dropdown absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg max-h-60 overflow-y-auto"
                                                >
                                                    <template x-if="filteredProvinces.length === 0">
                                                        <div class="px-4 py-3 text-sm text-gray-500">No provinces found</div>
                                                    </template>
                                                    <template x-for="province in filteredProvinces" :key="province.code">
                                                        <button
                                                            type="button"
                                                            @click="selectProvince(province)"
                                                            @mousedown.prevent
                                                            class="w-full text-left px-4 py-2 hover:bg-indigo-50 focus:bg-indigo-50 focus:outline-none"
                                                            x-text="province.name"
                                                        ></button>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- City/Municipality Dropdown with Search --}}
                                    <div>
                                        <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City / Municipality</label>
                                        <div class="relative">
                                            <input 
                                                type="text" 
                                                id="city_search"
                                                x-model="citySearch"
                                                @input="filterCities()"
                                                @focus="showCityDropdown = true"
                                                @click="showCityDropdown = true"
                                                :disabled="!selectedProvince"
                                                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-3 disabled:bg-gray-100 disabled:cursor-not-allowed"
                                                placeholder="Search or select city/municipality"
                                                autocomplete="off"
                                            >
                                            <input type="hidden" name="city" x-model="selectedCity">
                                            <div 
                                                x-show="showCityDropdown && selectedProvince"
                                                @click.outside="showCityDropdown = false"
                                                class="address-dropdown absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg max-h-60 overflow-y-auto"
                                            >
                                                <template x-if="filteredCities.length === 0">
                                                    <div class="px-4 py-3 text-sm text-gray-500">No cities found</div>
                                                </template>
                                                <template x-for="city in filteredCities" :key="city.code">
                                                    <button
                                                        type="button"
                                                        @click="selectCity(city)"
                                                        @mousedown.prevent
                                                        class="w-full text-left px-4 py-2 hover:bg-indigo-50 focus:bg-indigo-50 focus:outline-none"
                                                        x-text="city.name"
                                                    ></button>
                                                </template>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Hidden field for complete address --}}
                                    <input type="hidden" name="address" id="address" x-model="fullAddress">
                                    
                                    {{-- Address Preview --}}
                                    <div x-show="fullAddress" class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                                        <p class="text-sm font-medium text-gray-700 mb-1">Complete Address:</p>
                                        <p class="text-gray-900" x-text="fullAddress"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Step 2: Summary --}}
                        <div x-show="currentStep === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-8" x-transition:enter-end="opacity-100 transform translate-x-0">
                            <div class="mb-6">
                                <h3 class="text-2xl font-bold text-gray-900">Professional Summary</h3>
                                <p class="mt-1 text-sm text-gray-500">Write a brief overview of your professional background, skills, and career objectives. This is your elevator pitch!</p>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label for="summary" class="block text-sm font-medium text-gray-700 mb-1">Summary</label>
                                    <textarea name="summary" id="summary" rows="8" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-3" placeholder="Passionate software developer with 5+ years of experience in building scalable web applications...">{{ old('summary', $user->summary) }}</textarea>
                                    <p class="text-xs text-gray-500 mt-2">Tip: Keep it concise (2-4 sentences) and highlight your unique value</p>
                                </div>
                            </div>
                        </div>

                        {{-- Step 3: Skills --}}
                        <div x-show="currentStep === 3" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-8" x-transition:enter-end="opacity-100 transform translate-x-0">
                            <div class="mb-6">
                                <h3 class="text-2xl font-bold text-gray-900">Skills & Technologies</h3>
                                <p class="mt-1 text-sm text-gray-500">Add your technical skills, tools, and technologies one by one.</p>
                            </div>

                            <div class="space-y-4">
                                {{-- Add Skill Input --}}
                                <div>
                                    <label for="new-skill" class="block text-sm font-medium text-gray-700 mb-1">Add a Skill</label>
                                    <div class="flex gap-2">
                                        <input 
                                            type="text" 
                                            id="new-skill" 
                                            x-model="newSkill"
                                            @keydown.enter.prevent="if(newSkill.trim()) { skills.push(newSkill.trim()); newSkill = ''; }"
                                            placeholder="e.g., PHP, Laravel, JavaScript, React" 
                                            class="flex-1 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg p-3"
                                        >
                                        <button 
                                            type="button"
                                            @click="if(newSkill.trim()) { skills.push(newSkill.trim()); newSkill = ''; }"
                                            class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-lg font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200"
                                        >
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                            </svg>
                                            Add
                                        </button>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-2 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Type a skill and click "Add" or press Enter
                                    </p>
                                </div>

                                {{-- Hidden inputs for form submission --}}
                                <template x-for="(skill, index) in skills" :key="index">
                                    <input type="hidden" :name="'skills[' + index + ']'" :value="skill">
                                </template>

                                {{-- Skills Preview --}}
                                <div class="bg-gray-50 rounded-lg p-4 border-2 border-gray-200">
                                    <p class="text-sm font-medium text-gray-700 mb-3">Preview:</p>
                                    <div class="flex flex-wrap gap-2 min-h-[40px]" x-show="skills.length > 0">
                                        <template x-for="(skill, index) in skills" :key="index">
                                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800 group hover:bg-indigo-200 transition-colors">
                                                <span x-text="skill"></span>
                                                <button 
                                                    type="button"
                                                    @click="skills.splice(index, 1)"
                                                    class="ml-2 text-indigo-600 hover:text-indigo-900 focus:outline-none"
                                                >
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </span>
                                        </template>
                                    </div>
                                    <div x-show="skills.length === 0" class="text-gray-400 text-sm italic">
                                        No skills added yet. Start adding your skills above!
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Step 4: Projects --}}
                        <div x-show="currentStep === 4" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-8" x-transition:enter-end="opacity-100 transform translate-x-0">
                            <div class="mb-6">
                                <h3 class="text-2xl font-bold text-gray-900">Projects</h3>
                                <p class="mt-1 text-sm text-gray-500">Showcase your best work. Include personal projects, freelance work, or significant contributions.</p>
                            </div>

                            <div class="space-y-6">
                                <template x-for="(project, p_index) in projects" :key="p_index">
                                    <div class="border-2 border-gray-200 rounded-lg p-6 bg-gray-50 hover:border-indigo-300 transition-colors">
                                        <div class="flex justify-between items-start mb-4">
                                            <h4 class="text-lg font-semibold text-gray-700" x-text="'Project ' + (p_index + 1)"></h4>
                                            <button type="button" @click="projects.splice(p_index, 1)" class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center" x-show="projects.length > 1">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Remove
                                            </button>
                                        </div>

                                        <div class="space-y-4">
                                            <div>
                                                <label :for="'project_title_' + p_index" class="block text-sm font-medium text-gray-700 mb-1">Project Title</label>
                                                <input type="text" :name="'projects[' + p_index + '][title]'" :id="'project_title_' + p_index" x-model="project.title" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" placeholder="E-Commerce Platform">
                                            </div>

                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Time Period</label>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label :for="'project_start_' + p_index" class="block text-xs font-medium text-gray-600 mb-1">Start Date</label>
                                                        <input type="text" :name="'projects[' + p_index + '][start_date]'" :id="'project_start_' + p_index" x-model="project.start_date" placeholder="Mar 2025" class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                                                    </div>
                                                    <div>
                                                        <label :for="'project_end_' + p_index" class="block text-xs font-medium text-gray-600 mb-1">End Date</label>
                                                        <input type="text" :name="'projects[' + p_index + '][end_date]'" :id="'project_end_' + p_index" x-model="project.end_date" placeholder="May 2025 or Present" class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <label :for="'project_description_' + p_index" class="block text-sm font-medium text-gray-700 mb-1">Tech Stack</label>
                                                <input type="text" :name="'projects[' + p_index + '][description]'" :id="'project_description_' + p_index" x-model="project.description" placeholder="Laravel, Vue.js, MySQL" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                                            </div>

                                            <div>
                                                <label :for="'project_link_' + p_index" class="block text-sm font-medium text-gray-700 mb-1">Project Link</label>
                                                <input type="url" :name="'projects[' + p_index + '][link]'" :id="'project_link_' + p_index" x-model="project.link" placeholder="https://github.com/username/project" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                                            </div>

                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Key Achievements</label>
                                                <div class="space-y-2">
                                                    <template x-for="(achievement, a_index) in project.achievements" :key="a_index">
                                                        <div class="flex items-start gap-2">
                                                            <span class="text-indigo-600 mt-2">•</span>
                                                            <input type="text" :name="'projects[' + p_index + '][achievements][' + a_index + ']'" x-model="project.achievements[a_index]" class="flex-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" placeholder="Describe an achievement or feature">
                                                            <button type="button" @click="project.achievements.splice(a_index, 1)" class="text-red-600 hover:text-red-800 p-2" x-show="project.achievements.length > 1">
                                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </template>
                                                    <button type="button" @click="project.achievements.push('')" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium flex items-center mt-2">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                        </svg>
                                                        Add Achievement
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <button type="button" @click="projects.push({ title: '', start_date: '', end_date: '', description: '', link: '', achievements: [''] })" class="w-full border-2 border-dashed border-gray-300 rounded-lg p-4 text-gray-600 hover:border-indigo-400 hover:text-indigo-600 transition-colors flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Add Another Project
                                </button>
                            </div>
                        </div>

                        {{-- Step 5: Education --}}
                        <div x-show="currentStep === 5" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-8" x-transition:enter-end="opacity-100 transform translate-x-0">
                            <div class="mb-6">
                                <h3 class="text-2xl font-bold text-gray-900">Education</h3>
                                <p class="mt-1 text-sm text-gray-500">Add your educational background, degrees, and certifications from academic institutions.</p>
                            </div>

                            <div class="space-y-6">
                                <template x-for="(edu, index) in education" :key="index">
                                    <div class="border-2 border-gray-200 rounded-lg p-6 bg-gray-50 hover:border-indigo-300 transition-colors">
                                        <div class="flex justify-between items-start mb-4">
                                            <h4 class="text-lg font-semibold text-gray-700" x-text="'Education ' + (index + 1)"></h4>
                                            <button type="button" @click="education.splice(index, 1)" class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center" x-show="education.length > 1">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Remove
                                            </button>
                                        </div>

                                        <div class="space-y-4">
                                            <div>
                                                <label :for="'edu_degree_' + index" class="block text-sm font-medium text-gray-700 mb-1">Degree / Program</label>
                                                <input type="text" :name="'education[' + index + '][degree]'" :id="'edu_degree_' + index" x-model="edu.degree" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" placeholder="Bachelor of Science in Computer Science">
                                            </div>
                                            <div>
                                                <label :for="'edu_institution_' + index" class="block text-sm font-medium text-gray-700 mb-1">Institution</label>
                                                <input type="text" :name="'education[' + index + '][institution]'" :id="'edu_institution_' + index" x-model="edu.institution" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" placeholder="University Name">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Period</label>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label :for="'edu_start_' + index" class="block text-xs font-medium text-gray-600 mb-1">Start Year</label>
                                                        <input type="text" :name="'education[' + index + '][start_year]'" :id="'edu_start_' + index" x-model="edu.start_year" placeholder="2018" class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                                                    </div>
                                                    <div>
                                                        <label :for="'edu_end_' + index" class="block text-xs font-medium text-gray-600 mb-1">End Year</label>
                                                        <input type="text" :name="'education[' + index + '][end_year]'" :id="'edu_end_' + index" x-model="edu.end_year" placeholder="2022 or Present" class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <button type="button" @click="education.push({ degree: '', institution: '', start_year: '', end_year: '' })" class="w-full border-2 border-dashed border-gray-300 rounded-lg p-4 text-gray-600 hover:border-indigo-400 hover:text-indigo-600 transition-colors flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Add Another Education Entry
                                </button>
                            </div>
                        </div>

                        {{-- Step 6: Certificates --}}
                        <div x-show="currentStep === 6" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-8" x-transition:enter-end="opacity-100 transform translate-x-0">
                            <div class="mb-6">
                                <h3 class="text-2xl font-bold text-gray-900">Certificates & Awards</h3>
                                <p class="mt-1 text-sm text-gray-500">List your professional certificates, online course completions, and awards that showcase your expertise.</p>
                            </div>

                            <div class="space-y-6">
                                <template x-for="(cert, index) in certificates" :key="index">
                                    <div class="border-2 border-gray-200 rounded-lg p-6 bg-gray-50 hover:border-indigo-300 transition-colors">
                                        <div class="flex justify-between items-start mb-4">
                                            <h4 class="text-lg font-semibold text-gray-700" x-text="'Certificate ' + (index + 1)"></h4>
                                            <button type="button" @click="certificates.splice(index, 1)" class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center" x-show="certificates.length > 1">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Remove
                                            </button>
                                        </div>

                                        <div class="space-y-4">
                                            <div>
                                                <label :for="'cert_title_' + index" class="block text-sm font-medium text-gray-700 mb-1">Certificate Title</label>
                                                <input type="text" :name="'certificates[' + index + '][title]'" :id="'cert_title_' + index" x-model="cert.title" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" placeholder="AWS Certified Solutions Architect">
                                            </div>
                                            <div>
                                                <label :for="'cert_issuer_' + index" class="block text-sm font-medium text-gray-700 mb-1">Issuing Organization</label>
                                                <input type="text" :name="'certificates[' + index + '][issuer]'" :id="'cert_issuer_' + index" x-model="cert.issuer" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" placeholder="Amazon Web Services">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label :for="'cert_issue_date_' + index" class="block text-xs font-medium text-gray-600 mb-1">Issue Date</label>
                                                        <input type="text" :name="'certificates[' + index + '][issue_date]'" :id="'cert_issue_date_' + index" x-model="cert.issue_date" class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" placeholder="Jan 2024">
                                                    </div>
                                                    <div>
                                                        <label :for="'cert_expiry_date_' + index" class="block text-xs font-medium text-gray-600 mb-1">Expiration Date (Optional)</label>
                                                        <input type="text" :name="'certificates[' + index + '][expiry_date]'" :id="'cert_expiry_date_' + index" x-model="cert.expiry_date" class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" placeholder="Jan 2027 or N/A">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label :for="'cert_link_' + index" class="block text-sm font-medium text-gray-700 mb-1">Certificate Link (Optional)</label>
                                                <input type="url" :name="'certificates[' + index + '][link]'" :id="'cert_link_' + index" x-model="cert.link" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" placeholder="https://credential.url">
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <button type="button" @click="certificates.push({ title: '', issuer: '', issue_date: '', expiry_date: '', link: '' })" class="w-full border-2 border-dashed border-gray-300 rounded-lg p-4 text-gray-600 hover:border-indigo-400 hover:text-indigo-600 transition-colors flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Add Another Certificate
                                </button>
                            </div>
                        </div>

                        {{-- Navigation Buttons --}}
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <div class="flex justify-between items-center">
                                <button 
                                    type="button" 
                                    @click="previousStep()" 
                                    x-show="currentStep > 1"
                                    class="inline-flex items-center px-6 py-3 bg-gray-200 border border-transparent rounded-lg font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200"
                                >
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    Previous
                                </button>

                                <div class="flex items-center gap-4">
                                    @if (session('status') === 'resume-updated')
                                        <p
                                            x-data="{ show: true }"
                                            x-show="show"
                                            x-transition
                                            x-init="setTimeout(() => show = false, 3000)"
                                            class="text-sm font-medium text-green-600 flex items-center"
                                        >
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            {{ __('Saved successfully!') }}
                                        </p>
                                    @endif

                                    <button 
                                        type="button" 
                                        @click="nextStep()" 
                                        x-show="currentStep < totalSteps"
                                        class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-lg font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200"
                                    >
                                        Next
                                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>

                                    <button 
                                        type="submit" 
                                        x-show="currentStep === totalSteps"
                                        class="inline-flex items-center px-8 py-3 bg-green-600 border border-transparent rounded-lg font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200 shadow-lg"
                                    >
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ __('Save Resume') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Tips Section --}}
            <div class="mt-6 space-y-4">
                {{-- Sequential Navigation Notice (only show for new users without data) --}}
                <div x-show="!hasExistingData" class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <div class="flex">
                        <svg class="w-5 h-5 text-yellow-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <div>
                            <h4 class="text-sm font-medium text-yellow-900 mb-1">Sequential Progress</h4>
                            <p class="text-sm text-yellow-700">
                                You must complete each step in order. Steps with a lock icon 🔒 are not yet accessible. Click "Next" to unlock the following steps.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Editing Mode Notice (only show for users with existing data) --}}
                <div x-show="hasExistingData" class="bg-green-50 border border-green-200 rounded-lg p-4">
                    <div class="flex">
                        <svg class="w-5 h-5 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h4 class="text-sm font-medium text-green-900 mb-1">Editing Mode</h4>
                            <p class="text-sm text-green-700">
                                You have existing resume data. You can jump to any section to make updates. All steps are accessible for easy editing!
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Pro Tips --}}
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex">
                        <svg class="w-5 h-5 text-blue-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h4 class="text-sm font-medium text-blue-900 mb-1">Pro Tip</h4>
                            <p class="text-sm text-blue-700">
                                <span x-show="currentStep === 1">Make sure your contact information is accurate and professional. This is how potential employers will reach you.</span>
                                <span x-show="currentStep === 2">Your summary should be tailored to your target role. Focus on what makes you unique and valuable.</span>
                                <span x-show="currentStep === 3">List skills that are relevant to your target positions. Include both technical and soft skills.</span>
                                <span x-show="currentStep === 4">For each project, focus on measurable achievements and impact. Use numbers when possible (e.g., "Improved performance by 40%").</span>
                                <span x-show="currentStep === 5">Include relevant coursework, honors, or GPA if it strengthens your application.</span>
                                <span x-show="currentStep === 6">Add verification links to your certificates when available to build credibility.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.10/build/css/intlTelInput.css">
    <style>
        .iti {
            width: 100%;
            display: block;
        }
        .iti__selected-dial-code {
            font-size: 1.125rem;
            padding-left: 0.5rem;
        }
        .iti__selected-flag {
            padding: 0 0 0 12px;
        }
        .iti__country-list {
            max-width: 100%;
            font-size: 0.875rem;
        }
        
        /* Custom scrollbar for dropdown lists */
        .address-dropdown {
            scrollbar-width: thin;
            scrollbar-color: #cbd5e0 #f7fafc;
        }
        .address-dropdown::-webkit-scrollbar {
            width: 8px;
        }
        .address-dropdown::-webkit-scrollbar-track {
            background: #f7fafc;
            border-radius: 4px;
        }
        .address-dropdown::-webkit-scrollbar-thumb {
            background: #cbd5e0;
            border-radius: 4px;
        }
        .address-dropdown::-webkit-scrollbar-thumb:hover {
            background: #a0aec0;
        }
    </style>
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.10/build/js/intlTelInput.min.js"></script>
    <script src="{{ asset('js/ph-address-data.js') }}"></script>
    <script>
        // Phone Input Component
        function phoneInput() {
            return {
                iti: null,
                initPhone() {
                    const input = document.querySelector("#phone");
                    
                    this.iti = window.intlTelInput(input, {
                        initialCountry: "ph",
                        preferredCountries: ["ph", "us", "gb", "au", "sg", "jp"],
                        separateDialCode: true,
                        autoPlaceholder: "aggressive",
                        formatOnDisplay: true,
                        nationalMode: true,
                        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.10/build/js/utils.js"
                    });

                    // Set initial value if exists
                    const initialValue = input.value;
                    if (initialValue) {
                        this.iti.setNumber(initialValue);
                    }

                    // Update on form submit
                    const form = input.closest('form');
                    form.addEventListener('submit', () => {
                        const fullNumber = this.iti.getNumber();
                        if (fullNumber) {
                            input.value = fullNumber;
                        }
                    });
                }
            }
        }

        // Address Input Component with Complete Philippine Locations
        function addressInput() {
            return {
                addressLine: '',
                selectedRegion: '',
                selectedProvince: '',
                selectedCity: '',
                fullAddress: '',
                
                // Search fields
                regionSearch: '',
                provinceSearch: '',
                citySearch: '',
                
                // Dropdown visibility
                showRegionDropdown: false,
                showProvinceDropdown: false,
                showCityDropdown: false,
                
                // Filtered arrays
                filteredRegions: [],
                filteredProvinces: [],
                filteredCities: [],
                
                regions: [],
                provinces: [],
                cities: [],
                
                // Use the comprehensive data from external file
                philippineData: typeof philippineAddressData !== 'undefined' ? philippineAddressData : {},

                init() {
                    // Check if data is loaded
                    if (!this.philippineData || Object.keys(this.philippineData).length === 0) {
                        console.error('Philippine address data not loaded. Please check if ph-address-data.js is properly included.');
                        return;
                    }
                    
                    // Load all Philippine regions on init
                    this.regions = Object.keys(this.philippineData).map(code => ({
                        code: code,
                        name: this.philippineData[code].name
                    }));
                    this.filteredRegions = this.regions;
                    
                    // Parse existing address if available
                    const existingAddress = '{{ old("address", $user->address ?? "") }}';
                    const existingAddressLine = '{{ old("address_line", $user->address_line ?? "") }}';
                    const existingRegion = '{{ old("region", $user->region ?? "") }}';
                    const existingProvince = '{{ old("province", $user->province ?? "") }}';
                    const existingCity = '{{ old("city", $user->city ?? "") }}';
                    
                    if (existingAddressLine) {
                        this.addressLine = existingAddressLine;
                    }
                    
                    // Set existing region
                    if (existingRegion) {
                        this.selectedRegion = existingRegion;
                        const region = this.regions.find(r => r.code === existingRegion);
                        if (region) {
                            this.regionSearch = region.name;
                            this.onRegionChange();
                            
                            // Set existing province after region loads
                            if (existingProvince) {
                                this.selectedProvince = existingProvince;
                                const province = this.provinces.find(p => p.code === existingProvince);
                                if (province) {
                                    this.provinceSearch = province.name;
                                    this.onProvinceChange();
                                    
                                    // Set existing city after province loads
                                    if (existingCity) {
                                        this.selectedCity = existingCity;
                                        this.citySearch = existingCity;
                                    }
                                }
                            }
                        }
                    }
                    
                    if (existingAddress) {
                        this.fullAddress = existingAddress;
                    } else {
                        this.updateFullAddress();
                    }
                },

                filterRegions() {
                    if (!this.regionSearch) {
                        this.filteredRegions = this.regions;
                    } else {
                        this.filteredRegions = this.regions.filter(region => 
                            region.name.toLowerCase().includes(this.regionSearch.toLowerCase())
                        );
                    }
                },

                filterProvinces() {
                    if (!this.provinceSearch) {
                        this.filteredProvinces = this.provinces;
                    } else {
                        this.filteredProvinces = this.provinces.filter(province => 
                            province.name.toLowerCase().includes(this.provinceSearch.toLowerCase())
                        );
                    }
                },

                filterCities() {
                    if (!this.citySearch) {
                        this.filteredCities = this.cities;
                    } else {
                        this.filteredCities = this.cities.filter(city => 
                            city.name.toLowerCase().includes(this.citySearch.toLowerCase())
                        );
                    }
                },

                selectRegion(region) {
                    this.selectedRegion = region.code;
                    this.regionSearch = region.name;
                    this.showRegionDropdown = false;
                    this.onRegionChange();
                },

                selectProvince(province) {
                    this.selectedProvince = province.code;
                    this.provinceSearch = province.name;
                    this.showProvinceDropdown = false;
                    this.onProvinceChange();
                },

                selectCity(city) {
                    this.selectedCity = city.name;
                    this.citySearch = city.name;
                    this.showCityDropdown = false;
                    this.updateFullAddress();
                },

                parseExistingAddress(address) {
                    // Simple parsing - just set the address line for now
                    this.addressLine = address;
                },

                onRegionChange() {
                    this.selectedProvince = '';
                    this.selectedCity = '';
                    this.provinceSearch = '';
                    this.citySearch = '';
                    this.provinces = [];
                    this.cities = [];
                    this.filteredProvinces = [];
                    this.filteredCities = [];
                    
                    if (this.selectedRegion && this.philippineData[this.selectedRegion]) {
                        const regionData = this.philippineData[this.selectedRegion];
                        this.provinces = Object.keys(regionData.provinces).map(code => ({
                            code: code,
                            name: regionData.provinces[code].name
                        }));
                        this.filteredProvinces = this.provinces;
                    }
                    
                    this.updateFullAddress();
                },

                onProvinceChange() {
                    this.selectedCity = '';
                    this.citySearch = '';
                    this.cities = [];
                    this.filteredCities = [];
                    
                    if (this.selectedProvince && this.selectedRegion) {
                        const provinceData = this.philippineData[this.selectedRegion].provinces[this.selectedProvince];
                        if (provinceData && provinceData.cities) {
                            this.cities = provinceData.cities.map(city => ({
                                code: city,
                                name: city
                            }));
                            this.filteredCities = this.cities;
                        }
                    }
                    
                    this.updateFullAddress();
                },

                updateFullAddress() {
                    const parts = [];
                    
                    if (this.addressLine) parts.push(this.addressLine);
                    if (this.selectedCity) parts.push(this.selectedCity);
                    if (this.selectedProvince) {
                        const province = this.provinces.find(p => p.code === this.selectedProvince);
                        if (province) parts.push(province.name);
                    }
                    if (this.selectedRegion && this.philippineData[this.selectedRegion]) {
                        parts.push(this.philippineData[this.selectedRegion].name);
                    }
                    parts.push('Philippines');
                    
                    this.fullAddress = parts.filter(p => p).join(', ');
                }
            }
        }
    </script>
    @endpush
</x-app-layout>