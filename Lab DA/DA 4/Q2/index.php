<?php
    function isValidFileExtension($fileName) {
        $allowedExtensions = array('doc', 'docx', 'pdf');
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        return in_array($fileExtension, $allowedExtensions);
    }

    function isValidFileSize($fileSize, $maxSize) {
        return $fileSize <= $maxSize;
    }

    function isFileAlreadyUploaded($fileName, $targetDirectory) {
        $filePath = $targetDirectory . $fileName;
        return file_exists($filePath);
    }

    function showError($errorMessage) {
        echo "<p class='error-message'>$errorMessage</p>";
    }

    function showSuccess($successMessage) {
        echo "<p class='success-message'>$successMessage</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f9f9f9;
            padding: 50px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .upload-form {
            max-width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .upload-form input[type="file"] {
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
        }

        .upload-form input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            width: 100%;
        }

        .upload-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: #f44336;
            margin-top: 10px;
        }

        .success-message {
            color: #4CAF50;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="upload-form">
        <h2>Upload 'Internet and Web Programming J Component File'</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="file" id="file">
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>

    <div class="error-space">
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $targetDirectory = "uploads/";
            $maxFileSize = 10 * 1024 * 1024;

            if (isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {
                $fileName = $_FILES["file"]["name"];
                $fileSize = $_FILES["file"]["size"];
                $fileTmpName = $_FILES["file"]["tmp_name"];

                if (!isValidFileExtension($fileName)) {
                    showError("Error: Invalid file extension. Only .doc, .docx, and .pdf files are allowed.");
                }

                elseif (!isValidFileSize($fileSize, $maxFileSize)) {
                    showError("Error: File size exceeds the maximum limit of 10 MB.");
                }

                elseif (isFileAlreadyUploaded($fileName, $targetDirectory)) {
                    showError("Error: File with the same name already exists. Please upload a different file.");
                }

                elseif (move_uploaded_file($fileTmpName, $targetDirectory . $fileName)) {
                    showSuccess("File uploaded successfully.");
                } else {
                    showError("Error uploading the file.");
                }
            } else {
                showError("Error: Please select a valid file.");
            }
        }
        ?>
    </div>
</body>
</html>
