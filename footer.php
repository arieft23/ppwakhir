    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/dist/js/review.js"></script>
    <script>window.jQuery || document.write('<script src="bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- http://stackoverflow.com/questions/23287206/same-height-column-bootstrap-3-row-responsive -->
    <script>
            $(document).ready(function(){
                var heights = $(".well").map(function() {
                    return $(this).height();
                }).get(),

                maxHeight = Math.max.apply(null, heights);
                $(".well").height(maxHeight);
            });

    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<div>
 