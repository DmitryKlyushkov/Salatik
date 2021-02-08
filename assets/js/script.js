("use strict");
function testWebP(callback) {
  var webP = new Image();
  webP.onload = webP.onerror = function () {
    callback(webP.height == 2);
  };
  webP.src =
    "data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA";
}

testWebP(function (support) {
  if (support == true) {
    document.querySelector("body").classList.add("webp");
  } else {
    document.querySelector("body").classList.add("no-webp");
  }
});
;

var 
    $window = $(window),
    $slider = $('.slider'),
    $dropDown = $(".dropdown"),
    $loginDropDown = $('.login-dropdown__container'),
    $loggedinDropDown = $('.header__login-container--loggedin i'),
    $loginContainer = $('.login__container'),
    $searchInput = $('.header__search-input'),
    $mobileMenu = $(".mobile-menu"),
    $afterDD = $(".dropdown:after"),
    $arrow = $(".scroll-top"),
    $ingredient = $(".ingredients__ingredient"),
    $chem = $(".calories__chem"),
    $checkbox = $(".checkbox");
    $placeholder = $('.recepies-profile__placeholder'),
    $select = $('.recepies-profile__select'),
    $profilePhoto = $('.recepies-profile__photo'),
    $login = $('#form-reg__login'),
    $name = $('#form-reg__name'),
    $password = $('#form-reg__password'),
    $password_re = $('#form-reg__password_re'),
    $formBtn = $('#form-reg__btn'),
    viewPortHeight = $(window).height();

/* Insert Menu Icons */
var menuItemHasChildren = $('.has-children > a');
menuItemHasChildren.append('<i class="icon-arrow-down">');

/* Scroll Top Button */
$window.on("scroll", function () {
  let windowOffset = $window.scrollTop();
  if (windowOffset >= viewPortHeight) {
    $arrow.css({
      visibility: "visible",
      opacity: "1",
    });
  } else {
    $arrow.css({
      visibility: "hidden",
      opacity: "0",
    });
  }
});

/* Smooth Scroll Top */
$arrow.on("click", function (e) {
  if (this.hash !== "") {
    e.preventDefault();

    const hash = this.hash;

    $("html, body").animate(
      {
        scrollTop: $(hash).offset().top,
      },
      800
    );
  }
});

/* Placeholder change */
$(window).on("DOMContentLoaded", function () {
  let 
    $searchBar = $(".header__search-bar"),
    $searchPlaceholder = $(".header__search-input"),
    searchBarWidth = $searchBar.width();

  if (searchBarWidth <= 249) {
    $searchPlaceholder.attr("placeholder", "Поиск");
  } else {
    $searchPlaceholder.attr("placeholder", "Поиск рецептов");
  }
});
$window.on("resize", function () {
  let 
    wWidth = $window.width(),
    $searchPlaceholder = $(".header__search-input");

  if (wWidth <= 1135) {
    $searchPlaceholder.attr("placeholder", "Поиск");
  } else {
    $searchPlaceholder.attr("placeholder", "Поиск рецептов");
  }
});

/* Burger-menu */
$(".menu-icon__container").on("click", function () {
  $(this).toggleClass("change");
  $mobileMenu.toggleClass("active");
});

var mobileMenuLink = $('.mobile-menu--bot li.dropdown > a');
mobileMenuLink.after('<i class="icon-arrow-down">');

/* Dropdown */
$dropDown.each(function () {
  $(this).on("click", function () {
    $(this).toggleClass("active");
    let container = $(this).next(".dropdown__container");
    let container2 = $(this).find(".dropdown__container");
    if (container.css("display") === "none") {
      container.css("display", "block");
    } else {
      container.css("display", "none");
    }
    if (container2.css("display") === "none") {
      container2.css("display", "block");
    } else {
      container2.css("display", "none");
    }
  });
});

$loggedinDropDown.on('click', function(){
    $(this).toggleClass("active");
    let container = $(this).next(".login__container");
    if (container.css("display") === "none") {
      container.css("display", "block");
    } else {
      container.css("display", "none");
    }
})

$(document).on('mouseup', function (e) {
  if ($loginDropDown.has(e.target).length === 0){
    $loginDropDown.hide();
  }
  else if ($searchInput.has(e.target).length === 0){
    $searchInput.hide();
  }
  if (($loginContainer.has(e.target).length === 0) && (e.target != $loggedinDropDown[0])){
    $loginContainer.css('display', 'none');
  }
});

/* Slider */
$slider.slick({
  arrows: true,
  nextArrow:
    '<button type="button" class="slick-next"><i class="icon-arrow"></i></button>',
  prevArrow:
    '<button type="button" class="slick-prev"><i class="icon-arrow"></i></button>',
  dots: true,
  adaptiveHeight: true, //align-items: flex-start для .slick-track
  slidesToShow: 1,
  slidesToScroll: 1,
  speed: 300,
  infinite: true,
});

/* Gallery */
baguetteBox.run(".gallery__card", {
  captions: true, // display image captions. [data-caption=""]
  buttons: false, // arrows navigation
  fullScreen: false,
  noScrollbars: true,
  bodyClass: "baguetteBox-open",
  titleTag: false,
  async: false,
  preload: 2,
  animation: "slideIn", // fadeIn or slideIn
  overlayBackgroundColor: "rgba(0,0,0,.9)",
});

/* Styled Checkbox */
$.each($checkbox, function (index, val) {

  let input = $(this).find("input");
  if (input.prop("checked") == true) {
    $(this).addClass("active");
  }
});
$checkbox.on("click", function (event) {
  let input = $(this).find("input");

  if ($(this).hasClass("active")) {
    input.prop("checked", false);
  } else {
    input.prop("checked", true);
  }
  $(this).toggleClass("active");

  return false;
});

/* Adaptive move */
("use strict");
// data-da="to which container, position, breakpoint"
(function () {
  let originalPositions = [];
  let daElements = document.querySelectorAll("[data-da]");
  let daElementsArray = [];
  let daMatchMedia = [];
  //filling arrays
  if (daElements.length > 0) {
    let number = 0;
    for (let index = 0; index < daElements.length; index++) {
      const daElement = daElements[index];
      const daMove = daElement.getAttribute("data-da");
      if (daMove != "") {
        const daArray = daMove.split(",");
        const daPlace = daArray[1] ? daArray[1].trim() : "last";
        const daBreakpoint = daArray[2] ? daArray[2].trim() : "767";
        const daType = daArray[3] === "min" ? daArray[3].trim() : "max";
        const daDestination = document.querySelector("." + daArray[0].trim());
        if (daArray.length > 0 && daDestination) {
          daElement.setAttribute("data-da-index", number);
          //filling an array of initial positions
          originalPositions[number] = {
            parent: daElement.parentNode,
            index: indexInParent(daElement),
          };
          //filling an array of elements
          daElementsArray[number] = {
            element: daElement,
            destination: document.querySelector("." + daArray[0].trim()),
            place: daPlace,
            breakpoint: daBreakpoint,
            type: daType,
          };
          number++;
        }
      }
    }
    dynamicAdaptSort(daElementsArray);

    //create an event on breakpoint
    for (let index = 0; index < daElementsArray.length; index++) {
      const el = daElementsArray[index];
      const daBreakpoint = el.breakpoint;
      const daType = el.type;

      daMatchMedia.push(
        window.matchMedia("(" + daType + "-width: " + daBreakpoint + "px)")
      );
      daMatchMedia[index].addListener(dynamicAdapt);
    }
  }
  //main function
  function dynamicAdapt(e) {
    for (let index = 0; index < daElementsArray.length; index++) {
      const el = daElementsArray[index];
      const daElement = el.element;
      const daDestination = el.destination;
      const daPlace = el.place;
      const daBreakpoint = el.breakpoint;
      const daClassname = "_dynamic_adapt_" + daBreakpoint;

      if (daMatchMedia[index].matches) {
        //transfer of elements
        if (!daElement.classList.contains(daClassname)) {
          let actualIndex = indexOfElements(daDestination)[daPlace];
          if (daPlace === "first") {
            actualIndex = indexOfElements(daDestination)[0];
          } else if (daPlace === "last") {
            actualIndex = indexOfElements(daDestination)[
              indexOfElements(daDestination).length
            ];
          }
          daDestination.insertBefore(
            daElement,
            daDestination.children[actualIndex]
          );
          daElement.classList.add(daClassname);
        }
      } else {
        //bring it back
        if (daElement.classList.contains(daClassname)) {
          dynamicAdaptBack(daElement);
          daElement.classList.remove(daClassname);
        }
      }
    }
    customAdapt();
  }

  //call the main function
  dynamicAdapt();

  function dynamicAdaptBack(el) {
    const daIndex = el.getAttribute("data-da-index");
    const originalPlace = originalPositions[daIndex];
    const parentPlace = originalPlace["parent"];
    const indexPlace = originalPlace["index"];
    const actualIndex = indexOfElements(parentPlace, true)[indexPlace];
    parentPlace.insertBefore(el, parentPlace.children[actualIndex]);
  }
  //get index inside parent
  function indexInParent(el) {
    var children = Array.prototype.slice.call(el.parentNode.children);
    return children.indexOf(el);
  }
  //get an array of element's indexes inside its parent
  function indexOfElements(parent, back) {
    const children = parent.children;
    const childrenArray = [];
    for (let i = 0; i < children.length; i++) {
      const childrenElement = children[i];
      if (back) {
        childrenArray.push(i);
      } else {
        //excluding moved element
        if (childrenElement.getAttribute("data-da") == null) {
          childrenArray.push(i);
        }
      }
    }
    return childrenArray;
  }
  //obj sorting
  function dynamicAdaptSort(arr) {
    arr.sort(function (a, b) {
      if (a.breakpoint > b.breakpoint) {
        return -1;
      } else {
        return 1;
      }
    });
    arr.sort(function (a, b) {
      if (a.place > b.place) {
        return 1;
      } else {
        return -1;
      }
    });
  }
  //Additional adaptation scenarios
  function customAdapt() {
    //const viewport_width = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
  }
})();

/* Dots */
$ingredient.after('<div class="dots"></div>');
$chem.after('<div class="dots"></div>');

/* Select Placeholder */
function setPlaceholder(){
  $placeholder.text($select.find('option:selected').attr('value'));
}

$select.on('change', setPlaceholder);


/* Image upload */
 var formImage = document.getElementById("formImage");
 var formPreview = document.querySelectorAll(".file__preview");

 if(formImage!=null){
  formImage.addEventListener("change", () => {
    uploadFile(formImage.files[0]);
  });
 }

 function uploadFile(file) {
   //Проверка типа файла (jpeg, png, gif, webp)
   if (
     !["image/jpeg", "image/png", "image/gif", "image/webp"].includes(
       file.type
     )
   ) {
     alert("Разрешены только изображения.");
     formImage.value = "";
     return;
   }
   //Проверка размера изображения (<2мб)
   if (file.size > 2 * 1024 * 1024) {
     alert("Файл должен быть менее 2МБ.");
     return;
   }

   var reader = new FileReader();
   reader.onload = function (e) {
     for(let i=0; i<formPreview.length; i++) {
       if(formPreview[i].innerHTML === ''){
        formPreview[i].innerHTML = `<img src="${e.target.result}" alt="Фото">`;
        return;
       } 
     }
     
   };
   reader.onerror = function (e) {
     alert("Ошибка");
   };
   reader.readAsDataURL(file);
 }

 /* Avatar upload */
 var profileDownload = document.getElementById("profile__download");
 var AvatarPreview = document.querySelectorAll(".profile__avatar");

 if(profileDownload!=null){
  profileDownload.addEventListener("change", () => {
    uploadAvatar(profileDownload.files[0]);
  });
 }

 function uploadAvatar(file) {
   //Проверка типа файла (jpeg, png, gif, webp)
   if (
     !["image/jpeg", "image/png", "image/gif", "image/webp"].includes(
       file.type
     )
   ) {
     alert("Разрешены только изображения.");
     profileDownload.value = "";
     return;
   }
   //Проверка размера изображения (<2мб)
   if (file.size > 2 * 1024 * 1024) {
     alert("Файл должен быть менее 2МБ.");
     return;
   }

   var reader = new FileReader();
   reader.onload = function (e) {
     for(let i=0; i<AvatarPreview.length; i++) {
       if(AvatarPreview[i].innerHTML === ''){
        AvatarPreview[i].innerHTML = `<img src="${e.target.result}" alt="Фото">`;
        return;
       } else {
        AvatarPreview[i].innerHTML = '';
        AvatarPreview[i].innerHTML = `<img src="${e.target.result}" alt="Фото">`;
        return;
       }
     }
     
   };
   reader.onerror = function (e) {
     alert("Ошибка");
   };
   reader.readAsDataURL(file);
 }

/* Active image */
$profilePhoto.on('click', function(){
  $.each($profilePhoto, function(){
   if ($(this).hasClass('active')) {
     $(this).removeClass('active');
   }
  })
 $(this).addClass('active');
})

/* Name validation */
function nameValidate(block){
  let val = block.val();

  if(val.match(/^[a-zA-Za-яА-Я]+$/iu)){
    block.removeClass('invalid').addClass('valid');
    block[0].setCustomValidity("");
  } else {
    block.removeClass('valid').addClass('invalid');
    block[0].setCustomValidity('Разрешены только латинские и кириллические символы');
    return;
  }
}

/* Login validation */
function loginValidate(block){
  let val = block.val();

  if(val.match(/^[a-zA-Z0-9]+$/iu)){
    block.removeClass('invalid').addClass('valid');
    block[0].setCustomValidity("");
  } else {
    block.removeClass('valid').addClass('invalid');
    block[0].setCustomValidity('Разрешены только латинские символы и цифры');
    return;
  }
}

/* Passwords similarity validation */
function passwordSimilarity(block) {
  let val = $password.val(),
      val_re = block.val();
  
  if (val_re === val) {
    block.removeClass('invalid').addClass('valid');
    block[0].setCustomValidity('');
    return;
  } else {
    block.removeClass('valid').addClass('invalid');
    block[0].setCustomValidity('Пароли не совпадают');
    return;
  }
}

/* Password validation */
function passwordValidate(block){
  let val = block.val();

  if(val.length > 7){
    block.removeClass('invalid').addClass('valid');
    block[0].setCustomValidity("");
  } else {
    block.removeClass('valid').addClass('invalid');
    block[0].setCustomValidity('Пароль слишком короткий');
    return;
  }

  if(val.match(/^[a-zA-Z0-9]+$/iu)){
    block.removeClass('invalid').addClass('valid');
    block[0].setCustomValidity("");
  } else {
    block.removeClass('valid').addClass('invalid');
    block[0].setCustomValidity('Разрешены только латинские символы  и цифры');
    return;
  }
}

$formBtn.on('click', function(){
  loginValidate($login);
  nameValidate($name);
  passwordSimilarity($password_re);
  passwordValidate($password);
})

const popupLinks = document.querySelectorAll(".popup-link");
const body = document.querySelector("body");
const lockPadding = document.querySelectorAll(".lock-padding"); //for position:fixed elements

let unlock = true;

const timeout = 800; //equals popup's transition

if (popupLinks.length > 0) {
  for (let index = 0; index < popupLinks.length; index++) {
    const popupLink = popupLinks[index];
    popupLink.addEventListener("click", function (e) {
      const popupName = popupLink.getAttribute("href").replace("#", "");
      const currentPopup = document.getElementById(popupName);
      popupOpen(currentPopup);
      e.preventDefault(); //prevents page refresh
    });
  }
}
const popupCloseIcon = document.querySelectorAll(".close-popup");
if (popupCloseIcon.length > 0) {
  for (let index = 0; index < popupCloseIcon.length; index++) {
    const el = popupCloseIcon[index];
    el.addEventListener("click", function (e) {
      popupClose(el.closest(".popup"));
      e.preventDefault();
    });
  }
}

function popupOpen(currentPopup) {
  if (currentPopup && unlock) {
    const popupActive = document.querySelector(".popup.open");
    if (popupActive) {
      popupClose(popupActive, false);
    } else {
      bodyLock();
    }
    currentPopup.classList.add("open");
    currentPopup.addEventListener("click", function (e) {
      if (!e.target.closest(".popup__content")) {
        popupClose(e.target.closest(".popup"));
      }
    });
  }
}

function popupClose(popupActive, doUnclock = true) {
  if (unlock) {
    popupActive.classList.remove("open");
    if (doUnclock) {
      bodyUnlock();
    }
  }
}

function bodyLock() {
  const lockPaddingValue =
    window.innerWidth - document.querySelector(".wrapper").offsetWidth + "px";
  if (lockPadding.length > 0) {
    for (let index = 0; index < lockPadding.length; index++) {
      const el = lockPadding[index];
      el.getElementsByClassName.paddingRight = lockPaddingValue;
    }
  }
  body.style.paddingRight = lockPaddingValue; //body width without scroll
  body.classList.add("lock");

  unlock = false;
  setTimeout(function () {
    unlock = true;
  }, timeout);
}

function bodyUnlock() {
  setTimeout(function () {
    if (lockPadding.length > 0) {
      for (let index = 0; index < lockPadding.length; index++) {
        const el = lockPadding[index];
        el.style.paddingRight = "0px";
      }
    }
    body.style.paddingRight = "0px";
    body.classList.remove("lock");
  }, timeout);

  unlock = false;
  setTimeout(function () {
    unlock = true;
  }, timeout);
}

document.addEventListener("keydown", function (e) {
  if (e.which === 27) {
    const popupActive = document.querySelector(".popup.open");
    popupCLose(popupActive);
  }
});

//Polyfills
(function () {
  if (!Element.prototype.closest) {
    Element.prototype.closest = function (css) {
      var node = this;
      while (node) {
        if (node.matches(css)) return node;
        else node = node.parentElement;
      }
      return null;
    };
  }
})();
(function () {
  if (!Element.prototype.matches) {
    Element.prototype.matches =
      Element.prototype.matchesSelector ||
      Element.prototype.webkitMatchesSelector ||
      Element.prototype.mozMatchesSelector ||
      Element.prototype.msMatchesSelector;
  }
})();

var $profileForm = $('#profile-form');
// Post Form Sumbition
$profileForm.on('submit', function(e) {
	  e.preventDefault();
	
	  // Form Inputs
	  var
	      form        = $(this),
	      file_data   = form.find('#formImage')[0].files[0],
	      category    = form.find('#category').val(),		
	      title       = form.find('#profile-form__name').val(),
	      content     = form.find('#profile-form__text').val();
        ingredients = form.find('#profile-form__ingredients').val();
        calories    = form.find('#profile-form__calories').val();

	  // Ajax Url (data-url)
	  var ajaxurl = form.data('url');
	  // Form Data
	  var form_data = new FormData();
	  form_data.append('file', file_data);	
	  form_data.append('category', category);	
	  form_data.append('title', title);
	  form_data.append('content', content);
    form_data.append('ingredients', ingredients);
    form_data.append('calories', calories);
	  form_data.append('action', 'salatik_save_user_recipe');
	
	  $.ajax({
	      url: ajaxurl,
	      type: 'POST',
	      contentType: false,
	      processData: false,
	      data: form_data,
	      success: function (response) {
	        setTimeout(function () {
	          form.trigger("reset");
	        }, 1000);
	      },
	      error : function(response) {
	        console.log(response);
	      },
	  });
});   

$('.main-panel__savetext--nolog').on('click', function(e){
  e.preventDefault();
  $(this).html('Войдите');
});

$('#profile-form__ingredients').inputmask("((a{1,} ){1,}\(9{1,}a{1,}\), ){1,}");
$('#profile-form__calories').inputmask("Белки\(9{1,}г\), Жиры\(9{1,}г\), Углеводы\(9{1,}г\), Калорийность\(9{1,}Ккал\)");

