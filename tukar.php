<body>
  <style>
    .dark-mode {
      background-color: #121212;
      color: white !important;
    }
  </style>
  <script>
    var element = document.body;
    function toggleColor() {
      element.classList.toggle("dark-mode");
      if (document.getElementsByClassName('bg-light').length !== 0) {
        for (let i=0; i < document.getElementsByClassName('bg-light').length; i++) {
          document.getElementsByClassName('bg-light')[i].classList.add('bg-dark');
          document.getElementsByClassName('bg-dark')[i].classList.remove('bg-light');
        }
      } else if (document.getElementsByClassName('bg-dark') !== 0) {
        for (let i=0; i < document.getElementsByClassName('bg-dark').length; i++) {
          document.getElementsByClassName('bg-dark')[i].classList.add('bg-light');
          document.getElementsByClassName('bg-light')[i].classList.remove('bg-dark');
        }
      }
      if (document.getElementsByClassName('navbar-light').length !== 0) {
        for (let i=0; i < document.getElementsByClassName('navbar-light').length; i++) {
          document.getElementsByClassName('navbar-light')[i].classList.add('navbar-dark');
          document.getElementsByClassName('navbar-dark')[i].classList.remove('navbar-light');
        }
      } else if (document.getElementsByClassName('navbar-dark') !== 0) {
        for (let i=0; i < document.getElementsByClassName('navbar-dark').length; i++) {
          document.getElementsByClassName('navbar-dark')[i].classList.add('navbar-light');
          document.getElementsByClassName('navbar-light')[i].classList.remove('navbar-dark');
        }
      }
    }
  </script>
</body>