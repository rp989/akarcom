/*!
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
* http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/
function InfoBox(a) {
    a = a || {};
    google.maps.OverlayView.apply(this, arguments);
    this.content_ = a.content || "";
    this.disableAutoPan_ = a.disableAutoPan || false;
    this.maxWidth_ = a.maxWidth || 0;
    this.pixelOffset_ = a.pixelOffset || new google.maps.Size(0, 0);
    this.position_ = a.position || new google.maps.LatLng(0, 0);
    this.zIndex_ = a.zIndex || null;
    this.boxClass_ = a.boxClass || "infoBox";
    this.boxStyle_ = a.boxStyle || {};
    this.closeBoxMargin_ = a.closeBoxMargin || "2px";
    this.closeBoxURL_ = a.closeBoxURL || "http://www.google.com/intl/en_us/mapfiles/close.gif";
    if (a.closeBoxURL === "") {
        this.closeBoxURL_ = ""
    }
    this.infoBoxClearance_ = a.infoBoxClearance || new google.maps.Size(1, 1);
    if (typeof a.visible === "undefined") {
        if (typeof a.isHidden === "undefined") {
            a.visible = true
        } else {
            a.visible = !a.isHidden
        }
    }
    this.isHidden_ = !a.visible;
    this.alignBottom_ = a.alignBottom || false;
    this.pane_ = a.pane || "floatPane";
    this.enableEventPropagation_ = a.enableEventPropagation || false;
    this.div_ = null;
    this.closeListener_ = null;
    this.moveListener_ = null;
    this.contextListener_ = null;
    this.eventListeners_ = null;
    this.fixedWidthSet_ = null
}

InfoBox.prototype = new google.maps.OverlayView();
InfoBox.prototype.createInfoBoxDiv_ = function () {
    var b;
    var a;
    var f;
    var c = this;
    var d = function (g) {
        g.cancelBubble = true;
        if (g.stopPropagation) {
            g.stopPropagation()
        }
    };
    var e = function (g) {
        g.returnValue = false;
        if (g.preventDefault) {
            g.preventDefault()
        }
        if (!c.enableEventPropagation_) {
            d(g)
        }
    };
    if (!this.div_) {
        this.div_ = document.createElement("div");
        this.setBoxStyle_();
        if (typeof this.content_.nodeType === "undefined") {
            this.div_.innerHTML = this.getCloseBoxImg_() + this.content_
        } else {
            this.div_.innerHTML = this.getCloseBoxImg_();
            this.div_.appendChild(this.content_)
        }
        this.getPanes()[this.pane_].appendChild(this.div_);
        this.addClickHandler_();
        if (this.div_.style.width) {
            this.fixedWidthSet_ = true
        } else {
            if (this.maxWidth_ !== 0 && this.div_.offsetWidth > this.maxWidth_) {
                this.div_.style.width = this.maxWidth_;
                this.div_.style.overflow = "auto";
                this.fixedWidthSet_ = true
            } else {
                f = this.getBoxWidths_();
                this.div_.style.width = (this.div_.offsetWidth - f.left - f.right) + "px";
                this.fixedWidthSet_ = false
            }
        }
        this.panBox_(this.disableAutoPan_);
        if (!this.enableEventPropagation_) {
            this.eventListeners_ = [];
            a = ["mousedown", "mouseover", "mouseout", "mouseup", "click", "dblclick", "touchstart", "touchend", "touchmove"];
            for (b = 0; b < a.length; b++) {
                this.eventListeners_.push(google.maps.event.addDomListener(this.div_, a[b], d))
            }
            this.eventListeners_.push(google.maps.event.addDomListener(this.div_, "mouseover", function (g) {
                this.style.cursor = "default"
            }))
        }
        this.contextListener_ = google.maps.event.addDomListener(this.div_, "contextmenu", e);
        google.maps.event.trigger(this, "domready")
    }
};
InfoBox.prototype.getCloseBoxImg_ = function () {
    var a = "";
    if (this.closeBoxURL_ !== "") {
        a = "<img";
        a += " src='" + this.closeBoxURL_ + "'";
        a += " align=right";
        a += " style='";
        a += " position: relative;";
        a += " cursor: pointer;";
        a += " margin: " + this.closeBoxMargin_ + ";";
        a += "'>"
    }
    return a
};
InfoBox.prototype.addClickHandler_ = function () {
    var a;
    if (this.closeBoxURL_ !== "") {
        a = this.div_.firstChild;
        this.closeListener_ = google.maps.event.addDomListener(a, "click", this.getCloseClickHandler_())
    } else {
        this.closeListener_ = null
    }
};
InfoBox.prototype.getCloseClickHandler_ = function () {
    var a = this;
    return function (b) {
        b.cancelBubble = true;
        if (b.stopPropagation) {
            b.stopPropagation()
        }
        google.maps.event.trigger(a, "closeclick");
        a.close()
    }
};
InfoBox.prototype.panBox_ = function (o) {
    var d;
    var b;
    var m = 0, i = 0;
    if (!o) {
        d = this.getMap();
        if (d instanceof google.maps.Map) {
            if (!d.getBounds().contains(this.position_)) {
                d.setCenter(this.position_)
            }
            b = d.getBounds();
            var q = d.getDiv();
            var j = q.offsetWidth;
            var l = q.offsetHeight;
            var f = this.pixelOffset_.width;
            var e = this.pixelOffset_.height;
            var k = this.div_.offsetWidth;
            var p = this.div_.offsetHeight;
            var h = this.infoBoxClearance_.width;
            var g = this.infoBoxClearance_.height;
            var a = this.getProjection().fromLatLngToContainerPixel(this.position_);
            if (a.x < (-f + h)) {
                m = a.x + f - h
            } else {
                if ((a.x + k + f + h) > j) {
                    m = a.x + k + f + h - j
                }
            }
            if (this.alignBottom_) {
                if (a.y < (-e + g + p)) {
                    i = a.y + e - g - p
                } else {
                    if ((a.y + e + g) > l) {
                        i = a.y + e + g - l
                    }
                }
            } else {
                if (a.y < (-e + g)) {
                    i = a.y + e - g
                } else {
                    if ((a.y + p + e + g) > l) {
                        i = a.y + p + e + g - l
                    }
                }
            }
            if (!(m === 0 && i === 0)) {
                var n = d.getCenter();
                d.panBy(m, i)
            }
        }
    }
};
InfoBox.prototype.setBoxStyle_ = function () {
    var a, b;
    if (this.div_) {
        this.div_.className = this.boxClass_;
        this.div_.style.cssText = "";
        b = this.boxStyle_;
        for (a in b) {
            if (b.hasOwnProperty(a)) {
                this.div_.style[a] = b[a]
            }
        }
        this.div_.style.WebkitTransform = "translateZ(0)";
        if (typeof this.div_.style.opacity !== "undefined" && this.div_.style.opacity !== "") {
            this.div_.style.MsFilter = '"progid:DXImageTransform.Microsoft.Alpha(Opacity=' + (this.div_.style.opacity * 100) + ')"';
            this.div_.style.filter = "alpha(opacity=" + (this.div_.style.opacity * 100) + ")"
        }
        this.div_.style.position = "absolute";
        this.div_.style.visibility = "hidden";
        if (this.zIndex_ !== null) {
            this.div_.style.zIndex = this.zIndex_
        }
    }
};
InfoBox.prototype.getBoxWidths_ = function () {
    var a;
    var c = {top: 0, bottom: 0, left: 0, right: 0};
    var b = this.div_;
    if (document.defaultView && document.defaultView.getComputedStyle) {
        a = b.ownerDocument.defaultView.getComputedStyle(b, "");
        if (a) {
            c.top = parseInt(a.borderTopWidth, 10) || 0;
            c.bottom = parseInt(a.borderBottomWidth, 10) || 0;
            c.left = parseInt(a.borderLeftWidth, 10) || 0;
            c.right = parseInt(a.borderRightWidth, 10) || 0
        }
    } else {
        if (document.documentElement.currentStyle) {
            if (b.currentStyle) {
                c.top = parseInt(b.currentStyle.borderTopWidth, 10) || 0;
                c.bottom = parseInt(b.currentStyle.borderBottomWidth, 10) || 0;
                c.left = parseInt(b.currentStyle.borderLeftWidth, 10) || 0;
                c.right = parseInt(b.currentStyle.borderRightWidth, 10) || 0
            }
        }
    }
    return c
};
InfoBox.prototype.onRemove = function () {
    if (this.div_) {
        this.div_.parentNode.removeChild(this.div_);
        this.div_ = null
    }
};
InfoBox.prototype.draw = function () {
    this.createInfoBoxDiv_();
    var a = this.getProjection().fromLatLngToDivPixel(this.position_);
    this.div_.style.left = (a.x + this.pixelOffset_.width) + "px";
    if (this.alignBottom_) {
        this.div_.style.bottom = -(a.y + this.pixelOffset_.height) + "px"
    } else {
        this.div_.style.top = (a.y + this.pixelOffset_.height) + "px"
    }
    if (this.isHidden_) {
        this.div_.style.visibility = "hidden"
    } else {
        this.div_.style.visibility = "visible"
    }
};
InfoBox.prototype.setOptions = function (a) {
    if (typeof a.boxClass !== "undefined") {
        this.boxClass_ = a.boxClass;
        this.setBoxStyle_()
    }
    if (typeof a.boxStyle !== "undefined") {
        this.boxStyle_ = a.boxStyle;
        this.setBoxStyle_()
    }
    if (typeof a.content !== "undefined") {
        this.setContent(a.content)
    }
    if (typeof a.disableAutoPan !== "undefined") {
        this.disableAutoPan_ = a.disableAutoPan
    }
    if (typeof a.maxWidth !== "undefined") {
        this.maxWidth_ = a.maxWidth
    }
    if (typeof a.pixelOffset !== "undefined") {
        this.pixelOffset_ = a.pixelOffset
    }
    if (typeof a.alignBottom !== "undefined") {
        this.alignBottom_ = a.alignBottom
    }
    if (typeof a.position !== "undefined") {
        this.setPosition(a.position)
    }
    if (typeof a.zIndex !== "undefined") {
        this.setZIndex(a.zIndex)
    }
    if (typeof a.closeBoxMargin !== "undefined") {
        this.closeBoxMargin_ = a.closeBoxMargin
    }
    if (typeof a.closeBoxURL !== "undefined") {
        this.closeBoxURL_ = a.closeBoxURL
    }
    if (typeof a.infoBoxClearance !== "undefined") {
        this.infoBoxClearance_ = a.infoBoxClearance
    }
    if (typeof a.isHidden !== "undefined") {
        this.isHidden_ = a.isHidden
    }
    if (typeof a.visible !== "undefined") {
        this.isHidden_ = !a.visible
    }
    if (typeof a.enableEventPropagation !== "undefined") {
        this.enableEventPropagation_ = a.enableEventPropagation
    }
    if (this.div_) {
        this.draw()
    }
};
InfoBox.prototype.setContent = function (a) {
    this.content_ = a;
    if (this.div_) {
        if (this.closeListener_) {
            google.maps.event.removeListener(this.closeListener_);
            this.closeListener_ = null
        }
        if (!this.fixedWidthSet_) {
            this.div_.style.width = ""
        }
        if (typeof a.nodeType === "undefined") {
            this.div_.innerHTML = this.getCloseBoxImg_() + a
        } else {
            this.div_.innerHTML = this.getCloseBoxImg_();
            this.div_.appendChild(a)
        }
        if (!this.fixedWidthSet_) {
            this.div_.style.width = this.div_.offsetWidth + "px";
            if (typeof a.nodeType === "undefined") {
                this.div_.innerHTML = this.getCloseBoxImg_() + a
            } else {
                this.div_.innerHTML = this.getCloseBoxImg_();
                this.div_.appendChild(a)
            }
        }
        this.addClickHandler_()
    }
    google.maps.event.trigger(this, "content_changed")
};
InfoBox.prototype.setPosition = function (a) {
    this.position_ = a;
    if (this.div_) {
        this.draw()
    }
    google.maps.event.trigger(this, "position_changed")
};
InfoBox.prototype.setZIndex = function (a) {
    this.zIndex_ = a;
    if (this.div_) {
        this.div_.style.zIndex = a
    }
    google.maps.event.trigger(this, "zindex_changed")
};
InfoBox.prototype.setVisible = function (a) {
    this.isHidden_ = !a;
    if (this.div_) {
        this.div_.style.visibility = (this.isHidden_ ? "hidden" : "visible")
    }
};
InfoBox.prototype.getContent = function () {
    return this.content_
};
InfoBox.prototype.getPosition = function () {
    return this.position_
};
InfoBox.prototype.getZIndex = function () {
    return this.zIndex_
};
InfoBox.prototype.getVisible = function () {
    var a;
    if ((typeof this.getMap() === "undefined") || (this.getMap() === null)) {
        a = false
    } else {
        a = !this.isHidden_
    }
    return a
};
InfoBox.prototype.show = function () {
    this.isHidden_ = false;
    if (this.div_) {
        this.div_.style.visibility = "visible"
    }
};
InfoBox.prototype.hide = function () {
    this.isHidden_ = true;
    if (this.div_) {
        this.div_.style.visibility = "hidden"
    }
};
InfoBox.prototype.open = function (c, a) {
    var b = this;
    if (a) {
        this.position_ = a.getPosition();
        this.moveListener_ = google.maps.event.addListener(a, "position_changed", function () {
            b.setPosition(this.getPosition())
        })
    }
    this.setMap(c);
    if (this.div_) {
        this.panBox_()
    }
};
InfoBox.prototype.close = function () {
    var a;
    if (this.closeListener_) {
        google.maps.event.removeListener(this.closeListener_);
        this.closeListener_ = null
    }
    if (this.eventListeners_) {
        for (a = 0; a < this.eventListeners_.length; a++) {
            google.maps.event.removeListener(this.eventListeners_[a])
        }
        this.eventListeners_ = null
    }
    if (this.moveListener_) {
        google.maps.event.removeListener(this.moveListener_);
        this.moveListener_ = null
    }
    if (this.contextListener_) {
        google.maps.event.removeListener(this.contextListener_);
        this.contextListener_ = null
    }
    this.setMap(null)
};