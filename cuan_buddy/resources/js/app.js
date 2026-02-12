import './bootstrap';
// script.js


document.addEventListener('DOMContentLoaded', () => {
    // 1. MOBILE MENU TOGGLE
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    const mobileLinks = document.querySelectorAll('.mobile-link');
    let isMenuOpen = false;

    if (btn) {
        btn.addEventListener('click', () => {
            isMenuOpen = !isMenuOpen;
            if (isMenuOpen) {
                menu.classList.remove('translate-y-[-100%]', 'opacity-0', 'pointer-events-none');
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } else {
                menu.classList.add('translate-y-[-100%]', 'opacity-0', 'pointer-events-none');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        });
    }

    // Close menu when link is clicked
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            isMenuOpen = false;
            menu.classList.add('translate-y-[-100%]', 'opacity-0', 'pointer-events-none');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            document.body.style.overflow = 'auto';
        });
    });

    // 2. FAQ ACCORDION
    const faqBtns = document.querySelectorAll('.faq-btn');
    faqBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const content = btn.nextElementSibling;
            const icon = btn.querySelector('svg');

            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                icon.classList.remove('rotate-180');
                btn.classList.remove('text-emerald-600');
            } else {
                document.querySelectorAll('.accordion-content').forEach(el => el.style.maxHeight = null);
                document.querySelectorAll('.faq-btn svg').forEach(el => el.classList.remove('rotate-180'));
                document.querySelectorAll('.faq-btn').forEach(el => el.classList.remove('text-emerald-600'));

                content.style.maxHeight = content.scrollHeight + "px";
                icon.classList.add('rotate-180');
                btn.classList.add('text-emerald-600');
            }
        });
    });

    // 3. SCROLL REVEAL ANIMATION
    const revealElements = document.querySelectorAll('.reveal');
    const revealOnScroll = () => {
        const windowHeight = window.innerHeight;
        const elementVisible = 150;

        revealElements.forEach((reveal) => {
            const elementTop = reveal.getBoundingClientRect().top;
            if (elementTop < windowHeight - elementVisible) {
                reveal.classList.add('active');
            }
        });
    }
    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll();

    // 4. NAVBAR SCROLL EFFECT
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('shadow-sm');
            navbar.querySelector('div').classList.replace('h-20', 'h-16');
        } else {
            navbar.classList.remove('shadow-sm');
            navbar.querySelector('div').classList.replace('h-16', 'h-20');
        }
    });
});