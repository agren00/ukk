document.addEventListener("DOMContentLoaded", function() {
    const profileLink = document.querySelector('.nav-profile');
    const dropdownMenu = document.querySelector('.dropdown-menu.profile');

    // Menampilkan atau menyembunyikan dropdown menu saat profil diklik
    profileLink.addEventListener('click', function(event) {
        event.preventDefault();
        dropdownMenu.classList.toggle('show');
    });

    // Menyembunyikan dropdown menu saat klik di luar dropdown menu
    document.addEventListener('click', function(event) {
        if (!dropdownMenu.contains(event.target) && !profileLink.contains(event.target)) {
            dropdownMenu.classList.remove('show');
        }
    });
});
