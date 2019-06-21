<?php
$con = mysqli_connect("localhost", "root", "", "tech_box_db");
if (!$con)
    die("Connection failed");
?>
<?php


if (isset($_POST['insert_cat'])) {
    //getting text data from the fields
    $pro_cat = test_input($_POST['pro_cat']);

    if (!preg_match("/[a-zA-Z0-9]+/", $pro_cat) || strlen($pro_cat) < 2) {
        $response = array(
            "type" => "warning",
            "message" => "Enter Valid Product title."
        );
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<h1 class="text-center my-4"><i class="fas fa-plus fa-md"></i> <span class="d-none d-sm-inline"> Add New </span>
    Category </h1>
<?php if (!empty($response)) { ?>
    <div class="alert alert-<?php echo $response["type"]; ?>">
        <?php echo $response["message"]; ?>
    </div>
<?php } ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
            <label for="pro_cat" class="float-md-right"> <span class="d-sm-none d-md-inline"> Category </span>
                Title:</label>
        </div>
        <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                </div>
                <input type="text" class="form-control" id="pro_cat" name="pro_cat"
                       placeholder="Enter Category Here"
                    <?php
                    if (@$response["type"] == "warning") {
                        echo "value='$pro_cat'";
                    }
                    ?>
                >
            </div>
        </div>

    </div>
    <div class="row my-3">
        <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto"></div>
        <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
            <button type="submit" name="insert_cat" class="btn btn-primary btn-block"><i class="fas fa-plus"></i>
                Insert Now
            </button>
        </div>
    </div>
</form>