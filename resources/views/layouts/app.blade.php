@php
    use App\Models\Setting;
    $s_phone    = Setting::get('phone',         '+44 (0) 7000 000 000');
    $s_email    = Setting::get('email',         'info@renovaldn.com');
    $s_address  = Setting::get('address',       'Greater London, UK');
    $s_hours_wd = Setting::get('hours_weekday', 'Mon–Fri: 8am – 6pm');
    $s_hours_we = Setting::get('hours_weekend', 'Saturday: 9am – 4pm');
    $s_instagram= Setting::get('instagram',     '#');
    $s_facebook = Setting::get('facebook',      '#');
    $s_linkedin = Setting::get('linkedin',      '#');
@endphp
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Renova LDN — London's trusted renovation specialists. Painting, tiling, flooring, plastering and more.">
    <title>@yield('title', 'Renova LDN') | London Renovation Specialists</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-700 bg-white antialiased">

    {{-- Navigation --}}
    <header
        x-data="{ open: false, scrolled: false }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
        :class="scrolled ? 'shadow-md bg-white/98' : 'bg-white/95'"
        class="fixed top-0 left-0 right-0 z-50 backdrop-blur-md border-b border-gray-200 transition-shadow duration-300"
    >
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between py-2">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center no-underline">
                    <img src="{{ asset('images/logo.png') }}" alt="Renova LDN" style="height:70px;width:auto">
                </a>

                {{-- Desktop nav --}}
                <nav class="hidden md:flex items-center gap-2">
                    <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:text-navy hover:bg-gray-100 transition-colors {{ request()->routeIs('home') ? 'text-navy bg-navy/5' : '' }}">Home</a>
                    <a href="{{ route('services') }}" class="px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:text-navy hover:bg-gray-100 transition-colors {{ request()->routeIs('services') ? 'text-navy bg-navy/5' : '' }}">Services</a>
                    <a href="{{ route('contact') }}" class="px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:text-navy hover:bg-gray-100 transition-colors {{ request()->routeIs('contact') ? 'text-navy bg-navy/5' : '' }}">Contact</a>
                    <a href="{{ route('contact') }}" class="ml-2 btn btn-primary">Get a Free Quote</a>
                </nav>

                {{-- Mobile hamburger --}}
                <button @click="open = !open" class="md:hidden flex flex-col gap-1.5 p-2 rounded-lg hover:bg-gray-100 transition-colors" aria-label="Toggle menu">
                    <span :class="open ? 'rotate-45 translate-y-2' : ''" class="block w-6 h-0.5 bg-gray-700 rounded transition-transform duration-200"></span>
                    <span :class="open ? 'opacity-0' : ''" class="block w-6 h-0.5 bg-gray-700 rounded transition-opacity duration-200"></span>
                    <span :class="open ? '-rotate-45 -translate-y-2' : ''" class="block w-6 h-0.5 bg-gray-700 rounded transition-transform duration-200"></span>
                </button>
            </div>

            {{-- Mobile menu --}}
            <div x-show="open" x-transition class="md:hidden pb-4 flex flex-col gap-1">
                <a href="{{ route('home') }}" class="px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100">Home</a>
                <a href="{{ route('services') }}" class="px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100">Services</a>
                <a href="{{ route('contact') }}" class="px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100">Contact</a>
                <a href="{{ route('contact') }}" class="mt-2 btn btn-primary text-center">Get a Free Quote</a>
            </div>
        </div>
    </header>

    {{-- Page content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-white pt-16 pb-0">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">

                {{-- Brand --}}
                <div>
                    <a href="{{ route('home') }}" class="inline-block mb-5">
                        <img src="{{ asset('images/logo.png') }}" alt="Renova LDN" class="h-14 w-44 object-contain object-left">
                    </a>
                    <p class="text-sm text-gray-400 leading-relaxed mb-6">London's trusted renovation specialists. From painting to full refurbishments, we deliver quality craftsmanship on every project.</p>
                    <div class="flex gap-3">
                        <a href="{{ $s_instagram }}" aria-label="Instagram" class="w-9 h-9 border border-white/15 rounded-lg flex items-center justify-center hover:border-teal hover:bg-teal transition-colors">
                            <svg class="w-4 h-4 fill-gray-400" viewBox="0 0 24 24"><path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z"/></svg>
                        </a>
                        <a href="{{ $s_facebook }}" aria-label="Facebook" class="w-9 h-9 border border-white/15 rounded-lg flex items-center justify-center hover:border-teal hover:bg-teal transition-colors">
                            <svg class="w-4 h-4 fill-gray-400" viewBox="0 0 24 24"><path d="M17 2v4h-2c-.69 0-1 .81-1 1.5V9h3l-.5 3H14v9h-3v-9H9V9h2V6.5C11 4 12.62 2 15 2h2z"/></svg>
                        </a>
                        <a href="{{ $s_linkedin }}" aria-label="LinkedIn" class="w-9 h-9 border border-white/15 rounded-lg flex items-center justify-center hover:border-teal hover:bg-teal transition-colors">
                            <svg class="w-4 h-4 fill-gray-400" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h5 class="text-xs font-bold uppercase tracking-widest text-white mb-5">Quick Links</h5>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('services') }}" class="text-sm text-gray-400 hover:text-white transition-colors">All Services</a></li>
                        <li><a href="{{ route('contact') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Contact Us</a></li>
                        <li><a href="{{ route('contact') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Free Quote</a></li>
                    </ul>
                </div>

                {{-- Services --}}
                <div>
                    <h5 class="text-xs font-bold uppercase tracking-widest text-white mb-5">Services</h5>
                    <ul class="space-y-3">
                        @foreach(['Painting','Tiling','Plastering','Parquet & Laminate','Gardening','Insulation'] as $svc)
                        <li><a href="{{ route('services') }}" class="text-sm text-gray-400 hover:text-white transition-colors">{{ $svc }}</a></li>
                        @endforeach
                    </ul>
                </div>

                {{-- Contact (dynamic) --}}
                <div>
                    <h5 class="text-xs font-bold uppercase tracking-widest text-white mb-5">Contact</h5>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <svg class="w-4 h-4 fill-teal mt-0.5 flex-shrink-0" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            <span class="text-sm text-gray-400">{{ $s_address }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-4 h-4 fill-teal mt-0.5 flex-shrink-0" viewBox="0 0 24 24"><path d="M20 15.5c-1.25 0-2.45-.2-3.57-.57a1.02 1.02 0 0 0-1.02.24l-2.2 2.2a15.045 15.045 0 0 1-6.59-6.59l2.2-2.21a.96.96 0 0 0 .25-1A11.36 11.36 0 0 1 8.5 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.5c0-.55-.45-1-1-1z"/></svg>
                            <span class="text-sm text-gray-400">{{ $s_phone }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-4 h-4 fill-teal mt-0.5 flex-shrink-0" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            <span class="text-sm text-gray-400">{{ $s_email }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-4 h-4 fill-teal mt-0.5 flex-shrink-0" viewBox="0 0 24 24"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm4.24 16L12 15.45 7.77 18l1.12-4.81-3.73-3.23 4.92-.42L12 5l1.92 4.53 4.92.42-3.73 3.23L16.23 18z"/></svg>
                            <span class="text-sm text-gray-400">{{ $s_hours_wd }}<br>{{ $s_hours_we }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="border-t border-white/8">
            <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col sm:flex-row items-center justify-between gap-3">
                <p class="text-xs text-gray-500">&copy; {{ date('Y') }} Renova LDN Ltd. All rights reserved.</p>
                <p class="text-xs text-gray-600">Crafted with care for London homes.</p>
            </div>
        </div>
    </footer>

    {{-- Scroll reveal --}}
    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('revealed'); } });
        }, { threshold: 0.12 });
        document.querySelectorAll('[data-reveal]').forEach(el => observer.observe(el));
        window.addEventListener('scroll', () => {
            document.querySelector('header')?.classList.toggle('nav-scrolled', window.scrollY > 20);
        });
    </script>
</body>
</html>
