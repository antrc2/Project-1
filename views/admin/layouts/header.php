<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin sản phẩm</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="..//plugins/fontawesome-free/css/all.min.css"> -->
    <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="./assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css?v=3.2.0">

    <script data-cfasync="false" nonce="c007639b-aa53-47f6-98c2-7f31cb95a1d8">
    try {
        (function(w, d) {
            ! function(cJ, cK, cL, cM) {
                if (cJ.zaraz) console.error("zaraz is loaded twice");
                else {
                    cJ[cL] = cJ[cL] || {};
                    cJ[cL].executed = [];
                    cJ.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    cJ.zaraz._v = "5815";
                    cJ.zaraz._n = "c007639b-aa53-47f6-98c2-7f31cb95a1d8";
                    cJ.zaraz.q = [];
                    cJ.zaraz._f = function(cN) {
                        return async function() {
                            var cO = Array.prototype.slice.call(arguments);
                            cJ.zaraz.q.push({
                                m: cN,
                                a: cO
                            })
                        }
                    };
                    for (const cP of ["track", "set", "debug"]) cJ.zaraz[cP] = cJ.zaraz._f(cP);
                    cJ.zaraz.init = () => {
                        var cQ = cK.getElementsByTagName(cM)[0],
                            cR = cK.createElement(cM),
                            cS = cK.getElementsByTagName("title")[0];
                        cS && (cJ[cL].t = cK.getElementsByTagName("title")[0].text);
                        cJ[cL].x = Math.random();
                        cJ[cL].w = cJ.screen.width;
                        cJ[cL].h = cJ.screen.height;
                        cJ[cL].j = cJ.innerHeight;
                        cJ[cL].e = cJ.innerWidth;
                        cJ[cL].l = cJ.location.href;
                        cJ[cL].r = cK.referrer;
                        cJ[cL].k = cJ.screen.colorDepth;
                        cJ[cL].n = cK.characterSet;
                        cJ[cL].o = (new Date).getTimezoneOffset();
                        if (cJ.dataLayer)
                            for (const cT of Object.entries(Object.entries(dataLayer).reduce(((cU, cV) => ({
                                    ...cU[1],
                                    ...cV[1]
                                })), {}))) zaraz.set(cT[0], cT[1], {
                                scope: "page"
                            });
                        cJ[cL].q = [];
                        for (; cJ.zaraz.q.length;) {
                            const cW = cJ.zaraz.q.shift();
                            cJ[cL].q.push(cW)
                        }
                        cR.defer = !0;
                        for (const cX of [localStorage, sessionStorage]) Object.keys(cX || {}).filter((cZ => cZ
                            .startsWith("_zaraz_"))).forEach((cY => {
                            try {
                                cJ[cL]["z_" + cY.slice(7)] = JSON.parse(cX.getItem(cY))
                            } catch {
                                cJ[cL]["z_" + cY.slice(7)] = cX.getItem(cY)
                            }
                        }));
                        cR.referrerPolicy = "origin";
                        cR.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(cJ[cL])));
                        cQ.parentNode.insertBefore(cR, cQ)
                    };
                    ["complete", "interactive"].includes(cK.readyState) ? zaraz.init() : cJ.addEventListener(
                        "DOMContentLoaded", zaraz.init)
                }
            }(w, d, "zarazData", "script");
            window.zaraz._p = async bb => new Promise((bc => {
                if (bb) {
                    bb.e && bb.e.forEach((bd => {
                        try {
                            const be = d.querySelector("script[nonce]"),
                                bf = be?.nonce || be?.getAttribute("nonce"),
                                bg = d.createElement("script");
                            bf && (bg.nonce = bf);
                            bg.innerHTML = bd;
                            bg.onload = () => {
                                d.head.removeChild(bg)
                            };
                            d.head.appendChild(bg)
                        } catch (bh) {
                            console.error(`Error executing script: ${bd}\n`, bh)
                        }
                    }));
                    Promise.allSettled((bb.f || []).map((bi => fetch(bi[0], bi[1]))))
                }
                bc()
            }));
            zaraz._p({
                "e": ["(function(w,d){})(window,document)"]
            });
        })(window, document)
    } catch (e) {
        throw fetch("/cdn-cgi/zaraz/t"), e;
    };
    </script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">