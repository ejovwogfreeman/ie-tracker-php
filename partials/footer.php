
<style>
    .top {
        position: fixed;
        bottom: -5%;
        right: 1%;
        transition: 0.5s ease-in-out;
        font-size: 30px;
    }
    ul {
        list-style-type: none;
    }
    .social-media {
        font-size: 30px;
    }

    .social-media i {
        margin-right: 10px;
        color: #0275d8;
        transition: 0.5s ease-in-out;
    }
    .social-media i:hover {
        margin-right: 10px;
        color: #04062D;
        cursor: pointer;
    }
</style>

<footer class="bg-light">
    <div class="container py-5">
        <div class="row text-center mb-3">
            <div class="col-lg-3 col-md-1"></div>
            <div class="col-lg-6 col-md-10">
            <form action="" class="bg-light">
                <h3>Join Our Newsletter</h3>
                <p>Be the first to hear about our updates and new release</p>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <div class="input-group"><div class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></div><input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" ><button class="btn btn-primary">Subscribe</button></div>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
            </form>
            </div>
            <div class="col-lg-3 col-md-1"></div>
        </div>
        <div class="row pt-3">
            <div class="col-lg-3 col-md-6">
                <h5>Address</h5>
                <p>59 C, ICE Road, Off Wire Rd, <br/> Benin City. <br/> Edo State, Nigeria.</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5>Useful Links</h5>
                <ul class="ps-0">
                    <li><i class="bi bi-check2-circle"></i> &nbsp; <a href="index.php#home">Home</a></li>
                    <li><i class="bi bi-check2-circle"></i> &nbsp; <a href="index.php#about">About</a></li>
                    <li><i class="bi bi-check2-circle"></i> &nbsp; <a href="index.php#web_technologies">Web Technologies</a></li>
                    <li><i class="bi bi-check2-circle"></i> &nbsp; <a href="index.php#team">Team</a></li>
                    <li><i class="bi bi-check2-circle"></i> &nbsp; <a href="index.php#faq">FAQ</a></li>
                    <li><i class="bi bi-check2-circle"></i> &nbsp; <a href="index.php#contact">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5>Our Services</h5>
                <p>We offer the following services</p>
                <ul class="ps-0">
                    <li><i class="bi bi-check2-circle"></i> &nbsp; Web Development</li>
                    <li><i class="bi bi-check2-circle"></i> &nbsp; Mobile App Development</li>
                    <li><i class="bi bi-check2-circle"></i> &nbsp; UI/UX Design</li>
                    <li><i class="bi bi-check2-circle"></i> &nbsp; Copy Writing</li>
                    <li><i class="bi bi-check2-circle"></i> &nbsp; Graphic Design</li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5>Our Social Networks</h5>
                <p>Connect With us on our various social media platforms and never miss an update from us.</p>
                <div class="social-media"><i class="bi bi-facebook"></i><i class="bi bi-twitter"></i><i class="bi bi-instagram"></i><i class="bi bi-linkedin"></i><i class="bi bi-github"></i></div>
            </div>
        </div>
    </div>
    <div class="bg-primary text-light py-4">
        <div class="container">
            <p class="text-center m-0">copyright &copy; <?php echo date("Y")?> ExpenseTrackerApp_Goup1-V.1.0.0</p>
        </div>
    </div>
</footer>


<a class="top text-light" href="#home" id="top"><i class="bi bi-arrow-up-circle-fill"></i></a>

<!-- Bootstrap JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossOrigin="anonymous"></script>


<script>
    window.addEventListener("scroll", ()=> {
        if(window.scrollY > 500) {
            document.getElementById("top").style.bottom = "1%";
        }else {
            document.getElementById("top").style.bottom = "-5%";
        }
    })
</script>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>

<!-- AOS javascript link -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        offset: 50,
        duration: 1000
    });
</script>

</body>
</html>