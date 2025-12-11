<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;

$page_title = 'File Upload';
ViewHelper::loadHeader($page_title);

?>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">File Upload Demo</h1>

        <!-- Flash Messages Display Area -->
        <div class="mb-4">
            <?= App\Helpers\FlashMessage::render() ?>
        </div>

        <!-- Upload Form -->
        <div class="card upload-card mb-4">
            <div class="card-header">
                <h5>Upload an Image</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="upload" enctype="multipart/form-data">
                    <div class="upload-input-wrapper">
                        <!-- <label for="myfile" class="upload-label">File</label> -->
                        <input
                            type="file"
                            class="form-control file-input-custom"
                            id="myfile"
                            name="myfile"
                            accept="image/*"
                            required>
                    </div>
                    <div class="form-text mb-3">
                        Select an image file to upload (JPEG, PNG, GIF).
                    </div>

                    <button type="submit" class="btn upload-btn">Upload File</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Uploaded Files Display -->
    <?php if (!empty($_SESSION['uploaded_files'])): ?>
        <div class="card upload-card mt-4">
            <div class="card-header">
                <h5>Uploaded Files</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach (array_reverse($_SESSION['uploaded_files']) as $filename): ?>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img
                                    src="<?= APP_BASE_URL ?>/public/uploads/images/<?= htmlspecialchars($filename) ?>"
                                    class="card-img-top"
                                    alt="Uploaded image"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <p class="card-text small text-muted">
                                        <?= htmlspecialchars($filename) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <style>
        body {
            background-color: bisque;
        }

        .upload-card {
            background-color: #fff;
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #000;
            color: #fff;
            border-radius: 12px 12px 0 0 !important;
            padding: 16px 20px;
            font-weight: 600;
        }

        .upload-input-wrapper {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .upload-label {
            background: #000;
            color: #fff;
            padding: 12px 16px;
            border-radius: 8px 0 0 8px;
            font-size: 16px;
            font-weight: 600;
            min-width: 100px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .file-input-custom {
            flex: 1;
            padding: 12px 14px;
            border: 1px solid #ccc;
            border-radius: 0 8px 8px 0;
            outline: none;
            font-size: 15px;
            transition: all 0.2s ease;
        }

        .file-input-custom:focus {
            border-color: #c7a98e;
            box-shadow: 0 0 4px rgba(199, 169, 142, 0.4);
        }

        .upload-btn {
            width: 100%;
            padding: 14px 0;
            border: none;
            border-radius: 8px;
            background-color: #d8b89c;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease-in-out;
        }

        .upload-btn:hover {
            background-color: #c7a98e;
            color: white;
        }

        .upload-btn:active {
            background-color: #b7967f;
        }

        .image-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s ease;
        }

        .image-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .image-card img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .image-card .card-body {
            background-color: #f8f9fa;
        }

        .form-text {
            color: #6c757d;
            font-size: 14px;
        }

        h1 {
            color: #000;
            font-weight: 600;
        }
    </style>
    <?= FlashMessage::render() ?>

    <?php
    ViewHelper::loadJsScripts();
    ViewHelper::loadFooter();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
