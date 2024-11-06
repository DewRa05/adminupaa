$(document).ready(function() {
    // Toggle and save collapse state when a section is opened or closed
    $('.collapse').on('shown.bs.collapse', function() {
        var targetId = $(this).attr('id');
        localStorage.setItem(targetId, 'show');
    }).on('hidden.bs.collapse', function() {
        var targetId = $(this).attr('id');
        localStorage.setItem(targetId, 'hide');
    });

    // Restore the collapse state on page load
    $('.collapse').each(function() {
        var targetId = $(this).attr('id');
        if (localStorage.getItem(targetId) === 'show') {
            $(this).collapse('show');
        } else {
            $(this).collapse('hide');
        }
    });

    // Close all dropdowns when 'Dashboard' is clicked
    $('.nav-link[href="{{ route('admin.dashboard') }}"]').on('click', function() {
        $('.collapse').collapse('hide');
        // Clear all stored states
        $('.collapse').each(function() {
            var targetId = $(this).attr('id');
            localStorage.setItem(targetId, 'hide');
        });
    });
});
