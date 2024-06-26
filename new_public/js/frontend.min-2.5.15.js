/*!elementor - v2.5.15 - 07-05-2019*/
!function (e) {
    var t = {};

    function n(i) {
        if (t[i]) return t[i].exports;
        var o = t[i] = {i: i, l: !1, exports: {}};
        return e[i].call(o.exports, o, o.exports, n), o.l = !0, o.exports
    }

    n.m = e, n.c = t, n.d = function (e, t, i) {
        n.o(e, t) || Object.defineProperty(e, t, {enumerable: !0, get: i})
    }, n.r = function (e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {value: "Module"}), Object.defineProperty(e, "__esModule", {value: !0})
    }, n.t = function (e, t) {
        if (1 & t && (e = n(e)), 8 & t) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var i = Object.create(null);
        if (n.r(i), Object.defineProperty(i, "default", {
            enumerable: !0,
            value: e
        }), 2 & t && "string" != typeof e) for (var o in e) n.d(i, o, function (t) {
            return e[t]
        }.bind(null, o));
        return i
    }, n.n = function (e) {
        var t = e && e.__esModule ? function () {
            return e.default
        } : function () {
            return e
        };
        return n.d(t, "a", t), t
    }, n.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, n.p = "", n(n.s = 182)
}({
    1: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var i = navigator.userAgent;
        t.default = {
            webkit: -1 !== i.indexOf("AppleWebKit"),
            firefox: -1 !== i.indexOf("Firefox"),
            ie: /Trident|MSIE/.test(i),
            edge: -1 !== i.indexOf("Edge"),
            mac: -1 !== i.indexOf("Macintosh")
        }
    }, 13: function (e, t, n) {
        "use strict";
        e.exports = function () {
            var e, t = Array.prototype.slice, n = {actions: {}, filters: {}};

            function i(e, t, i, o) {
                var r, s, a;
                if (n[e][t]) if (i) if (r = n[e][t], o) for (a = r.length; a--;) (s = r[a]).callback === i && s.context === o && r.splice(a, 1); else for (a = r.length; a--;) r[a].callback === i && r.splice(a, 1); else n[e][t] = []
            }

            function o(e, t, i, o, r) {
                var s = {callback: i, priority: o, context: r}, a = n[e][t];
                if (a) {
                    var l = !1;
                    if (jQuery.each(a, function () {
                        if (this.callback === i) return l = !0, !1
                    }), l) return;
                    a.push(s), a = function (e) {
                        for (var t, n, i, o = 1, r = e.length; o < r; o++) {
                            for (t = e[o], n = o; (i = e[n - 1]) && i.priority > t.priority;) e[n] = e[n - 1], --n;
                            e[n] = t
                        }
                        return e
                    }(a)
                } else a = [s];
                n[e][t] = a
            }

            function r(e, t, i) {
                var o, r, s = n[e][t];
                if (!s) return "filters" === e && i[0];
                if (r = s.length, "filters" === e) for (o = 0; o < r; o++) i[0] = s[o].callback.apply(s[o].context, i); else for (o = 0; o < r; o++) s[o].callback.apply(s[o].context, i);
                return "filters" !== e || i[0]
            }

            return e = {
                removeFilter: function (t, n) {
                    return "string" == typeof t && i("filters", t, n), e
                }, applyFilters: function () {
                    var n = t.call(arguments), i = n.shift();
                    return "string" == typeof i ? r("filters", i, n) : e
                }, addFilter: function (t, n, i, r) {
                    return "string" == typeof t && "function" == typeof n && o("filters", t, n, i = parseInt(i || 10, 10), r), e
                }, removeAction: function (t, n) {
                    return "string" == typeof t && i("actions", t, n), e
                }, doAction: function () {
                    var n = t.call(arguments), i = n.shift();
                    return "string" == typeof i && r("actions", i, n), e
                }, addAction: function (t, n, i, r) {
                    return "string" == typeof t && "function" == typeof n && o("actions", t, n, i = parseInt(i || 10, 10), r), e
                }
            }
        }
    }, 15: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var i = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
                }
            }

            return function (t, n, i) {
                return n && e(t.prototype, n), i && e(t, i), t
            }
        }();
        var o = function (e) {
            function t() {
                return function (e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, t), function (e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, elementorModules.Module), i(t, [{
                key: "get", value: function (e, t) {
                    t = t || {};
                    var n = void 0;
                    try {
                        n = t.session ? sessionStorage : localStorage
                    } catch (t) {
                        return e ? void 0 : {}
                    }
                    var i = n.getItem("elementor");
                    (i = i ? JSON.parse(i) : {}).__expiration || (i.__expiration = {});
                    var o = i.__expiration, r = [];
                    e ? o[e] && (r = [e]) : r = Object.keys(o);
                    var s = !1;
                    return r.forEach(function (e) {
                        new Date(o[e]) < new Date && (delete i[e], delete o[e], s = !0)
                    }), s && this.save(i, t.session), e ? i[e] : i
                }
            }, {
                key: "set", value: function (e, t, n) {
                    n = n || {};
                    var i = this.get(null, n);
                    if (i[e] = t, n.lifetimeInSeconds) {
                        var o = new Date;
                        o.setTime(o.getTime() + 1e3 * n.lifetimeInSeconds), i.__expiration[e] = o.getTime()
                    }
                    this.save(i, n.session)
                }
            }, {
                key: "save", value: function (e, t) {
                    var n = void 0;
                    try {
                        n = t ? sessionStorage : localStorage
                    } catch (e) {
                        return
                    }
                    n.setItem("elementor", JSON.stringify(e))
                }
            }]), t
        }();
        t.default = o
    }, 16: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var i = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
                }
            }

            return function (t, n, i) {
                return n && e(t.prototype, n), i && e(t, i), t
            }
        }(), o = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(1));
        var r = function () {
            function e() {
                !function (e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, e), this.hotKeysHandlers = {}
            }

            return i(e, [{
                key: "applyHotKey", value: function (e) {
                    var t = this.hotKeysHandlers[e.which];
                    t && jQuery.each(t, function (t, n) {
                        n.isWorthHandling && !n.isWorthHandling(e) || !n.allowAltKey && e.altKey || (e.preventDefault(), n.handle(e))
                    })
                }
            }, {
                key: "isControlEvent", value: function (e) {
                    return e[o.default.mac ? "metaKey" : "ctrlKey"]
                }
            }, {
                key: "addHotKeyHandler", value: function (e, t, n) {
                    this.hotKeysHandlers[e] || (this.hotKeysHandlers[e] = {}), this.hotKeysHandlers[e][t] = n
                }
            }, {
                key: "bindListener", value: function (e) {
                    e.on("keydown", this.applyHotKey.bind(this))
                }
            }]), e
        }();
        t.default = r
    }, 17: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var i = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
                }
            }

            return function (t, n, i) {
                return n && e(t.prototype, n), i && e(t, i), t
            }
        }();
        var o = function (e) {
            function t() {
                return function (e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, t), function (e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, elementorModules.ViewModule), i(t, [{
                key: "getDefaultSettings", value: function () {
                    return {
                        selectors: {
                            elements: ".elementor-element",
                            nestedDocumentElements: ".elementor .elementor-element"
                        }, classes: {editMode: "elementor-edit-mode"}
                    }
                }
            }, {
                key: "getDefaultElements", value: function () {
                    var e = this.getSettings("selectors");
                    return {$elements: this.$element.find(e.elements).not(this.$element.find(e.nestedDocumentElements))}
                }
            }, {
                key: "getDocumentSettings", value: function (e) {
                    var t = void 0;
                    if (this.isEdit) {
                        t = {};
                        var n = elementor.settings.page.model;
                        jQuery.each(n.getActiveControls(), function (e) {
                            t[e] = n.attributes[e]
                        })
                    } else t = this.$element.data("elementor-settings") || {};
                    return this.getItems(t, e)
                }
            }, {
                key: "runElementsHandlers", value: function () {
                    this.elements.$elements.each(function (e, t) {
                        return elementorFrontend.elementsHandler.runReadyTrigger(t)
                    })
                }
            }, {
                key: "onInit", value: function () {
                    this.$element = this.getSettings("$element"), function e(t, n, i) {
                        null === t && (t = Function.prototype);
                        var o = Object.getOwnPropertyDescriptor(t, n);
                        if (void 0 === o) {
                            var r = Object.getPrototypeOf(t);
                            return null === r ? void 0 : e(r, n, i)
                        }
                        if ("value" in o) return o.value;
                        var s = o.get;
                        return void 0 !== s ? s.call(i) : void 0
                    }(t.prototype.__proto__ || Object.getPrototypeOf(t.prototype), "onInit", this).call(this), this.isEdit = this.$element.hasClass(this.getSettings("classes.editMode")), this.isEdit ? elementor.settings.page.model.on("change", this.onSettingsChange.bind(this)) : this.runElementsHandlers()
                }
            }, {
                key: "onSettingsChange", value: function () {
                }
            }]), t
        }();
        t.default = o
    }, 18: function (e, t, n) {
        "use strict";
        e.exports = elementorModules.frontend.handlers.Base.extend({
            $activeContent: null, getDefaultSettings: function () {
                return {
                    selectors: {tabTitle: ".elementor-tab-title", tabContent: ".elementor-tab-content"},
                    classes: {active: "elementor-active"},
                    showTabFn: "show",
                    hideTabFn: "hide",
                    toggleSelf: !0,
                    hidePrevious: !0,
                    autoExpand: !0
                }
            }, getDefaultElements: function () {
                var e = this.getSettings("selectors");
                return {$tabTitles: this.findElement(e.tabTitle), $tabContents: this.findElement(e.tabContent)}
            }, activateDefaultTab: function () {
                var e = this.getSettings();
                if (e.autoExpand && ("editor" !== e.autoExpand || this.isEdit)) {
                    var t = this.getEditSettings("activeItemIndex") || 1,
                        n = {showTabFn: e.showTabFn, hideTabFn: e.hideTabFn};
                    this.setSettings({
                        showTabFn: "show",
                        hideTabFn: "hide"
                    }), this.changeActiveTab(t), this.setSettings(n)
                }
            }, deactivateActiveTab: function (e) {
                var t = this.getSettings(), n = t.classes.active, i = e ? '[data-tab="' + e + '"]' : "." + n,
                    o = this.elements.$tabTitles.filter(i), r = this.elements.$tabContents.filter(i);
                o.add(r).removeClass(n), r[t.hideTabFn]()
            }, activateTab: function (e) {
                var t = this.getSettings(), n = t.classes.active,
                    i = this.elements.$tabTitles.filter('[data-tab="' + e + '"]'),
                    o = this.elements.$tabContents.filter('[data-tab="' + e + '"]');
                i.add(o).addClass(n), o[t.showTabFn]()
            }, isActiveTab: function (e) {
                return this.elements.$tabTitles.filter('[data-tab="' + e + '"]').hasClass(this.getSettings("classes.active"))
            }, bindEvents: function () {
                var e = this;
                this.elements.$tabTitles.on({
                    keydown: function (t) {
                        "Enter" === t.key && (t.preventDefault(), e.changeActiveTab(t.currentTarget.dataset.tab))
                    }, click: function (t) {
                        t.preventDefault(), e.changeActiveTab(t.currentTarget.dataset.tab)
                    }
                })
            }, onInit: function () {
                elementorModules.frontend.handlers.Base.prototype.onInit.apply(this, arguments), this.activateDefaultTab()
            }, onEditSettingsChange: function (e) {
                "activeItemIndex" === e && this.activateDefaultTab()
            }, changeActiveTab: function (e) {
                var t = this.isActiveTab(e), n = this.getSettings();
                !n.toggleSelf && t || !n.hidePrevious || this.deactivateActiveTab(), !n.hidePrevious && t && this.deactivateActiveTab(e), t || this.activateTab(e)
            }
        })
    }, 182: function (e, t, n) {
        "use strict";
        var i = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
                }
            }

            return function (t, n, i) {
                return n && e(t.prototype, n), i && e(t, i), t
            }
        }(), o = l(n(183)), r = l(n(16)), s = l(n(15)), a = l(n(1));

        function l(e) {
            return e && e.__esModule ? e : {default: e}
        }

        var d = n(13), c = n(184), u = n(196), h = n(197), f = n(198), m = function (e) {
            function t() {
                var e;
                !function (e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, t);
                for (var n = arguments.length, i = Array(n), o = 0; o < n; o++) i[o] = arguments[o];
                var r = function (e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (e = t.__proto__ || Object.getPrototypeOf(t)).call.apply(e, [this].concat(i)));
                return r.config = elementorFrontendConfig, r
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, elementorModules.ViewModule), i(t, [{
                key: "getDefaultSettings", value: function () {
                    return {
                        selectors: {elementor: ".elementor", adminBar: "#wpadminbar"},
                        classes: {ie: "elementor-msie"}
                    }
                }
            }, {
                key: "getDefaultElements", value: function () {
                    var e = {
                        window: window,
                        $window: jQuery(window),
                        $document: jQuery(document),
                        $head: jQuery(document.head),
                        $body: jQuery(document.body),
                        $deviceMode: jQuery("<span>", {id: "elementor-device-mode", class: "elementor-screen-only"})
                    };
                    return e.$body.append(e.$deviceMode), e
                }
            }, {
                key: "bindEvents", value: function () {
                    var e = this;
                    this.elements.$window.on("resize", function () {
                        return e.setDeviceModeData()
                    })
                }
            }, {
                key: "getElements", value: function (e) {
                    return this.getItems(this.elements, e)
                }
            }, {
                key: "getPageSettings", value: function (e) {
                    var t = this.isEditMode() ? elementor.settings.page.model.attributes : this.config.settings.page;
                    return this.getItems(t, e)
                }
            }, {
                key: "getGeneralSettings", value: function (e) {
                    var t = this.isEditMode() ? elementor.settings.general.model.attributes : this.config.settings.general;
                    return this.getItems(t, e)
                }
            }, {
                key: "getCurrentDeviceMode", value: function () {
                    return getComputedStyle(this.elements.$deviceMode[0], ":after").content.replace(/"/g, "")
                }
            }, {
                key: "getCurrentDeviceSetting", value: function (e, t) {
                    for (var n = ["desktop", "tablet", "mobile"], i = elementorFrontend.getCurrentDeviceMode(), o = n.indexOf(i); o > 0;) {
                        var r = e[t + "_" + n[o]];
                        if (r) return r;
                        o--
                    }
                    return e[t]
                }
            }, {
                key: "isEditMode", value: function () {
                    return this.config.environmentMode.edit
                }
            }, {
                key: "isWPPreviewMode", value: function () {
                    return this.config.environmentMode.wpPreview
                }
            }, {
                key: "initDialogsManager", value: function () {
                    var e = void 0;
                    this.getDialogsManager = function () {
                        return e || (e = new DialogsManager.Instance), e
                    }
                }
            }, {
                key: "initHotKeys", value: function () {
                    this.hotKeys = new r.default, this.hotKeys.bindListener(this.elements.$window)
                }
            }, {
                key: "initOnReadyComponents", value: function () {
                    this.utils = {
                        youtube: new u,
                        anchors: new h,
                        lightbox: new f
                    }, this.modules = {
                        StretchElement: elementorModules.frontend.tools.StretchElement,
                        Masonry: elementorModules.utils.Masonry
                    }, this.elementsHandler = new c(jQuery), this.documentsManager = new o.default, this.trigger("components:init")
                }
            }, {
                key: "initOnReadyElements", value: function () {
                    this.elements.$wpAdminBar = this.elements.$document.find(this.getSettings("selectors.adminBar"))
                }
            }, {
                key: "addIeCompatibility", value: function () {
                    var e = "string" == typeof document.createElement("div").style.grid;
                    if (a.default.ie || !e) {
                        this.elements.$body.addClass(this.getSettings("classes.ie"));
                        var t = '<link rel="stylesheet" id="elementor-frontend-css-msie" href="' + this.config.urls.assets + "css/frontend-msie.min.css?" + this.config.version + '" type="text/css" />';
                        this.elements.$body.append(t)
                    }
                }
            }, {
                key: "setDeviceModeData", value: function () {
                    this.elements.$body.attr("data-elementor-device-mode", this.getCurrentDeviceMode())
                }
            }, {
                key: "addListenerOnce", value: function (e, t, n, i) {
                    if (i || (i = this.elements.$window), this.isEditMode()) if (this.removeListeners(e, t, i), i instanceof jQuery) {
                        var o = t + "." + e;
                        i.on(o, n)
                    } else i.on(t, n, e); else i.on(t, n)
                }
            }, {
                key: "removeListeners", value: function (e, t, n, i) {
                    if (i || (i = this.elements.$window), i instanceof jQuery) {
                        var o = t + "." + e;
                        i.off(o, n)
                    } else i.off(t, n, e)
                }
            }, {
                key: "debounce", value: function (e, t) {
                    var n = void 0;
                    return function () {
                        var i = this, o = arguments, r = !n;
                        clearTimeout(n), n = setTimeout(function () {
                            n = null, e.apply(i, o)
                        }, t), r && e.apply(i, o)
                    }
                }
            }, {
                key: "waypoint", value: function (e, t, n) {
                    n = jQuery.extend({offset: "100%", triggerOnce: !0}, n);
                    return e.elementorWaypoint(function () {
                        var e = this.element || this, i = t.apply(e, arguments);
                        return n.triggerOnce && this.destroy && this.destroy(), i
                    }, n)
                }
            }, {
                key: "muteMigrationTraces", value: function () {
                    jQuery.migrateMute = !0, jQuery.migrateTrace = !1
                }
            }, {
                key: "init", value: function () {
                    this.hooks = new d, this.storage = new s.default, this.addIeCompatibility(), this.setDeviceModeData(), this.initDialogsManager(), this.isEditMode() && this.muteMigrationTraces(), this.elements.$window.trigger("elementor/frontend/init"), this.isEditMode() || this.initHotKeys(), this.initOnReadyElements(), this.initOnReadyComponents()
                }
            }, {
                key: "Module", get: function () {
                    return elementorModules.frontend.handlers.Base
                }
            }]), t
        }();
        window.elementorFrontend = new m, elementorFrontend.isEditMode() || jQuery(function () {
            return elementorFrontend.init()
        })
    }, 183: function (e, t, n) {
        "use strict";
        Object.defineProperty(t, "__esModule", {value: !0});
        var i = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
                }
            }

            return function (t, n, i) {
                return n && e(t.prototype, n), i && e(t, i), t
            }
        }(), o = function (e) {
            return e && e.__esModule ? e : {default: e}
        }(n(17));
        var r = function (e) {
            function t() {
                var e;
                !function (e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, t);
                for (var n = arguments.length, i = Array(n), o = 0; o < n; o++) i[o] = arguments[o];
                var r = function (e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (e = t.__proto__ || Object.getPrototypeOf(t)).call.apply(e, [this].concat(i)));
                return r.documents = {}, r.initDocumentClasses(), r.attachDocumentsClasses(), r
            }

            return function (e, t) {
                if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, elementorModules.ViewModule), i(t, [{
                key: "getDefaultSettings", value: function () {
                    return {selectors: {document: ".elementor"}}
                }
            }, {
                key: "getDefaultElements", value: function () {
                    var e = this.getSettings("selectors");
                    return {$documents: jQuery(e.document)}
                }
            }, {
                key: "initDocumentClasses", value: function () {
                    this.documentClasses = {base: o.default}, elementorFrontend.hooks.doAction("elementor/frontend/documents-manager/init-classes", this)
                }
            }, {
                key: "addDocumentClass", value: function (e, t) {
                    this.documentClasses[e] = t
                }
            }, {
                key: "attachDocumentsClasses", value: function () {
                    var e = this;
                    this.elements.$documents.each(function (t, n) {
                        return e.attachDocumentClass(jQuery(n))
                    })
                }
            }, {
                key: "attachDocumentClass", value: function (e) {
                    var t = e.data(), n = t.elementorId, i = t.elementorType,
                        o = this.documentClasses[i] || this.documentClasses.base;
                    this.documents[n] = new o({$element: e, id: n})
                }
            }]), t
        }();
        t.default = r
    }, 184: function (e, t, n) {
        "use strict";
        e.exports = function (e) {
            var t = this, i = {
                section: n(185),
                "accordion.default": n(186),
                "alert.default": n(187),
                "counter.default": n(188),
                "progress.default": n(189),
                "tabs.default": n(190),
                "toggle.default": n(191),
                "video.default": n(192),
                "image-carousel.default": n(193),
                "text-editor.default": n(194)
            }, o = {};
            this.initHandlers = function () {
                elementorFrontend.hooks.addAction("frontend/element_ready/global", n(195)), e.each(i, function (e, t) {
                    elementorFrontend.hooks.addAction("frontend/element_ready/" + e, t)
                })
            }, this.addHandler = function (e, t) {
                var n = t.$element.data("model-cid"), i = void 0;
                if (n) {
                    i = e.prototype.getConstructorID(), o[n] || (o[n] = {});
                    var r = o[n][i];
                    r && r.onDestroy()
                }
                var s = new e(t);
                n && (o[n][i] = s)
            }, this.getHandlers = function (e) {
                return e ? i[e] : i
            }, this.runReadyTrigger = function (t) {
                var n = jQuery(t), i = n.attr("data-element_type");
                i && (elementorFrontend.hooks.doAction("frontend/element_ready/global", n, e), elementorFrontend.hooks.doAction("frontend/element_ready/" + i, n, e), "widget" === i && elementorFrontend.hooks.doAction("frontend/element_ready/" + n.attr("data-widget_type"), n, e))
            }, t.initHandlers()
        }
    }, 185: function (e, t, n) {
        "use strict";
        var i = elementorModules.frontend.handlers.Base.extend({
            player: null, isYTVideo: null, getDefaultSettings: function () {
                return {
                    selectors: {
                        backgroundVideoContainer: ".elementor-background-video-container",
                        backgroundVideoEmbed: ".elementor-background-video-embed",
                        backgroundVideoHosted: ".elementor-background-video-hosted"
                    }
                }
            }, getDefaultElements: function () {
                var e = this.getSettings("selectors"),
                    t = {$backgroundVideoContainer: this.$element.find(e.backgroundVideoContainer)};
                return t.$backgroundVideoEmbed = t.$backgroundVideoContainer.children(e.backgroundVideoEmbed), t.$backgroundVideoHosted = t.$backgroundVideoContainer.children(e.backgroundVideoHosted), t
            }, calcVideosSize: function () {
                var e = this.elements.$backgroundVideoContainer.outerWidth(),
                    t = this.elements.$backgroundVideoContainer.outerHeight(), n = "16:9".split(":"), i = n[0] / n[1],
                    o = e / t > i;
                return {width: o ? e : t * i, height: o ? e / i : t}
            }, changeVideoSize: function () {
                var e = this.isYTVideo ? jQuery(this.player.getIframe()) : this.elements.$backgroundVideoHosted,
                    t = this.calcVideosSize();
                e.width(t.width).height(t.height)
            }, startVideoLoop: function () {
                var e = this;
                if (e.player.getIframe().contentWindow) {
                    var t = e.getElementSettings(), n = t.background_video_start || 0, i = t.background_video_end;
                    if (e.player.seekTo(n), i) setTimeout(function () {
                        e.startVideoLoop()
                    }, 1e3 * (i - n + 1))
                }
            }, prepareYTVideo: function (e, t) {
                var n = this, i = n.elements.$backgroundVideoContainer, o = n.getElementSettings(),
                    r = e.PlayerState.PLAYING;
                window.chrome && (r = e.PlayerState.UNSTARTED), i.addClass("elementor-loading elementor-invisible"), n.player = new e.Player(n.elements.$backgroundVideoEmbed[0], {
                    videoId: t,
                    events: {
                        onReady: function () {
                            n.player.mute(), n.changeVideoSize(), n.startVideoLoop(), n.player.playVideo()
                        }, onStateChange: function (t) {
                            switch (t.data) {
                                case r:
                                    i.removeClass("elementor-invisible elementor-loading");
                                    break;
                                case e.PlayerState.ENDED:
                                    n.player.seekTo(o.background_video_start || 0)
                            }
                        }
                    },
                    playerVars: {controls: 0, rel: 0}
                })
            }, activate: function () {
                var e = this, t = e.getElementSettings("background_video_link"),
                    n = elementorFrontend.utils.youtube.getYoutubeIDFromURL(t);
                e.isYTVideo = !!n, n ? elementorFrontend.utils.youtube.onYoutubeApiReady(function (t) {
                    setTimeout(function () {
                        e.prepareYTVideo(t, n)
                    }, 1)
                }) : e.elements.$backgroundVideoHosted.attr("src", t).one("canplay", e.changeVideoSize), elementorFrontend.elements.$window.on("resize", e.changeVideoSize)
            }, deactivate: function () {
                this.isYTVideo && this.player.getIframe() ? this.player.destroy() : this.elements.$backgroundVideoHosted.removeAttr("src"), elementorFrontend.elements.$window.off("resize", this.changeVideoSize)
            }, run: function () {
                var e = this.getElementSettings();
                "video" === e.background_background && e.background_video_link ? this.activate() : this.deactivate()
            }, onInit: function () {
                elementorModules.frontend.handlers.Base.prototype.onInit.apply(this, arguments), this.run()
            }, onElementChange: function (e) {
                "background_background" === e && this.run()
            }
        }), o = elementorModules.frontend.handlers.Base.extend({
            stretchElement: null, bindEvents: function () {
                var e = this.getUniqueHandlerID();
                elementorFrontend.addListenerOnce(e, "resize", this.stretch), elementorFrontend.addListenerOnce(e, "sticky:stick", this.stretch, this.$element), elementorFrontend.addListenerOnce(e, "sticky:unstick", this.stretch, this.$element)
            }, unbindEvents: function () {
                elementorFrontend.removeListeners(this.getUniqueHandlerID(), "resize", this.stretch)
            }, initStretch: function () {
                this.stretchElement = new elementorModules.frontend.tools.StretchElement({
                    element: this.$element,
                    selectors: {container: this.getStretchContainer()}
                })
            }, getStretchContainer: function () {
                return elementorFrontend.getGeneralSettings("elementor_stretched_section_container") || window
            }, stretch: function () {
                this.getElementSettings("stretch_section") && this.stretchElement.stretch()
            }, onInit: function () {
                elementorModules.frontend.handlers.Base.prototype.onInit.apply(this, arguments), this.initStretch(), this.stretch()
            }, onElementChange: function (e) {
                "stretch_section" === e && (this.getElementSettings("stretch_section") ? this.stretch() : this.stretchElement.reset())
            }, onGeneralSettingsChange: function (e) {
                "elementor_stretched_section_container" in e && (this.stretchElement.setSettings("selectors.container", this.getStretchContainer()), this.stretch())
            }
        }), r = elementorModules.frontend.handlers.Base.extend({
            getDefaultSettings: function () {
                return {
                    selectors: {container: "> .elementor-shape-%s"},
                    svgURL: elementorFrontend.config.urls.assets + "shapes/"
                }
            }, getDefaultElements: function () {
                var e = {}, t = this.getSettings("selectors");
                return e.$topContainer = this.$element.find(t.container.replace("%s", "top")), e.$bottomContainer = this.$element.find(t.container.replace("%s", "bottom")), e
            }, getSvgURL: function (e, t) {
                var n = this.getSettings("svgURL") + t + ".svg";
                return elementor.config.additional_shapes && e in elementor.config.additional_shapes && (n = elementor.config.additional_shapes[e]), n
            }, buildSVG: function (e) {
                var t = "shape_divider_" + e, n = this.getElementSettings(t), i = this.elements["$" + e + "Container"];
                if (i.attr("data-shape", n), n) {
                    var o = n;
                    this.getElementSettings(t + "_negative") && (o += "-negative");
                    var r = this.getSvgURL(n, o);
                    jQuery.get(r, function (e) {
                        i.empty().append(e.childNodes[0])
                    }), this.setNegative(e)
                } else i.empty()
            }, setNegative: function (e) {
                this.elements["$" + e + "Container"].attr("data-negative", !!this.getElementSettings("shape_divider_" + e + "_negative"))
            }, onInit: function () {
                var e = this;
                elementorModules.frontend.handlers.Base.prototype.onInit.apply(e, arguments), ["top", "bottom"].forEach(function (t) {
                    e.getElementSettings("shape_divider_" + t) && e.buildSVG(t)
                })
            }, onElementChange: function (e) {
                var t = e.match(/^shape_divider_(top|bottom)$/);
                if (t) this.buildSVG(t[1]); else {
                    var n = e.match(/^shape_divider_(top|bottom)_negative$/);
                    n && (this.buildSVG(n[1]), this.setNegative(n[1]))
                }
            }
        }), s = elementorModules.frontend.handlers.Base.extend({
            isFirstSection: function () {
                return this.$element.is(".elementor-edit-mode .elementor-top-section:first")
            }, isOverflowHidden: function () {
                return "hidden" === this.$element.css("overflow")
            }, getOffset: function () {
                if ("body" === elementor.config.document.container) return this.$element.offset().top;
                var e = jQuery(elementor.config.document.container);
                return this.$element.offset().top - e.offset().top
            }, setHandlesPosition: function () {
                var e = this.isOverflowHidden();
                if (e || this.isFirstSection()) {
                    var t = e ? 0 : this.getOffset(),
                        n = this.$element.find("> .elementor-element-overlay > .elementor-editor-section-settings");
                    t < 25 ? (this.$element.addClass("elementor-section--handles-inside"), t < -5 ? n.css("top", -t) : n.css("top", "")) : this.$element.removeClass("elementor-section--handles-inside")
                }
            }, onInit: function () {
                this.setHandlesPosition(), this.$element.on("mouseenter", this.setHandlesPosition)
            }
        });
        e.exports = function (e) {
            (elementorFrontend.isEditMode() || e.hasClass("elementor-section-stretched")) && elementorFrontend.elementsHandler.addHandler(o, {$element: e}), elementorFrontend.isEditMode() && (elementorFrontend.elementsHandler.addHandler(r, {$element: e}), elementorFrontend.elementsHandler.addHandler(s, {$element: e})), elementorFrontend.elementsHandler.addHandler(i, {$element: e})
        }
    }, 186: function (e, t, n) {
        "use strict";
        var i = n(18);
        e.exports = function (e) {
            elementorFrontend.elementsHandler.addHandler(i, {$element: e, showTabFn: "slideDown", hideTabFn: "slideUp"})
        }
    }, 187: function (e, t, n) {
        "use strict";
        e.exports = function (e, t) {
            e.find(".elementor-alert-dismiss").on("click", function () {
                t(this).parent().fadeOut()
            })
        }
    }, 188: function (e, t, n) {
        "use strict";
        e.exports = function (e, t) {
            elementorFrontend.waypoint(e.find(".elementor-counter-number"), function () {
                var e = t(this), n = e.data(), i = n.toValue.toString().match(/\.(.*)/);
                i && (n.rounding = i[1].length), e.numerator(n)
            })
        }
    }, 189: function (e, t, n) {
        "use strict";
        e.exports = function (e, t) {
            elementorFrontend.waypoint(e.find(".elementor-progress-bar"), function () {
                var e = t(this);
                e.css("width", e.data("max") + "%")
            })
        }
    }, 190: function (e, t, n) {
        "use strict";
        var i = n(18);
        e.exports = function (e) {
            elementorFrontend.elementsHandler.addHandler(i, {$element: e, toggleSelf: !1})
        }
    }, 191: function (e, t, n) {
        "use strict";
        var i = n(18);
        e.exports = function (e) {
            elementorFrontend.elementsHandler.addHandler(i, {
                $element: e,
                showTabFn: "slideDown",
                hideTabFn: "slideUp",
                hidePrevious: !1,
                autoExpand: "editor"
            })
        }
    }, 192: function (e, t, n) {
        "use strict";
        var i = elementorModules.frontend.handlers.Base.extend({
            getDefaultSettings: function () {
                return {
                    selectors: {
                        imageOverlay: ".elementor-custom-embed-image-overlay",
                        video: ".elementor-video",
                        videoIframe: ".elementor-video-iframe"
                    }
                }
            }, getDefaultElements: function () {
                var e = this.getSettings("selectors");
                return {
                    $imageOverlay: this.$element.find(e.imageOverlay),
                    $video: this.$element.find(e.video),
                    $videoIframe: this.$element.find(e.videoIframe)
                }
            }, getLightBox: function () {
                return elementorFrontend.utils.lightbox
            }, handleVideo: function () {
                this.getElementSettings("lightbox") || (this.elements.$imageOverlay.remove(), this.playVideo())
            }, playVideo: function () {
                if (this.elements.$video.length) this.elements.$video[0].play(); else {
                    var e = this.elements.$videoIframe, t = e.data("lazy-load");
                    t && e.attr("src", t);
                    var n = e[0].src.replace("&autoplay=0", "");
                    e[0].src = n + "&autoplay=1"
                }
            }, animateVideo: function () {
                this.getLightBox().setEntranceAnimation(this.getCurrentDeviceSetting("lightbox_content_animation"))
            }, handleAspectRatio: function () {
                this.getLightBox().setVideoAspectRatio(this.getElementSettings("aspect_ratio"))
            }, bindEvents: function () {
                this.elements.$imageOverlay.on("click", this.handleVideo)
            }, onElementChange: function (e) {
                if (0 !== e.indexOf("lightbox_content_animation")) {
                    var t = this.getElementSettings("lightbox");
                    "lightbox" !== e || t ? "aspect_ratio" === e && t && this.handleAspectRatio() : this.getLightBox().getModal().hide()
                } else this.animateVideo()
            }
        });
        e.exports = function (e) {
            elementorFrontend.elementsHandler.addHandler(i, {$element: e})
        }
    }, 193: function (e, t, n) {
        "use strict";
        var i = elementorModules.frontend.handlers.Base.extend({
            getDefaultSettings: function () {
                return {selectors: {carousel: ".elementor-image-carousel"}}
            }, getDefaultElements: function () {
                var e = this.getSettings("selectors");
                return {$carousel: this.$element.find(e.carousel)}
            }, onInit: function () {
                elementorModules.frontend.handlers.Base.prototype.onInit.apply(this, arguments);
                var e = this.getElementSettings(), t = +e.slides_to_show || 3, n = 1 === t, i = n ? 1 : 2,
                    o = elementorFrontend.config.breakpoints, r = {
                        slidesToShow: t,
                        autoplay: "yes" === e.autoplay,
                        autoplaySpeed: e.autoplay_speed,
                        infinite: "yes" === e.infinite,
                        pauseOnHover: "yes" === e.pause_on_hover,
                        speed: e.speed,
                        arrows: -1 !== ["arrows", "both"].indexOf(e.navigation),
                        dots: -1 !== ["dots", "both"].indexOf(e.navigation),
                        rtl: "rtl" === e.direction,
                        responsive: [{
                            breakpoint: o.lg,
                            settings: {
                                slidesToShow: +e.slides_to_show_tablet || i,
                                slidesToScroll: +e.slides_to_scroll_tablet || i
                            }
                        }, {
                            breakpoint: o.md,
                            settings: {
                                slidesToShow: +e.slides_to_show_mobile || 1,
                                slidesToScroll: +e.slides_to_scroll_mobile || 1
                            }
                        }]
                    };
                n ? r.fade = "fade" === e.effect : r.slidesToScroll = +e.slides_to_scroll || i, this.elements.$carousel.slick(r)
            }
        });
        e.exports = function (e) {
            elementorFrontend.elementsHandler.addHandler(i, {$element: e})
        }
    }, 194: function (e, t, n) {
        "use strict";
        var i = elementorModules.frontend.handlers.Base.extend({
            dropCapLetter: "", getDefaultSettings: function () {
                return {
                    selectors: {paragraph: "p:first"},
                    classes: {dropCap: "elementor-drop-cap", dropCapLetter: "elementor-drop-cap-letter"}
                }
            }, getDefaultElements: function () {
                var e = this.getSettings("selectors"), t = this.getSettings("classes"),
                    n = jQuery("<span>", {class: t.dropCap}), i = jQuery("<span>", {class: t.dropCapLetter});
                return n.append(i), {$paragraph: this.$element.find(e.paragraph), $dropCap: n, $dropCapLetter: i}
            }, wrapDropCap: function () {
                if (this.getElementSettings("drop_cap")) {
                    var e = this.elements.$paragraph;
                    if (e.length) {
                        var t = e.html().replace(/&nbsp;/g, " "), n = t.match(/^ *([^ ] ?)/);
                        if (n) {
                            var i = n[1], o = i.trim();
                            if ("<" !== o) {
                                this.dropCapLetter = i, this.elements.$dropCapLetter.text(o);
                                var r = t.slice(i.length).replace(/^ */, function (e) {
                                    return new Array(e.length + 1).join("&nbsp;")
                                });
                                e.html(r).prepend(this.elements.$dropCap)
                            }
                        }
                    }
                } else this.dropCapLetter && (this.elements.$dropCap.remove(), this.elements.$paragraph.prepend(this.dropCapLetter), this.dropCapLetter = "")
            }, onInit: function () {
                elementorModules.frontend.handlers.Base.prototype.onInit.apply(this, arguments), this.wrapDropCap()
            }, onElementChange: function (e) {
                "drop_cap" === e && this.wrapDropCap()
            }
        });
        e.exports = function (e) {
            elementorFrontend.elementsHandler.addHandler(i, {$element: e})
        }
    }, 195: function (e, t, n) {
        "use strict";
        var i = elementorModules.frontend.handlers.Base.extend({
            getWidgetType: function () {
                return "global"
            }, animate: function () {
                var e = this.$element, t = this.getAnimation();
                if ("none" !== t) {
                    var n = this.getElementSettings(), i = n._animation_delay || n.animation_delay || 0;
                    e.removeClass(t), this.currentAnimation && e.removeClass(this.currentAnimation), this.currentAnimation = t, setTimeout(function () {
                        e.removeClass("elementor-invisible").addClass("animated " + t)
                    }, i)
                } else e.removeClass("elementor-invisible")
            }, getAnimation: function () {
                return this.getCurrentDeviceSetting("animation") || this.getCurrentDeviceSetting("_animation")
            }, onInit: function () {
                elementorModules.frontend.handlers.Base.prototype.onInit.apply(this, arguments), this.getAnimation() && elementorFrontend.waypoint(this.$element, this.animate.bind(this))
            }, onElementChange: function (e) {
                /^_?animation/.test(e) && this.animate()
            }
        });
        e.exports = function (e) {
            elementorFrontend.elementsHandler.addHandler(i, {$element: e})
        }
    }, 196: function (e, t, n) {
        "use strict";
        e.exports = elementorModules.ViewModule.extend({
            getDefaultSettings: function () {
                return {
                    isInserted: !1,
                    APISrc: "https://www.youtube.com/iframe_api",
                    selectors: {firstScript: "script:first"}
                }
            }, getDefaultElements: function () {
                return {$firstScript: jQuery(this.getSettings("selectors.firstScript"))}
            }, insertYTAPI: function () {
                this.setSettings("isInserted", !0), this.elements.$firstScript.before(jQuery("<script>", {src: this.getSettings("APISrc")}))
            }, onYoutubeApiReady: function (e) {
                var t = this;
                t.getSettings("IsInserted") || t.insertYTAPI(), window.YT && YT.loaded ? e(YT) : setTimeout(function () {
                    t.onYoutubeApiReady(e)
                }, 350)
            }, getYoutubeIDFromURL: function (e) {
                var t = e.match(/^(?:https?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?vi?=|(?:embed|v|vi|user)\/))([^?&"'>]+)/);
                return t && t[1]
            }
        })
    }, 197: function (e, t, n) {
        "use strict";
        e.exports = elementorModules.ViewModule.extend({
            getDefaultSettings: function () {
                return {
                    scrollDuration: 500,
                    selectors: {
                        links: 'a[href*="#"]',
                        targets: ".elementor-element, .elementor-menu-anchor",
                        scrollable: "html, body"
                    }
                }
            }, getDefaultElements: function () {
                return {$scrollable: jQuery(this.getSettings("selectors").scrollable)}
            }, bindEvents: function () {
                elementorFrontend.elements.$document.on("click", this.getSettings("selectors.links"), this.handleAnchorLinks)
            }, handleAnchorLinks: function (e) {
                var t, n = e.currentTarget, i = location.pathname === n.pathname;
                if (location.hostname === n.hostname && i && !(n.hash.length < 2)) {
                    try {
                        t = jQuery(n.hash).filter(this.getSettings("selectors.targets"))
                    } catch (e) {
                        return
                    }
                    if (t.length) {
                        var o = t.offset().top, r = elementorFrontend.elements.$wpAdminBar,
                            s = jQuery(".elementor-section.elementor-sticky--active");
                        r.length > 0 && (o -= r.height()), s.length > 0 && (o -= Math.max.apply(null, s.map(function () {
                            return jQuery(this).outerHeight()
                        }).get())), e.preventDefault(), o = elementorFrontend.hooks.applyFilters("frontend/handlers/menu_anchor/scroll_top_distance", o), this.elements.$scrollable.animate({scrollTop: o}, this.getSettings("scrollDuration"), "linear")
                    }
                }
            }, onInit: function () {
                elementorModules.ViewModule.prototype.onInit.apply(this, arguments), this.bindEvents()
            }
        })
    }, 198: function (e, t, n) {
        "use strict";
        e.exports = elementorModules.ViewModule.extend({
            oldAspectRatio: null, oldAnimation: null, swiper: null, getDefaultSettings: function () {
                return {
                    classes: {
                        aspectRatio: "elementor-aspect-ratio-%s",
                        item: "elementor-lightbox-item",
                        image: "elementor-lightbox-image",
                        videoContainer: "elementor-video-container",
                        videoWrapper: "elementor-fit-aspect-ratio",
                        playButton: "elementor-custom-embed-play",
                        playButtonIcon: "fa",
                        playing: "elementor-playing",
                        hidden: "elementor-hidden",
                        invisible: "elementor-invisible",
                        preventClose: "elementor-lightbox-prevent-close",
                        slideshow: {
                            container: "swiper-container",
                            slidesWrapper: "swiper-wrapper",
                            prevButton: "elementor-swiper-button elementor-swiper-button-prev",
                            nextButton: "elementor-swiper-button elementor-swiper-button-next",
                            prevButtonIcon: "eicon-chevron-left",
                            nextButtonIcon: "eicon-chevron-right",
                            slide: "swiper-slide"
                        }
                    },
                    selectors: {
                        links: "a, [data-elementor-lightbox]",
                        slideshow: {
                            activeSlide: ".swiper-slide-active",
                            prevSlide: ".swiper-slide-prev",
                            nextSlide: ".swiper-slide-next"
                        }
                    },
                    modalOptions: {
                        id: "elementor-lightbox",
                        entranceAnimation: "zoomIn",
                        videoAspectRatio: 169,
                        position: {enable: !1}
                    }
                }
            }, getModal: function () {
                return e.exports.modal || this.initModal(), e.exports.modal
            }, initModal: function () {
                var t = e.exports.modal = elementorFrontend.getDialogsManager().createWidget("lightbox", {
                    className: "elementor-lightbox",
                    closeButton: !0,
                    closeButtonClass: "eicon-close",
                    selectors: {preventClose: "." + this.getSettings("classes.preventClose")},
                    hide: {onClick: !0}
                });
                t.on("hide", function () {
                    t.setMessage("")
                })
            }, showModal: function (e) {
                var t = this, n = t.getDefaultSettings().modalOptions;
                t.setSettings("modalOptions", jQuery.extend(n, e.modalOptions));
                var i = t.getModal();
                switch (i.setID(t.getSettings("modalOptions.id")), i.onShow = function () {
                    DialogsManager.getWidgetType("lightbox").prototype.onShow.apply(i, arguments), t.setEntranceAnimation()
                }, i.onHide = function () {
                    DialogsManager.getWidgetType("lightbox").prototype.onHide.apply(i, arguments), i.getElements("message").removeClass("animated")
                }, e.type) {
                    case"image":
                        t.setImageContent(e.url);
                        break;
                    case"video":
                        t.setVideoContent(e);
                        break;
                    case"slideshow":
                        t.setSlideshowContent(e.slideshow);
                        break;
                    default:
                        t.setHTMLContent(e.html)
                }
                i.show()
            }, setHTMLContent: function (e) {
                this.getModal().setMessage(e)
            }, setImageContent: function (e) {
                var t = this.getSettings("classes"), n = jQuery("<div>", {class: t.item}),
                    i = jQuery("<img>", {src: e, class: t.image + " " + t.preventClose});
                n.append(i), this.getModal().setMessage(n)
            }, setVideoContent: function (e) {
                var t, n = this.getSettings("classes"), i = jQuery("<div>", {class: n.videoContainer}),
                    o = jQuery("<div>", {class: n.videoWrapper}), r = this.getModal();
                if ("hosted" === e.videoType) {
                    var s = jQuery.extend({src: e.url, autoplay: ""}, e.videoParams);
                    t = jQuery("<video>", s)
                } else {
                    var a = e.url.replace("&autoplay=0", "") + "&autoplay=1";
                    t = jQuery("<iframe>", {src: a, allowfullscreen: 1})
                }
                i.append(o), o.append(t), r.setMessage(i), this.setVideoAspectRatio();
                var l = r.onHide;
                r.onHide = function () {
                    l(), r.getElements("message").removeClass("elementor-fit-aspect-ratio")
                }
            }, setSlideshowContent: function (e) {
                var t = jQuery, n = this, i = n.getSettings("classes"), o = i.slideshow,
                    r = t("<div>", {class: o.container}), s = t("<div>", {class: o.slidesWrapper}),
                    a = t("<div>", {class: o.prevButton + " " + i.preventClose}).html(t("<i>", {class: o.prevButtonIcon})),
                    l = t("<div>", {class: o.nextButton + " " + i.preventClose}).html(t("<i>", {class: o.nextButtonIcon}));
                e.slides.forEach(function (e) {
                    var n = o.slide + " " + i.item;
                    e.video && (n += " " + i.video);
                    var r = t("<div>", {class: n});
                    if (e.video) {
                        r.attr("data-elementor-slideshow-video", e.video);
                        var a = t("<div>", {class: i.playButton}).html(t("<i>", {class: i.playButtonIcon}));
                        r.append(a)
                    } else {
                        var l = t("<div>", {class: "swiper-zoom-container"}),
                            d = t("<img>", {class: i.image + " " + i.preventClose, src: e.image});
                        l.append(d), r.append(l)
                    }
                    s.append(r)
                }), r.append(s, a, l);
                var d = n.getModal();
                d.setMessage(r);
                var c = d.onShow;
                d.onShow = function () {
                    c();
                    var i = {
                        navigation: {prevEl: a, nextEl: l},
                        pagination: {clickable: !0},
                        on: {slideChangeTransitionEnd: n.onSlideChange},
                        grabCursor: !0,
                        runCallbacksOnInit: !1,
                        loop: !0,
                        keyboard: !0
                    };
                    e.swiper && t.extend(i, e.swiper), n.swiper = new Swiper(r, i), n.setVideoAspectRatio(), n.playSlideVideo()
                }
            }, setVideoAspectRatio: function (e) {
                e = e || this.getSettings("modalOptions.videoAspectRatio");
                var t = this.getModal().getElements("widgetContent"), n = this.oldAspectRatio,
                    i = this.getSettings("classes.aspectRatio");
                this.oldAspectRatio = e, n && t.removeClass(i.replace("%s", n)), e && t.addClass(i.replace("%s", e))
            }, getSlide: function (e) {
                return jQuery(this.swiper.slides).filter(this.getSettings("selectors.slideshow." + e + "Slide"))
            }, playSlideVideo: function () {
                var e = this.getSlide("active"), t = e.data("elementor-slideshow-video");
                if (t) {
                    var n = this.getSettings("classes"),
                        i = jQuery("<div>", {class: n.videoContainer + " " + n.invisible}),
                        o = jQuery("<div>", {class: n.videoWrapper}), r = jQuery("<iframe>", {src: t}),
                        s = e.children("." + n.playButton);
                    i.append(o), o.append(r), e.append(i), s.addClass(n.playing).removeClass(n.hidden), r.on("load", function () {
                        s.addClass(n.hidden), i.removeClass(n.invisible)
                    })
                }
            }, setEntranceAnimation: function (e) {
                e = e || elementorFrontend.getCurrentDeviceSetting(this.getSettings("modalOptions"), "entranceAnimation");
                var t = this.getModal().getElements("message");
                this.oldAnimation && t.removeClass(this.oldAnimation), this.oldAnimation = e, e && t.addClass("animated " + e)
            }, isLightboxLink: function (e) {
                if ("A" === e.tagName && (e.hasAttribute("download") || !/\.(png|jpe?g|gif|svg)(\?.*)?$/i.test(e.href))) return !1;
                var t = elementorFrontend.getGeneralSettings("elementor_global_image_lightbox"),
                    n = e.dataset.elementorOpenLightbox;
                return "yes" === n || t && "no" !== n
            }, openLink: function (e) {
                var t = e.currentTarget, n = jQuery(e.target), i = elementorFrontend.isEditMode(),
                    o = !!n.closest("#elementor").length;
                if (this.isLightboxLink(t)) {
                    if (e.preventDefault(), !i || elementorFrontend.getGeneralSettings("elementor_enable_lightbox_in_editor")) {
                        var r = {};
                        if (t.dataset.elementorLightbox && (r = JSON.parse(t.dataset.elementorLightbox)), r.type && "slideshow" !== r.type) this.showModal(r); else if (t.dataset.elementorLightboxSlideshow) {
                            var s = t.dataset.elementorLightboxSlideshow,
                                a = jQuery(this.getSettings("selectors.links")).filter(function () {
                                    return s === this.dataset.elementorLightboxSlideshow
                                }), l = [], d = {};
                            a.each(function () {
                                var e = this.dataset.elementorLightboxVideo, t = e || this.href;
                                if (!d[t]) {
                                    d[t] = !0;
                                    var n = this.dataset.elementorLightboxIndex;
                                    void 0 === n && (n = a.index(this));
                                    var i = {image: this.href, index: n};
                                    e && (i.video = e), l.push(i)
                                }
                            }), l.sort(function (e, t) {
                                return e.index - t.index
                            });
                            var c = t.dataset.elementorLightboxIndex;
                            void 0 === c && (c = a.index(t)), this.showModal({
                                type: "slideshow",
                                modalOptions: {id: "elementor-lightbox-slideshow-" + s},
                                slideshow: {slides: l, swiper: {initialSlide: +c}}
                            })
                        } else this.showModal({type: "image", url: t.href})
                    }
                } else i && o && e.preventDefault()
            }, bindEvents: function () {
                elementorFrontend.elements.$document.on("click", this.getSettings("selectors.links"), this.openLink)
            }, onSlideChange: function () {
                this.getSlide("prev").add(this.getSlide("next")).add(this.getSlide("active")).find("." + this.getSettings("classes.videoWrapper")).remove(), this.playSlideVideo()
            }
        })
    }
});