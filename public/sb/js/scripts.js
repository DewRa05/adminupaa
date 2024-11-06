/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

$(document).ready(function() {
    // Save collapse state when a section is opened
    $('.collapse').on('shown.bs.collapse', function() {
        var targetId = $(this).attr('id');
        localStorage.setItem(targetId, 'show');
    });

    // Save collapse state when a section is closed
    $('.collapse').on('hidden.bs.collapse', function() {
        var targetId = $(this).attr('id');
        localStorage.setItem(targetId, 'hide');
    });

    // Restore the collapse state on page load
    $('.collapse').each(function() {
        var targetId = $(this).attr('id');
        if (localStorage.getItem(targetId) === 'show') {
            $(this).addClass('show');
        }
    });

    // Close all dropdowns when 'Dashboard' is clicked
    $('.nav-link[href="{{ route('admin.dashboard') }}"]').on('click', function() {
        $('.collapse').collapse('hide');
    });
});


