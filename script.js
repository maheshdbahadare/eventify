function login() {
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();
    const error = document.getElementById('error');

    if (username === 'admin' && password === 'admin123') {
        sessionStorage.setItem('loggedIn', 'true');
        sessionStorage.setItem('role', 'admin');
        window.location.href = 'dashboard.php';
    } else if (username === 'user' && password === 'user123') {
        sessionStorage.setItem('loggedIn', 'true');
        sessionStorage.setItem('role', 'user');
        window.location.href = 'index.html';
    } else {
        error.textContent = 'Invalid credentials. Try again.';
    }
}
