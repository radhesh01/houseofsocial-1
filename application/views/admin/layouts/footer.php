</div><!-- /#fc-content -->
</div><!-- /#fc-main -->

<script>
(function() {
    var sidebar = document.getElementById('fc-sidebar');
    var overlay = document.getElementById('fc-overlay');
    var menuBtn = document.getElementById('fc-menu-btn');
    var menuIcon = document.getElementById('fc-menu-icon');
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

    /* Expose to onclick= attributes in header */
    window.fcToggleSidebar = function() {
        isOpen ? closeSidebar() : openSidebar();
    };
    window.fcCloseSidebar = closeSidebar;

    /* Close when a nav link is clicked (mobile UX) */
    if (sidebar) {
        sidebar.querySelectorAll('.sidebar-link').forEach(function(el) {
            el.addEventListener('click', function() {
                if (window.innerWidth <= 768) closeSidebar();
            });
        });
    }

    /* Close on Escape */
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && isOpen) closeSidebar();
    });

    /* Re-open if window resizes to desktop while hidden */
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