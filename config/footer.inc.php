

<script type="text/javascript" src="../materialize/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../materialize/js/materialize.js"></script>


<script type="text/javascript">
	
$(document).ready(function() {
    $('#modalidade').characterCounter();
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
        
	
</script>


</body>
</html>