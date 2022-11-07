<?php

require_once('./config/db.php');
include('./config/session.php');
include('./partials/header.php');

    $userid = $_SESSION['user_id'];

    $sql = "SELECT * FROM transactions WHERE user_id=$userid ORDER BY -created_at";

    $result = mysqli_query($conn, $sql);

    $transactions = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $latest_transactions = array_slice($transactions, 0, 3);

    $income_array = [];
    $expense_array = [];

    for($i=0; $i < count($transactions); $i++){
        if($transactions[$i]['transaction_type'] === 'income') {
            array_push($income_array, $transactions[$i]['amount']);
        } else {
            array_push($expense_array, $transactions[$i]['amount']);
        }
    }

    $income = array_sum($income_array); 
    $expense = array_sum($expense_array);

    $balance = $income - $expense;

    // $reg_bal = "<script>alert(reg_bal)</script>";

    

    $sql2 = "SELECT * FROM wish WHERE wish_user_id=$userid ORDER BY -wish_created_at";

    $result2 = mysqli_query($conn, $sql2);

    $wish = mysqli_fetch_all($result2, MYSQLI_ASSOC);

    $latest_wish = array_slice($wish, 0, 3);

    $wish_array = [];

    for($i=0; $i < count($wish); $i++){
        array_push($wish_array, $wish[$i]['wish_amount']);
    }

    $total_wish = array_sum($wish_array);

?>

<style>
    .top-space {
        padding: 100px 0px 30px;
    }
    .success {
      border-left: 3px solid #14A44D;
    }
    .success-bottom {
      border-bottom: 3px solid #14A44D;
    }
    .danger {
      border-left: 3px solid #DC4C64;
    }
    .danger-bottom {
      border-bottom: 3px solid #DC4C64;
    }
    .primary {
      border-left: 3px solid #1976D2
    }
    .primary-bottom {
      border-bottom: 3px solid #1976D2
    }
    .primary-right {
      border-right: 3px solid #1976D2
    }
    .offcanvas {
      width: 300px !important;
    }
    .list-group li {
      transition: 0.5s ease-in-out;
    }
    .list-group li:hover {
      background-color: #d3d3d3;
    }
</style>

<div class="container top-space px-0" id="home">

<div class="container">
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
</div>

  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <!-- Trigger for offcanvas -->
      <div class="d-flex align-items-center">
        <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        <div style="font-size: 30px"><i class="bi bi-list text-dark"></i></div>
        </a>
        <h4 class="ms-2 my-0 d-sm-block d-none"><?php echo "Welcome " . $_SESSION['username']?></h4>
      </div>
      <!-- offcanvas -->
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">EXPENSE TRACKER V.1.0.0</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="list-group">
            <a href="dashboard.php" class="text-decoration-none"><li class="list-group-item"><i class="bi bi-speedometer2"></i> &nbsp; Dashboard</li></a>
            <a href="transactions.php" class="text-decoration-none"><li class="list-group-item"><i class="bi bi-cash-coin"></i> &nbsp; Transactions</li></a>
            <a href="income.php" class="text-decoration-none"><li class="list-group-item"><i class="bi bi-cash"></i> &nbsp; Income</li></a>
            <a href="expense.php" class="text-decoration-none"><li class="list-group-item"><i class="bi bi-wallet"></i> &nbsp; Expense</li></a>
            <a href="wish.php" class="text-decoration-none"><li class="list-group-item"><i class="bi bi-bag-heart"></i> &nbsp; Wish List</li></a>
          </ul>
        </div>
      </div>


      <!-- Button trigger for modal -->
      <button type="button" class="btn btn-success d-sm-block d-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Transaction
      </button>
      <button type="button" class="btn btn-success d-sm-none d-block me-md-0 me-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
        +
      </button>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Transaction Form</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <?php include('add.php') ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div>
      <h1 class="mb-3 d-sm-block d-none">Your Dashboard</h1>
      <h5 class="mb-3 d-sm-none d-block">Your Dashboard</h5>
      <div class="row mx-0">
        <div class="col-lg-6 bg-light mb-2">
          <div class="text-center row p-3 primary primary-bottom">
              Your Balance(₦): <h3 class="m-0"><?php echo $balance > 0 ? '+' : null ?><span id="bal"></span></h3>
          </div>
          <div class="row text-center">
              <div class="col-6 success success-bottom p-3">Your Income(₦): <h3  class="m-0 text-success"><?php echo $income ? '+' : null ?><span id="inc"></span></h3></div>
              <div class="col-6 danger danger-bottom p-3">Your Expense(₦): <h3 class="m-0 text-danger"><?php echo $expense ? '-' : null ?><span id="exp"></span></h3></div>
          </div>
        </div>
        <div class="col-lg-6 pe-0 d-lg-block d-none">
          <div class="primary-right" id="piechart" style="height: 185px;"></div>
        </div>
      </div>
      <hr class="mt-4">
    </div>
  </div>

  <div class="container">
    <div class="row m-0">
      <div class="col-lg-6 m-0 p-0">
        <h5>Recent Transactions</h5>
        <div class="m-0 p-0">

            <?php foreach($latest_transactions as $x): ?>
              <div class="bg-light p-2 my-2 <?php echo $x['transaction_type']=='income' ? 'success' : 'danger'?>">
                <h5 class="m-0"><?php echo $x['title'] ?></h5>
                <div class="row"><div class="col-5">Amount</div><div class="col-1">:</div><div class="col-6"><p class="m-0 <?php echo $x['transaction_type']=='income' ? 'text-success' : 'text-danger'?>"><?php echo $x['transaction_type']=='income' ? '+' : '-'?>₦<?php echo $x['amount'] ?></p></div></div>
                <div class="row"><div class="col-5">Description</div><div class="col-1">:</div><div class="col-6"><small class="m-0"><?php echo $x['description'] ?></small></div></div>
                <div class="row"><div class="col-5">Transaction Type</div><div class="col-1">:</div><div class="col-6"><small class="m-0"><?php echo $x['transaction_type'] ?></small></div></div>
                <div class="row"><div class="col-5">Transaction Date</div><div class="col-1">:</div><div class="col-6"><small class="m-0">created at <?php echo $x['created_at'] ?></small></div></div>
              </div>
            <?php endforeach; ?>

        </div>
      </div>

      <div class="col-lg-6 m-0 pe-0 ps-0 ps-lg-2">
        <div class="row">
          <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Recent Wish On Your Wish List</h5>
            <button type="button" class="btn btn-success me-md-0 me-0" data-bs-toggle="modal" data-bs-target="#exampleModal2">
              +
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add To Wish List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?php include('wish_modal.php') ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <h6 class="mb-0" style="width: 80%" >Total Amount On Your Wish List: ₦<span id="wish"></span></h6>
        </div>
        <div class="m-0 p-0">
              <div>
            <?php foreach($latest_wish as $x): ?>
              <div class="bg-light p-2 my-2 primary">
                <div class="row"><div class="col-8"><h5 class="m-0"><?php echo $x['wish_title'] ?></h5></div><div class="col-1"><h5 class="m-0">:</h5></div><div class="col-3"><h5 class="m-0">₦<?php echo $x['wish_amount'] ?></h5></div></div>
                <div class="row"><div class="col-5"><small>Created At <?php echo $x['wish_created_at'] ?></small></div></div>
              </div>
            <?php endforeach; ?>
            </div>
            <div class="bg-light p-2 my-2 d-flex align-items-center text-center" style="height: 199px">
              This is the V.1.0.0 of the Expense Tracker App by Group1, updates will be made soon. just anticipate!
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

let bal = <?php echo $balance ?>;
let inc = <?php echo $income ?>;
let exp = <?php echo $expense ?>;
let wish = <?php echo $total_wish ?>;

let reg_bal = (numberWithCommas(bal));
let reg_inc = (numberWithCommas(inc));
let reg_exp = (numberWithCommas(exp));
let reg_wish = (numberWithCommas(wish));

document.getElementById("bal").textContent = reg_bal;
document.getElementById("inc").textContent = reg_inc;
document.getElementById("exp").textContent = reg_exp;
document.getElementById("wish").textContent = reg_wish;

</script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Transactions', 'Amounts'],
      ['Income',     <?php echo $income ?>],
      ['Expense',      <?php echo $expense ?>],
    ]);

    var options = {
      title: 'Income Expense Chart'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>


<?php include('./partials/footer.php') ?>