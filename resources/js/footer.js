window.addEventListener('resize', adjustFooterPosition);

function adjustFooterPosition() {
    const contentHeight = document.querySelector('.content').offsetHeight;
    const windowHeight = window.innerHeight;

    if (contentHeight < windowHeight) {
        document.querySelector('.footer').style.position = 'fixed';
    } else {
        document.querySelector('.footer').style.position = 'static';
    }
}

window.addEventListener('load', adjustFooterPosition);