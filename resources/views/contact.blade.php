@extends('layouts.app')
@section('title', 'Contact Us')
@php
    use App\Models\Setting;
    $s_phone    = Setting::get('phone',         '+44 (0) 7000 000 000');
    $s_email    = Setting::get('email',         'info@renovaldn.com');
    $s_address  = Setting::get('address',       'Greater London, UK');
    $s_hours_wd = Setting::get('hours_weekday', 'Mon–Fri: 8am – 6pm');
    $s_hours_we = Setting::get('hours_weekend', 'Saturday: 9am – 4pm');
@endphp

@section('content')

{{-- Page Header --}}
<section class="hero-bg pt-28 pb-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-8" style="background-image:url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1800&q=80');background-size:cover"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <span class="section-label text-white bg-white/15">Get In Touch</span>
        <h1 class="text-4xl md:text-5xl font-black text-white mt-3 mb-4">Contact Us</h1>
        <p class="text-white/70 text-lg max-w-lg">Tell us about your project and we'll get back to you with a free, no-obligation quote.</p>
    </div>
</section>

{{-- Contact Section --}}
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">

            {{-- Info Card --}}
            <div class="contact-card-bg rounded-2xl p-8 text-white lg:sticky lg:top-24" data-reveal>
                <h3 class="text-2xl font-black mb-2">Let's Talk</h3>
                <p class="text-white/70 text-sm leading-relaxed mb-8">We're ready to help with your renovation project. Reach out through any of the channels below.</p>

                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 rounded-xl bg-white/15 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 fill-white" viewBox="0 0 24 24"><path d="M20 15.5c-1.25 0-2.45-.2-3.57-.57a1.02 1.02 0 0 0-1.02.24l-2.2 2.2a15.045 15.045 0 0 1-6.59-6.59l2.2-2.21a.96.96 0 0 0 .25-1A11.36 11.36 0 0 1 8.5 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.5c0-.55-.45-1-1-1z"/></svg>
                        </div>
                        <div>
                            <strong class="block text-xs font-bold uppercase tracking-widest text-white/60 mb-1">Phone</strong>
                            <span class="text-sm">{{ $s_phone }}</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 rounded-xl bg-white/15 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 fill-white" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg>
                        </div>
                        <div>
                            <strong class="block text-xs font-bold uppercase tracking-widest text-white/60 mb-1">Email</strong>
                            <span class="text-sm">{{ $s_email }}</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 rounded-xl bg-white/15 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 fill-white" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        </div>
                        <div>
                            <strong class="block text-xs font-bold uppercase tracking-widest text-white/60 mb-1">Area</strong>
                            <span class="text-sm">{{ $s_address }}</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 rounded-xl bg-white/15 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 fill-white" viewBox="0 0 24 24"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg>
                        </div>
                        <div>
                            <strong class="block text-xs font-bold uppercase tracking-widest text-white/60 mb-1">Working Hours</strong>
                            <span class="text-sm">{{ $s_hours_wd }}<br>{{ $s_hours_we }}</span>
                        </div>
                    </div>
                </div>

                {{-- Services quick list --}}
                <div class="mt-8 pt-8 border-t border-white/20">
                    <p class="text-xs font-bold uppercase tracking-widest text-white/60 mb-4">We Cover</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['Painting','Tiling','Plastering','Flooring','Gardening','+ more'] as $tag)
                        <span class="text-xs px-2.5 py-1 rounded-full bg-white/15 text-white/80">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="lg:col-span-2" data-reveal>
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <h3 class="text-2xl font-black text-gray-900 mb-2">Send Us a Message</h3>
                    <p class="text-sm text-gray-500 mb-8">Fill in the form below and we'll respond within one business day.</p>

                    {{-- Success message --}}
                    @if(session('success'))
                    <div class="alert-success mb-6">
                        <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="m9 16.17-4.17-4.17-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="name">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                       placeholder="John Smith"
                                       class="form-control @error('name') border-red-400 @enderror">
                                @error('name') <p class="alert-error">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="email">Email Address <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                       placeholder="john@example.com"
                                       class="form-control @error('email') border-red-400 @enderror">
                                @error('email') <p class="alert-error">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                       placeholder="+44 7000 000 000"
                                       class="form-control">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="service">Service Required <span class="text-red-500">*</span></label>
                                <select id="service" name="service" class="form-control @error('service') border-red-400 @enderror" style="appearance:none;background-image:url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E\");background-repeat:no-repeat;background-position:right 12px center;background-size:18px;padding-right:40px">
                                    <option value="">Select a service…</option>
                                    @foreach($services as $svc)
                                    <option value="{{ $svc }}" {{ old('service', request('service')) === $svc ? 'selected' : '' }}>{{ $svc }}</option>
                                    @endforeach
                                </select>
                                @error('service') <p class="alert-error">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2" for="message">Tell Us About Your Project</label>
                            <textarea id="message" name="message" rows="5"
                                      placeholder="Describe your project — size, location, timeline, any specific requirements…"
                                      class="form-control resize-none">{{ old('message') }}</textarea>
                            @error('message') <p class="alert-error">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Preferred Contact Method <span class="text-red-500">*</span></label>
                            <div class="flex gap-6">
                                <label class="flex items-center gap-2.5 cursor-pointer">
                                    <input type="radio" name="preferred_contact" value="email" {{ old('preferred_contact', 'email') === 'email' ? 'checked' : '' }}
                                           class="w-4 h-4 text-navy accent-navy">
                                    <span class="text-sm font-medium text-gray-700">Email</span>
                                </label>
                                <label class="flex items-center gap-2.5 cursor-pointer">
                                    <input type="radio" name="preferred_contact" value="phone" {{ old('preferred_contact') === 'phone' ? 'checked' : '' }}
                                           class="w-4 h-4 text-navy accent-navy">
                                    <span class="text-sm font-medium text-gray-700">Phone</span>
                                </label>
                            </div>
                            @error('preferred_contact') <p class="alert-error">{{ $message }}</p> @enderror
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="btn btn-primary btn-lg w-full sm:w-auto">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                                Send Enquiry
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Trust Strip --}}
<section class="py-10 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            @foreach([
                ['Free Quotes',        'M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5'],
                ['Fast Response',      'M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z'],
                ['Fully Insured',      'M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z'],
                ['5★ Rated',           'M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z'],
            ] as [$label, $icon])
            <div class="flex flex-col items-center gap-2">
                <div class="icon-box w-10 h-10 rounded-xl">
                    <svg class="w-5 h-5" viewBox="0 0 24 24"><path d="{{ $icon }}"/></svg>
                </div>
                <span class="text-sm font-semibold text-gray-700">{{ $label }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
