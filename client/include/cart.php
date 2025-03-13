<?php
require_once "connection.php";

// Increase Quantity
if (isset($_POST['increase'])) {
    $name = $_POST['name'];
    $updateCart = "UPDATE carts SET quality = quality + 1 WHERE name = ?";
    $stmt = $conn->prepare($updateCart);
    $stmt->bind_param("s", $name);
    $stmt->execute();
}

// Decrease Quantity
if (isset($_POST['decrease'])) {
    $name = $_POST['name'];
    
    // Check current quantity
    $checkCart = "SELECT quality FROM carts WHERE name = ?";
    $stmt = $conn->prepare($checkCart);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if ($row['quality'] > 1) {
        // Decrease quantity if greater than 1
        $updateCart = "UPDATE carts SET quality = quality - 1 WHERE name = ?";
        $stmt = $conn->prepare($updateCart);
        $stmt->bind_param("s", $name);
        $stmt->execute();
    } else {
        // Remove item if quantity is 1
        $deleteCart = "DELETE FROM carts WHERE name = ?";
        $stmt = $conn->prepare($deleteCart);
        $stmt->bind_param("s", $name);
        $stmt->execute();
    }
}

// Get updated cart items
$selectCart = "SELECT name, SUM(quality) as quality, price FROM carts GROUP BY name, price";
$result = mysqli_query($conn, $selectCart);

$total = 0;
?>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
  <div class="offcanvas-header justify-content-center">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="order-md-last">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-primary">Your cart</span>
        <span class="badge bg-primary rounded-pill">
          <?= ($result->num_rows > 0) ? $result->num_rows : 0; ?>
        </span>
      </h4>
      <ul class="list-group mb-3" id="cart-items">
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $quantity = (int) $row['quality'];
            $price = (float) $row['price'];
            $itemTotal = $quantity * $price;
            $total += $itemTotal;
            ?>
            <li class="list-group-item d-flex justify-content-between align-items-center lh-sm">
              <div class="d-flex align-items-center">
                <h6 style="width: 150px"> <?= htmlspecialchars($row['name']) ?></h6>
                
                <!-- Decrease Button (-) -->
                <form method="POST">
                    <input type="hidden" name="name" value="<?= htmlspecialchars($row['name']); ?>">
                    <button type="submit" name="decrease" class="btn btn-sm btn-danger" style="width: 40px; padding: 12px 14px; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 5px 7px;"> 
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z"/></svg>
                    </button>
                </form>

                <h6 class="my-0 mx-2">(x<?= $quantity ?>)</h6>
                
                <!-- Increase Button (+) -->
                <form method="POST">
                    <input type="hidden" name="name" value="<?= htmlspecialchars($row['name']); ?>">
                    <button type="submit" name="increase" class="btn btn-sm btn-primary" style="width: 40px; padding: 12px 14px; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 5px 7px;"> 
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg>
                    </button>
                </form>
              </div>
              <span class="text-body-secondary item-total">$<?= number_format($itemTotal, 2) ?></span>
            </li> 
            <?php
          }
        } else {
          echo '<li class="list-group-item">Your cart is empty.</li>';
        }
        ?>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong id="total-price">$<?= number_format($total, 2) ?></strong>
        </li>
      </ul>

      <a href="index.php?p=checkout">
        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Checkout</button>
      </a>
    </div>
  </div>
</div>
