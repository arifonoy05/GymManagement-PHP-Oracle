<!-- posts -->
<section class="requests-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7 left">
            <?php
                $con = getConnection();
                $sql = "select * from posts";
                $result = mysqli_query($con,$sql);

                while($row = mysqli_fetch_assoc($result)){
            ?>
                <h3><?php echo $row['title'];?></h3>
                <p>Looking for a VR box (Z4) with built-in headphones that will be supported in my pc.
                    Preferably in good condition with little to no scratches. Willing to pay more if my
                    requirements meet.
                </p>
                <p>Budget: 2000Tk</p>
                <a href="">Contact</a>
            </div>
            <div class="col-md-4 right">
                <img src="../img/616QLdPTZWL._SX466_.jpg" alt="">
            </div>
        </div>
        <?php
                }
        ?>
    </div>
</section>