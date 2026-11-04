function showSidebar() {
    document.getElementById('mobileSidebar').classList.add('show');
    document.getElementById('mobileToggleBtn').style.display = 'none';
}
function hideSidebar() {
    document.getElementById('mobileSidebar').classList.remove('show');
    document.getElementById('mobileToggleBtn').style.display = '';
    // Tutup dropdown jika sidebar ditutup
    document.getElementById('profileDropdownMobile').parentElement.classList.remove('show');
}

// Dropdown Profile di sidebar mobile: buka/tutup dengan klik
document.addEventListener('DOMContentLoaded', function() {
    var profileDropdownMobile = document.getElementById('profileDropdownMobile');
    if (profileDropdownMobile) {
        profileDropdownMobile.addEventListener('click', function(e) {
            e.preventDefault();
            var parent = profileDropdownMobile.parentElement;
            parent.classList.toggle('show');
        });
    }

    const swiper = new Swiper('.gallery-swiper', {
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        speed: 800,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        }
    });

    // Swiper untuk berita
    if (document.querySelector('.swiper-news')) {
        var swiperNews = new Swiper('.swiper-news', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
            pagination: {
                el: '.swiper-news-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.tombol-news:last-child',
                prevEl: '.tombol-news:first-child',
            },
            breakpoints: {
                576: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                992: { slidesPerView: 3 }
            }
        });
    }
});

const scrollToTopBtn = document.getElementById("scrollToTopBtn");

window.addEventListener("scroll", () => {
  if (window.scrollY > 300) {
    scrollToTopBtn.classList.add("show");
  } else {
    scrollToTopBtn.classList.remove("show");
  }
});

scrollToTopBtn.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
});

