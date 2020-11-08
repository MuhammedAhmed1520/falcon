/**
 * cookieBar
 * Copyright (c) 2018 Innostudio.de
 * Website: http://innostudio.de/
 * Version: 1.0 (24-Oct-2018)
 * License: Apache License version 2.0
 */(function () {
    function a(f, g) {
        for (var h in g) g.hasOwnProperty(h) && (f[h] = g[h]);
        return f
    }

    function b() {
        for (var j, f = document.cookie.split(';'), g = this.options.cookie + '=', h = 0; h < f.length; h++) {
            for (j = f[h]; ' ' == j.charAt(0);) j = j.substring(1, j.length);
            if (0 == j.indexOf(g)) return j.substring(g.length, j.length)
        }
        return null
    }

    function c() {
        var f = '', g = new Date;
        g.setTime(g.getTime() + 31536000000), f = '; expires=' + g.toUTCString(), document.cookie = this.options.cookie + '=1' + f + '; path=/'
    }

    function d() {
        var f = document.head || document.getElementsByTagName('head')[0], g = document.createElement('style');
        g.appendChild(document.createTextNode(this.options.css)), f.appendChild(g)
    }

    function e(f) {
        var g = this;
        (document.attachEvent ? 'complete' === document.readyState : 'loading' !== document.readyState) ? f.call(g) : document.addEventListener('DOMContentLoaded', function () {
            f.call(g)
        })
    }

    this.cookieBar = function () {
        var f = {
            id: 'cookieBar',
            html: '<b>Mögen Sie Cookies?</b> <span class="cookies-icon"></span> Unsere Webseite verwendet Cookies, um Ihnen ein angenehmeres Surfen zu ermöglichen. <a href="" class="cookies-link" tabindex="-1">Mehr erfahren</a>',
            button: 'OK',
            cookie: 'cookies_accepted',
            css: '#cookieBar{position:fixed;bottom:0;left:0;width:100%;padding:14px;background:rgba(0,0,0,0.95);text-align:center;line-height:normal;box-shadow:0 -2px 11px -3px rgba(0, 0, 0, .2);z-index:9999}#cookieBar p{display:inline-block;color:#fff;margin:0;padding:16px 0}#cookieBar b{font-weight:700}#cookieBar .cookies-icon{display:inline-block;width:16px;height:16px;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAABQVBMVEWFQwCKRQGNRwG1XAO5XwS9YQT///+/YQS0XAOPSAGDQQC9YQS5XwSLRgGGQwDAYgSwWQOUSwGCQQDAYgSqVwPAYgTCahK5ZQ+ZTQLCbxqlVAKCQQCfUAKUTwqMSgnal0+CQQCVUxHMiUS3eDquczjtvIPbpGzmsnvruIDSmmPYo2zNl2HRmmTPmmT0yJTdq3fktIDisHzisX3apnPjr3xuMhl2QiGCWi2kaUard1Cwf1SzhFi0hly3i1y4jWG6kWDDoG7GkmbJl2rKmWzMnG7TpnbWq3rduIbfrHnfu4ngrXrgrnvhr3zhsH3isH3jsn/js4DktIHmtoPntYLouofpuIXpuofqvInqvovrvInsvovtwI3uwo/vwo/vxJHyxpPzyJXzyZbzypf1y5j1zZr2z5z3z5z30J3506D92KX/3KmsiTn4AAAANXRSTlMAAAAAAAAAEhMYGjY4SUpKU2JrcYOFipGSnKCkprO6wMLFx9jg5+vr6+/v8/P0+vv7/Pz9/e4iXTcAAADWSURBVBhXXchFFoIAFEBRTOzuFru7uxsbFQMTY/8L8Ksz33mji3D/QrgsNgeVKtVqpRTlsFlfEGqsrnDYZdUIfyDSe+nnq/qkvXrRB3haz71HXx507+7R8gBk2KGTaVNUJdM5YDIAlft6bO2h0vHqVgEYIrftiSQL5GlbjhoATLHiiiDy6SaxOsdNADr/blGfzeDF2qcDkDtGjVRtvBlPciOHHIBvDuI1fDjEp8ugmQ/AFNtD8/4g2++G7GLmBxgSizOQSAacFgnjB4hAYbTZjAoB8oW/3uZuJvf+jX9VAAAAAElFTkSuQmCC) center no-repeat;vertical-align:middle;margin-top:-3px}#cookieBar .cookies-link{color:#868686;text-decoration:none}#cookieBar .cookies-link:hover{text-decoration:underline;color:#FF5F58}#cookieBar .cookies-btn{display:inline-block;background:#FF5F58;margin-left:14px;padding:14px 28px;color:#fff;vertical-align:middle;border-radius:4px;font-weight:700;cursor:pointer;box-shadow:3px 6px 18px rgba(255,95,88,.3);transition:all .2s ease}#cookieBar .cookies-btn:hover{background:#ff4b44;text-decoration:none}#cookieBar .cookies-btn:active{background:#ff4b44;transform:translateY(2px);text-decoration:none}'
        };
        this.options = arguments[0] && 'object' == typeof arguments[0] ? a(f, arguments[0]) : f, this.el = null, this.html = '<p>' + this.options.html + '</p> <a class="cookies-btn">' + this.options.button + '</a>', b.call(this) || e.call(this, this.show)
    }, cookieBar.prototype.show = function () {
        var f = this;
        this.hide.call(this), this.el = document.createElement('div'), this.el.setAttribute('id', this.options.id), this.el.innerHTML = this.html, this.el.querySelector('.cookies-btn').addEventListener('click', function () {
            f.hide.call(f), c.call(f)
        }), document.body.appendChild(this.el), d.call(this)
    }, cookieBar.prototype.hide = function () {
        var f = this.el || document.body.querySelector('#' + this.options.id);
        null == f || f.parentNode.removeChild(f)
    }, new cookieBar
})();