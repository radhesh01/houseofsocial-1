</div><!-- /#cc-content -->
</div><!-- /#cc-main -->

<script>
(function() {
    var sidebar = document.getElementById('cc-sidebar');
    var overlay = document.getElementById('cc-overlay');
    var menuBtn = document.getElementById('cc-menu-btn');
    var menuIcon = document.getElementById('cc-menu-icon');
    var isOpen = false;

    function openSidebar() {
        isOpen = true;
        sidebar.classList.add('open');
        overlay.classList.add('show');
        document.body.style.overflow = 'hidden';
        if (menuBtn) menuBtn.setAttribute('aria-expanded', 'true');
        if (menuIcon) {
            menuIcon.classList.remove('fa-bars');
            menuIcon.classList.add('fa-times');
        }
    }

    function closeSidebar() {
        isOpen = false;
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
        document.body.style.overflow = '';
        if (menuBtn) menuBtn.setAttribute('aria-expanded', 'false');
        if (menuIcon) {
            menuIcon.classList.remove('fa-times');
            menuIcon.classList.add('fa-bars');
        }
    }

    window.ccToggleSidebar = function() {
        isOpen ? closeSidebar() : openSidebar();
    };
    window.ccCloseSidebar = closeSidebar;

    if (sidebar) {
        sidebar.querySelectorAll('.sidebar-link').forEach(function(el) {
            el.addEventListener('click', function() {
                if (window.innerWidth <= 768) closeSidebar();
            });
        });
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && isOpen) closeSidebar();
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
            document.body.style.overflow = '';
            isOpen = false;
        }
    });
}());
</script>

</body>

</html>