
/**
* Theme: SimpleAdmin Admin Template
* Author: Coderthemes
* Morris Chart
*/

!function($) {
    "use strict";

    var Dashboard = function() {};

    //creates line chart
    Dashboard.prototype.createLineChart = function(element, data, xkey, ykeys, labels, xLabels, opacity, Pfillcolor, Pstockcolor, lineColors) {
        Morris.Line({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            xLabels: xLabels,
            xLabelAngle: 45,
            xLabelFormat: function (d) {    
                return ("0" + (d.getDate())).slice(-2) + '/' + 
                    ("0" + (d.getMonth() + 1)).slice(-2);
            },
            fillOpacity: opacity,
            pointFillColors: Pfillcolor,
            pointStrokeColors: Pstockcolor,
            behaveLikeLine: true,
            gridLineColor: '#eef0f2',
            hideHover: 'auto',
            lineWidth: '3px',
            pointSize: 0,
            resize: true, //defaulted to true
            lineColors: lineColors,
            dateFormat: function (ts) {
                var d = new Date(ts);
                return ("0" + (d.getDate())).slice(-2) + '/' + 
                    ("0" + (d.getMonth() + 1)).slice(-2) + '/' +
                    ("0" + (d.getFullYear())).slice(-2);
            },
            yLabelFormat: function (y) {
                return 'R$' + y.toString();
            }
        });
    },

    Dashboard.prototype.init = function() {

        //create line chart
        var $data  = serverData;
        this.createLineChart('dashboard-line-chart', $data, 'periodo', ['valor'], ['VALOR'], 'day', 1, ['#eef0f2'], ['#51ac4f'], ['#51ac4f']);

    },
    //init
    $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
}(window.jQuery);