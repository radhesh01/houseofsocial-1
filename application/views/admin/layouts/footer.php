</div><!-- /#a-content -->
</div><!-- /#a-main -->

<script>
(function() {
    var sb = document.getElementById('a-sidebar'),
        ov = document.getElementById('a-overlay'),
        btn = document.getElementById('a-menu-btn'),
        icon = document.getElementById('a-ham-icon');
    var isOpen = false;

    function open() {
        isOpen = true;
        if (sb) sb.classList.add('open');
        if (ov) ov.classList.add('show');
        document.body.style.overflow = 'hidden';
        if (btn) btn.setAttribute('aria-expanded', 'true');
        if (icon) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
        }
    }

    function close() {
        isOpen = false;
        if (sb) sb.classList.remove('open');
        if (ov) ov.classList.remove('show');
        document.body.style.overflow = '';
        if (btn) btn.setAttribute('aria-expanded', 'false');
        if (icon) {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    }
    window.aSidebarToggle = function() {
        isOpen ? close() : open();
    };
    window.aSidebarClose = close;

    if (sb) {
        sb.querySelectorAll('.a-link').forEach(function(el) {
            el.addEventListener('click', function() {
                if (window.innerWidth <= 768) close();
            });
        });
    }
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && isOpen) close();
    });
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            sb && sb.classList.remove('open');
            ov && ov.classList.remove('show');
            document.body.style.overflow = '';
            isOpen = false;
        }
    });
}());
</script>
</body>

</html>