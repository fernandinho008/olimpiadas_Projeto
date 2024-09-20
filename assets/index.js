 function toggleSidebar() {
const sidebar = document.getElementById('sidebar');
 sidebar.classList.toggle('open');
 }
$("i").click(function () {
    $("ul").toggleClass("open");
  });

  function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    
    section.scrollIntoView({
        behavior: 'smooth'
    });
}