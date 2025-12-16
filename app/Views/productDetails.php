<?php
use App\Helpers\ViewHelper;

$page_title = $data['title'];
$product    = $data['product'];
$image      = $data['images'] ?? null;
ViewHelper::loadHeader($data['title']);

?>

<div class="container my-5">
    <div class="row g-4">

        <div class="col-md-6">
            <img
                src="<?= htmlspecialchars(APP_BASE_URL.'/'.$image ?? APP_BASE_URL . '/images/default-product.png') ?>"
                class="img-fluid rounded shadow w-75 mh-100"

                alt="<?= htmlspecialchars($product['name']) ?>"
            >
        </div>

        <div class="col-md-6">
            <h1 class="fw-bold"><?= htmlspecialchars($product['name']) ?></h1>

            <p class="text-muted mb-1">
                Category: <?= htmlspecialchars($product['category_name'] ?? 'N/A') ?>
            </p>

            <h3 class="text-success mt-3">
                            <?php if ($product['promotion']?? 0>0): ?>
                            <h3 class="fw-bold text-decoration-line-through text-danger">$<?= hs(number_format($product['price'], 2)) ?></h3>
                            <h3 class="fw-bold text-success">$<?= hs(number_format(($product['price'] -($product['price'] * $product['promotion'] )/100), 2)) ?></h3>
                            <?php else: ?>
                             <h3 class="fw-bold text">$<?= hs(number_format($product['price'], 2)) ?></h3>
                       <?php endif; ?>
            </h3>

            <p class="mt-3">
                <?= nl2br(htmlspecialchars($product['description'])) ?>
            </p>

            <p class="mt-2">
                <strong>Stock:</strong> <?= htmlspecialchars($product['quantity']) ?>
            </p>

            <form method="POST" action="<?= APP_BASE_URL?>/add_item" class="mt-4">
                <input type="hidden" name="id" value="<?= $product['product_id'] ?>">
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
