if (window.location.hash === '#test') {
    import('./whatever').then(() => alert(123));
}
