<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOVIC | Portfolio Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;700;800&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/@studio-freight/lenis@1.0.33/dist/lenis.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fdfaf3; overflow-x: hidden; }
        .cursor-follower { pointer-events: none; mix-blend-mode: difference; z-index: 999; }
        .glass-card { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.3); }
        .brush-bg { mask-image: url('https://www.transparenttextures.com/patterns/asfalt-dark.png'); }
        #experience { perspective: 1000px; }
    </style>
</head>
<body class="text-[#1a2e35]">

    <div id="cursor" class="cursor-follower fixed w-8 h-8 bg-white rounded-full lg:block hidden"></div>

    <nav class="fixed top-0 w-full z-50 flex justify-between items-center px-10 py-6 mix-blend-difference text-white">
        <div class="text-2xl font-bold tracking-tighter">NOVIC.</div>
        <div class="space-x-8 hidden md:flex font-medium uppercase text-xs tracking-widest">
            <a href="#home" class="hover:opacity-50 transition">Home</a>
            <a href="#works" class="hover:opacity-50 transition">Travaux</a>
            <a href="#experience" class="hover:opacity-50 transition">Experience</a>
            <a href="#contact" class="hover:opacity-50 transition">Contact</a>
        </div>
    </nav>

    <section id="home" class="min-h-screen flex flex-col justify-center items-center relative px-6 pt-20">
        <div class="container mx-auto grid lg:grid-cols-2 gap-12 items-center">
            <div class="hero-text order-2 lg:order-1">
                <h1 class="text-7xl lg:text-9xl font-extrabold leading-[0.9] tracking-tighter mb-8">
                    salut,<br><span class="text-[#2d5a52]">c'est NOVIC</span>
                </h1>
                <p class="text-xl max-w-md opacity-70 mb-10">Futur ingénieur en IA. Je transforme les données en expériences visuelles.</p>
                <a href="#works" class="bg-[#2d5a52] text-white px-8 py-4 rounded-full font-bold hover:scale-105 transition-transform inline-block">Voir mes projets</a>
            </div>
            <div class="relative order-1 lg:order-2 flex justify-center items-center py-20">
                <div class="absolute w-[120%] h-[120%] bg-[#2d5a52] brush-bg -rotate-12 rounded-3xl opacity-20 blur-3xl scale-90"></div>
                <div class="relative w-80 h-[450px] bg-[#e8e4da] rounded-[4rem] overflow-hidden shadow-2xl" id="photo-wrapper">
                    <img src="novicmaphoto.jpeg" alt="Novic" class="w-full h-full object-cover grayscale">
                </div>
            </div>
        </div>
    </section>

    <section id="works" class="py-32 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-5xl font-bold mb-16">MES RÉALISATIONS</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="glass-card p-8 rounded-3xl border border-black/5 hover:border-[#2d5a52] transition-colors group">
                        <span class="text-xs font-bold text-[#2d5a52] uppercase tracking-widest">Projet #<?php echo e($loop->iteration); ?></span>
                        <h3 class="text-3xl font-bold mt-2 mb-4 group-hover:translate-x-2 transition-transform"><?php echo e($project->title); ?></h3>
                        <p class="opacity-70 leading-relaxed"><?php echo e($project->description); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-xl opacity-50">Aucun projet pour le moment. (Utilise php artisan tinker pour en ajouter !)</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="contact" class="py-32 bg-[#2d5a52] text-white">
        <div class="container mx-auto px-6 max-w-4xl">
            <h2 class="text-5xl font-bold mb-12 text-center">CONTACTE-MOI</h2>
            
            <?php if(session('success')): ?>
                <div class="bg-white/20 p-4 rounded-xl mb-8 text-center border border-white/30">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form action="/contact" method="POST" class="space-y-6">
                <?php echo csrf_field(); ?>
                <div class="grid md:grid-cols-2 gap-6">
                    <input type="text" name="name" placeholder="Ton nom" required class="w-full p-4 rounded-2xl bg-white/10 border border-white/20 focus:bg-white/20 outline-none transition">
                    <input type="email" name="email" placeholder="Ton email" required class="w-full p-4 rounded-2xl bg-white/10 border border-white/20 focus:bg-white/20 outline-none transition">
                </div>
                <textarea name="content" placeholder="Ton message" rows="5" required class="w-full p-4 rounded-2xl bg-white/10 border border-white/20 focus:bg-white/20 outline-none transition"></textarea>
                <button type="submit" class="w-full py-4 bg-white text-[#2d5a52] font-bold rounded-2xl hover:bg-opacity-90 transition">Envoyer le message</button>
            </form>
        </div>
    </section>

    <footer class="py-10 text-center opacity-40 text-sm">
        &copy; 2026 NOVIC Katatana - Réalisé avec Laravel & Tailwind
    </footer>

    <script>
        // Smooth Scroll & Animations GSAP (ceux que tu avais déjà)
        const lenis = new Lenis();
        function raf(time) { lenis.raf(time); requestAnimationFrame(raf); }
        requestAnimationFrame(raf);

        const cursor = document.getElementById('cursor');
        document.addEventListener('mousemove', (e) => {
            gsap.to(cursor, { x: e.clientX, y: e.clientY, duration: 0.1 });
        });
    </script>
</body>
</html><?php /**PATH C:\xampp_new\htdocs\portfolio_tp\resources\views/welcome.blade.php ENDPATH**/ ?>