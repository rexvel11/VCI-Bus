const swiper = new Swiper('.recipe-container', {
    grabCursor: true,
    spaceBetween: 40,

    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        0: {
            slidesPerView: 1
        },
        620: {
            slidesPerView: 2
        },
        1024: {
            slidesPerView: 4
        }
    }

  });

  let btn = document.querySelectorAll('.slider-btn');
         let line = document.querySelector('.line');
         let circle = document.querySelector('.big-circle');
         let images = document.querySelectorAll('.big-img img');

         images[0].style.transform = 'rotate(0deg)';

         btn.forEach((b, i) => {
          b.addEventListener('click', (e) => {
            let margin = (100 * i) + (20 * i);
            line.style.left = `${margin}px`;
            circle.style.transform = `rotate(${e.target.dataset.rotator}deg)`;
            
            images.forEach((img) => {
              img.style.transform = `rotate(-90deg)`;
            })

            images[i].style.transform = 'rotate(0deg)';
          })
         })