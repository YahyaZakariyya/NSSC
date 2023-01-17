<?php include "header.php"; ?>
<section class="container col-lg-8">
<!-- Profile Info -->
<div class="text-center bg-secondary text-light rounded p-5">
    <!-- <img class="rounded-circle col-lg-4 col-md-3 col-5 mt-5 border p-1 border-5 border-light" src="../images/ProfilePicture.jpg" alt="profile picture"> -->
    
    <h2><?php echo $user_name; ?></h2><br><br>
    <div class="row">
    <div class="col-4">
            <h5 class="m-0 p-0">Followers</h5>
            <?php include "followersmodel.php"; ?>
        </div>
        <div class="col-4">
            <h5 class="m-0 p-0">Following</h5>
            <?php include "followingmodel.php"; ?>
        </div>
        <div class="col-4">
            <h5 class="m-0 p-0">Notes</h5>
            <p><?php echo $count[2]; ?></p>
        </div>
    </div>
    <?php if($follow){ ?>
    <a class="btn btn-outline-light rounded-pill col-5" href="<?php echo base_url('main/follow/'.$user_id); ?>">Following</a>
    <?php }else{ ?>
    <a class="btn btn-light rounded-pill col-5" href="<?php echo base_url('main/follow/'.$user_id); ?>">Follow</a>
    <?php } ?>

</div>

<!-- Card Sample-1 -->
<table class="table">
    <?php foreach($notes as $note){ ?>
    <div class="shadow-sm row mx-1 my-3 border rounded border-3 border-secondary ">
        <div class="p-4 bg-light" >
            <h5><?php echo $note['notes_title'] ?></h5>
            <p>Uploaded: <?php echo $note['upload_date'] ?></p>
            <div class="row">
                <p class="text-nowrap col-md-11 col-10 m-0" style="overflow: hidden; text-overflow: ellipsis;"><?php echo $note['notes_description'] ?></p>
                <a class="btn btn-primary" href="<?php echo base_url('main/temp/'.$note['notes_file']); ?>" target="_blank">VIEW</a>
                <?php
                $like = false;
                foreach($liked_notes as $liked){
                    if(in_array($note['notes_id'],$liked)){
                        $like = true;
                        break;
                    }
                }
                if($like){
                ?>
                <a class="btn btn-outline-primary" href="<?php echo base_url('main/like/'.$note['notes_id'].'?user_id='.$user_id); ?>">Liked</a>
                <?php }else{ ?>
                <a class="btn btn-primary" href="<?php echo base_url('main/like/'.$note['notes_id'].'?user_id='.$user_id); ?>">Like</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
</table>
</section>
<?php include "footer.php"; ?>