<?php

namespace App\Controllers;

use App\Helpers\FileUploadHelper;
use App\Helpers\FlashMessage;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UploadController extends BaseController
{
    public function __construct(Container $container)
    {
        parent::__construct($container);
    }

    /**
     * Display the upload form.
     */
    public function index(Request $request, Response $response, array $args): Response
    {
        $data = [
            'title' => 'File Upload Demo'
        ];
        return $this->render($response, 'upload/uploadView.php', $data);
    }

    /**
     * Process file upload.
     */
    public function upload(Request $request, Response $response, array $args): Response
    {
        $uploadedFiles = $request->getUploadedFiles();
        $uploadedFile = $uploadedFiles['myfile'];
        $config = [
            'directory' => __DIR__ . '/../../public/uploads/images',
            'allowedTypes' => ['image/jpeg', 'image/png', 'image/gif'],
            'maxSize' => 2 * 1024 * 1024, // 2MB in bytes
            'filenamePrefix' => 'upload_'
        ];
        $result = FileUploadHelper::upload($uploadedFile, $config);
        if ($result->isSuccess()) {
            $filename = $result->getData()['filename'];
            if (!isset($_SESSION['uploaded_files'])) {
                $_SESSION['uploaded_files'] = [];
            }
            $_SESSION['uploaded_files'][] = $filename;
            FlashMessage::success($result->getMessage() . ": {$filename}");
        } else {
            FlashMessage::error($result->getMessage());
        }
        return $this->redirect($request, $response, 'upload.index');
    }
}
