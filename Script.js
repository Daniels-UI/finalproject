[script.js]
document.addEventListener("DOMContentLoaded", () => {
  const menuToggle = document.getElementById("menuToggle");
  const navLinks = document.getElementById("navLinks");
  const themeToggle = document.getElementById("themeToggle");

  if (menuToggle && navLinks) {
    menuToggle.addEventListener("click", () => {
      navLinks.classList.toggle("open");
    });
  }

  if (themeToggle) {
    const savedTheme = localStorage.getItem("campusTheme");
    if (savedTheme === "dark") {
      document.body.classList.add("dark");
      themeToggle.textContent = "☀️";
    }
    themeToggle.addEventListener("click", () => {
      document.body.classList.toggle("dark");
      const dark = document.body.classList.contains("dark");
      localStorage.setItem("campusTheme", dark ? "dark" : "light");
      themeToggle.textContent = dark ? "☀️" : "🌙";
    });
  }

  const welcomeMessage = document.getElementById("welcomeMessage");
  if (welcomeMessage) {
    const existingName = sessionStorage.getItem("campusName");
    const name = existingName || prompt("Welcome to CampusConnect! What is your name?");
    if (name && name.trim()) {
      const cleanName = name.trim();
      sessionStorage.setItem("campusName", cleanName);
      welcomeMessage.textContent = `Welcome, ${cleanName}!`;
    }
  }

  const detailsBtn = document.getElementById("detailsBtn");
  const extraDetails = document.getElementById("extraDetails");
  if (detailsBtn && extraDetails) {
    detailsBtn.addEventListener("click", () => {
      extraDetails.classList.toggle("show");
      detailsBtn.textContent = extraDetails.classList.contains("show")
        ? "Hide Details"
        : "Show More Details";
    });
  }

  const form = document.getElementById("registrationForm");
  if (form) {
    form.addEventListener("submit", (event) => {
      const requiredFields = [
        document.getElementById("fullName"),
        document.getElementById("email"),
        document.getElementById("phone"),
        document.getElementById("studentId"),
        document.getElementById("event"),
        document.getElementById("attendance")
      ];
      const terms = document.getElementById("terms");
      const errorBox = document.getElementById("formError");
      const successBox = document.getElementById("formSuccess");

      errorBox.classList.remove("show");
      successBox.classList.remove("show");

      const emptyField = requiredFields.find(field => !field.value.trim());

      if (emptyField || !terms.checked) {
        event.preventDefault();
        errorBox.textContent = emptyField
          ? "Please complete all required fields before submitting."
          : "Please confirm that the information provided is correct.";
        errorBox.classList.add("show");
        if (emptyField) emptyField.focus();
        return;
      }

      if (!/^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$/.test(document.getElementById("email").value)) {
        event.preventDefault();
        errorBox.textContent = "Please enter a valid email address.";
        errorBox.classList.add("show");
        document.getElementById("email").focus();
        return;
      }

      if (!/^\\d{10}$/.test(document.getElementById("phone").value.replace(/\\s+/g, ""))) {
        event.preventDefault();
        errorBox.textContent = "Please enter a valid 10-digit phone number.";
        errorBox.classList.add("show");
        document.getElementById("phone").focus();
        return;
      }
    });
  }
});
