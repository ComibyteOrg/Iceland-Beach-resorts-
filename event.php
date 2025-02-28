<?php 
    require_once "includes/header.php"; 
    require_once "core/config/dbquery.php"; 
    $current_date = date("Y-m-d H:i:s");

    $query = new Dbquery();
    $selectpost = $query->select("festival", "*", "end_date > ?", [$current_date], 's');
    if($selectpost->num_rows > 0):
        while($selected = $selectpost->fetch_assoc()):
?>

        <div class="container">
            <div style="height: 600px; overflow: hidden;">
                <h1><?=$selected['title']?></h1>
                <small class="text-uppercase text-secondary"><?=$selected['start_date']?></small> - 
                <small class="text-uppercase text-secondary"><?=$selected['end_date']?></small> - 
                <img class="img-fluid" src="<?=$selected['image']?>" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>


<?php 
        endwhile;
    else:
        echo "<div class='alert alert-primary mt-5 text-center'> No events available yet </div>";
    endif;
include "includes/footer.php"; 
?>