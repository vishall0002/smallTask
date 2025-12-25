/* ================================
   PASSPORT AUTH CHECK (Dashboard)
================================ */

(function () {
    const token = localStorage.getItem('access_token');

    // If no token → redirect to login
    if (!token) {
        window.location.href = '/auth-page';
        return;
    }

    // Fetch logged-in user
    fetch('/api/me', {
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    })
    .then(res => {
        if (res.status === 401) {
            localStorage.removeItem('access_token');
            window.location.href = '/auth-page';
        }
        return res.json();
    })
    .then(user => {
        // Username (top header)
        const usernameEl = document.getElementById('username');
        if (usernameEl) {
            usernameEl.innerText = user.name;
        }

        // Sidebar username (optional)
        const sidebarUser = document.getElementById('sidebar-username');
        if (sidebarUser) {
            sidebarUser.innerText = user.name;
        }
    })
    .catch(() => {
        localStorage.removeItem('access_token');
        window.location.href = '/auth-page';
    });
})();

/* ================================
   LOGOUT
================================ */

function logout() {
    fetch('/api/logout', {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('access_token'),
            'Accept': 'application/json'
        }
    }).finally(() => {
        localStorage.removeItem('access_token');
        window.location.href = '/auth-page';
    });
}

/* ================================
   UI PLUGINS
================================ */

flatpickr("[flat-timpicker]", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "h:i K",
    time_24hr: false
});

$("[release-datepicker]").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true
});

$("[created-at]").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true
});

$("[created-below]").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true
});

/* ================================
   SIDE PANEL
================================ */

function openPanel() {
    document.getElementById('form_side_panel')?.classList.add('active');
}

function closePanel() {
    document.getElementById('form_side_panel')?.classList.remove('active');
}
