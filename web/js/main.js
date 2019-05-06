$(document).ready(function () {
//
    let comment = $('#user-comment').val()

    if (comment) {
        $('.send_post_register').css('display', 'block');
        $('.save_comment').css('display', 'none');
    }
//     console.log();
//
//
//     //
//     // inputs = ['first_name', 'last_name', 'phone', 'address', 'comment'];
//     //
//     // // input change event, set local storage value
//     // $(document).on('input', function () {
//     //     inputs  = {
//     //         'first_name' : $('#user-first_name').val(),
//     //         'last_name' : $('#user-last_name').val(),
//     //         'phone' : $('#user-phone').val(),
//     //         'address' : $('#user-address').val(),
//     //         'comment' : $('#user-comment').val(),
//     //     };
//     //
//     //     for (var key in inputs) {
//     //         if (inputs[key]) {
//     //             // document.cookie = key+'='+inputs[key];
//     //             localStorage.setItem(key, inputs[key]);
//     //         }
//     //     }
//     //
//     // });
//
//     // if (localStorage.getItem('first_name') && localStorage.getItem('last_name') && localStorage.getItem('phone')) {
//     //     var nextStep = href + '?step=second';
//     //     $('.prev_link').css('display', 'none');
//     //     nextLink = $('.next_link').css('display', 'block');
//     //     nextLink.attr('href', nextStep);
//     // }
//
//     // if (localStorage.getItem('address')) {
//     //     // var nextHref = href + '?step=three';
//     //     // var prevHref = href;
//     //     // nextLink = $('.next_link').css('display', 'block');
//     //     // prevLink = $('.prev_link').css('display', 'block');
//     //     // nextLink.attr('href', nextHref);
//     //     // prevLink.attr('href', href);
//     // } else {
//     //     console.log()
//     //     // var prevHref = href;
//     //     // var prevLink = $('.prev_link').css('display', 'block');
//     //     // $('.next_link').css('display', 'none');
//     //     // prevLink.attr('href', href);
//     // }
//
//     // getValueInputStorage(inputs);
//     //
//     // // get last value in storage, adding to input
//     // function getValueInputStorage(inputs) {
//     //     for (var key in inputs) {
//     //         if (inputs[key]) {
//     //             var value = localStorage.getItem(inputs[key]);
//     //             $('#user-'+inputs[key]).val(value);
//     //         }
//     //     }
//     // }
//
//     // send ajax request to test.vrgsoft.net/feedbacks
//     $('.send_post_register').click(function () {
//
//         let url = 'http://test.vrgsoft.net/feedbacks';
//
//         $.ajax({
//             url: url,
//             method: "POST",
//             // beforeSend: function(request) {
//             //     console.log(request);
//             //     // request.setHeaderValue("Access-Control-Allow-Headers", 'Date,Server,Content-Length,Keep-Alive,Connection,Content-Type');
//             //     // request.setRequestHeader("Access-Control-Allow-Headers", 'Origin, X-Requested-With, Content-Type, Accept');
//             //     // request.setRequestHeader("Access-Control-Request-Headers", 'x-requested-with');
//             //     // request.setRequestHeader("Access-Control-Allow-Origin", 'http://soft/');
//             //     // request.setRequestHeader("Access-Control-Expose-Headers", ' Date, Server, Content-Length, Keep-Alive, Connection, Content-Type');
//             //     // request.setRequestHeader("Access-Control-Allow-Credentials", true);
//             //     // request.setRequestHeader("Access-Control-Allow-Methods", "GET, HEAD, POST, PUT, DELETE, CONNECT, OPTIONS, TRACE, PATCH");
//             //     // request.setRequestHeader("Accept", 'application/json; charset=UTF-8');
//             //
//             //     // request.setRequestHeader("Methods", "POST");
//             // },
//             crossDomain : true,
//             // xhrFields: {
//             //     withCredentials: true
//             // },
//             // contentType: 'application/xml',
//             // headers: {
//             //     // 'Content-Type':'application/json',
//             //     // 'Content-Type:': 'application/json',
//             //     // "Accept": 'application/json; charset=UTF-8',
//             //     // 'Access-Control-Allow-Credentials:': true,
//             // },
//             dataType: 'application/xml',
//             data: {
//                 'client_id' : $('.send_post_register').data('id'),
//                 'address' : $('.send_post_register').data('address'),
//                 'comment' : $('.send_post_register').data('comment'),
//             },
//             success: function(feedbackDataId){
//                 console.log(feedbackDataId);
//             },
//             error: function (data, status, xhr) {
//                 console.log(data, status, xhr)
//             }
//         });
//         return false;
//     });
//
//
});