$('.banner').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 1500,
});

$('.slideEventos').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$('.slideGaleria').slick({
  slidesToShow: 6,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 1500,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$('.slideDepoimentos').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 9000,
});

new WOW().init();

/* MENU MOBILE */
document.querySelector(".abrir-menu").onclick = function(){
  // alert("Cliquei no botão ABRIR MENU")
  document.documentElement.classList.add("menu-mobile");
}

document.querySelector(".fechar-menu").onclick = function(){
  // alert("Cliquei no botão FECHAR MENU")
  document.documentElement.classList.remove("menu-mobile");
}

// On Scroll //

let menuFixoTimeout = null;

window.onscroll = function() {
  var top = window.scrollY;
  var topoFixo = this.document.getElementById("topoFixo");

  if (top >= 400) {
    if (menuFixoTimeout) {
      clearTimeout(menuFixoTimeout);
      menuFixoTimeout = null;
    }

    topoFixo.classList.remove('menu-fixo-saindo');
    topoFixo.classList.add('menu-fixo');
  } else {
    if (topoFixo.classList.contains('menu-fixo')) {
      topoFixo.classList.add('menu-fixo-saindo');
    }
    if (menuFixoTimeout) {
      clearTimeout(menuFixoTimeout);
    }

    menuFixoTimeout = setTimeout(function() {
      topoFixo.classList.remove('menu-fixo');
      topoFixo.classList.remove('menu-fixo-saindo');
      menuFixoTimeout = null;
    }, 600);
  }
}