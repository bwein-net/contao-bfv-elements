let BweinBfvWidget = (function () {
        'use strict';

        let Constructor = function () {
            let _widgetCallbacks = [];

            this.addCallback = function ($callback) {
                _widgetCallbacks.push($callback)
            };
            this.initWidgetScripts = function (scriptSrc) {
                var self = this;
                var loader = new BweinScriptLoader();
                loader.requireScripts(scriptSrc,
                    function () {
                        self.runWidgetCallbacks();
                    });
            };
            this.runWidgetCallbacks = function () {
                if (typeof BFVWidget === 'undefined') {
                    console.error('BFVWidget is not defined');
                    return;
                }
                for (var i = 0; i < _widgetCallbacks.length; i++) {
                    var functionName = _widgetCallbacks[i];
                    if (typeof window[functionName] !== "function") {
                        console.error(functionName + ' is missing');
                        continue;
                    }
                    window[functionName]();
                }
            };
        }
        return Constructor;
    }
)();
var bwein_bfv_widget = new BweinBfvWidget();

let BweinScriptLoader = (function () {
        'use strict';

        let Constructor = function () {
            let _loadCount = 0;
            let _totalRequired = 0;
            let _callback = null;

            this.requireScripts = function (scripts, callback) {
                _loadCount = 0;
                _totalRequired = scripts.length;
                _callback = callback;

                for (var i = 0; i < scripts.length; i++) {
                    this.writeScript(scripts[i]);
                }
            };
            this.loadedScripts = function (evt) {
                _loadCount++;
                if (_loadCount == _totalRequired && typeof _callback === 'function') _callback.call();
            };
            this.writeScript = function (src) {
                var self = this;
                var s = document.createElement('script');
                s.type = "text/javascript";
                s.async = true;
                s.src = src;
                s.addEventListener('load', function (e) {
                    self.loadedScripts(e);
                }, false);
                var head = document.getElementsByTagName('head')[0];
                head.appendChild(s);
            }
        }
        return Constructor;
    }
)();
