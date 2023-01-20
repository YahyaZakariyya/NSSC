<?php include "header.php"; ?>
<section class="container col-lg-8">
<!-- Profile Info -->
<div class="text-center text-light p-5" style="background-color: rgba(0,0,0,0.5)">
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

<div class="card text-center">
<div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
    <li class="nav-item">
        <button class="nav-link active" aria-current="true" href="#">Notes</button>
    </li>
    <li class="nav-item">
        <button class="nav-link" href="#">Queries</button>
    </li>
    </ul>
</div>
<div class="card-body">
<!-- Card -->
<table class="table">
    <?php foreach($notes as $note){ ?>
    <div class="card">
        <h5 class="card-header"><?php echo $note['notes_title'] ?></h5>
        <div class="card-body">
            <!-- <h5 class="card-title">Special title treatment</h5> -->
            <p class="card-text"><?php echo $note['notes_description'] ?></p>
            <div class="btn-group" role="group" aria-label="Basic example">
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
                <a class="btn btn-outline-primary" href="<?php echo base_url('main/like/'.$note['notes_id'].'?user_id='.$user_id); ?>">LIKED</a>
                <?php }else{ ?>
                <a class="btn btn-primary" href="<?php echo base_url('main/like/'.$note['notes_id'].'?user_id='.$user_id); ?>">LIKE</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
</table>
</div>
</div>
</table>
</section>
<?php include "footer.php"; ?>