requirejs.config({
    baseUrl: "./",
    paths: {
        mds: "js/mds",
        backtotop: "components/backtotop/js/backtotop",
        bootstrap: "components/bootstrap/docs/assets/js/bootstrap",
        brandkit: "components/brandkit/js/brandkit",
        "collapsible-list": "components/collapsible-list/js/collapsible-list",
        carousel: "components/carousel/js/carousel",
        "font-awesome": "components/font-awesome",
        "ge-bootstrap": "components/ge-bootstrap/js/ge-bootstrap",
        jquery: "components/jquery/jquery",
        "jquery-csv": "components/jquery-csv/src/jquery.csv",
        "jqueryui-sortable-amd": "components/jqueryui-sortable-amd/js/jquery-ui-1.10.2.custom",
        jumpnav: "components/jumpnav/js/jumpnav",
        "mds-navbar": "components/mds-navbar/js/mds-navbar",
        modernizr: "components/modernizr/modernizr",
        modules: "components/modules/js/modules",
        prettify: "components/prettify/prettify",
        respond: "components/respond/respond.src",
        "responsive-emitter": "components/responsive-emitter/js/responsive-emitter",
        spinner: "components/spinner/js/spinner",
        slider: "components/slider/js/slider",
        spin: "components/spin.js/dist/spin",
        "blog-content": "components/blog-content/less/blog-content.less",
        "bootstrap-datepicker": "components/bootstrap-datepicker/js/bootstrap-datepicker",
        datepicker: "components/datepicker/js/datepicker",
        contextmenu: "components/contextmenu/js/contextmenu",
        "jQuery-contextMenu": "components/jQuery-contextMenu/src/jquery.contextMenu",
        scrolly: "components/scrolly/js/scrolly",
        requirejs: "components/requirejs/require",
        "jquery-backstretch": "components/jquery-backstretch/jquery.backstretch",
        masonry: "js/masonry.pkgd",
        "responsive-tables": "components/responsive-tables/js/responsive-tables",
        videoplayer: "components/videoplayer/js/videoplayer",
        videojs: "components/videoplayer/js/video",
        "multi-step-navigation": "components/multi-step-navigation/js/multi-step-navigation",
        "twitter-bootstrap-wizard": "components/twitter-bootstrap-wizard/jquery.bootstrap.wizard",
        feedback: "components/feedback/js/feedback",
        "contact-list": "components/contact-list/js/contact-list",
        "events-list": "components/events-list/js/events-list",
        "bootstrap-switch": "components/bootstrap-switch/static/js/bootstrap-switch",
        "d3-amd": "components/d3-amd/d3",
        "declarative-visualizations": "components/declarative-visualizations/js/declarative-visualizations",
        pubsub: "components/map-core/js/pubsub",
        underscore: "components/underscore-amd/underscore-min",
        OpenLayers: "components/openlayers/build/OpenLayers",
        "map-cluster": "components/map-cluster/js/map-cluster",
        "map-core": "components/map-core/js/map-core",
        "map-geolocate": "components/map-geolocate/js/map-geolocate",
        "map-google": "components/map-google/js/googlemaps",
        "map-layerlist": "components/map-layerlist/js/map-layer-list",
        "map-markers": "components/map-markers/js/map-markers",
        "map-popovers": "components/map-popovers/js/map-popovers",
        "map-search": "components/map-search/js/map-search",
        "map-zoom": "components/map-zoom/js/map-zoom",
        "oo-utils": "components/oo-utils/src/js/oo-utils",
        "toggle-switch": "components/toggle-switch/src/js/toggle-switch",
        charts: "components/charts/js/charts",
        "highcharts": "components/highcharts-amd/js/highcharts.src",
        "highstock": "components/highcharts-amd/js/highstock.src",
        "highcharts-more": "components/highcharts-amd/js/highcharts-more.src",
        "multi-level-nav": "js/multi-level-nav"
    },
    shim: {
        "jquery-backstretch": [
            "jquery"
        ],
        masonry: [
            "jquery"
        ],
        OpenLayers: {
            exports: "OpenLayers"
        },
        "jquery-csv": [
            "jquery"
        ]
    }
});

