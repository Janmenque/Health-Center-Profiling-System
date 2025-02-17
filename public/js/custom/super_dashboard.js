"use strict";
var options = {
        series: [{
            name: "Total Users",
            type: 'column',
            data: organizationByMonthData,
    }],
chart: {
    height: 452,
        type: 'line',
        toolbar:{
        show: false
    },
    zoom: {
        enabled: false
    }
},
legend:{
    show:false
},
dataLabels: {
    enabled: false
},
stroke: {
    width: [0,0],
        curve: 'smooth',
},
plotOptions: {
    bar: {
        columnWidth:"20%",
            startingShape:"rounded",
            endingShape: "rounded",
    }
},
fill:{
    opacity:[1, 0.08],
        gradient:{
        type:"horizontal",
            opacityFrom:0.5,
            opacityTo:0.1,
            stops: [100, 100, 100]
    }
},
colors: [Codexdmeki.themeprimary],
    states: {
    normal: {
        filter: {
            type: 'darken',
                value: 1,
        }
    },
    hover: {
        filter: {
            type: 'darken',
                value: 1,
        }
    },
    active: {
        allowMultipleDataPointsSelection: false,
            filter: {
            type: 'darken',
                value: 1,
        }
    },
},
grid:{
    strokeDashArray: 2,
},

yaxis:{

    labels:{
        formatter: function (y) {
            return   y.toFixed(0);
        },
        style: {
            colors: '#262626',
                fontSize: '14px',
                fontWeight: 500,
                fontFamily: 'Roboto, sans-serif'
        }
    },
},
xaxis: {
    categories: organizationByMonthLabel,
    axisTicks: {
        show:false
    },
    axisBorder:{
        show:false
    },
    labels:{
        style: {
            colors: '#262626',
                fontSize: '14px',
                fontWeight: 500,
                fontFamily: 'Roboto, sans-serif'
        },
    },
},
responsive:[
    {
        breakpoint: 1441,
        options:{
            chart:{
                height: 445
            }
        },
    },
    {
        breakpoint: 1366,
        options:{
            chart:{
                height: 320
            }
        },
    },
]
};
var chart = new ApexCharts(document.querySelector("#organization_by_month"), options);
chart.render();

var options = {
        series: [{
            name: "Total Payment",
            type: 'line',
            data: paymentByMonthData,
    }],
chart: {
    height: 452,
        type: 'line',
        toolbar:{
        show: false
    },
    zoom: {
        enabled: false
    }
},
legend:{
    show:false
},
dataLabels: {
    enabled: false
},
stroke: {
    width: [0,0],
        curve: 'smooth',
},
plotOptions: {
    bar: {
        columnWidth:"20%",
            startingShape:"rounded",
            endingShape: "rounded",
    }
},
fill:{
    opacity:[1, 0.08],
        gradient:{
        type:"horizontal",
            opacityFrom:0.5,
            opacityTo:0.1,
            stops: [100, 100, 100]
    }
},
colors: [Codexdmeki.themeprimary],
    states: {
    normal: {
        filter: {
            type: 'darken',
                value: 1,
        }
    },
    hover: {
        filter: {
            type: 'darken',
                value: 1,
        }
    },
    active: {
        allowMultipleDataPointsSelection: false,
            filter: {
            type: 'darken',
                value: 1,
        }
    },
},
grid:{
    strokeDashArray: 2,
},

yaxis:{

    labels:{
        formatter: function (y) {
            return   y.toFixed(0);
        },
        style: {
            colors: '#262626',
                fontSize: '14px',
                fontWeight: 500,
                fontFamily: 'Roboto, sans-serif'
        }
    },
},
xaxis: {
    categories: paymentByMonthLabel,
    axisTicks: {
        show:false
    },
    axisBorder:{
        show:false
    },
    labels:{
        style: {
            colors: '#262626',
                fontSize: '14px',
                fontWeight: 500,
                fontFamily: 'Roboto, sans-serif'
        },
    },
},
responsive:[
    {
        breakpoint: 1441,
        options:{
            chart:{
                height: 445
            }
        },
    },
    {
        breakpoint: 1366,
        options:{
            chart:{
                height: 320
            }
        },
    },
]
};
var chart = new ApexCharts(document.querySelector("#payments_by_month"), options);
chart.render();
