<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
	  	<div class="copyright text-center my-auto">
	    	<span>Copyright &copy; <?php echo date('Y'); ?> 3dCakes</span>
	  	</div>
	</div>
</footer>
<!-- End of Footer -->

<!-- Modal -->
<div class="modal fade" id="actionmodel" tabindex="-1" aria-labelledby="actionmodel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title"> </h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">  </div>
      <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <a class="btn action btn-primary" href="">Yes</a>
      </div>
    </div>
  </div>
</div>

<script>
function set_data(title,body, id, section, action){
	jQuery("#actionmodel .modal-title").html(title);
	jQuery("#actionmodel .modal-body").html(body);
	jQuery("#actionmodel .btn.action").attr("href","/admin/"+section+"/action/"+action+"/"+id);
	$('#actionmodel').modal('show');
}
jQuery(document).ready(function(){
	jQuery(".actionmodel").click(function(){
		var action = jQuery(this).attr("rel");
		var id = jQuery(this).parent().attr("rel");
		var section = jQuery(this).parent().attr("section");
		if(action == 'delete'){
			set_data("Delete Item","Are you sure to delete this item?", id, section, 1);
		}else if(action == 'activate'){
			set_data("Activate Item","Are you sure to activate this item?", id, section, 2);	
		}else if(action == 'deactivate'){
			set_data("De-Activate Item","Are you sure to de-activate this item?", id, section, 3);
		}
		return false;
	});
});

</script>