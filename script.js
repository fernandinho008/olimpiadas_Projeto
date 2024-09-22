function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
}

function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    
    section.scrollIntoView({
        behavior: 'smooth'
    });
}