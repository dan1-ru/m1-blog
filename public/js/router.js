'use strict';

function Router(defaultRoute) {
    try {
        this.constructor(defaultRoute);
        this.init();
    } catch (e) {
        console.error(e);   
    }
}

Router.prototype = {
    rootElem: undefined,
    defaultRoute: undefined,
    onPageLoadedCallback: undefined,
    constructor: function (defaultRoute) {
        this.rootElem = document.getElementById('app');
        this.defaultRoute = defaultRoute;
    },
    init: function () {
        (function(scope) { 
            window.addEventListener('hashchange', function (e) {
                scope.hasChanged(scope);
            });
        })(this);
        this.hasChanged(this);
    },
    hasChanged: function(scope){  
        if (window.location.hash.length > 0) {
            scope.to(window.location.hash.substr(1));
        } else {
            scope.to(scope.defaultRoute);
        }
    },
    onPageLoaded: function(callback) {
        this.onPageLoadedCallback = callback;
    },
    to: function (url) {
        (function(scope) { 
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    scope.rootElem.innerHTML = this.responseText;
                    if(scope.onPageLoadedCallback !== undefined) {
                        scope.onPageLoadedCallback(url);
                    }
                }
            };
            xhr.open('GET', url, true);
            xhr.send();
        })(this);
    }
};