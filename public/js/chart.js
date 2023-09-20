const ctx = document.getElementById("mylineChart").getContext("2d");

new Chart(ctx, {
    type: "line",
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [
            {
                label: "Revenue Points",
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 2,
                fill: true,
                backgroundColor: ["rgba(75, 192, 192, 0.3)"],
                borderColor: ["rgba(75, 192, 192, 1)"],
                pointBackgroundColor: "rgba(75, 192, 192, 1)",
                pointRaduis: 3,
            },
        ],
    },
    options: {
        Responsive: true,
        scales: {
            y: {
                beginAtZero: true,
            },
            x: {
                beginAtZero: true,
                grid: {
                    display: false,
                },
            },
        },
        Elements: {
            line: {
                tension: 0.4,
            },
        },
        Legend: {
            display: true,
            position: "top",
        },
    },
});

//bar chart

const ctx2 = document.getElementById("mybarChart");

new Chart(ctx2, {
    type: "bar",
    data: {
        labels: ["Colombo", "Kalutara", "Galle", "Anuradhapura", "Kandy", "Other"],
        datasets: [
            {
                label: "User Area Points",
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 2,
                fill: true,
                backgroundColor: ["rgba(75, 192, 192, 0.3)"],
                borderColor: ["rgba(75, 192, 192, 1)"],
                pointBackgroundColor: "rgba(75, 192, 192, 1)",
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});
