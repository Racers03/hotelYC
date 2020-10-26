<body>
  <style>
    .dark-mode {
      background-color: #121212;
      color: white !important;
    }
  </style>
  <script>
    window.onload = function() {
      $('body').addClass('text-white');
      $('table').addClass('text-white');
      darkModeCookie = localStorage.getItem("darkMode");
      if (darkModeCookie == "true") {
        toggleColor('init');
      }
    }
    var element = document.body;
    function toggleColor(state) {
      $('body').toggleClass('dark-mode');
      if (document.getElementsByClassName('bg-light').length !== 0) {
        for (let i=0; i < document.getElementsByClassName('bg-light').length; i++) {
          $('.bg-light').addClass('bg-dark');
          $('.bg-dark').removeClass('bg-light');
          $('.navbar-light').addClass('navbar-dark');
          $('.navbar-dark').removeClass('navbar-light');
        }
        if(!state) {
          localStorage.setItem("darkMode", true);
        }
      } else if (document.getElementsByClassName('bg-dark') !== 0) {
        for (let i=0; i < document.getElementsByClassName('bg-dark').length; i++) {
          $('.bg-dark').addClass('bg-light');
          $('.bg-light').removeClass('bg-dark');
          $('.navbar-dark').addClass('navbar-light');
          $('.navbar-light').removeClass('navbar-dark');
        }
        if(!state) {
          localStorage.setItem("darkMode", false);
        }
      }
    }
  </script>
</body>