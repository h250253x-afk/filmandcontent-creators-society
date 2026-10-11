function toggleTheme() {
    const body = document.body;
    const button = document.getElementById("themeToggle");
    
    body.classList.toggle("light-mode");

    if (body.classList.contains("light-mode")) {
        button.innerText = "🌙 Dark Mode";
    } else {
        button.innerText = "☀️ Light Mode";
    }
}

function validateForm(event) {
    const nameInput = document.forms["joinForm"]["fullname"].value.trim();
    const emailInput = document.forms["joinForm"]["email"].value.trim();
    const messageInput = document.forms["joinForm"]["message"].value.trim();

    let isValid = true;
    let errorMessage = "";

    if (nameInput === "") {
        errorMessage += "• Full Name is required.\n";
        isValid = false;
    }

    if (emailInput === "") {
        errorMessage += "• Email Address is required.\n";
        isValid = false;
    } else if (!emailInput.includes("@") || !emailInput.includes(".")) {
        errorMessage += "• Please enter a valid Email Address.\n";
        isValid = false;
    }

    if (messageInput.length < 10) {
        errorMessage += "• Message must be at least 10 characters long.\n";
        isValid = false;
    }

    if (!isValid) {
        alert("Please correct the following errors:\n\n" + errorMessage);
        event.preventDefault();
        return false;
    }

    return true;
}

const clubEvents = [
    {
        title: "48-Hour Film Challenge",
        date: "November 14, 2026",
        location: "Media Lab B",
        description: "Teams get 48 hours to write, shoot, and edit a short film based on a mystery prompt."
    },
    {
        title: "Cinematography & Lighting Masterclass",
        date: "November 28, 2026",
        location: "Main Studio",
        description: "Hands-on workshop covering three-point lighting, wireless mics, and cinema rigs."
    },
    {
        title: "YouTube Content & Monetization Strategy",
        date: "December 05, 2026",
        location: "Auditorium 1",
        description: "Learn thumbnail design, audience analytics, and video SEO strategies."
    }
];

function renderEvents() {
    const container = document.getElementById("events-container");
    if (!container) return;

    container.innerHTML = "";

    clubEvents.forEach(function(eventItem) {
        const card = document.createElement("article");
        card.className = "event-card";
        card.innerHTML = `
            <h3>${eventItem.title}</h3>
            <p><strong>Date:</strong> ${eventItem.date}</p>
            <p><strong>Location:</strong> ${eventItem.location}</p>
            <p>${eventItem.description}</p>
        `;
        container.appendChild(card);
    });
}

function setupGalleryInteractivity() {
    const images = document.querySelectorAll(".gallery-grid img");
    
    images.forEach(function(img) {
        img.addEventListener("mouseover", function() {
            img.style.opacity = "0.8";
            img.style.cursor = "pointer";
        });

        img.addEventListener("mouseout", function() {
            img.style.opacity = "1";
        });

        img.addEventListener("click", function() {
            alert("Viewing Image: " + img.alt);
        });
    });
}

window.onload = function() {
    renderEvents();
    setupGalleryInteractivity();
};