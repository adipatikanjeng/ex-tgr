// lazyload config

var jp_config = {
  easyPieChart:   [ packageAsset('') + 'libs/jquery/jquery.easy-pie-chart/dist/jquery.easypiechart.fill.js' ],
  sparkline:      [ packageAsset('') + 'libs/jquery/jquery.sparkline/dist/jquery.sparkline.retina.js' ],
  plot:           [ packageAsset('') + 'libs/jquery/flot/jquery.flot.js',
                    packageAsset('') + 'libs/jquery/flot/jquery.flot.resize.js',
                    packageAsset('') + 'libs/jquery/flot/jquery.flot.pie.js',
                    packageAsset('') + 'libs/jquery/flot.tooltip/js/jquery.flot.tooltip.min.js',
                    packageAsset('') + 'libs/jquery/flot-spline/js/jquery.flot.spline.min.js',
                    packageAsset('') + 'libs/jquery/flot.orderbars/js/jquery.flot.orderBars.js'],
  vectorMap:      [ packageAsset('') + 'libs/jquery/bower-jvectormap/jquery-jvectormap-1.2.2.min.js',
                    packageAsset('') + 'libs/jquery/bower-jvectormap/jquery-jvectormap.css', 
                    packageAsset('') + 'libs/jquery/bower-jvectormap/jquery-jvectormap-world-mill-en.js',
                    packageAsset('') + 'libs/jquery/bower-jvectormap/jquery-jvectormap-us-aea-en.js' ],
  dataTable:      [
                    packageAsset('') + 'libs/jquery/datatables/media/js/jquery.dataTables.min.js',
                    packageAsset('') + 'libs/jquery/plugins/integration/bootstrap/3/dataTables.bootstrap.js',
                    packageAsset('') + 'libs/jquery/plugins/integration/bootstrap/3/dataTables.bootstrap.css'],
  footable:       [
                    packageAsset('') + 'libs/jquery/footable/dist/footable.all.min.js',
                    packageAsset('') + 'libs/jquery/footable/css/footable.core.css'
                  ]
};
