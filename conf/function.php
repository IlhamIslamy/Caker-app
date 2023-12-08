<?php
// Mulai sesi
track_sessions();

function track_sessions() {
    if (!session_id()) {
        session_start();
    }
}

function set_session_value($key, $value) {
    $_SESSION[$key] = $value;
}

function destroy_session() {
    session_destroy();
}
?>
