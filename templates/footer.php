	<!-- Footer -->
	<footer class="py-5 bg-dark footer mt-5">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; Matan Avgi 2020</p>
		</div>
		<!-- /.container -->
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
		$(document).on('click', '#hide_show', function() { 
			if($("#products").hasClass("d-none")){
				$("#products").removeClass('d-none');
				$("#hide_show").text('Click To Hide');
			}else{
				$("#products").addClass('d-none');
				$("#hide_show").text('Click To Show');
			}

		});
	</script>

</body>

</html>