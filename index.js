$(document).ready(function() {
    var selectedWall = null;
    var selectedCeiling = null;
    var totalCost = 0;


    $('.tab-link').click(function() {
        $('.tab').removeClass('active');
        var tabClass = $(this).attr('class').split(' ')[1];
        $('.' + tabClass).addClass('active');
    });

    $('.order-button').click(function() {
        $('.modal-overlay').addClass('active');
        $('.modal').show();
    });


    $('.modal .close-button').click(function() {
        $('.modal-overlay').removeClass('active');
        $('.modal').hide();
    });

    $('#order-form').submit(function(event) {
        event.preventDefault();
        if (selectedWall === null || selectedCeiling === null) {
            alert('Пожалуйста, выберите стены и потолок.');
            return;
        }

        totalCost = calculateTotalCost(selectedWall, selectedCeiling);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize() + '&walls=' + selectedWall + '&ceiling=' + selectedCeiling + '&totalCost=' + totalCost,
            success: function(response) {
                $('.modal-overlay').fadeOut();

                alert('Заказ успешно оформлен!');
            },
            error: function() {
                alert('Произошла ошибка при оформлении заказа. Пожалуйста, попробуйте еще раз.');
            }
        });
    });

    $('.tab.walls .dropdown a').click(function(e) {
        e.preventDefault();
        selectedWall = $(this).text();
        displaySelection();
    });


    $('.tab.ceiling .dropdown a').click(function(e) {
        e.preventDefault();
        selectedCeiling = $(this).text();
        displaySelection();
    });


    function calculateTotalCost(wall, ceiling) {
        var wallCost = parseInt($('.tab.walls .dropdown a:contains("' + wall + '")').data('price'));
        var ceilingCost = parseInt($('.tab.ceiling .dropdown a:contains("' + ceiling + '")').data('price'));

        if (isNaN(wallCost) || isNaN(ceilingCost)) {
            return 0;
        }

        return totalCost = wallCost + ceilingCost;
    }
    function displaySelection() {
        var selectionText = "";
        if (selectedWall !== null) {
            selectionText += "Cтены цвета:\n" + selectedWall;
        }
        if (selectedCeiling !== null) {
            selectionText += "Потолок:\n" + selectedCeiling;
        }
        totalCost = calculateTotalCost(selectedWall, selectedCeiling);
        selectionText += " Общая стоимость:\n" + totalCost;

        $("#selection-output").text(selectionText);
    }
    displaySelection();


    $('ul.dropdown li a').click(function() {
        $('ul.dropdown li a').removeClass('active');
        $(this).addClass('active');
    });

    $('.next-button').click(function() {
        var activeTab = $('.tab.active');
        activeTab.removeClass('active');
        var nextTab = activeTab.next('.tab');
        if (nextTab.length > 0) {
            nextTab.addClass('active');
            var target = nextTab.data('target');
            $('.tab-link').removeClass('active');
            $('.tab-link[data-target="' + target + '"]').addClass('active');
        }
    });

    $('.prev-button').click(function() {
        var activeTab = $('.tab.active');
        activeTab.removeClass('active');
        var prevTab = activeTab.prev('.tab');
        if (prevTab.length > 0) {
            prevTab.addClass('active');
            var target = prevTab.data('target');
            $('.tab-link').removeClass('active');
            $('.tab-link[data-target="' + target + '"]').addClass('active');
        }
    });

    $('.tab-link').click(function() {
        $('.tab-link').removeClass('active');
        $(this).addClass('active');
        var target = $(this).data('target');
        $('.tab').removeClass('active');
        $('.tab[data-target="' + target + '"]').addClass('active');
    });


});