$(() => {
    $("#navbarToggler").on("click", function (e) {
        let navigationMenu = $(this).attr("data-target");
        $(navigationMenu).toggleClass("hidden");
    });
});
