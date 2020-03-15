'use strict';

const e = React.createElement;

// Login button component
class SignInButton extends React.Component {
    constructor(props) {
        super(props);
        this.state = { signedIn: false };
    }

    render() {
        if (!this.state.signedIn) {
            return e('div', { className: "pl-4 ml-1 u-header__last-item-btn u-header__last-item-btn-xl" },
                e('a', { className: "btn btn-wide rounded-sm btn-outline-white border-width-2 transition-3d-hover", href: "signin" },
                    e('span', { className: "d-inline-block" }, "Sign in or Register")
                )
            )
        }
        return e('div', { className: "pl-4 ml-1 u-header__last-item-btn u-header__last-item-btn-xl" },
            e('a', { className: "btn btn-wide rounded-sm btn-outline-white border-width-2 transition-3d-hover", href: "logout" },
                e('span', { className: "d-inline-block" }, "Logout")
            )
        )
    }
}

// Find all DOM containers, and render Like buttons into them.
document.querySelectorAll('#react-login')
    .forEach(domContainer => {
        // Read the comment ID from a data-* attribute.
        const commentID = parseInt(domContainer.dataset.commentid, 10);
        ReactDOM.render(
            e(SignInButton, { commentID: commentID }),
            domContainer
        );
    });