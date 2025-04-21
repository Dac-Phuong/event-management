

$(document).ready(function () {
    function getConfig() {
        $.ajax({
            url: '/get-config',
            method: 'GET',
            success: function (res) {
                if (res.error_code == 0) {
                    $('.contact-phone').text(res.data.contact_phone).attr('href',
                        `tel:${res.data.contact_phone || '0913588534'}`)
                    $('#contact-phone').attr('href',
                        `tel:${res.data.contact_phone || '0913588534'}`)
                    $('.base-name').text(res.data.base_name ||
                        'Công ty Cổ Phần Tập đoàn Anh Sơn')
                    $('.contact-address').text(res.data.contact_address ||
                        'Số 27 phố Mai Phúc, phường Phúc Đồng, quận Long Biên, Hà Nội')
                    $('.social-zalo').attr('href', `${res.data.social_zalo || '#'}`)
                    $('.social-fanpage').attr('href', `${res.data.social_fanpage || '#'}`)
                    $('.social-telegram').attr('href', `${res.data.social_telegram || '#'}`)
                    $('.social-youtube').attr('href', `${res.data.social_youtube || '#'}`)
                    $('.social-tiktok').attr('href', `${res.data.social_tiktok || '#'}`)
                    $('#contact-email').text(res.data.contact_email).attr('href',
                        `mailto:${res.data.contact_email || 'pro@anhsongroup.com'}`)
                    $('.contact-email').text(res.data.contact_email || 'pro@anhsongroup.com')
                    $('#contact-form-service').html(JSON.parse(res.data.contact_services || '[]').map(service =>
                            `<option value="${service.email}">${service.name}</option>`)
                        .join(''))
                    $('#logo').attr('src', res.data.base_logo)
                } else {
                    console.log(res.data);
                }
            },
            error: function (error) {
                console.log(error);
            }

        })
    }
    getConfig()
})
$(document).ready(function () {
    $(".scrollToContact").click(function () {
        $("html, body").animate({
            scrollTop: $("#landingContact").offset().top
        }, 200);
    });
});
AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: true
});
const formatDateTime = (dateTime) => {
    const date = new Date(dateTime);
    const day = date.getDate().toString().padStart(2, '0');
    const month = date.toLocaleString('vi-VN', {
        month: 'short'
    }).replace('.', '');
    const year = date.getFullYear();
    const hours = date.getHours().toString().padStart(2, '0');
    const minutes = date.getMinutes().toString().padStart(2, '0');
    return `${day} ${month} ${year} lúc ${hours}:${minutes}`;
}