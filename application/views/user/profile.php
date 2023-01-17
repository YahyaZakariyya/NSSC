<?php include "header.php"; ?>
<section class="container col-lg-8">
<!-- Profile Info -->
<div class="text-center bg-secondary text-light rounded p-5">
    <img class="rounded-circle col-lg-4 col-md-3 col-5 mt-5 border p-1 border-5 border-light" src="" alt="profile picture">
    <h2><?php echo $_SESSION['user_name']; ?></h2><br><br>
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
    <a class="btn btn-outline-light rounded-pill col-5" href="<?php echo base_url('main/add_notes'); ?>">Add Notes</a>
    <a class="btn btn-outline-light rounded-pill col-5" href="<?php echo base_url('main/ask_query'); ?>">Ask Query</a>

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
                <a class="btn btn-success" href="<?php echo base_url(); ?>assets/your_pdf_file.pdf" target="_blank"><i class="fa-solid fa-download"></i></a>
                <a class="btn btn-dark" href="<?php echo base_url('main/update_notes?notes_id='.$note['notes_id']); ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="btn btn-danger" href="<?php echo base_url('main/delete_notes?notes_id='.$note['notes_id']); ?>"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
    </div>
    <?php } ?>
</table>
</div>
</div>

</section>
<?php include "footer.php"; ?>