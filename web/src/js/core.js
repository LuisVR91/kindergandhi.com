var CORE = CORE || {};

(function () {
  // all your code here

  CORE.sw = {
    init: function () {
      CORE.sw.swRegister();
      CORE.sw.swIMG();
    },

    swRegister: function () {
      if ("serviceWorker" in navigator) {
        navigator.serviceWorker.register("sw-3.js");
      }
    },

    swIMG: function () {
      // Registering Service Worker

      var imagesToLoad = document.querySelectorAll("img[data-src]");
      var loadImages = function (image) {
        image.setAttribute("src", image.getAttribute("data-src"));
        image.onload = function () {
          image.removeAttribute("data-src");
        };
      };

      if ("IntersectionObserver" in window) {
        var observer = new IntersectionObserver(function (items, observer) {
          items.forEach(function (item) {
            if (item.isIntersecting) {
              loadImages(item.target);
              console.log("vista");
              observer.unobserve(item.target);
              // deja de ser obserbado
            }
          });
        });

        imagesToLoad.forEach(function (img) {
          observer.observe(img);
        });
      } else {
        imagesToLoad.forEach(function (img) {
          loadImages(img);
        });
      }
    },
  };

  CORE.gallery = {
    init: function () {

      if ($galleryImg){  
      CORE.gallery.indexPage();
      CORE.sw.swIMG(); 
      }

     
    },

    indexPage: async function () {
    
      const posts = await create($galleryImg.getAttribute("gallery-img"));


      function create(lenght) {
        for (let i = 1; i <= lenght; i++) {
          $galleryImg.innerHTML += `
        <a class="grid-item" href="./src/img/gallery/(${i}).jpg" data-lightbox="gallery-item">
                   <img class="observer" src="./core/data-src.png"  data-src="./src/img/gallery/op (${i}).jpg" alt="Gallery Thumb 1">
               </a>`;
        }
      }
      return $galleryImg;
    },
  };

  CORE.social = {
    init: function () {
if($sociales){
CORE.social.socialLink();
}
    },

    socialLink: function () {
     
      // console.log(`Se encontraron ${sociales.length} sociales`);

      $sociales.forEach((social) => {
        switch (social.getAttribute("social-link")) {
          case "facebook":
            // console.log('hay uno de facebook');
            social.removeAttribute("social-link");
            social.setAttribute("href", "https://www.facebook.com/jngandhitp/");
            social.setAttribute("target", "_blank");

            break;

          case "whatsapp":
            // console.log('hay uno de whatsapp');
            social.removeAttribute("social-link");
            social.setAttribute(
              "href",
              "https://api.whatsapp.com/send?phone=+525572720800"
            );
            break;

          case "maps":
            // console.log('hay uno de whatsapp');
            social.removeAttribute("social-link");
            social.setAttribute(
              "href",
              "https://goo.gl/maps/gbU7vtm8haNrkGi97"
            );
            social.setAttribute("target", "_blank");
            break;

          case "phone":
            // console.log('hay uno de whatsapp');
            social.removeAttribute("social-link");
            social.setAttribute("href", "tel://5572720800");
            break;

            case "phone-whatsapp":
              // console.log('hay uno de whatsapp');
              social.removeAttribute("social-link");
              social.setAttribute("href", "tel://5572720800");
              break;

          default:
            console.log("error social");
            break;
        }
      });
    },
    // fin de sociales.forEach
  };


//creando variables
 let $galleryImg = document.querySelector("[gallery-img]");
 let $sociales = document.querySelectorAll("[social-link]");

  CORE.onload = function () {
    CORE.sw.init();


   CORE.gallery.init() ;
   CORE.social.init();
  
  
  };

  // FIN
})();

module.exports = CORE;
