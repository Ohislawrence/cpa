<script>
    // Vanilla JS replacement for jQuery-dependent code
    document.addEventListener('DOMContentLoaded', function() {
        // Open modal
        document.querySelector('[onclick="openCookiePreferences()"]')?.addEventListener('click', function() {
            document.getElementById('cookie-preferences-modal').classList.remove('hidden');
        });
    
        // Close modal
        document.querySelector('[onclick="closeCookiePreferences()"]')?.addEventListener('click', function() {
            document.getElementById('cookie-preferences-modal').classList.add('hidden');
        });
    
        // Close when clicking outside modal
        document.getElementById('cookie-preferences-modal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
    });
    </script>