//var protocol = window.location.protocol;
var hostname = window.location.hostname;

var apiUrl = "https://api.traval.app";

$(document).on('ready', function () {
    if (localStorage.getItem('token')) {
        var name = localStorage.getItem('name');
        $('#signInStatus').text('Hello, ' + name);
        $('#signInStatus').attr('href', 'signout');
    }
});

// 'use strict';

// const e = React.createElement;

// // Login button component
// class SignInButton extends React.Component {
//     constructor(props) {
//         super(props);
//         this.state = { signedIn: false };
//     }

//     render() {
//         if (!this.state.signedIn) {
//             return e('div', { className: "pl-4 ml-1 u-header__last-item-btn u-header__last-item-btn-xl" },
//                 e('a', { className: "btn btn-wide rounded-sm btn-outline-white border-width-2 transition-3d-hover", href: "signin" },
//                     e('span', { className: "d-inline-block" }, "Sign in or Register")
//                 )
//             )
//         }
//         return e('div', { className: "pl-4 ml-1 u-header__last-item-btn u-header__last-item-btn-xl" },
//             e('a', { className: "btn btn-wide rounded-sm btn-outline-white border-width-2 transition-3d-hover", href: "logout" },
//                 e('span', { className: "d-inline-block" }, "Logout")
//             )
//         )
//     }
// }

// // Find all DOM containers, and render Like buttons into them.
// document.querySelectorAll('#react-login')
//     .forEach(domContainer => {
//         // Read the comment ID from a data-* attribute.
//         const commentID = parseInt(domContainer.dataset.commentid, 10);
//         ReactDOM.render(
//             e(SignInButton, { commentID: commentID }),
//             domContainer
//         );
//     });