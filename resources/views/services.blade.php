@extends('layouts.app')
@section('title', 'Our Services')

@section('content')

{{-- Page Header --}}
<section class="hero-bg pt-28 pb-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-8" style="background-image:url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1800&q=80');background-size:cover"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <span class="section-label text-white bg-white/15">What We Offer</span>
        <h1 class="text-4xl md:text-5xl font-black text-white mt-3 mb-4">Our Services</h1>
        <p class="text-white/70 text-lg max-w-lg">15 specialist renovation services delivered by skilled tradespeople across Greater London.</p>
    </div>
</section>

{{-- Filter + Grid --}}
<section
    class="py-16 bg-white"
    x-data="{ active: 'all' }"
>
    <div class="max-w-7xl mx-auto px-6">

        {{-- Filter bar --}}
        <div class="flex flex-wrap gap-3 mb-12 justify-center" data-reveal>
            @foreach(['all' => 'All Services', 'interior' => 'Interior', 'exterior' => 'Exterior', 'structural' => 'Structural'] as $key => $label)
            <button
                @click="active = '{{ $key }}'"
                :class="active === '{{ $key }}' ? 'btn-primary text-white' : 'btn-outline'"
                class="btn btn-sm transition-all duration-200"
            >{{ $label }}</button>
            @endforeach
        </div>

        {{-- Services grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @php
            $services = [
                ['Painting',                  'interior',    'M7 14c-1.66 0-3 1.34-3 3 0 1.31-1.16 2-2 2 .92 1.22 2.49 2 4 2 2.21 0 4-1.79 4-4 0-1.66-1.34-3-3-3zm13.71-9.37l-1.34-1.34c-.39-.39-1.02-.39-1.41 0L9 12.25 11.75 15l8.96-8.96c.39-.39.39-1.02 0-1.41z',       'Professional interior and exterior painting with premium paints for a flawless, long-lasting finish. We prepare all surfaces correctly for the best possible result.'],
                ['Carpet',                    'interior',    'M21 18v1c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2V5c0-1.1.89-2 2-2h14c1.1 0 2 .9 2 2v1h-9c-1.11 0-2 .9-2 2v8c0 1.1.89 2 2 2h9zm-9-2h10V8H12v8zm4-2.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z', 'Quality carpet supply and fitting services for all room types. We offer a wide range of styles, materials and underlay options to suit your budget and taste.'],
                ['Sanding',                   'interior',    'M22.7 19l-9.1-9.1c.9-2.3.4-5-1.5-6.9-2-2-5-2.4-7.4-1.3L9 6 6 9 1.6 4.7C.4 7.1.9 10.1 2.9 12.1c1.9 1.9 4.6 2.4 6.9 1.5l9.1 9.1c.4.4 1 .4 1.4 0l2.3-2.3c.5-.4.5-1.1.1-1.4z', 'Expert floor sanding and refinishing to restore wooden floors to their original beauty. We remove scratches, stains and discolouration for a smooth, like-new result.'],
                ['Plastering',                'interior',    'M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z', 'Professional plastering services for smooth, seamless walls and ceilings. We handle new plaster coats, patch repairs, and full room replastering on both new builds and renovations.'],
                ['Skirting Board',            'interior',    'M3 17h18v2H3v-2zM3 5v10l4-4 4 4 4-4 4 4V5H3z', 'Supply and installation of high-quality skirting boards in a wide range of profiles and finishes to complement any interior style, fitted perfectly to your walls.'],
                ['Tiling',                    'interior',    'M20 2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM8 20H4v-4h4v4zm0-6H4v-4h4v4zm0-6H4V4h4v4zm6 12h-4v-4h4v4zm0-6h-4v-4h4v4zm0-6h-4V4h4v4zm6 12h-4v-4h4v4zm0-6h-4v-4h4v4zm0-6h-4V4h4v4z', 'Expert tiling for kitchens, bathrooms, hallways and any surface. We offer precision cutting, straight grouting lines and a wide selection of tile styles and sizes.'],
                ['Door & Cabinet Installation','interior',   'M17 3H7c-1.1 0-1.99.9-1.99 2L5 21l7-3 7 3V5c0-1.1-.9-2-2-2zm-1 12l-4-2.25L8 15V5h8v10z', 'Professional fitting of interior and exterior doors, kitchen and bathroom cabinets, wardrobes and storage units. We ensure perfect alignment and smooth operation every time.'],
                ['Plaster Board',             'structural',  'M3 3h8v8H3V3zm0 10h8v8H3v-8zm10-10h8v8h-8V3zm0 10h8v8h-8v-8z', 'Plasterboard partitioning and dry lining for walls and ceilings, including insulation-backed boards. We create new rooms, stud walls and ceiling frameworks to high specification.'],
                ['Welding',                   'structural',  'M13.5 5.5c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zM9.8 8.9L7 23h2.1l1.8-8 2.1 2v6h2v-7.5l-2.1-2 .6-3C14.8 12 16.8 13 19 13v-2c-1.9 0-3.5-1-4.3-2.4l-1-1.6c-.4-.6-1-1-1.7-1-.3 0-.5.1-.8.1L6 8.3V13h2V9.6l1.8-.7', 'Structural and decorative welding services for metal fabrication, gates, railings, balconies and repairs. All welding is carried out safely and to BS standards.'],
                ['False Ceiling',             'interior',    'M3 13h1v7c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-7h1a1 1 0 0 0 .71-1.71L12 3 2.29 11.29A1 1 0 0 0 3 13zm7 7v-5h4v5h-4z', 'Design and installation of suspended drop ceilings for improving aesthetics, acoustics or concealing services (pipes, cables). We work with grid systems and plasterboard.'],
                ['Gardening',                 'exterior',    'M17 8C8 10 5.9 16.17 3.82 22H5c.44-1.39.88-2.78 1.42-4h3.65C10.39 19.48 9.88 21.21 9.6 23h1c.28-1.78.77-3.52 1.4-5h3.63C15.21 19.54 14.9 21.24 14.7 23h1c.17-1.79.52-3.5.98-5H19c-.5 1.5-.85 3.29-.85 5h1C19.29 17.67 22 11.08 22 5c-4.48 0-9.09.85-5 3z', 'Comprehensive garden maintenance, landscaping, turfing, planting and tidying services. We keep your outdoor space pristine all year round.'],
                ['Insulation',                'structural',  'M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z', 'Energy-efficient wall, loft and underfloor insulation to reduce your heating bills and improve comfort. We use market-leading insulation materials suited to your property type.'],
                ['Parquet & Laminate',        'interior',    'M3 3h8v8H3V3zm0 10h8v8H3v-8zm10-10h8v8h-8V3zm0 10h8v8h-8v-8z', 'Professional supply and fitting of parquet, laminate and engineered wood flooring. We handle subfloor preparation, fitting, cutting and finishing for a beautiful result.'],
                ['Fans',                      'interior',    'M12 11c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm7.32-1.13c.04.42.06.85.06 1.13 0 4.08-2.55 7.6-6.15 9.05-3.6-1.45-6.15-4.97-6.15-9.05 0-.28.02-.71.06-1.13-.37-.54-.6-1.19-.6-1.87C6.54 6.54 8 5 9.87 5c.87 0 1.66.34 2.25.88.52-.1 1.08-.15 1.66-.17v-.01c.45 0 .89.04 1.31.12.6-.52 1.37-.82 2.23-.82 1.87 0 3.38 1.54 3.38 3.46 0 .68-.23 1.33-.6 1.87z', 'Supply and installation of ceiling fans, extractor fans and ventilation systems in kitchens, bathrooms and living spaces. We handle all electrical connections safely.'],
                ['Garden Fence',              'exterior',    'M3 17h18v2H3v-2zM3 5h2v10H3V5zm4 0h2v10H7V5zm4 0h2v10h-2V5zm4 0h2v10h-2V5zm4 0h2v10h-2V5z', 'Custom fence design, supply and installation including timber, composite and metal options. We build garden fences, gates and boundary structures to your exact specifications.'],
            ];
            @endphp

            @foreach($services as $i => [$name, $category, $icon, $desc])
            <div
                x-show="active === 'all' || active === '{{ $category }}'"
                x-transition
                class="service-card group"
                data-reveal
                style="transition-delay: {{ ($i % 3) * 80 }}ms"
            >
                <div class="flex items-start justify-between mb-5">
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center transition-all duration-300 group-hover:[background:linear-gradient(135deg,#1a3a6e,#0d9488)]" style="background:rgba(26,58,110,0.08)">
                        <svg class="w-7 h-7 fill-navy group-hover:fill-white transition-colors duration-300" viewBox="0 0 24 24"><path d="{{ $icon }}"/></svg>
                    </div>
                    <span class="text-xs font-semibold px-3 py-1 rounded-full
                        @if($category === 'interior') bg-blue-50 text-blue-600
                        @elseif($category === 'exterior') bg-green-50 text-green-600
                        @else bg-orange-50 text-orange-600 @endif">
                        {{ ucfirst($category) }}
                    </span>
                </div>
                <h3 class="text-base font-bold text-gray-800 mb-3">{{ $name }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed mb-5">{{ $desc }}</p>
                <a href="{{ route('contact') }}?service={{ urlencode($name) }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-navy hover:text-teal transition-colors">
                    Request a Quote
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/></svg>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>

{{-- CTA --}}
<section class="cta-bg py-16">
    <div class="max-w-7xl mx-auto px-6 text-center" data-reveal>
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Need a Service Not Listed?</h2>
        <p class="text-white/70 mb-8 max-w-lg mx-auto">Get in touch — our team handles a wide variety of renovation and maintenance work across London.</p>
        <a href="{{ route('contact') }}" class="btn btn-white btn-lg">Contact Us</a>
    </div>
</section>

@endsection
