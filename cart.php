<?php include './includes/header.php' ?>
<div class="jumbotron hero-bg">
    <div class="row gx-5">
        <div class="col-md-6">
            <div class="p-3">
                <img src="./assets/imgs/hero-image.png" class="img-fluid" alt="hero image">
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3 hero-second-column">
                <h3>Cart</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo, beatae!</p>
                <button class="btn btn-info text-white">Check Cart!</button>
            </div>
        </div>
    </div>
</div>
<!-- cart -->
<h3 class="text-center fw-bold mt-5">Cart Itmes</h3>
<div class="mt-5">
    <table class="table table-danger table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>product1</td>
                <td><input type="number" class="form-control" max="10" min="1"></td>
                <td>$20</td>
                <td>$20</td>
                <td><button class="btn btn-danger">Remove</button></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>product2</td>
                <td><input type="number" class="form-control" max="10" min="1"></td>
                <td>$2.99</td>
                <td>$2.99</td>
                <td><button class="btn btn-danger">Remove</button></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Product 3</td>
                <td><input type="number" class="form-control" max="10" min="1"></td>
                <td>$5000</td>
                <td>$5000</td>
                <td><button class="btn btn-danger">Remove</button></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- check out -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Check Out</h5>
    <hr>
    <h6 class="card-subtitle mb-2 text-muted d-flex justify-content-between">Total Ammount: <span class="text-danger">$5121.99</span></h6>
    <a href="#" class="card-link">Clear Cart</a>
    <a href="#" class="card-link">Continue</a>
  </div>
</div>
<?php include './includes/footer.php' 
?>