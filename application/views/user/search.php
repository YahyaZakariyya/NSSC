<?php include "header.php"; ?>

<!-- Main Section -->
<div class="row">
    <!-- Results Area -->
    <div class="col-md-9 col-12" style="background-color: rgba(0,0,0,0.2)">
        
        <!-- Filters -->
        <div class="border-bottom text-light">
            <h2 class="my-2">Result: <?php echo $_GET['search']; ?></h2>
        </div>

        <!-- Card -->
        <?php if(!empty($search)){
            foreach($search as $result){
         ?>
        <div class="bg-light shadow-sm rounded-2 m-2">
            <!-- Card/Notes Heading -->
            <h6 class="p-2 bg-black rounded-top-2 m-0">
                <?php echo $result['notes_title']; ?>
            </h6>
            <!-- Card/Notes Body -->
            <div class="p-2 pt-0">
                <!-- Notes Info -->
                <div>
                    <button class="btn col"><i class="fa-sharp fa-solid fa-note-sticky"></i>  <?php echo $result['notes_subject']; ?></button>
                    <a class="btn col btn-light" href="<?php echo base_url('main/view_profile/'.$result['user_id']); ?>"><i class="fa-solid fa-user"></i>  <?php echo $result['author']; ?></a>
                    <button class="btn col"><i class="fa-solid fa-calendar-days"></i>  <?php echo $result['upload_date']; ?></button>
                </div>
                <!-- Notes Description -->
                <p><?php echo $result['notes_description']; ?></p>
                <!-- Notes View Button -->
                <div class="text-end">
                    <a class="btn btn-outline-dark" href="<?php echo base_url('main/temp/'.$result['notes_file']); ?>" target="_blank">VIEW</a>
                    <?php
                    // $like = false;
                    // foreach($liked_notes as $liked){
                    //     if(in_array($result['notes_id'],$liked)){
                    //         $like = true;
                    //         break;
                    //     }
                    // }
                    // if($like){
                    ?>
                    <!-- <a class="btn btn-sm btn-outline-primary rounded-0" href="<?php echo base_url('main/like/'.$result['notes_id'].'?user_id='.$result['user_id']); ?>">Liked</a> -->
                    <?php //}else{ ?>
                    <!-- <a class="btn btn-sm btn-primary rounded-0" href="<?php echo base_url('main/like/'.$result['notes_id'].'?user_id='.$result['user_id']); ?>">Like</a> -->
                    <?php //} ?>
                </div>

            </div>
        </div>
        <?php }}else{ ?>
            <div>No Result Found</div>
        <?php } ?>
    </div>
    <?php include "sidebar.php"; ?>
</div>
<?php include "footer.php"; ?>