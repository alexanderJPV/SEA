<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="css/code/highcharts.js"></script>
<script src="css/code/modules/exporting.js"></script>
<script src="css/code/modules/export-data.js"></script>
<?php include("includes/header.php");?> 

<div id="container" style="min-width: 50%; height: 80%;   max-width: 100%; margin: 0 auto"></div>
<script type="text/javascript">
// Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Cantidad de estudiantes inscritos por niveles gestion <?php  echo date('d, F, Y');?>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Estidiantes',
        colorByPoint: true,
        data: [
          {
            <?php 
             $sql21 = $conexion->prepare("select count(distinct u.nombre) as n
                                        from materia m, usuario u
                                        where u.id=m.id_us and u.visible='si' and  m.visible='si' and m.nivel='inicial'");      
             $sql21->execute();
             $fila21 = $sql21->fetch()
            ?>
            name: 'Inicial',
            y: <?php echo $fila21['n'];?>
          },
          {
            <?php 
             $sql22 = $conexion->prepare("select count(distinct u.nombre) as n
                                        from materia m, usuario u
                                        where u.id=m.id_us and u.visible='si' and  m.visible='si' and m.nivel='avanzado'");      
             $sql22->execute();
             $fila22 = $sql22->fetch();
            ?>
             name: 'Avanzado',
             y: <?php echo $fila22['n'];?>
          }, 
          {
            <?php 
             $sql23 = $conexion->prepare("select count(distinct u.nombre) as n
                                        from materia m, usuario u
                                        where u.id=m.id_us and u.visible='si' and  m.visible='si' and m.nivel='aplicados'");      
             $sql23->execute();
             $fila23 = $sql23->fetch();
            ?>
            name: 'Aplicados',
            y: <?php echo $fila23['n'];?>
          },
          {
            <?php 
             $sql24 = $conexion->prepare("select count(distinct u.nombre) as n
                                        from materia m, usuario u
                                        where u.id=m.id_us and u.visible='si' and  m.visible='si' and m.nivel='complementarios'");      
             $sql24->execute();
             $fila24 = $sql24->fetch();
            ?>
            name: 'Complementarios',
            y: <?php echo $fila24['n'];?>
        }, {
          <?php 
             $sql25 = $conexion->prepare("select count(distinct u.nombre) as n
                                        from materia m, usuario u
                                        where u.id=m.id_us and u.visible='si' and  m.visible='si' and m.nivel='especializados'");      
             $sql25->execute();
             $fila25 = $sql25->fetch();
            ?>
            name: 'Especializados',
            y: <?php echo $fila25['n'];?>
        }]
    }]
});
		</script>            
<?php include("includes/footer.php"); ?>