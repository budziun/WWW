window.addEventListener("scroll", function () {
    const scrollTop = document.documentElement.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrollPercent = (scrollTop / scrollHeight) * 100;

    const progressBar = document.querySelector(".progress-bar");
    progressBar.style.width = scrollPercent + "%";
});