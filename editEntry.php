<?php
session_start();

// Check if the preview data exists
if (!isset($_SESSION['preview_title']) || !isset($_SESSION['preview_text'])) {
    // Redirect to the addEntry.php if there is no data to edit
    header('Location: addEntry.php');
    exit;
}

header('Location: addEntry.php');
exit;
?>
