/*! Image Uploader - v1.2.3 - 26/11/2019
 * Copyright (c) 2019 Christian Bayer; Licensed MIT */
!(function (e) {
    e.fn.imageUploader = function (t) {
        let n,
            i = {
                preloaded: [],
                imagesInputName: "images",
                preloadedInputName: "preloaded",
                label: "Kéo & thả các tập tin ở đây hoặc nhấp để duyệt",
                extensions: [".jpg", ".jpeg", ".png", ".gif", ".svg"],
                mimes: [
                    "image/jpeg",
                    "image/png",
                    "image/gif",
                    "image/svg+xml",
                ],
                maxSize: void 0,
                maxFiles: void 0,
            },
            a = this,
            s = new DataTransfer();
        (a.settings = {}),
            (a.init = function () {
                (a.settings = e.extend(a.settings, i, t)),
                    a.each(function (t, n) {
                        let i = o();
                        if (
                            (e(n).append(i),
                                i.on("dragover", r.bind(i)),
                                i.on("dragleave", r.bind(i)),
                                i.on("drop", p.bind(i)),
                                a.settings.preloaded.length)
                        ) {
                            i.addClass("has-files");
                            let e = i.find(".uploaded");
                            for (
                                let t = 0;
                                t < a.settings.preloaded.length;
                                t++
                            )
                                e.append(
                                    l(
                                        a.settings.preloaded[t].image,
                                        a.settings.preloaded[t].id,
                                        !0
                                    )
                                );
                        }
                    });
            });
        let o = function () {
            let t = e("<div>", { class: "image-uploader" });
            n = e("<input>", {
                type: "file",
                id: a.settings.imagesInputName + "-" + h(),
                name: a.settings.imagesInputName + "[]",
                accept: a.settings.extensions.join(","),
                multiple: "",
            }).appendTo(t);
            e("<div>", { class: "uploaded" }).appendTo(t);
            let i = e("<div>", { class: "upload-text" }).appendTo(t);
            e("<i>", { class: "ti ti-upload" }).appendTo(i),
                e("<span>", { text: a.settings.label }).appendTo(i);
            return (
                t.on("click", function (e) {
                    d(e), n.trigger("click");
                }),
                n.on("click", function (e) {
                    e.stopPropagation();
                }),
                n.on("change", p.bind(t)),
                t
            );
        },
            d = function (e) {
                e.preventDefault(), e.stopPropagation();
            },
            l = function (t, i, o) {
                let l = e("<div>", { class: "uploaded-image" }),
                    r =
                        (e("<img>", { src: t }).appendTo(l),
                            e("<button>", { class: "delete-image" }).appendTo(l));
                e("<i>", { class: "ti ti-x" }).appendTo(r);
                if (o) {
                    l.attr("data-preloaded", !0);
                    e("<input>", {
                        type: "hidden",
                        name: a.settings.preloadedInputName + "[]",
                        value: i,
                    }).appendTo(l);
                } else l.attr("data-index", i);
                return (
                    l.on("click", function (e) {
                        d(e);
                    }),
                    r.on("click", function (t) {
                        d(t);
                        let o = l.parent();
                        if (!0 === l.data("preloaded"))
                            a.settings.preloaded = a.settings.preloaded.filter(
                                function (e) {
                                    return e.id !== i;
                                }
                            );
                        else {
                            let t = parseInt(l.data("index"));
                            o
                                .find(".uploaded-image[data-index]")
                                .each(function (n, i) {
                                    n > t && e(i).attr("data-index", n - 1);
                                }),
                                s.items.remove(t),
                                n.prop("files", s.files);
                        }
                        l.remove(),
                            console.log('xóa id: ' + i);
                        if (i !== 0) {
                            $.ajax({
                                url: "service/delete/image/" + i, 
                                type: "GET",
                                headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" }, 
                                dataType: "json",
                                success: function (res) {
                                    if(res.error_code == 0) {
                                        console.log('Xóa ID: ' + i + ' thành công');
                                    }
                                },
                                error: function (xhr, status, error) {
                                    console.error('Xóa ID: ' + i + ' thất bại. Lỗi:', error);
                                }
                            });
                        }
                        o.children().length || o.parent().addClass("has-files");
                    }),
                    l
                );
            },
            r = function (t) {
                d(t),
                    "dragover" === t.type
                        ? e(this).addClass("drag-over")
                        : e(this).removeClass("drag-over");
            },
            p = function (t) {
                d(t);
                let i = e(this),
                    o = Array.from(
                        t.target.files || t.originalEvent.dataTransfer.files
                    ),
                    l = [];
                e(o).each(function (e, t) {
                    (a.settings.extensions && !g(t)) ||
                        (a.settings.mimes && !c(t)) ||
                        (a.settings.maxSize && !f(t)) ||
                        (a.settings.maxFiles && !m(l.length, t)) ||
                        l.push(t);
                }),
                    l.length
                        ? (i.removeClass("drag-over"), u(i, l))
                        : n.prop("files", s.files);
            },
            g = function (e) {
                return (
                    !(
                        a.settings.extensions.indexOf(
                            e.name.replace(new RegExp("^.*\\."), ".")
                        ) < 0
                    ) ||
                    (alert(
                        `Tập tin "${e.name
                        }" không khớp với phần mở rộng tập tin được chấp nhận: "${a.settings.extensions.join(
                            '", "'
                        )}"`
                    ),
                        !1)
                );
            },
            c = function (e) {
                return (
                    !(a.settings.mimes.indexOf(e.type) < 0) ||
                    (alert(
                        `Tập tin "${e.name
                        }" không phù hợp với các loại mime được chấp nhận: "${a.settings.mimes.join(
                            '", "'
                        )}"`
                    ),
                        !1)
                );
            },
            f = function (e) {
                return (
                    !(e.size > a.settings.maxSize) ||
                    (alert(
                        `The file "${e.name}" exceeds the maximum size of ${a.settings.maxSize / 1024 / 1024
                        }Mb`
                    ),
                        !1)
                );
            },
            m = function (e, t) {
                return (
                    !(
                        e + s.items.length + a.settings.preloaded.length >=
                        a.settings.maxFiles
                    ) ||
                    (alert(
                        `The file "${t.name}" could not be added because the limit of ${a.settings.maxFiles} files was reached`
                    ),
                        !1)
                );
            },
            u = function (t, n) {
                t.addClass("has-files");
                let i = t.find(".uploaded"),
                    a = t.find('input[type="file"]');
                e(n).each(function (e, t) {
                    s.items.add(t),
                        i.append(
                            l(URL.createObjectURL(t), s.items.length - 1),
                            !1
                        );
                }),
                    a.prop("files", s.files);
            },
            h = function () {
                return Date.now() + Math.floor(100 * Math.random() + 1);
            };
        return this.init(), this;
    };
})(jQuery);
