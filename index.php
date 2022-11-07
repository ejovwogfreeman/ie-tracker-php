<?php

require_once('./config/db.php');
// include('./config/session.php');
// session_start();
include('./partials/header.php');

?>

<?php

if(isset($_SESSION['message'])) {

?>
  <div class="alert alert-success" role="alert">
    <?php echo $_SESSION['message'] ?>
  </div>

<?php

  unset($_SESSION['message']);
}

?>

<style>
  .header-bg {
    width: 100%;
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('./images/bg.jpg');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    padding-top: 100px;
  }
  .ball {
      animation: bounce 3s;
      animation-direction: alternate;
      animation-timing-function: cubic-bezier(0.5, 0.5, 0.5, 0.5);
      animation-iteration-count: infinite;
  }
    .social-media-icon {
        font-size: 20px;
    }

    .social-media-icon i {
        margin-right: 10px;
        color: #0275d8;
        transition: 0.5s ease-in-out;
    }
    .social-media-icon i:hover {
        margin-right: 10px;
        color: #04062D;
        cursor: pointer;
    }
    
  @keyframes bounce {
      from {
          transform: translate3d(0, 0, 0);
      }
      to {
          transform: translate3d(0, 20px, 0);
      }
  }
</style>

<div class="header-bg" id="home">
  <div class="container">
    <div class="row text-light text-center text-lg-start">
      <div class="col-lg-6 col-sm-12 my-auto py-5">
        <h1>Better Solutions For Your Business</h1>
        <h4 class="my-4">We are team of talented developers and we are here to help keep track of your spendings</h4>
        <?php if(isset($_SESSION['user_id'])==false): ?>
          <a href="signin.php" class="btn btn-primary">Get Started</a>
          <?php else: ?>
            <a href="dashboard.php" class="btn btn-primary">Dashboard</a>
          <?php endif; ?>
      </div>
      <div class="col-lg-6 d-none d-lg-block ball">
        <img src="./images/hero-img.png" alt="" class="img-fluid">
      </div>
    </div>
  </div>
</div>


<div class="container bg-light my-sm-5 my-0 p-lg-5 p-3" id="about">
  <h2 class="text-center mb-lg-4 my-3">ABOUT US</h2>
  <div class="row text-dark" style="text-align: justify">
      <div class="col-lg-6 d-lg-block" data-aos="fade-up">
        <p>We aim at making small buisinesses and individuals keep track of their spendings, thereby enabling them
        to get a value for every cash they spend. Tracking your spending is often the first step in getting
        your finances in order. <br/> Expense tracker apps put more of an emphasis on your spending. 
        These apps usually categorize your expenses and help you get a good idea of your purchasing behavior.</p>
      </div>
      <div class="col-lg-6 d-lg-block" data-aos="fade-up">
        <p>This app holds you accountable by requiring you to manually input each one of your transactions, 
           through a form provided. <br/>
           This app is no doubt the solution to keep track of your spending because it provides a page to view the following<br/>
           <i class="bi bi-check2-circle"></i> &nbsp; All Transactions <br/>
           <i class="bi bi-check2-circle"></i> &nbsp; All Income <br/>
           <i class="bi bi-check2-circle"></i> &nbsp; All Expenses
        </p>
      </div>
    </div>

    <div class="row text-dark text-center text-lg-start">
      <div class="col-lg-6 col-sm-12 my-auto py-5" data-aos="fade-down">
        <h3>Our Goal, Mission, Vission</h3>
        <h6 class="text-muted mb-3">Our Goals, Mission and Vission includes the following</h6>
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h5 class="m-0">Our Goal</h5>
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            Help keep records  of your spending: IE-Tracker can help you monitor the expenses you're paying, which can help you prevent exceeding your budget. Each time you use your credit card or deposit money from a bank account, consider compiling the purchase and its amount on a document.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <h5 class="m-0">Our Mission</h5>
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            Audit Initiated Expenses:
Financial fraud is always a problem to keep an eye out for; one that even large corporations are not safe from.
Expense management procedures always include steps to control unexpected variances in activity that could point to fraudulent behavior. The most common examples of which are mischaracterized or fake entries, overstated expenses, and making multiple reimbursement claims for a single purchase.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <h5 class="m-0">Our Vission</h5>
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            Our vision is to be a Leader of the "Income Expense Management processes" automation segment. Being a Leader means we will achieve Product Excellence, Implementation Excellence, Operational Excellence and superior customer satisfaction.
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="col-lg-6 d-none d-lg-block my-auto" data-aos="fade-down">
        <img src="./images/finance.gif" alt="" class="img-fluid">
      </div>
    </div>
</div>

<div class="header-bg py-5">
  <div class="container">
    <div class="row text-light text-center text-lg-start">
      <div class="col-lg-9 col-sm-12 my-auto" data-aos="fade-down">
        <h2>Call To Action</h2>
        <p>By understanding what you spend money on and how much you spend, you can see exactly where your cash is going and areas where you can cut back.</p>
      </div>
      <div class="col-lg-3 col-sm-12 my-auto  text-lg-end text-center" data-aos="fade-up">
      <?php if(isset($_SESSION['user_id'])==false): ?>
          <a href="signin.php" class="btn btn-primary">Get Started</a>
          <?php else: ?>
            <a href="dashboard.php" class="btn btn-primary">Dashboard</a>
          <?php endif; ?>
      </div>
    </div>
  </div>
</div>


<div class="container bg-light my-sm-5 my-0 p-lg-5 p-3" id="web_technologies">
  <h2 class="text-center mb-lg-4 my-3">WEB TECHNOLOGIES</h2>
  <div class="row text-dark" style="text-align: justify">
      <div class="col-lg-6 d-none d-lg-block my-auto ball" data-aos="fade-down">
        <img src="./images/web.gif" alt="" class="img-fluid">
      </div>
      <div class="col-lg-6 d-lg-block my-auto" data-aos="fade-down">
        <div class="mb-4">
          <h6>PHP</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">45%</div>
          </div>
        </div>
        <div class="mb-4">
          <h6>My SQL</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">10%</div>
          </div>
        </div>
        <div class="mb-4">
          <h6>JavaScript</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">10%</div>
          </div>
        </div>
        <div class="mb-4">
          <h6>CSS</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
          </div>
        </div>
        <div>
          <h6>Git & GitHub</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">10%</div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="container bg-light my-sm-5 my-0 p-lg-5 p-3" id="team">
  <h2 class="text-center mb-lg-4 my-3">TEAM</h2>
  <div class="row text-dark mx-0 px-0" style="text-align: justify">
    <div class="row mx-0 px-0">
      <div class="col-lg-6" data-aos="fade-down">
        <div class="row border me-lg-1 mb-3">
          <div class="col-3 my-auto">
            <img src="./images/default.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-9">
            <h5 class="mt-2">Ejovwo Godbless</h5>
            <p class="m-0">Developer</p>
            <hr class="my-2">
            <p class="mb-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis, quam.</p>
            <div class="social-media-icon"><i class="bi bi-github"></i><i class="bi bi-twitter"></i><i class="bi bi-linkedin"></i></div>
          </div>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-up">
        <div class="row border ms-lg-1 mb-lg-3 mb-0">
          <div class="col-3 my-auto">
            <img src="./images/default.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-9">
            <h5 class="mt-2">Ejovwo Godbless</h5>
            <p class="m-0">Developer</p>
            <hr class="my-2">
            <p class="mb-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis, quam.</p>
            <div class="social-media-icon"><i class="bi bi-github"></i><i class="bi bi-twitter"></i><i class="bi bi-linkedin"></i></div>
          </div>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-down">
        <div class="row border me-lg-1 mt-3">
          <div class="col-3 my-auto">
            <img src="./images/default.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-9">
            <h5 class="mt-2">Ejovwo Godbless</h5>
            <p class="m-0">Developer</p>
            <hr class="my-2">
            <p class="mb-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis, quam.</p>
            <div class="social-media-icon"><i class="bi bi-github"></i><i class="bi bi-twitter"></i><i class="bi bi-linkedin"></i></div>
          </div>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-up">
        <div class="row border ms-lg-1 mt-3">
          <div class="col-3 my-auto">
            <img src="./images/default.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-9">
            <h5 class="mt-2">Ejovwo Godbless</h5>
            <p class="m-0">Developer</p>
            <hr class="my-2">
            <p class="mb-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis, quam.</p>
            <div class="social-media-icon"><i class="bi bi-github"></i><i class="bi bi-twitter"></i><i class="bi bi-linkedin"></i></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container bg-light my-sm-5 my-0 p-lg-5 p-3 text-center" id="faq">
  <div data-aos="fade-down">
  <h2 class="text-center mb-lg-4 my-3">FAQ</h2>
  <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h5 class="m-0">What does an IE-Tracker app do?</h5>
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            IE-Tracker apps connect to your bank account and/or credit cards to track and categorize your expenses, giving you a good idea of your purchasing behavior. This can help identify spending areas where you could make cuts.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <h5 class="m-0"> Should I use an expense tracker app?</h5>
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            Keeping track of your income and expenses is an important part of managing your overall finances. While you don't need an app to help you record your purchases, it can certainly come in handy.Some income-expense tracker apps automatically sync to your bank accounts and credit cards, which can save you time instead of you having to manually gather all your different credit card statements and such. Other apps help you categorize your spending so you can better understand your purchasing habits.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <h5 class="m-0">What is the best way to track your incomes and expenses?</h5>
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">There's no perfect expense tracking plan that fits everyone. Each person has their own method — unless of course, you have no method at all. While some people may find looking at their monthly credit or debit card statements enough to keep their spending in check, others need something more hands-on. You can opt to track your transactions daily in a spreadsheet or to use technology like an income-expense tracker app. If you're not sure which is the best program for you, try out a few different methods to see what sticks.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            <h5 class="m-0">Are income-expense tracker apps worth the cost?</h5>
            </button>
          </h2>
          <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            IE-Tracker apps are often either free, offer a free version or have a free trial for users to test out before signing up. This way, you can decide for yourself if the app is right for you. If you're a serious budgeter or are tracking expenses for a small business, it generally will be worth splurging on a paid app.
          </div>
          </div>
        </div>
      </div>
      </div>
      </div>
</div>

<div class="container bg-light my-sm-5 my-0 p-lg-5 p-3" id="contact">
  <h2 class="text-center mb-lg-4 my-3">COTACT US</h2>
    <div class="row text-dark text-center text-lg-start">
      <div class="col-lg-6 col-sm-12 my-auto pe-lg-5" data-aos="fade-down">
        <div class="row">
          <div class="col-1">
          <i class="bi bi-geo-alt"></i>
          </div>
          <div class="col-11">
            <h5>Location:</h5>
            <p>
                59 C, ICE Road, Off Wire Rd, <br/>
                Benin City. <br/>
                Edo State, Nigeria. <br/>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-1">
          <i class="bi bi-envelope"></i>
          </div>
          <div class="col-11">
            <h5>Email:</h5>
            <p>ietraker@company.com</p>
          </div>
        </div>
        <div class="row">
          <div class="col-1">
          <i class="bi bi-telephone"></i>
          </div>
          <div class="col-11">
            <h5>Call:</h5>
            <p>+234 816 447 1007</p>
          </div>
        </div>
        <div class="mapouter"><div class="gmap_canvas"><iframe title='google-map' width="100%" height="300px" id="gmap_canvas" src="https://maps.google.com/maps?q=ring%20road%20benin%20city%20&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div></div>
      </div>
      <div class="col-lg-6 col-sm-12 my-auto" data-aos="fade-up">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="mb-3">
        <label for="exampleInputUsername" class="form-label">Your Name</label>
        <div class="input-group"><div class="input-group-text" id="basic-addon1"><i class="bi bi-at"></i></div><input class="form-control" id="exampleInputUsername" name="username" ></div>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <div class="input-group"><div class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></div><input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" ></div>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputUsername" class="form-label">Subject</label>
        <div class="input-group"><div class="input-group-text" id="basic-addon1"><i class="bi bi-book"></i></div><input class="form-control" id="exampleInputUsername" name="username" ></div>
      </div>
        <div class="mb-3">
          <label for="desctiption" class="form-label">Your Message</label>
          <textarea  class="form-control" id="desctiption" rows="6" name="description"></textarea>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      </div>
    </div>
</div>


<?php include('./partials/footer.php') ?>
