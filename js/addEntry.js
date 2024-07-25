function previewPost() {
    var form = document.getElementById('blogForm'); // Get the form element
    form.action = 'previewEntry.php'; // Change form action to the preview page
    form.submit(); // Submit the form
}

document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const titleInput = document.getElementById("title");
    const textArea = document.getElementById("text");
    const clearButton = document.getElementById('clearButton');
    const previewButton = document.getElementById('previewButton'); // Preview button ID assumed

    clearButton.addEventListener('click', function(event) {
        event.preventDefault();
        if (confirm('Are you sure you want to clear all inputs?')) {
            form.title.value = '';
            form.text.value = '';
        }
    });

    previewButton.addEventListener('click', function(event) {
        event.preventDefault();
        previewPost(); // Call preview post when preview button is clicked
    });

    form.addEventListener("submit", function(event) {
        let isValid = true;

        // Clear any previous highlights
        titleInput.classList.remove("highlight");
        textArea.classList.remove("highlight");

        // Check if title input is empty
        if (!titleInput.value.trim()) {
            titleInput.classList.add("highlight");
            isValid = false;
            console.log("Title is empty");
        }

        // Check if text area is empty
        if (!textArea.value.trim()) {
            textArea.classList.add("highlight");
            isValid = false;
            console.log("Text is empty"); 
        }

        // If either field is invalid, prevent form submission
        if (!isValid) {
            event.preventDefault();
            alert("Please fill in all the highlighted fields.");
        }
    });
    
});

