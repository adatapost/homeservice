</div><!-- /.container -->
<footer class="container bg-light text-center row">
   <div class="col-2">
     <a href="https://www.twitter.com">Twitter</a>
   </div>
   <div class="col-8">
    <p>&copy; HomeService Pvt Ltd 2021</p>
    <p>Please read <a href="#">Terms</a> & <a href="#">Policy</a> documents.</p>
   </div>
   <div class="col-2"></div>
   
  </footer>
</main>
   <script src="assets/js/bootstrap.bundle.min.js"></script>

   <script>
    (function () {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
</script>
  </body>
</html>