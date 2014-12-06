requirejs.config({
    //By default load any module IDs from js/lib
    baseUrl: 'app',
    //except, if the module ID starts with "app",
    //load it from the js/app directory. paths
    //config is relative to the baseUrl, and
    //never includes a ".js" extension since
    //the paths config could be for a directory.
    paths: {
        backbone: '../vendor/backbone/backbone',
        underscore: '../vendor/underscore/underscore-min',
        text: '../vendor/requirejs-text/text',
        handlebars: '../vendor/handlebars/handlebars',
        jquery: '../vendor/jQuery/dist/jquery.min'
    }
});