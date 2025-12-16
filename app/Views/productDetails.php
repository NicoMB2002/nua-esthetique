<?php
use App\Helpers\ViewHelper;

$page_title = $data['title'];
$product    = $data['product'];
$image      = $data['image'] ?? null;

ViewHelper::loadHeader($data['title']);
?>

<div class="container my-5">
    <div class="row g-4">

        <div class="col-md-6">
            <img
                src="<?= htmlspecialchars($image ?? APP_BASE_URL . '/images/default-product.png') ?>"
                class="img-fluid rounded shadow"
                alt="<?= htmlspecialchars($product['name']) ?>"
            >
        </div>

        <div class="col-md-6">
            <h1 class="fw-bold"><?= htmlspecialchars($product['name']) ?></h1>

            <p class="text-muted mb-1">
                Category: <?= htmlspecialchars($product['category_name'] ?? 'N/A') ?>
            </p>

            <h3 class="text-success mt-3">
                $<?= number_format($product['price'], 2) ?>
            </h3>

            <p class="mt-3">
                <?= nl2br(htmlspecialchars($product['description'])) ?>
            </p>

            <p class="mt-2">
                <strong>Stock:</strong> <?= htmlspecialchars($product['quantity']) ?>
            </p>

            <form method="POST" action="/cart/add" class="mt-4">
                <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                <button type="submit" class="btn btn-dark btn-lg">
                    Add to Cart
                </button>
            </form>
        </div>

    </div>
</div>

<?php
ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
