<?php include './includes/header.php'; 

  include './database/db_connect.php';

  $name = $_SESSION['customer'];
  $sql = $conn->query("SELECT id from customers WHERE name = '$name'");
  $user_id = $sql->fetch_assoc()['id'];

  $orders = $conn->query("SELECT orders.*, products.product_title FROM orders LEFT JOIN products ON orders.products = products.id WHERE customer_id = $user_id") or die($conn->error);
?>
      <div class="content">
        <!-- Notificatio -->
        <?php if(isset($_GET['order'])){ ?>
            <div class="alert alert-info alert-with-icon alert-dismissible fade show" data-notify="container">
              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
              </button>
              <span data-notify="icon" class="nc-icon nc-bell-55"></span>
              <span data-notify="message">We have recived your order and we will be processing it shortly. We will send you an email Regarding Your Order</span>
            </div>
        <?php } ?>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Orders</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Products
                      </th>
                      <th>
                        Total Price
                      </th>
                      <th>
                        Status
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>
                      <?php while($row = $orders->fetch_assoc()){ ?>
                        <tr>
                          <td>
                            <?php echo $row['product_title']; ?>
                          </td>
                          <td>
                            <?php echo '$'.$row['total_price']; ?>
                          </td>
                          <td>
                            <?php echo $row['status']; ?>
                          </td>
                          <td class="text-right">
                            <?php if($row['status'] == 'Order Deliverd'){ ?>
                              <button class="btn btn-danger">Return Order</button>
                            <?php } elseif($row['status'] == 'Order Returned') { ?>
                                <h3 class="text-danger">Order Returned</h3>
                            <?php } elseif($row['status'] == 'Order Canceled') { ?>
                                <h3 class="text-danger">Order Cancelled</h3>
                            <?php } elseif($row['status'] == 'Order Accepted') { ?>
                                <p class="text-danger">Order Accepted and it will be deliverd to you with in 5 to 7 working days.</p>
                            <?php } elseif($row['status'] == 'Order Cancellation Pending') { ?>
                                <p class="text-danger">Canellation Pending.</p>
                            <?php } else { ?>
                              <a href="./database/cancel-order.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Cancel Order</a>
                            <?php } ?>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include './includes/footer.php'; ?>