document.addEventListener("DOMContentLoaded", function () {
  const carousels = document.querySelectorAll(".carousel");

  carousels.forEach((carousel) => {
    const slides = carousel.querySelector(".slides");
    const dots = carousel.querySelector(".navigation-dots");
    const prevBtn = carousel.querySelector(".prev");
    const nextBtn = carousel.querySelector(".next");
    const images = carousel.querySelectorAll(".slides img");

    let slideIndex = 0;
    let autoSlide = false;

    // Initialize navigation dots
    for (let i = 0; i < images.length; i++) {
      const dot = document.createElement("span");
      dot.classList.add("dot");
      dots.appendChild(dot);
    }

    const dotsArray = Array.from(dots.children);

    function showSlide(n) {
      slides.style.opacity = 0;

      setTimeout(() => {
        slides.style.transform = `translateX(-${n * 100}%)`;
        slides.style.opacity = 1;
      }, 300);

      dotsArray.forEach((dot, index) => {
        if (index === n) {
          dot.classList.add("active");
        } else {
          dot.classList.remove("active");
        }
      });
    }

    function nextSlide() {
      if (slideIndex === images.length - 1) {
        slideIndex = 0;
      } else {
        slideIndex++;
      }
      showSlide(slideIndex);
    }

    function prevSlide() {
      if (slideIndex === 0) {
        slideIndex = images.length - 1;
      } else {
        slideIndex--;
      }
      showSlide(slideIndex);
    }

    function autoSlideShow() {
      if (autoSlide) {
        nextSlide();
      }
      setTimeout(autoSlideShow, 5000); 
    }

    dotsArray.forEach((dot, index) => {
      dot.addEventListener("click", () => {
        slideIndex = index;
        showSlide(slideIndex);
      });
    });

    prevBtn.addEventListener("click", prevSlide);
    nextBtn.addEventListener("click", nextSlide);

    autoSlideShow();
  });
});
