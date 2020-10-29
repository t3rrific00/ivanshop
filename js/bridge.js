var counter = 1;

//Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

$(document).ready(function () {

  $(".login").click(function () {
    $(".signup-form").hide();
    $(".login-form").show();
    $(".signup").css("background", "none");
    $(".login").css("background", "#2565ae");
  });

  $(".signup").click(function () {
    $(".signup-form").show();
    $(".login-form").hide();
    $(".login").css("background", "none");
    $(".signup").css("background", "#2565ae");
  });

  $(".btn").click(function () {
    $(".input").val("");
  });

  // $("#prospects_form").submit(function(e) {
  //   e.preventDefault();
  // });

  document.querySelectorAll('[data-modal-target]').forEach(button => {
    button.addEventListener('click', () => {
      const modal = document.querySelector(button.dataset.modalTarget)
      openModal(modal)
    })
  })
  
  document.getElementById('overlay').addEventListener('click', () => {
    const modals = document.querySelectorAll('.modal.active')
    modals.forEach(modal => {
      closeModal(modal)
    })
  })
  
  document.querySelectorAll('[data-close-button]').forEach(button => {
    button.addEventListener('click', () => {
      const modal = button.closest('.modal')
      closeModal(modal)
    })
  })

});

function openModal(modal) {
  if (modal == null) return
  modal.classList.add('active')
  document.getElementById('overlay').classList.add('active')
}

function closeModal(modal) {
  if (modal == null) return
  modal.classList.remove('active')
  document.getElementById('overlay').classList.remove('active')
}

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

setInterval(function () {
  document.getElementById("radio" + counter).checked = true;
  counter++;
  if (counter > 3) {
    counter = 1;
  }
}, 7000);
