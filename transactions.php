<?php

require_once('./config/db.php');
include('./config/session.php');
include('./partials/header.php');

    $userid = $_SESSION['user_id'];

    $sql = "SELECT * FROM transactions WHERE user_id=$userid ORDER BY -created_at";

    $result = mysqli_query($conn, $sql);

    $transactions = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
    </div>
  <div class="container px-0">
      <div class="m-0 p-0">
        <h5>Transaction History</h5>
        <div class="m-0 p-0">
            <?php foreach($transactions as $x): ?>
              <div class="bg-light p-2 my-2 <?php echo $x['transaction_type']=='income' ? 'success' : 'danger'?>">
                <div class="row"><div class="col-5"><h5 class="m-0"><?php echo $x['title'] ?></h5></div><div class="col-1">:</div><div class="col-6"><small><a href="delete" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a> &nbsp;&nbsp;<a href="delete" class="btn btn-danger"><i class="bi bi-trash3"></i></a></small></div></div>
                <div class="row"><div class="col-5">Amount</div><div class="col-1">:</div><div class="col-6"><p class="m-0 <?php echo $x['transaction_type']=='income' ? 'text-success' : 'text-danger'?>"><?php echo $x['transaction_type']=='income' ? '+' : '-'?><?php echo '₦'.$x['amount'] ?></p></div></div>
                <div class="row"><div class="col-5">Description</div><div class="col-1">:</div><div class="col-6"><small class="m-0"><?php echo $x['description'] ?></small></div></div>
                <div class="row"><div class="col-5">Transaction Type</div><div class="col-1">:</div><div class="col-6"><small class="m-0"><?php echo $x['transaction_type'] ?></small></div></div>
                <div class="row"><div class="col-5">Transaction Date</div><div class="col-1">:</div><div class="col-6"><small class="m-0">created at <?php echo $x['created_at'] ?></small></div></div>
              </div>
              </a>
            <?php endforeach; ?>
        </div>
      </div>
    </div>
</div>
</div>


<?php include('./partials/footer.php') ?>