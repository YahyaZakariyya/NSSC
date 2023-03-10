<!-- Button trigger modal -->
<button class="btn text-light" data-bs-toggle="modal" data-bs-target="#following"><?php echo $count[1]; ?></button>

<!-- Modal -->
<div class="modal fade" id="following" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Following</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="d-grid gap-2">
        <?php if(!empty($following)){
            foreach($following as $follow){
                foreach($follow as $user){
        ?>
        <button type="button" class="btn btn-secondary"><?php echo $user; ?></button>
        <?php }}} ?>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>