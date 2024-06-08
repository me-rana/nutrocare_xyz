<footer>
    <!-- place footer here -->
    <div class="container">
        @foreach ($pages as $page)
            <a href="{{ url('page/'.$page->slug) }}">{{ $page->name }}</a>
        @endforeach
      </div>
</footer>
<!-- Bootstrap JavaScript Libraries -->
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"
></script>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
const progressCircle = document.querySelector(".autoplay-progress svg");
const progressContent = document.querySelector(".autoplay-progress span");
var swiper = new Swiper(".mySwiper", {
spaceBetween: 30,
centeredSlides: true,
autoplay: {
delay: 2500,
disableOnInteraction: false
},
pagination: {
el: ".swiper-pagination",
clickable: true
},
navigation: {
nextEl: ".swiper-button-next",
prevEl: ".swiper-button-prev"
},
on: {
autoplayTimeLeft(s, time, progress) {
  progressCircle.style.setProperty("--progress", 1 - progress);
  progressContent.textContent = `${Math.ceil(time / 1000)}s`;
}
}
});
</script>
</body>
</html>
