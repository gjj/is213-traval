'use strict';

const e = React.createElement;

class SignInButton extends React.Component {
    constructor(props) {
        super(props);
        this.state = { liked: false };
    }

    render() {
        if (this.state.liked) {
            return (
                <a id="signUpDropdownInvoker" href="javascript:;" class="d-flex align-items-center text-dark" aria-controls="signUpDropdown" aria-haspopup="true" aria-expanded="true" data-unfold-event="click" data-unfold-target="#signUpDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                    <i class="flaticon-user mr-2 ml-1 font-size-18"></i>
                    <span class="d-inline-block font-size-14 mr-1">Sign in or Register</span>
                </a>
            )
        }

        return e(
            'button',
            { onClick: () => this.setState({ liked: true }) },
            'Like'
        );
    }
}

// Find all DOM containers, and render Like buttons into them.
document.querySelectorAll('#react-login')
    .forEach(domContainer => {
        // Read the comment ID from a data-* attribute.
        const commentID = parseInt(domContainer.dataset.commentid, 10);
        ReactDOM.render(
            e(LikeButton, { commentID: commentID }),
            domContainer
        );
    });