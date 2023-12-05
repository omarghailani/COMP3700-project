//to add jQuerey to disapper the message
$(document).ready(function(){
    $("h5").click(function(){
     $(this).hide();
});
});

// Object constructor for Reservation
function Reservation(reservationId, reservedBy) {
    this.reservationId = reservationId;
    this.reservedBy = reservedBy;
}

// Arrays to store information
var users = [
    // Add more initial users as needed
];

var reservations = [
    // Add more initial reservations as needed
];

// Function to display users in the table
function displayUsers(filteredUsers) {
    var usersTableBody = document.getElementById('usersTable').getElementsByTagName('tbody')[0];
    usersTableBody.innerHTML = ''; // Clear existing rows
    (filteredUsers || users).forEach(function (user) {
        var row = usersTableBody.insertRow();
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        cell1.innerHTML = user.username;
        cell2.innerHTML = user.password;
    });
}

// Function to display reservations in the table
function displayReservations(filteredReservations) {
    var reservationsTableBody = document.getElementById('reservationsTable').getElementsByTagName('tbody')[0];
    reservationsTableBody.innerHTML = ''; // Clear existing rows

    (filteredReservations || reservations).forEach(function (reservation) {
        var row = reservationsTableBody.insertRow();
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        cell1.innerHTML = reservation.reservationId;
        cell2.innerHTML = reservation.reservedBy;
    });}
function addReservation() {
        var reservationId = document.getElementById('reservationId').value;
        var reservedBy = document.getElementById('reservedBy').value;

        // Validation can be added here if needed

        var newReservation = new Reservation(reservationId, reservedBy);
        reservations.push(newReservation);

        // Display updated reservations table
        displayReservations();
    }
    // Function to search for reservations
    function searchReservations() {
        var reservationSearchInput = document.getElementById('reservationSearch').value.toLowerCase();
        var filteredReservations = reservations.filter(function (reservation) {
            return reservation.reservationId.toLowerCase().includes(reservationSearchInput) ||
                reservation.reservedBy.toLowerCase().includes(reservationSearchInput);
        });
        displayReservations(filteredReservations);
    }
    document.getElementById('loginForm').addEventListener('submit', handleLogin);
    displayReservations();
