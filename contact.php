<?php include('header.php'); ?>
 
 <!-- Contact Section start -->
 
 <section class="contact " id="contact" >
        <div class="heading">
            <?php
                if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
		?>
        </div>
        <h2 class="heading">Contact <span>Me!</span> <span class="lnr lnr-envelope"></span></h2>
        <form action="#" method="post">
            <div class="input-box">
                <input type="text" placeholder="Full Name" name="name">
                <input type="email" placeholder="Email Address" name="email">
            </div>
            <div class="input-box">
                <input type="number" placeholder="Mobile Number" name="number">
                <input type="text" placeholder="Subject" name="subject">
            </div>
                <textarea   cols="30" rows="10" placeholder="Your Message" name="message"></textarea>
                <input  type="submit" value="Send Message" class="btn" name="submit">
        </form>


    </section>
    <!-- Contact Section end -->
<?php include('footer.php');  ?>


    <?php
        if (isset($_POST['submit'])) {
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname= "protfolio";

            $fname = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['number'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            $conn = mysqli_connect($hostname,$username,$password,$dbname);
            $query = "INSERT INTO `message` (`name`, `email`, `phone`, `subject`, `message`) VALUES ('$fname','$email','$phone','$subject','$message')";
            $result = mysqli_query($conn,$query);
            if ($result == true) {
               echo "<script>alert('Thank You For Contacting Us. We Will Reach You Soon')</script>";
               header('location:index.php');
            }else{
                $_SESSION['add'] = "<div>Failed To sen message please try again </div>";
				//redirect page add admin
				header('Location: index.php');
            }
        }
    ?>