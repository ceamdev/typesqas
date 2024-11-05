<!-- <script src="js/bootstrap.bundle.min.js"></script> -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<footer class="text-center">
    <p>&copy; <strong><?php echo date("Y")." "; echo APP_NAME." ".APP_VERSION;?> | <?php echo APP_NAME_BUSINESS;?> | DESARROLLADO POR: <a href="https://github.com/ceamdev">@ceamdev</a></strong></p>
    <a href="#"> Terminos de Uso </a> | <a href="#">Politicas de Privacidad</a> | <a href="#">Politicas de Cookies</a> |  <a href="#">Documentación</a> 
</footer>
<script type="text/javascript">
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
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