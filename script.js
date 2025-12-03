/* This function runs when the button is clicked */
function changeHeading() {
    // 1. Use the DOM to find the element with the ID "main-heading"
    const heading = document.getElementById("main-heading"); 
    
    // 2. Change the text content of that element
    heading.innerHTML = "INTERACTIVITY ADDED! 🚀"; 
    
    // 3. (Optional) Change its style
    heading.style.color = "red";
}