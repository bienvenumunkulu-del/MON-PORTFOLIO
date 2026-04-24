<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIENVENU | AI Architect</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&family=Syncopate:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/@studio-freight/lenis@1.0.33/dist/lenis.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'cyber-black': '#020202',
                        'neon-blue': '#00f0ff',
                        'dark-gray': '#0a0a0a',
                    },
                    fontFamily: {
                        sans: ['Space Grotesk', 'sans-serif'],
                        display: ['Syncopate', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body { background-color: #020202; color: #ffffff; }
        .text-outline { -webkit-text-stroke: 1px rgba(255,255,255,0.2); color: transparent; }
        .grid-bg { 
            background-image: linear-gradient(to right, #0f0f0f 1px, transparent 1px), linear-gradient(to bottom, #0f0f0f 1px, transparent 1px);
            background-size: 50px 50px;
        }
        .noise { position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; opacity: .04; z-index: 100; }
        .img-mask { clip-path: polygon(0 0, 100% 0, 100% 90%, 90% 100%, 0 100%); }
    </style>
</head>
<body class="antialiased overflow-x-hidden font-sans">
    <div class="noise" style="background-image: url('https://grainy-gradients.vercel.app/noise.svg');"></div>
    
    <nav class="fixed top-0 w-full z-[90] px-8 py-10 flex justify-between items-center mix-blend-difference">
        <a href="#" class="font-display font-bold text-xl tracking-tighter">BIENVENU<span class="text-neon-blue">.</span></a>
        <div class="flex gap-12 text-[10px] uppercase tracking-[0.4em] font-bold opacity-70">
            <a href="#work" class="hover:text-neon-blue transition">Archive</a>
            <a href="#contact" class="hover:text-neon-blue transition">Contact</a>
        </div>
    </nav>

    <header class="relative min-h-screen grid-bg flex items-center px-8 lg:px-24 pt-20">
        <div class="container mx-auto grid lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-7 z-10">
                <p class="text-neon-blue font-mono text-sm mb-6 flex items-center gap-4">
                    <span class="w-12 h-px bg-neon-blue"></span> SOLUTIONS ARCHITECT
                </p>
                <h1 class="text-[10vw] lg:text-[6vw] font-display font-bold leading-[0.85] uppercase mb-10">
                    BIENVENU <br> 
                    <span class="text-outline italic">MUNKULU</span> <br>
                    NGULUNGU
                </h1>
                <p class="max-w-md text-lg opacity-50 font-light leading-relaxed mb-8">
                    Ingénieur spécialisé en Intelligence Artificielle. Je conçois des systèmes autonomes et des architectures logicielles optimisées pour le futur de la tech.
                </p>
            </div>

            <div class="lg:col-span-5 relative">
                <div class="absolute -inset-4 border border-neon-blue/20 img-mask"></div>
                <div class="relative w-full aspect-[4/5] bg-dark-gray img-mask overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/photo_bienvenu.jpg') }}" alt="Bienvenu Munkulu" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700 scale-110 hover:scale-100">
                    <div class="absolute bottom-4 left-4 font-mono text-[10px] bg-black/80 p-2 border-l-2 border-neon-blue">
                        ID_STATUS: VERIFIED<br>
                        LOC: LUBUMBASHI_DRC
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="work" class="py-32 bg-cyber-black">
        <div class="container mx-auto px-8">
            <h2 class="text-xs font-mono text-neon-blue mb-12 tracking-[0.5em] uppercase">// SELECTED_RECORDS</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                @forelse($projects as $project)
                    <div class="{{ $loop->first ? 'md:col-span-8' : 'md:col-span-4' }} bg-dark-gray border border-white/5 p-12 hover:border-neon-blue/50 transition-all min-h-[400px] flex flex-col justify-between group">
                        <div>
                            <span class="text-neon-blue font-mono text-[10px] tracking-widest block mb-4 uppercase">// {{ $project->category }}</span>
                            <h3 class="text-3xl font-bold uppercase mb-4 group-hover:translate-x-2 transition-transform">{{ $project->title }}</h3>
                            <p class="opacity-40 text-sm max-w-sm leading-relaxed">{{ $project->description }}</p>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @foreach(explode(',', $project->technologies) as $tech)
                                <span class="text-[9px] border border-white/10 px-3 py-1 uppercase">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p class="col-span-12 text-center opacity-30 italic py-20 border border-dashed border-white/10 rounded-xl">
                        Aucun projet archivé pour le moment.
                    </p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="contact" class="py-32 bg-cyber-black border-t border-white/5">
        <div class="container mx-auto px-8 max-w-4xl text-center">
            <h2 class="text-5xl font-display font-bold uppercase mb-12">Initialize <span class="text-neon-blue">Contact</span></h2>
            
            @if(session('success'))
                <div class="mb-8 p-4 bg-neon-blue/10 border border-neon-blue text-neon-blue text-xs uppercase font-bold tracking-widest">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                @csrf
                <input type="text" name="name" placeholder="NOM COMPLET" required class="bg-dark-gray border border-white/5 p-4 focus:border-neon-blue outline-none text-xs uppercase tracking-widest">
                <input type="email" name="email" placeholder="EMAIL" required class="bg-dark-gray border border-white/5 p-4 focus:border-neon-blue outline-none text-xs uppercase tracking-widest">
                <textarea name="message" placeholder="MESSAGE_DETAILS" rows="4" required class="md:col-span-2 bg-dark-gray border border-white/5 p-4 focus:border-neon-blue outline-none text-xs uppercase tracking-widest"></textarea>
                <button type="submit" class="md:col-span-2 bg-white text-black font-bold p-4 hover:bg-neon-blue transition-colors uppercase text-xs tracking-[0.3em]">
                    Envoyer la Requête
                </button>
            </form>
        </div>
    </section>

    <footer class="py-10 bg-cyber-black text-center border-t border-white/5">
        <p class="text-[8px] opacity-20 uppercase tracking-[0.8em]">&copy; {{ date('Y') }} BIENVENU MUNKULU NGULUNGU</p>
    </footer>

    <script>
        const lenis = new Lenis();
        function raf(time) { lenis.raf(time); requestAnimationFrame(raf); }
        requestAnimationFrame(raf);

        gsap.registerPlugin(ScrollTrigger);

        gsap.from(".lg:col-span-5", {
            x: 100, opacity: 0, duration: 1.5, ease: "power4.out", delay: 0.5
        });
    </script>
</body>
</html>