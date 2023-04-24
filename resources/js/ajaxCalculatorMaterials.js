$(document).ready(function() {
    $('#calculatorMaterials').submit(function(e) {
        e.preventDefault();
        var materialsCalculationUrl = $('#materials-calculation-url').val();
        $.ajax({
            url: materialsCalculationUrl,
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.category === 'laminate') {
                    $('#result').text('Вам нужно '+response.resultCalculate+' планок ламината размером 1380мм на 159мм. Учтён запас 10%   ' );
                }
                if (response.category === 'wallPaper') {
                    $('#result').text('Вам нужно '+response.resultCalculate+' рулонов обоев шириной 1 метр без подбора рисунка');
                }
                if (response.category === 'wallPaperWithSelection') {
                    $('#result').text('Вам нужно '+response.resultCalculate+' рулонов обоев шириной 1 метр c подбором рисунка');
                }
                if (response.category === 'paintCeiling') {
                    $('#result').text('Для потолка вам нужно '+response.resultCalculate+' кг краски на 1 слой');
                }
                if (response.category === 'paintWall') {
                    $('#result').text('Для стен вам нужно '+response.resultCalculate+' кг краски на 1 слой');
                }
                if (response.category === 'tileFloor') {
                    $('#result').text('Для пола вам нужно '+response.resultCalculate+' квадратных метров плитки. Учтён запас 10%');
                }
                if (response.category === 'tileWall') {
                    $('#result').text('Для стен вам нужно '+response.resultCalculate+' квадратных метров плитки. Учтён запас 10%');
                }
                $('#lengthError').text('');
                $('#widthError').text('');
                $('#heightError').text('');
                $('#categoryError').text('');
            },
            error:function (response) {
                $('#lengthError').text(response.responseJSON.errors.length);
                $('#widthError').text(response.responseJSON.errors.width);
                $('#heightError').text(response.responseJSON.errors.height);
                $('#categoryError').text(response.responseJSON.errors.category);
            }
        });
    });
});
