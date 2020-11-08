// Enable pusher logging - don't include this in production
// Pusher.logToConsole = true;

let pusher = new Pusher('dc6d3a150b6a32dd01e6', {
    cluster: 'eu',
    forceTLS: true
});

pusher.subscribe('logger-channel').bind('LoggerEvent', function (data) {

    let serial_data = base64_decode(data[0]);
    let logger = JSON.parse(serial_data);

    console.log(logger);

    if (logger.action == 'deleted') {
        $('.logger-table').prepend(`
            <tr class="logger_animated" style="background-color: #e8e8e8;">
                <td class="p-1">
                    <label class="badge badge-danger badge-pill">
                        حذف
                    </label>
                    <small> ${logger.user.username ? logger.user.username : ''}</small>
                    <b class="text-uppercase">${logger.logerable_type.split("\\").slice(-1).pop()}</b>
                </td>
                <td class="p-1">${logger.created_at}</td>
            </tr>`);
    } else if (logger.action == 'new') {

        $('.logger-table').prepend(`
            <tr class="logger_animated" style="background-color: #e8e8e8;">
                <td class="p-1">
                    <label class="badge badge-success badge-pill">
                        جديد
                    </label>
                    <small> ${logger.user.username ? logger.user.username : ''}</small>
                    <b class="text-uppercase">${logger.logerable_type.split("\\").slice(-1).pop()}</b>
                </td>
                <td class="p-1">${logger.created_at}</td>
            </tr>`);
    } else {

        $('.logger-table').prepend(`
            <tr class="logger_animated" style="background-color: #e8e8e8;">
                <td class="p-1">
                    <label class="badge badge-primary badge-pill">
                        تحديث
                    </label>
                    <small> ${logger.user.username ? logger.user.username : ''}</small>
                    <b class="text-uppercase">${logger.logerable_type.split("\\").slice(-1).pop()}</b>
                </td>
                <td class="p-1">${logger.created_at}</td>
            </tr>`);
    }

});


//////////////////////////////////////////////// encryption /////////////////////////////////////////////////////////////////////////////
let b64u = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_";
let b64pad = '=';

function base64_charIndex(c) {
    if (c == "+") return 62;
    if (c == "/") return 63;
    return b64u.indexOf(c)
}

function base64_decode(data) {
    let dst = "";
    let i, a, b, c, d, z;

    for (i = 0; i < data.length - 3; i += 4) {
        a = base64_charIndex(data.charAt(i + 0))
        b = base64_charIndex(data.charAt(i + 1))
        c = base64_charIndex(data.charAt(i + 2))
        d = base64_charIndex(data.charAt(i + 3))

        dst += String.fromCharCode((a << 2) | (b >>> 4))
        if (data.charAt(i + 2) != b64pad)
            dst += String.fromCharCode(((b << 4) & 0xF0) | ((c >>> 2) & 0x0F))
        if (data.charAt(i + 3) != b64pad)
            dst += String.fromCharCode(((c << 6) & 0xC0) | d)
    }

    dst = decodeURIComponent(escape(dst))
    return dst
}
