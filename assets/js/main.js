/**
* Template Name: Append
* Updated: Jul 27 2023 with Bootstrap v5.3.1
* Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
document.addEventListener('DOMContentLoaded', () => {
  "use strict";


  /**
   * Scroll top button
   */
  // let scrollTop = document.querySelector('.scroll-top');

  // function toggleScrollTop() {
  //   if (scrollTop) {
  //     window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
  //   }
  // }
  // scrollTop.addEventListener('click', (e) => {
  //   e.preventDefault();
  //   window.scrollTo({
  //     top: 0,
  //     behavior: 'smooth'
  //   });
  // });

  // window.addEventListener('load', toggleScrollTop);
  // document.addEventListener('scroll', toggleScrollTop);

  /**
   * Preloader
   */
  // const preloader = document.querySelector('#preloader');
  // if (preloader) {
  //   window.addEventListener('load', () => {
  //     preloader.remove();
  //   });
  // }

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  const selectBody = document.querySelector('body');
  const selectHeader = document.querySelector('#header');

  function toggleScrolled() {
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Scroll up sticky header to headers with .scroll-up-sticky class
   */
  let lastScrollTop = 0;
  window.addEventListener('scroll', function() {
    if (!selectHeader.classList.contains('scroll-up-sticky')) return;

    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop && scrollTop > selectHeader.offsetHeight) {
      selectHeader.style.setProperty('position', 'sticky', 'important');
      selectHeader.style.top = `-${header.offsetHeight + 50}px`;
    } else if (scrollTop > selectHeader.offsetHeight) {
      selectHeader.style.setProperty('position', 'sticky', 'important');
      selectHeader.style.top = "0";
    } else {
      selectHeader.style.removeProperty('top');
      selectHeader.style.removeProperty('position');
    }
    lastScrollTop = scrollTop;
  });

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .has-dropdown i').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      if (document.querySelector('.mobile-nav-active')) {
        e.preventDefault();
        this.parentNode.classList.toggle('active');
        this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
        e.stopImmediatePropagation();
      }
    });
  });

  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  window.addEventListener('load', function(e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  });

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Initiate Pure Counter
   */
  new PureCounter();

  /**
   * Init isotope layout and filters
   */
  function initIsotopeLayout() {
    document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
      let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
      let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
      let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

      let initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
        itemSelector: '.isotope-item',
        layoutMode: layout,
        filter: filter,
        sortBy: sort
      });

      isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
        filters.addEventListener('click', function() {
          isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
          this.classList.add('filter-active');
          initIsotope.arrange({
            filter: this.getAttribute('data-filter')
          });
          if (typeof aosInit === 'function') {
            aosInit();
          }
        }, false);
      });

    });
  }
  window.addEventListener('load', initIsotopeLayout);

  /**
   * Frequently Asked Questions Toggle
   */
  document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
    faqItem.addEventListener('click', () => {
      faqItem.parentNode.classList.toggle('faq-active');
    });
  });

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll('.swiper').forEach(function(swiper) {
      let config = JSON.parse(swiper.querySelector('.swiper-config').innerHTML.trim());
      new Swiper(swiper, config);
    });
  }
  window.addEventListener('load', initSwiper);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

});


// // <!-- Add this script at the end of your HTML body -->

// function recaptchaCallback() {
//   // Hide the reCAPTCHA error message when reCAPTCHA is successfully completed
//   document.querySelector('.g-recaptcha-error').style.display = 'none';
// }

// // Form submission handling
// document.querySelector('.contact_form').addEventListener('submit', function(event) {
//   var response = grecaptcha.getResponse();
//   if (response.length === 0) {
//     // Show the reCAPTCHA error message and prevent form submission
//     document.querySelector('.g-recaptcha-error').style.display = 'block';
//     event.preventDefault();
//   }
// });



//   // <!-- Captcha Validation script -->
  
//     const form = document.querySelector('.contact_form');
//     const submitButton = form.querySelector('button[type="submit"]');
//     const successMessage = form.querySelector('.sent-message');
//     const recaptchaContainer = form.querySelector('.g-recaptcha');
  
//     form.addEventListener('submit', async (event) => {
//       event.preventDefault();
  
//       submitButton.disabled = true; // Disable the submit button
//       submitButton.innerText = 'Sending...'; // Change button text
  
//       const recaptchaResponse = grecaptcha.getResponse(); // Get reCAPTCHA response
  
//       if (!recaptchaResponse) {
//         recaptchaContainer.classList.add('invalid-captcha'); // Add the CSS class
//         submitButton.disabled = false; // Enable the submit button
//         submitButton.innerText = 'Send Message'; // Restore button text
//         return;
//       }
  
//       // Remove the CSS class if reCAPTCHA is completed
//       recaptchaContainer.classList.remove('invalid-captcha');
  
//       const formData = new FormData(form);
//       formData.append('recaptcha_response', recaptchaResponse); // Append to form data
  
//       try {
//         const response = await fetch('contact.php', {
//           method: 'POST',
//           body: formData,
//         });
  
//         if (response.ok) {
//          // successMessage.style.display = 'block';
//           alert('Message sent successfully!');
//           form.reset();
//           grecaptcha.reset(); // Reset reCAPTCHA
//           submitButton.innerText = 'Send Message'; // Restore button text
//           submitButton.disabled = false; // Enable the submit button
//         } else {
//           console.error('Error submitting form');
//           submitButton.innerText = 'Send Message'; // Restore button text
//           submitButton.disabled = false; // Enable the submit button
//         }
//       } catch (error) {
//         console.error('Error:', error);
//         submitButton.innerText = 'Send Message'; // Restore button text
//         submitButton.disabled = false; // Enable the submit button
//       }
//     });
    

