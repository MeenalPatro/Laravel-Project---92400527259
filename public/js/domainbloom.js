document.addEventListener('DOMContentLoaded', () => {
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const revealTargets = document.querySelectorAll([
        '.public-body main > section:not(.hero-section)',
        '.public-body .feature-card',
        '.public-body .step-card',
        '.public-body .auth-card',
        '.panel-body .welcome-banner',
        '.panel-body .stat-card',
        '.panel-body .panel-card',
        '.panel-body .detail-card',
        '.panel-body .form-card',
    ].join(','));

    if (!reduceMotion && 'IntersectionObserver' in window && revealTargets.length) {
        revealTargets.forEach((element, index) => {
            element.classList.add('scroll-reveal');
            element.style.setProperty('--reveal-delay', `${(index % 5) * 65}ms`);
        });
        document.documentElement.classList.add('motion-ready');

        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            });
        }, { rootMargin: '0px 0px -36px 0px', threshold: 0.08 });

        revealTargets.forEach((element) => revealObserver.observe(element));
    }

    const navToggle = document.querySelector('[data-nav-toggle]');
    const navMenu = document.querySelector('[data-nav-menu]');
    navToggle?.addEventListener('click', () => {
        const open = navMenu.classList.toggle('open');
        navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        navToggle.setAttribute('aria-label', open ? 'Close navigation' : 'Open navigation');
        navToggle.textContent = open ? '×' : '☰';
    });

    const sidebarToggle = document.querySelector('[data-sidebar-toggle]');
    const sidebar = document.querySelector('[data-sidebar]');
    sidebarToggle?.addEventListener('click', () => {
        const open = sidebar.classList.toggle('open');
        sidebarToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        sidebarToggle.textContent = open ? '×' : '☰';
    });
    document.addEventListener('click', (event) => {
        if (sidebar?.classList.contains('open') && !sidebar.contains(event.target) && !sidebarToggle?.contains(event.target)) {
            sidebar.classList.remove('open');
            sidebarToggle?.setAttribute('aria-expanded', 'false');
            if (sidebarToggle) sidebarToggle.textContent = '☰';
        }
    });

    document.querySelectorAll('[data-confirm]').forEach((form) => form.addEventListener('submit', (event) => {
        if (!window.confirm(form.dataset.confirm)) event.preventDefault();
    }));
    document.querySelectorAll('[data-dismiss]').forEach((button) => button.addEventListener('click', () => button.closest('.flash')?.remove()));

    document.querySelectorAll('[data-count-up]').forEach((element) => {
        const value = Number(element.dataset.countUp || 0);
        if (!Number.isFinite(value) || value <= 0 || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        const start = performance.now();
        const duration = 650;
        const tick = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            element.textContent = Math.round(value * (1 - Math.pow(1 - progress, 3))).toLocaleString();
            if (progress < 1) requestAnimationFrame(tick);
        };
        requestAnimationFrame(tick);
    });

    document.querySelectorAll('[data-domain-chart]').forEach((canvas) => {
        const labels = JSON.parse(canvas.dataset.labels || '[]');
        const values = JSON.parse(canvas.dataset.values || '[]').map(Number);
        const context = canvas.getContext('2d');
        const colors = ['#bf8eaf', '#efc96f', '#a9c8e2', '#d99fab'];
        const draw = () => {
            const ratio = window.devicePixelRatio || 1;
            const width = canvas.clientWidth;
            const height = canvas.clientHeight;
            canvas.width = width * ratio;
            canvas.height = height * ratio;
            context.scale(ratio, ratio);
            context.clearRect(0, 0, width, height);
            const max = Math.max(1, ...values);
            const gap = width / (labels.length * 2 + 1);
            const barWidth = Math.min(40, gap * .9);
            const chartHeight = height - 25;
            context.strokeStyle = '#f0eaf2';
            context.lineWidth = 1;
            for (let i = 0; i < 4; i++) {
                const y = 8 + (chartHeight / 3) * i;
                context.beginPath(); context.moveTo(7, y); context.lineTo(width - 7, y); context.stroke();
            }
            labels.forEach((label, index) => {
                const barHeight = Math.max(values[index] > 0 ? 4 : 0, (values[index] / max) * (chartHeight - 8));
                const x = gap + index * gap * 2 + (gap - barWidth) / 2;
                const y = chartHeight - barHeight + 8;
                const gradient = context.createLinearGradient(0, y, 0, y + barHeight);
                gradient.addColorStop(0, colors[index % colors.length]);
                gradient.addColorStop(1, `${colors[index % colors.length]}88`);
                context.fillStyle = gradient;
                context.beginPath();
                context.roundRect(x, y, barWidth, barHeight, [7, 7, 2, 2]);
                context.fill();
                context.fillStyle = '#968a9b';
                context.font = '9px DM Sans, sans-serif';
                context.textAlign = 'center';
                context.fillText(label, x + barWidth / 2, height - 3);
                context.fillStyle = '#665a6e';
                context.font = 'bold 10px DM Sans, sans-serif';
                context.fillText(String(values[index] || 0), x + barWidth / 2, Math.max(10, y - 6));
            });
        };
        draw();
        window.addEventListener('resize', draw, { passive: true });
    });

    document.querySelectorAll('[data-bar-chart]').forEach((container) => {
        const labels = JSON.parse(container.dataset.labels || '[]');
        const values = JSON.parse(container.dataset.values || '[]').map(Number);
        const max = Math.max(1, ...values);
        labels.forEach((label, index) => {
            const group = document.createElement('div'); group.className = 'bar-group';
            const rail = document.createElement('div'); rail.className = 'bar-rail';
            const fill = document.createElement('div'); fill.className = 'bar-fill';
            fill.style.height = `${Math.max(values[index] > 0 ? 4 : 0, (values[index] / max) * 100)}%`;
            rail.append(fill);
            const value = document.createElement('strong'); value.textContent = String(values[index] || 0);
            const month = document.createElement('small'); month.textContent = label;
            group.append(value, rail, month); container.append(group);
        });
    });
});
