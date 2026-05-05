</div><!-- /#fc-content -->
</div><!-- /#fc-main -->

<script>
function fcToggleSidebar() {
    var sb = document.getElementById('fc-sidebar');
    var ov = document.getElementById('fc-overlay');
    var btn = document.getElementById('fc-menu-btn');
    var open = sb.classList.toggle('open');
    ov.classList.toggle('show', open);
    btn.innerHTML = open ? '<i class="fa fa-times"></i>' : '<i class="fa fa-bars"></i>';
}

function fcCloseSidebar() {
    document.getElementById('fc-sidebar').classList.remove('open');
    document.getElementById('fc-overlay').classList.remove('show');
    document.getElementById('fc-menu-btn').innerHTML = '<i class="fa fa-bars"></i>';
}
// Close sidebar on nav link click (mobile)
document.querySelectorAll('#fc-sidebar .sidebar-link').forEach(function(el) {
    el.addEventListener('click', function() {
        if (window.innerWidth <= 768) fcCloseSidebar();
    });
});
</script>
</body>

</html>