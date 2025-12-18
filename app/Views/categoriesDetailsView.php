<?php
use App\Helpers\ViewHelper;
ViewHelper::loadHeader($page_title);
?>

<div class="container mt-5">
    <h1 class="mb-4"><?= htmlspecialchars($category['name']) ?></h1>

    <?php if (empty($products)): ?>
        <div class="alert alert-danger fs-2">
            No products found For this category.
        </div>
    <?php else: ?>
        <div class="row g-4">
            <?php foreach ($products as $product): ?>
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <a
                            href="<?= APP_BASE_URL ?>/product/<?= $product['product_id'] ?>" class="btn btn-sm btn-outline-primary"
                        >
                        <img
                            src="<?= APP_BASE_URL . '/' . ($product['file_path'] ?? 'images/NuaLogo.png') ?>"
                            class="card-img-top"
                            alt="<?= htmlspecialchars($product['name']) ?>"
                        >
                        </a>
                        <div class="card-body text-center">
                            <h6 class="card-title"><?= htmlspecialchars($product['name']) ?></h6>
                            <p class="text-success fw-bold">
                                $<?= number_format($product['price'], 2) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php ViewHelper::loadFooter(); ?>
