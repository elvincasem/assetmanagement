$(function() {

   barchart = document.getElementById("indexbarchard").value;
   barchartjson = JSON.parse(barchart);
   console.log(barchartjson);
    Morris.Bar({
        element: 'morris-bar-chart',
        data: barchartjson,
        xkey: 'ykey',
        ykeys: ['xkey'],
        labels: ['Number of Request:'],
        hideHover: 'auto',
        resize: true
    });

});
