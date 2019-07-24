var $jscomp$this = this;
(function (u, r) {
    "function" === typeof define && define.amd ? define([], r) : "object" === typeof module && module.exports ? module.exports = r() : u.anime = r()
})(this, function () {
    function u(a) {
        if (!g.col(a)) try {
            return document.querySelectorAll(a)
        } catch (b) {
        }
    }

    function r(a) {
        return a.reduce(function (a, c) {
            return a.concat(g.arr(c) ? r(c) : c)
        }, [])
    }

    function v(a) {
        if (g.arr(a)) return a;
        g.str(a) && (a = u(a) || a);
        return a instanceof NodeList || a instanceof HTMLCollection ? [].slice.call(a) : [a]
    }

    function E(a, b) {
        return a.some(function (a) {
            return a === b
        })
    }

    function z(a) {
        var b = {}, c;
        for (c in a) b[c] = a[c];
        return b
    }

    function F(a, b) {
        var c = z(a), d;
        for (d in a) c[d] = b.hasOwnProperty(d) ? b[d] : a[d];
        return c
    }

    function A(a, b) {
        var c = z(a), d;
        for (d in b) c[d] = g.und(a[d]) ? b[d] : a[d];
        return c
    }

    function R(a) {
        a = a.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i, function (a, b, c, h) {
            return b + b + c + c + h + h
        });
        var b = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(a);
        a = parseInt(b[1], 16);
        var c = parseInt(b[2], 16), b = parseInt(b[3], 16);
        return "rgb(" + a + "," + c + "," + b + ")"
    }

    function S(a) {
        function b(a, b, c) {
            0 > c && (c += 1);
            1 < c && --c;
            return c < 1 / 6 ? a + 6 * (b - a) * c : .5 > c ? b : c < 2 / 3 ? a + (b - a) * (2 / 3 - c) * 6 : a
        }

        var c = /hsl\((\d+),\s*([\d.]+)%,\s*([\d.]+)%\)/g.exec(a);
        a = parseInt(c[1]) / 360;
        var d = parseInt(c[2]) / 100, c = parseInt(c[3]) / 100;
        if (0 == d) d = c = a = c; else {
            var e = .5 > c ? c * (1 + d) : c + d - c * d, k = 2 * c - e, d = b(k, e, a + 1 / 3), c = b(k, e, a);
            a = b(k, e, a - 1 / 3)
        }
        return "rgb(" + 255 * d + "," + 255 * c + "," + 255 * a + ")"
    }

    function w(a) {
        if (a = /([\+\-]?[0-9#\.]+)(%|px|pt|em|rem|in|cm|mm|ex|pc|vw|vh|deg|rad|turn)?/.exec(a)) return a[2]
    }

    function T(a) {
        if (-1 < a.indexOf("translate")) return "px";
        if (-1 < a.indexOf("rotate") || -1 < a.indexOf("skew")) return "deg"
    }

    function G(a, b) {
        return g.fnc(a) ? a(b.target, b.id, b.total) : a
    }

    function B(a, b) {
        if (b in a.style) return getComputedStyle(a).getPropertyValue(b.replace(/([a-z])([A-Z])/g, "$1-$2").toLowerCase()) || "0"
    }

    function H(a, b) {
        if (g.dom(a) && E(U, b)) return "transform";
        if (g.dom(a) && (a.getAttribute(b) || g.svg(a) && a[b])) return "attribute";
        if (g.dom(a) && "transform" !== b && B(a, b)) return "css";
        if (null != a[b]) return "object"
    }

    function V(a, b) {
        var c = T(b), c = -1 < b.indexOf("scale") ? 1 : 0 + c;
        a = a.style.transform;
        if (!a) return c;
        for (var d = [], e = [], k = [], h = /(\w+)\((.+?)\)/g; d = h.exec(a);) e.push(d[1]), k.push(d[2]);
        a = k.filter(function (a, c) {
            return e[c] === b
        });
        return a.length ? a[0] : c
    }

    function I(a, b) {
        switch (H(a, b)) {
            case "transform":
                return V(a, b);
            case "css":
                return B(a, b);
            case "attribute":
                return a.getAttribute(b)
        }
        return a[b] || 0
    }

    function J(a, b) {
        var c = /^(\*=|\+=|-=)/.exec(a);
        if (!c) return a;
        b = parseFloat(b);
        a = parseFloat(a.replace(c[0], ""));
        switch (c[0][0]) {
            case "+":
                return b + a;
            case "-":
                return b - a;
            case "*":
                return b * a
        }
    }

    function C(a) {
        return g.obj(a) && a.hasOwnProperty("totalLength")
    }

    function W(a, b) {
        function c(c) {
            c = void 0 === c ? 0 : c;
            return a.el.getPointAtLength(1 <= b + c ? b + c : 0)
        }

        var d = c(), e = c(-1), k = c(1);
        switch (a.property) {
            case "x":
                return d.x;
            case "y":
                return d.y;
            case "angle":
                return 180 * Math.atan2(k.y - e.y, k.x - e.x) / Math.PI
        }
    }

    function K(a, b) {
        var c = /-?\d*\.?\d+/g;
        a = C(a) ? a.totalLength : a;
        if (g.col(a)) b = g.rgb(a) ? a : g.hex(a) ? R(a) : g.hsl(a) ? S(a) : void 0; else {
            var d = w(a);
            a = d ? a.substr(0, a.length - d.length) : a;
            b = b ? a + b : a
        }
        b += "";
        return {original: b, numbers: b.match(c) ? b.match(c).map(Number) : [0], strings: b.split(c)}
    }

    function X(a, b) {
        return b.reduce(function (b, d, e) {
            return b + a[e - 1] + d
        })
    }

    function L(a) {
        return (a ? r(g.arr(a) ? a.map(v) : v(a)) : []).filter(function (a, c, d) {
            return d.indexOf(a) === c
        })
    }

    function Y(a) {
        var b = L(a);
        return b.map(function (a, d) {
            return {target: a, id: d, total: b.length}
        })
    }

    function Z(a, b) {
        var c = z(b);
        if (g.arr(a)) {
            var d = a.length;
            2 !== d || g.obj(a[0]) ? g.fnc(b.duration) || (c.duration = b.duration / d) : a = {value: a}
        }
        return v(a).map(function (a, c) {
            c = c ? 0 : b.delay;
            a = g.obj(a) && !C(a) ? a : {value: a};
            g.und(a.delay) && (a.delay = c);
            return a
        }).map(function (a) {
            return A(a, c)
        })
    }

    function aa(a, b) {
        var c = {}, d;
        for (d in a) {
            var e = G(a[d], b);
            g.arr(e) && (e = e.map(function (a) {
                return G(a, b)
            }), 1 === e.length && (e = e[0]));
            c[d] = e
        }
        c.duration = parseFloat(c.duration);
        c.delay = parseFloat(c.delay);
        return c
    }

    function ba(a) {
        return g.arr(a) ? x.apply(this, a) : M[a]
    }

    function ca(a, b) {
        var c;
        return a.tweens.map(function (d) {
            d = aa(d, b);
            var e = d.value, k = I(b.target, a.name), h = c ? c.to.original : k, h = g.arr(e) ? e[0] : h,
                n = J(g.arr(e) ? e[1] : e, h), k = w(n) || w(h) || w(k);
            d.isPath = C(e);
            d.from = K(h, k);
            d.to = K(n, k);
            d.start = c ? c.end : a.offset;
            d.end = d.start + d.delay + d.duration;
            d.easing = ba(d.easing);
            d.elasticity = (1E3 - Math.min(Math.max(d.elasticity, 1), 999)) / 1E3;
            g.col(d.from.original) && (d.round = 1);
            return c = d
        })
    }

    function da(a, b) {
        return r(a.map(function (a) {
            return b.map(function (b) {
                var c = H(a.target, b.name);
                if (c) {
                    var d = ca(b, a);
                    b = {
                        type: c,
                        property: b.name,
                        animatable: a,
                        tweens: d,
                        duration: d[d.length - 1].end,
                        delay: d[0].delay
                    }
                } else b = void 0;
                return b
            })
        })).filter(function (a) {
            return !g.und(a)
        })
    }

    function N(a, b, c) {
        var d = "delay" === a ? Math.min : Math.max;
        return b.length ? d.apply(Math, b.map(function (b) {
            return b[a]
        })) : c[a]
    }

    function ea(a) {
        var b = F(fa, a), c = F(ga, a), d = Y(a.targets), e = [], g = A(b, c), h;
        for (h in a) g.hasOwnProperty(h) || "targets" === h || e.push({name: h, offset: g.offset, tweens: Z(a[h], c)});
        a = da(d, e);
        return A(b, {animatables: d, animations: a, duration: N("duration", a, c), delay: N("delay", a, c)})
    }

    function m(a) {
        function b() {
            return window.Promise && new Promise(function (a) {
                return P = a
            })
        }

        function c(a) {
            return f.reversed ? f.duration - a : a
        }

        function d(a) {
            for (var b = 0, c = {}, d = f.animations, e = {}; b < d.length;) {
                var g = d[b], h = g.animatable, n = g.tweens;
                e.tween = n.filter(function (b) {
                    return a < b.end
                })[0] || n[n.length - 1];
                e.isPath$0 = e.tween.isPath;
                e.round = e.tween.round;
                e.eased = e.tween.easing(Math.min(Math.max(a - e.tween.start - e.tween.delay, 0), e.tween.duration) / e.tween.duration, e.tween.elasticity);
                n = X(e.tween.to.numbers.map(function (a) {
                    return function (b, c) {
                        c = a.isPath$0 ? 0 : a.tween.from.numbers[c];
                        b = c + a.eased * (b - c);
                        a.isPath$0 && (b = W(a.tween.value, b));
                        a.round && (b = Math.round(b * a.round) / a.round);
                        return b
                    }
                }(e)), e.tween.to.strings);
                ha[g.type](h.target, g.property, n, c, h.id);
                g.currentValue = n;
                b++;
                e = {isPath$0: e.isPath$0, tween: e.tween, eased: e.eased, round: e.round}
            }
            if (c) for (var k in c) D || (D = B(document.body, "transform") ? "transform" : "-webkit-transform"), f.animatables[k].target.style[D] = c[k].join(" ");
            f.currentTime = a;
            f.progress = a / f.duration * 100
        }

        function e(a) {
            if (f[a]) f[a](f)
        }

        function g() {
            f.remaining && !0 !== f.remaining && f.remaining--
        }

        function h(a) {
            var h = f.duration, k = f.offset, m = f.delay, O = f.currentTime, p = f.reversed, q = c(a),
                q = Math.min(Math.max(q, 0), h);
            q > k && q < h ? (d(q), !f.began && q >= m && (f.began = !0, e("begin")), e("run")) : (q <= k && 0 !== O && (d(0), p && g()), q >= h && O !== h && (d(h), p || g()));
            a >= h && (f.remaining ? (t = n, "alternate" === f.direction && (f.reversed = !f.reversed)) : (f.pause(), P(), Q = b(), f.completed || (f.completed = !0, e("complete"))), l = 0);
            if (f.children) for (a = f.children, h = 0; h < a.length; h++) a[h].seek(q);
            e("update")
        }

        a = void 0 === a ? {} : a;
        var n, t, l = 0, P = null, Q = b(), f = ea(a);
        f.reset = function () {
            var a = f.direction, b = f.loop;
            f.currentTime = 0;
            f.progress = 0;
            f.paused = !0;
            f.began = !1;
            f.completed = !1;
            f.reversed = "reverse" === a;
            f.remaining = "alternate" === a && 1 === b ? 2 : b
        };
        f.tick = function (a) {
            n = a;
            t || (t = n);
            h((l + n - t) * m.speed)
        };
        f.seek = function (a) {
            h(c(a))
        };
        f.pause = function () {
            var a = p.indexOf(f);
            -1 < a && p.splice(a, 1);
            f.paused = !0
        };
        f.play = function () {
            f.paused && (f.paused = !1, t = 0, l = f.completed ? 0 : c(f.currentTime), p.push(f), y || ia())
        };
        f.reverse = function () {
            f.reversed = !f.reversed;
            t = 0;
            l = c(f.currentTime)
        };
        f.restart = function () {
            f.pause();
            f.reset();
            f.play()
        };
        f.finished = Q;
        f.reset();
        f.autoplay && f.play();
        return f
    }

    var fa = {
            update: void 0,
            begin: void 0,
            run: void 0,
            complete: void 0,
            loop: 1,
            direction: "normal",
            autoplay: !0,
            offset: 0
        }, ga = {duration: 1E3, delay: 0, easing: "easeOutElastic", elasticity: 500, round: 0},
        U = "translateX translateY translateZ rotate rotateX rotateY rotateZ scale scaleX scaleY scaleZ skewX skewY".split(" "),
        D, g = {
            arr: function (a) {
                return Array.isArray(a)
            }, obj: function (a) {
                return -1 < Object.prototype.toString.call(a).indexOf("Object")
            }, svg: function (a) {
                return a instanceof
                    SVGElement
            }, dom: function (a) {
                return a.nodeType || g.svg(a)
            }, str: function (a) {
                return "string" === typeof a
            }, fnc: function (a) {
                return "function" === typeof a
            }, und: function (a) {
                return "undefined" === typeof a
            }, hex: function (a) {
                return /(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(a)
            }, rgb: function (a) {
                return /^rgb/.test(a)
            }, hsl: function (a) {
                return /^hsl/.test(a)
            }, col: function (a) {
                return g.hex(a) || g.rgb(a) || g.hsl(a)
            }
        }, x = function () {
            function a(a, c, d) {
                return (((1 - 3 * d + 3 * c) * a + (3 * d - 6 * c)) * a + 3 * c) * a
            }

            return function (b, c, d, e) {
                if (0 <= b && 1 >= b && 0 <= d && 1 >= d) {
                    var g = new Float32Array(11);
                    if (b !== c || d !== e) for (var h = 0; 11 > h; ++h) g[h] = a(.1 * h, b, d);
                    return function (h) {
                        if (b === c && d === e) return h;
                        if (0 === h) return 0;
                        if (1 === h) return 1;
                        for (var k = 0, l = 1; 10 !== l && g[l] <= h; ++l) k += .1;
                        --l;
                        var l = k + (h - g[l]) / (g[l + 1] - g[l]) * .1,
                            n = 3 * (1 - 3 * d + 3 * b) * l * l + 2 * (3 * d - 6 * b) * l + 3 * b;
                        if (.001 <= n) {
                            for (k = 0; 4 > k; ++k) {
                                n = 3 * (1 - 3 * d + 3 * b) * l * l + 2 * (3 * d - 6 * b) * l + 3 * b;
                                if (0 === n) break;
                                var m = a(l, b, d) - h, l = l - m / n
                            }
                            h = l
                        } else if (0 === n) h = l; else {
                            var l = k, k = k + .1, f = 0;
                            do m = l + (k - l) / 2, n = a(m, b, d) - h, 0 < n ? k = m : l = m; while (1e-7 < Math.abs(n) && 10 > ++f);
                            h = m
                        }
                        return a(h, c, e)
                    }
                }
            }
        }(), M = function () {
            function a(a, b) {
                return 0 === a || 1 === a ? a : -Math.pow(2, 10 * (a - 1)) * Math.sin(2 * (a - 1 - b / (2 * Math.PI) * Math.asin(1)) * Math.PI / b)
            }

            var b = "Quad Cubic Quart Quint Sine Expo Circ Back Elastic".split(" "), c = {
                In: [[.55, .085, .68, .53], [.55, .055, .675, .19], [.895, .03, .685, .22], [.755, .05, .855, .06], [.47, 0, .745, .715], [.95, .05, .795, .035], [.6, .04, .98, .335], [.6, -.28, .735, .045], a],
                Out: [[.25, .46, .45, .94], [.215, .61, .355, 1], [.165, .84, .44, 1], [.23, 1, .32, 1], [.39, .575, .565, 1], [.19, 1, .22, 1], [.075, .82, .165, 1], [.175, .885, .32, 1.275], function (b, c) {
                    return 1 - a(1 - b, c)
                }],
                InOut: [[.455, .03, .515, .955], [.645, .045, .355, 1], [.77, 0, .175, 1], [.86, 0, .07, 1], [.445, .05, .55, .95], [1, 0, 0, 1], [.785, .135, .15, .86], [.68, -.55, .265, 1.55], function (b, c) {
                    return .5 > b ? a(2 * b, c) / 2 : 1 - a(-2 * b + 2, c) / 2
                }]
            }, d = {linear: x(.25, .25, .75, .75)}, e = {}, k;
            for (k in c) e.type = k, c[e.type].forEach(function (a) {
                return function (c, e) {
                    d["ease" + a.type + b[e]] = g.fnc(c) ? c : x.apply($jscomp$this, c)
                }
            }(e)), e = {type: e.type};
            return d
        }(), ha = {
            css: function (a, b, c) {
                return a.style[b] = c
            }, attribute: function (a, b, c) {
                return a.setAttribute(b, c)
            }, object: function (a, b, c) {
                return a[b] = c
            }, transform: function (a, b, c, d, e) {
                d[e] || (d[e] = []);
                d[e].push(b + "(" + c + ")")
            }
        }, p = [], y = 0, ia = function () {
            function a() {
                y = requestAnimationFrame(b)
            }

            function b(b) {
                var c = p.length;
                if (c) {
                    for (var e = 0; e < c;) p[e] && p[e].tick(b), e++;
                    a()
                } else cancelAnimationFrame(y), y = 0
            }

            return a
        }();
    m.version = "2.0.1";
    m.speed = 1;
    m.running = p;
    m.remove = function (a) {
        a = L(a);
        for (var b = p.length - 1; 0 <= b; b--) for (var c = p[b], d = c.animations, e = d.length - 1; 0 <= e; e--) E(a, d[e].animatable.target) && (d.splice(e, 1), d.length || c.pause())
    };
    m.getValue = I;
    m.path = function (a, b) {
        var c = g.str(a) ? u(a)[0] : a, d = b || 100;
        return function (a) {
            return {el: c, property: a, totalLength: c.getTotalLength() * (d / 100)}
        }
    };
    m.setDashoffset = function (a) {
        var b = a.getTotalLength();
        a.setAttribute("stroke-dasharray", b);
        return b
    };
    m.bezier = x;
    m.easings = M;
    m.timeline = function (a) {
        var b = m(a);
        b.duration = 0;
        b.children = [];
        b.add = function (a) {
            v(a).forEach(function (a) {
                var c = a.offset, d = b.duration;
                a.autoplay = !1;
                a.offset = g.und(c) ? d : J(c, d);
                a = m(a);
                a.duration > d && (b.duration = a.duration);
                b.children.push(a)
            });
            return b
        };
        return b
    };
    m.random = function (a, b) {
        return Math.floor(Math.random() * (b - a + 1)) + a
    };
    return m
});/*!
* imagesLoaded PACKAGED v4.1.1
* JavaScript is all like "You images are done yet or what?"
* MIT License
*/
!function (t, e) {
    "function" == typeof define && define.amd ? define("ev-emitter/ev-emitter", e) : "object" == typeof module && module.exports ? module.exports = e() : t.EvEmitter = e()
}("undefined" != typeof window ? window : this, function () {
    function t() {
    }

    var e = t.prototype;
    return e.on = function (t, e) {
        if (t && e) {
            var i = this._events = this._events || {}, n = i[t] = i[t] || [];
            return -1 == n.indexOf(e) && n.push(e), this
        }
    }, e.once = function (t, e) {
        if (t && e) {
            this.on(t, e);
            var i = this._onceEvents = this._onceEvents || {}, n = i[t] = i[t] || {};
            return n[e] = !0, this
        }
    }, e.off = function (t, e) {
        var i = this._events && this._events[t];
        if (i && i.length) {
            var n = i.indexOf(e);
            return -1 != n && i.splice(n, 1), this
        }
    }, e.emitEvent = function (t, e) {
        var i = this._events && this._events[t];
        if (i && i.length) {
            var n = 0, o = i[n];
            e = e || [];
            for (var r = this._onceEvents && this._onceEvents[t]; o;) {
                var s = r && r[o];
                s && (this.off(t, o), delete r[o]), o.apply(this, e), n += s ? 0 : 1, o = i[n]
            }
            return this
        }
    }, t
}), function (t, e) {
    "use strict";
    "function" == typeof define && define.amd ? define(["ev-emitter/ev-emitter"], function (i) {
        return e(t, i)
    }) : "object" == typeof module && module.exports ? module.exports = e(t, require("ev-emitter")) : t.imagesLoaded = e(t, t.EvEmitter)
}(window, function (t, e) {
    function i(t, e) {
        for (var i in e) t[i] = e[i];
        return t
    }

    function n(t) {
        var e = [];
        if (Array.isArray(t)) e = t; else if ("number" == typeof t.length) for (var i = 0; i < t.length; i++) e.push(t[i]); else e.push(t);
        return e
    }

    function o(t, e, r) {
        return this instanceof o ? ("string" == typeof t && (t = document.querySelectorAll(t)), this.elements = n(t), this.options = i({}, this.options), "function" == typeof e ? r = e : i(this.options, e), r && this.on("always", r), this.getImages(), h && (this.jqDeferred = new h.Deferred), void setTimeout(function () {
            this.check()
        }.bind(this))) : new o(t, e, r)
    }

    function r(t) {
        this.img = t
    }

    function s(t, e) {
        this.url = t, this.element = e, this.img = new Image
    }

    var h = t.jQuery, a = t.console;
    o.prototype = Object.create(e.prototype), o.prototype.options = {}, o.prototype.getImages = function () {
        this.images = [], this.elements.forEach(this.addElementImages, this)
    }, o.prototype.addElementImages = function (t) {
        "IMG" == t.nodeName && this.addImage(t), this.options.background === !0 && this.addElementBackgroundImages(t);
        var e = t.nodeType;
        if (e && d[e]) {
            for (var i = t.querySelectorAll("img"), n = 0; n < i.length; n++) {
                var o = i[n];
                this.addImage(o)
            }
            if ("string" == typeof this.options.background) {
                var r = t.querySelectorAll(this.options.background);
                for (n = 0; n < r.length; n++) {
                    var s = r[n];
                    this.addElementBackgroundImages(s)
                }
            }
        }
    };
    var d = {1: !0, 9: !0, 11: !0};
    return o.prototype.addElementBackgroundImages = function (t) {
        var e = getComputedStyle(t);
        if (e) for (var i = /url\((['"])?(.*?)\1\)/gi, n = i.exec(e.backgroundImage); null !== n;) {
            var o = n && n[2];
            o && this.addBackground(o, t), n = i.exec(e.backgroundImage)
        }
    }, o.prototype.addImage = function (t) {
        var e = new r(t);
        this.images.push(e)
    }, o.prototype.addBackground = function (t, e) {
        var i = new s(t, e);
        this.images.push(i)
    }, o.prototype.check = function () {
        function t(t, i, n) {
            setTimeout(function () {
                e.progress(t, i, n)
            })
        }

        var e = this;
        return this.progressedCount = 0, this.hasAnyBroken = !1, this.images.length ? void this.images.forEach(function (e) {
            e.once("progress", t), e.check()
        }) : void this.complete()
    }, o.prototype.progress = function (t, e, i) {
        this.progressedCount++, this.hasAnyBroken = this.hasAnyBroken || !t.isLoaded, this.emitEvent("progress", [this, t, e]), this.jqDeferred && this.jqDeferred.notify && this.jqDeferred.notify(this, t), this.progressedCount == this.images.length && this.complete(), this.options.debug && a && a.log("progress: " + i, t, e)
    }, o.prototype.complete = function () {
        var t = this.hasAnyBroken ? "fail" : "done";
        if (this.isComplete = !0, this.emitEvent(t, [this]), this.emitEvent("always", [this]), this.jqDeferred) {
            var e = this.hasAnyBroken ? "reject" : "resolve";
            this.jqDeferred[e](this)
        }
    }, r.prototype = Object.create(e.prototype), r.prototype.check = function () {
        var t = this.getIsImageComplete();
        return t ? void this.confirm(0 !== this.img.naturalWidth, "naturalWidth") : (this.proxyImage = new Image, this.proxyImage.addEventListener("load", this), this.proxyImage.addEventListener("error", this), this.img.addEventListener("load", this), this.img.addEventListener("error", this), void (this.proxyImage.src = this.img.src))
    }, r.prototype.getIsImageComplete = function () {
        return this.img.complete && void 0 !== this.img.naturalWidth
    }, r.prototype.confirm = function (t, e) {
        this.isLoaded = t, this.emitEvent("progress", [this, this.img, e])
    }, r.prototype.handleEvent = function (t) {
        var e = "on" + t.type;
        this[e] && this[e](t)
    }, r.prototype.onload = function () {
        this.confirm(!0, "onload"), this.unbindEvents()
    }, r.prototype.onerror = function () {
        this.confirm(!1, "onerror"), this.unbindEvents()
    }, r.prototype.unbindEvents = function () {
        this.proxyImage.removeEventListener("load", this), this.proxyImage.removeEventListener("error", this), this.img.removeEventListener("load", this), this.img.removeEventListener("error", this)
    }, s.prototype = Object.create(r.prototype), s.prototype.check = function () {
        this.img.addEventListener("load", this), this.img.addEventListener("error", this), this.img.src = this.url;
        var t = this.getIsImageComplete();
        t && (this.confirm(0 !== this.img.naturalWidth, "naturalWidth"), this.unbindEvents())
    }, s.prototype.unbindEvents = function () {
        this.img.removeEventListener("load", this), this.img.removeEventListener("error", this)
    }, s.prototype.confirm = function (t, e) {
        this.isLoaded = t, this.emitEvent("progress", [this, this.element, e])
    }, o.makeJQueryPlugin = function (e) {
        e = e || t.jQuery, e && (h = e, h.fn.imagesLoaded = function (t, e) {
            var i = new o(this, t, e);
            return i.jqDeferred.promise(h(this))
        })
    }, o.makeJQueryPlugin(), o
});