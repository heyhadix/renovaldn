@extends('layouts.app')
@section('title', 'Home')
@php $s_phone = \App\Models\Setting::get('phone', '+44 (0) 7000 000 000'); @endphp

@section('content')

{{-- ═══════════════════════════════════════ HERO ═══════════════════════════════════════ --}}
<section class="hero-bg min-h-screen flex items-center relative overflow-hidden">
    {{-- Background photo --}}
    <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image:url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1800&q=80')"></div>

    {{-- Decorative circles --}}
    <div class="absolute -top-32 -right-32 w-96 h-96 rounded-full opacity-10" style="background:radial-gradient(circle,#0d9488,transparent)"></div>
    <div class="absolute -bottom-32 -left-32 w-96 h-96 rounded-full opacity-10" style="background:radial-gradient(circle,#1a3a6e,transparent)"></div>

    <div class="max-w-7xl mx-auto px-6 pt-36 pb-24 relative z-10">
        <div class="max-w-3xl">
            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/25 bg-white/10 backdrop-blur-sm text-white text-xs font-semibold tracking-widest uppercase mb-8">
                <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                Serving the United Kingdom
            </div>

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-white leading-tight tracking-tight mb-6">
                England's Trusted<br>
                <span class="bg-gradient-to-r from-green-400 to-cyan-400 bg-clip-text text-transparent">Renovation</span><br>
                Specialists
            </h1>

            <p class="text-lg text-white/70 max-w-xl leading-relaxed mb-10">
                From painting to full refurbishments — we deliver exceptional craftsmanship across 15 specialist services, on time and within budget.
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="{{ route('contact') }}" class="btn btn-white btn-lg">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    Get a Free Quote
                </a>
                <a href="{{ route('services') }}" class="btn btn-outline border-white/50 text-white hover:bg-white hover:text-navy btn-lg">
                    View Our Services
                </a>
            </div>

            {{-- Trust badges --}}
            <div class="flex flex-wrap gap-6 mt-12">
                @foreach(['Fully Insured','Free Quotes','Quality Guaranteed','No Hidden Costs'] as $badge)
                <div class="flex items-center gap-2 text-white/70 text-sm">
                    <svg class="w-4 h-4 fill-green-400 flex-shrink-0" viewBox="0 0 24 24"><path d="m9 16.17-4.17-4.17-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                    {{ $badge }}
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-white/40 text-xs tracking-widest uppercase animate-bounce">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg>
    </div>
</section>

{{-- ═══════════════════════════════════════ STATS ═══════════════════════════════════════ --}}
<section class="bg-gray-50 border-y border-gray-200 py-14">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-0 divide-y md:divide-y-0 md:divide-x divide-gray-200">
            @foreach([
                ['500+',  'Projects Completed'],
                ['15+',   'Specialist Services'],
                ['10+',   'Years Experience'],
                ['98%',   'Client Satisfaction'],
            ] as [$num, $label])
            <div class="text-center py-6 px-4" data-reveal>
                <span class="block text-4xl md:text-5xl font-black gradient-text mb-2">{{ $num }}</span>
                <span class="text-sm text-gray-500 font-medium">{{ $label }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════ SERVICES PREVIEW ═══════════════════════════════════════ --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-reveal>
            <span class="section-label">What We Do</span>
            <h2 class="text-4xl font-black text-gray-900 mb-4">Our Core Services</h2>
            <p class="text-gray-500 text-lg max-w-xl mx-auto">15 specialist services delivered by skilled tradespeople across Greater London.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            @php
            $featured = [
                ['Painting',      'M7 14c-1.66 0-3 1.34-3 3 0 1.31-1.16 2-2 2 .92 1.22 2.49 2 4 2 2.21 0 4-1.79 4-4 0-1.66-1.34-3-3-3zm13.71-9.37l-1.34-1.34c-.39-.39-1.02-.39-1.41 0L9 12.25 11.75 15l8.96-8.96c.39-.39.39-1.02 0-1.41z',       'Interior & exterior painting with premium, long-lasting finishes.'],
                ['Plastering',    'M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z', 'Smooth, seamless wall and ceiling plaster for new builds and renovations.'],
                ['Tiling',        'M20 2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM8 20H4v-4h4v4zm0-6H4v-4h4v4zm0-6H4V4h4v4zm6 12h-4v-4h4v4zm0-6h-4v-4h4v4zm0-6h-4V4h4v4zm6 12h-4v-4h4v4zm0-6h-4v-4h4v4zm0-6h-4V4h4v4z', 'Expert tiling for kitchens, bathrooms, and any surface with precision cuts.'],
                ['Parquet & Laminate', 'M3 3h8v8H3V3zm0 10h8v8H3v-8zm10-10h8v8h-8V3zm0 10h8v8h-8v-8z', 'Professional supply and fitting of parquet, laminate and engineered wood flooring.'],
                ['Gardening',     'M17 8C8 10 5.9 16.17 3.82 22H5c.44-1.39.88-2.78 1.42-4h3.65C10.39 19.48 9.88 21.21 9.6 23h1c.28-1.78.77-3.52 1.4-5h3.63C15.21 19.54 14.9 21.24 14.7 23h1c.17-1.79.52-3.5.98-5H19c-.5 1.5-.85 3.29-.85 5h1C19.29 17.67 22 11.08 22 5c-4.48 0-9.09.85-5 3z', 'Garden maintenance, landscaping and planting across London.'],
                ['False Ceiling', 'M3 13h1v7c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-7h1a1 1 0 0 0 .71-1.71L12 3 2.29 11.29A1 1 0 0 0 3 13zm7 7v-5h4v5h-4z', 'Suspended ceiling design and installation for aesthetics and acoustics.'],
            ];
            @endphp

            @foreach($featured as $i => [$name, $icon, $desc])
            <div class="service-card group" data-reveal style="transition-delay: {{ $i * 80 }}ms">
                <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-5 transition-all duration-300 group-hover:[background:linear-gradient(135deg,#1a3a6e,#0d9488)]" style="background:rgba(26,58,110,0.08)">
                    <svg class="w-7 h-7 fill-navy group-hover:fill-white transition-colors duration-300" viewBox="0 0 24 24"><path d="{{ $icon }}"/></svg>
                </div>
                <h3 class="text-base font-bold text-gray-800 mb-2">{{ $name }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>

        <div class="text-center" data-reveal>
            <a href="{{ route('services') }}" class="btn btn-outline btn-lg">
                View All 15 Services
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════ ABOUT ═══════════════════════════════════════ --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            {{-- Image side --}}
            <div class="relative" data-reveal>
                <div class="rounded-2xl overflow-hidden aspect-[4/3]">
                    <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=800&q=80"
                         alt="Renova LDN team at work"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 rounded-2xl" style="background:linear-gradient(45deg,rgba(26,58,110,0.45),rgba(13,148,136,0.2))"></div>
                </div>
                {{-- Overlay badge --}}
                <div class="absolute bottom-6 left-6 bg-white rounded-xl p-4 flex items-center gap-3 shadow-xl">
                    <div class="icon-box w-11 h-11 rounded-lg">
                        <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <div>
                        <span class="block text-xl font-black text-gray-900">10+</span>
                        <span class="text-xs text-gray-500">Years in London</span>
                    </div>
                </div>
            </div>

            {{-- Text side --}}
            <div data-reveal>
                <span class="section-label">About Renova LDN</span>
                <h2 class="text-4xl font-black text-gray-900 mb-5">Renovation Excellence<br>Across London</h2>
                <p class="text-gray-500 leading-relaxed mb-4">
                    Renova LDN is a multi-trade renovation company based in London. We bring together expert tradespeople in 15 specialist disciplines — from painting and plastering to garden fencing and welding.
                </p>
                <p class="text-gray-500 leading-relaxed mb-8">
                    Whether you're refreshing a single room or undertaking a full property refurbishment, our skilled team works with precision, care and respect for your home.
                </p>

                <ul class="space-y-3 mb-8">
                    @foreach(['Experienced, vetted tradespeople', 'Transparent pricing, no hidden costs', 'Fully insured for your peace of mind', 'Projects completed on time, every time'] as $point)
                    <li class="flex items-center gap-3 text-sm font-medium text-gray-700">
                        <svg class="w-5 h-5 fill-brand-green flex-shrink-0" viewBox="0 0 24 24"><path d="m9 16.17-4.17-4.17-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                        {{ $point }}
                    </li>
                    @endforeach
                </ul>

                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                    Get Your Free Quote
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════ WHY CHOOSE US ═══════════════════════════════════════ --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-reveal>
            <span class="section-label">Why Choose Us</span>
            <h2 class="text-4xl font-black text-gray-900 mb-4">The Renova LDN Difference</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
            $features = [
                ['Skilled Tradespeople',    'Every job is carried out by experienced professionals — not subcontracted beginners.',   'M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z'],
                ['Quality Materials',       'We source premium materials that last, giving you long-lasting value for money.',         'M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z'],
                ['On-Time Delivery',        'We respect your schedule and commit to agreed timelines with regular progress updates.',   'M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z'],
                ['Fully Insured',           'All our work is fully insured, giving you complete peace of mind throughout the project.', 'M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z'],
            ];
            @endphp

            @foreach($features as $i => [$title, $desc, $icon])
            <div class="text-center" data-reveal style="transition-delay: {{ $i * 100 }}ms">
                <div class="icon-box mx-auto mb-5 w-14 h-14 rounded-2xl">
                    <svg viewBox="0 0 24 24"><path d="{{ $icon }}"/></svg>
                </div>
                <h3 class="text-base font-bold text-gray-900 mb-3">{{ $title }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════ PROCESS ═══════════════════════════════════════ --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-reveal>
            <span class="section-label">How It Works</span>
            <h2 class="text-4xl font-black text-gray-900 mb-4">Simple, Hassle-Free Process</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 relative">
            @php
            $steps = [
                ['1', 'Enquire', 'Fill in our contact form or call us. Tell us about your project and we\'ll get back to you quickly.'],
                ['2', 'Free Quote', 'We assess your needs and provide a clear, no-obligation quote with no hidden costs.'],
                ['3', 'Schedule', 'We agree a start date that suits you and plan the work to minimise disruption.'],
                ['4', 'Complete', 'Our team carries out the work to the highest standard, leaving you with a spotless finish.'],
            ];
            @endphp

            @foreach($steps as $i => [$num, $title, $desc])
            <div class="text-center relative" data-reveal style="transition-delay: {{ $i * 100 }}ms">
                @if($i < 3)
                <div class="hidden lg:block absolute top-8 left-1/2 right-0 h-0.5" style="background:linear-gradient(90deg,#1a3a6e,#0d9488);z-index:0"></div>
                @endif
                <div class="relative z-10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-5 text-white text-xl font-black border-4 border-white shadow-lg" style="background:linear-gradient(135deg,#1a3a6e,#0d9488)">
                    {{ $num }}
                </div>
                <h3 class="text-base font-bold text-gray-900 mb-2">{{ $title }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════ TESTIMONIALS ═══════════════════════════════════════ --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-reveal>
            <span class="section-label">Client Reviews</span>
            <h2 class="text-4xl font-black text-gray-900 mb-4">What Our Clients Say</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $testimonials = [
                ['S', 'Sarah M.', 'Nottingham', 'Painting & Plastering', 'Absolutely brilliant work. The team transformed our living room in two days. Couldn\'t be happier with the finish — highly recommend Renova LDN!'],
                ['J', 'James K.', 'Hackney', 'Tiling & Flooring', 'Professional, punctual and tidy. The tiling in our bathroom is immaculate. Will definitely use them again for our kitchen renovation.'],
                ['A', 'Amira T.', 'Clapham', 'Garden Fence & Gardening', 'Fantastic service from start to finish. The garden fence is exactly what we wanted, and they left the garden looking spotless. 5 stars!'],
            ];
            @endphp

            @foreach($testimonials as $i => [$initial, $name, $area, $service, $quote])
            <div class="bg-white rounded-2xl p-7 border border-gray-200 shadow-sm hover:shadow-lg transition-shadow duration-300" data-reveal style="transition-delay: {{ $i * 100 }}ms">
                <div class="flex gap-1 mb-5">
                    @for($s = 0; $s < 5; $s++)
                    <svg class="w-4 h-4 fill-amber-400" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    @endfor
                </div>
                <blockquote class="text-sm text-gray-600 leading-relaxed mb-6 italic">"{{ $quote }}"</blockquote>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0" style="background:linear-gradient(135deg,#1a3a6e,#0d9488)">{{ $initial }}</div>
                    <div>
                        <strong class="block text-sm text-gray-800">{{ $name }}</strong>
                        <span class="text-xs text-gray-400">{{ $area }} · {{ $service }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════ CTA BANNER ═══════════════════════════════════════ --}}
<section class="cta-bg py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5" style="background-image:url('https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=1800&q=80');background-size:cover;background-position:center"></div>
    <div class="max-w-7xl mx-auto px-6 text-center relative z-10" data-reveal>
        <span class="section-label text-white bg-white/15 border-white/20">Get Started Today</span>
        <h2 class="text-4xl md:text-5xl font-black text-white mb-5 mt-4">Ready to Transform<br>Your Space?</h2>
        <p class="text-white/70 text-lg max-w-lg mx-auto mb-10">Get in touch today for a free, no-obligation quote from London's renovation specialists.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('contact') }}" class="btn btn-white btn-lg">
                Request a Free Quote
            </a>
            <a href="tel:{{ preg_replace('/[^+\d]/', '', $s_phone) }}" class="btn btn-outline border-white/50 text-white hover:bg-white hover:text-navy btn-lg">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M20 15.5c-1.25 0-2.45-.2-3.57-.57a1.02 1.02 0 0 0-1.02.24l-2.2 2.2a15.045 15.045 0 0 1-6.59-6.59l2.2-2.21a.96.96 0 0 0 .25-1A11.36 11.36 0 0 1 8.5 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.5c0-.55-.45-1-1-1z"/></svg>
                Call Us
            </a>
        </div>
    </div>
</section>

@endsection
