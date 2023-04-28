<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Расчёт сметы по указаным вами данным с сайта YourBuild</h1>
<p>Вы выбрали вид работ:
    @if($estimateData['category'] === 'wallPaper')
        Обои
    @elseif($estimateData['category'] === 'laminate')
        Ламинат
    @elseif($estimateData['category'] === 'paintCeiling')
        Покраска потолка
    @elseif($estimateData['category'] === 'paintWall')
        Покраска стен
    @elseif($estimateData['category'] === 'tileFloor')
        Укладка плитки на пол
    @elseif($estimateData['category'] === 'tileWall')
        Укладка плитки на стены
    @endif
</p>
<p>Размеры вашего помещения в метрах: длинна {{ $estimateData['length'] }}м, ширина {{ $estimateData['width'] }}м,
    высота {{ $estimateData['height'] }}м.</p>
<p>Ценна в долларах {{ $estimateData['resultCalculate'] }}$</p>
<p>Спасибо!</p>
<p>*более точный подсчет, с учетом всех дополнительных работ, возможен при личном визите нашего мастера. Номер (095 20 29 ***)</p>
</body>
</html>
