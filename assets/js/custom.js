<!-- Add this before closing body tag -->
<script>
// Scroll reveal animation
document.addEventListener('DOMContentLoaded', function() {
  const scrollRevealElements = document.querySelectorAll('.scroll-reveal');
  
  const revealOnScroll = () => {
    scrollRevealElements.forEach(element => {
      const elementTop = element.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      
      if (elementTop < windowHeight - 100) {
        element.classList.add('active');
      }
    });
  };
  
  window.addEventListener('scroll', revealOnScroll);
  revealOnScroll(); // Initial check
});
</script>