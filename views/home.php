<section class="header">
    <div class="container clearfix">
        <div class="row justify-content-center header-content">
            <div class="col-12 col-lg-6 big-header">
                <h1>All your groceries in one place</h1>
            </div>
            <div class="col-12 col-lg-6 text-right">
                <form class="register-form text-left" action="" method="post">
                    <?php

                        if(isset($_POST['register'])) {
                            register::add($_POST['name'], $_POST['email'], $_POST['location'], $_POST['phone']);
                        }

                    ?>
                    <h3 class="mb-4">Welcome</h3>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="John Doe">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Location</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="location" placeholder="Location">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Phone</label>
                        <input type="tel" class="form-control" id="exampleFormControlInput1" name="phone" placeholder="Phone number">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success btn-lg btn-block" type="submit" name="register">Place an order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
