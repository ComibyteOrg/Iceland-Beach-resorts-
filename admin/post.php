<?php 
    session_start();
    require_once "../core/config/dbquery.php";
    $query = new Dbquery();
    if(isset($_SESSION['username'])):
        $username = $_SESSION['username'];
        $selectuser = $query->select("admin", "*", "username = ?", [$username], "s");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../static/styles/style.css">
    <link rel="stylesheet" href="style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="../static/CAOS.file/CAOS.file.v-1.5/style.css">
   <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Iceland Beach resorts | Admin Pannel</title>
</head>
<body>

<?php 
    if(isset($_POST['discount'])){
        $title = htmlspecialchars($_POST['f_name']);
        $offer = htmlspecialchars($_POST['note']);
        $sdate = htmlspecialchars($_POST['s_date']);
        $edate = htmlspecialchars($_POST['e_date']);
        $image = htmlspecialchars($_FILES['image']['name']);
        $imagetmp = htmlspecialchars($_FILES['image']['tmp_name']);
        $newimage = time().$image;
        $destination = "../static/images/post/{$newimage}";

        if(move_uploaded_file($imagetmp, $destination)){
            $insertpost = $query->insert("festival", ['title' => $title, 'image' => $newimage, 'message' => $offer, 'start_date' => $sdate, 'end_date' => $edate]);
            if($insertpost){
                echo "<div class='alert alert-success'> Post created successfully </div>";
            }else{
                echo "Could not create post". $query->conn->error;
            }
        }else{
            echo "Could not Nove image";
        }
        

    }
?>


    <div class="container p-4">
        <form method="post" class="mt-5 mx-auto" style="width: 500px; max-width: 90%;" enctype="multipart/form-data">
            <h2>Post Festive Discount</h2>
            <div class="mb-1">
                <label for="f_name" class="form-label">Title</label>
                <input type="text" class="form-control" id="f_name" name="f_name" required>
            </div>
            <div class="mb-1">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="mb-1">
                <label for="note" class="form-label">Offers</label>
                <textarea name="note" id="note" class="form-control" rows="3" required="required"></textarea>
            </div>
            <div class="mb-1">
                <label for="s_date" class="form-label">Start date</label>
                <input type="date" class="form-control" id="s_date" name="s_date" required>
            </div>
            <div class="mb-1">
                <label for="e_date" class="form-label">End date</label>
                <input type="date" class="form-control" id="e_date" name="e_date" required>
            </div>
            <div class="mt-3">
                <a href="index.php" class="btn btn-close-white btn-secondary">Back Home</a>
                <button type="submit" class="btn btn-success" name="discount">Post Discount</button>
            </div>
        </form>
    </div>




<!-- FOOTER -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
<!-- javascript -->
<script src="../static/scripts/script.js"></script>
</body>
</html>

<?php else: ?>
    echo "<script> window.location.href = "../index.php"</script>";
<?php endif; ?>