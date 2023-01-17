<!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#follower"><?php echo $count[0]; ?></button>

<!-- Modal -->
<div class="modal fade" id="follower" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Followers</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="d-grid gap-2">
        <?php if(!empty($followers)){
            foreach($followers as $follower){
                foreach($follower as $name){
        ?>
        <button type="button" class="btn btn-secondary"><?php echo $name; ?></button>
        <?php }}} ?>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>