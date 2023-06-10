export function getCurrentURL() {
    const currentURL = window.location.href;
    const url = new URL(currentURL);
    const params = new URLSearchParams(url.search);

    return {
        currentURL: currentURL,
        url: url,
        params: params
    };
}
