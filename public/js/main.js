$(document).ready(function() {
    "use strict"; // start of use strict

    /*==============================
    Header
    ==============================*/
    var mainHeader = $('.header--hidden');
    var scrolling = false,
        previousTop = 0,
        currentTop = 0,
        scrollDelta = 10,
        scrollOffset = 140;

    var scrolling = false;
    $(window).on('scroll', function() {
        if (!scrolling) {
            scrolling = true;
            (!window.requestAnimationFrame) ?
            setTimeout(autoHideHeader, 250): requestAnimationFrame(autoHideHeader);
        }
    });
    $(window).trigger('scroll');

    function autoHideHeader() {
        var currentTop = $(window).scrollTop();
        checkSimpleNavigation(currentTop);
        previousTop = currentTop;
        scrolling = false;
    }

    function checkSimpleNavigation(currentTop) {
        if (previousTop - currentTop > scrollDelta) {
            mainHeader.removeClass('header--scroll');
        } else if (currentTop - previousTop > scrollDelta && currentTop > scrollOffset) {
            mainHeader.addClass('header--scroll');
        }
    }

    function disableScrolling() {
        var x = window.scrollX;
        var y = window.scrollY;
        window.onscroll = function() {
            window.scrollTo(x, y);
        };
    }

    function enableScrolling() {
        window.onscroll = function() {};
    }

    $('.header__menu').on('click', function() {
        $('.header__menu').toggleClass('header__menu--active');
        $('.header').toggleClass('header--menu');
        $('.header__nav').toggleClass('header__nav--active');

        if ($('.header__nav').hasClass('header__nav--active')) {
            disableScrolling();
        } else {
            enableScrolling();
        }
    });

    $('.header__search, .header__form-close').on('click', function() {
        $('.header__form').toggleClass('header__form--active');
    });

    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 0) {
            $('.header--fixed').addClass('header--active');
        } else {
            $('.header--fixed').removeClass('header--active');
        }
    });
    $(window).trigger('scroll');

    /*==============================
    Multi level dropdowns
    ==============================*/
    $('ul.dropdown-menu [data-toggle="dropdown"]').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();

        $(this).siblings().toggleClass('show');
    });

    $(document).on('click', function(e) {
        $('.dropdown-menu').removeClass('show');
    });

    /*==============================
    Home carousel
    ==============================*/
    $('.home__carousel').owlCarousel({
        mouseDrag: true,
        touchDrag: true,
        dots: true,
        loop: true,
        autoplay: true,
        smartSpeed: 600,
        margin: 20,
        autoHeight: true,
        autoWidth: true,
        responsive: {
            0: {
                items: 2,
            },
            576: {
                items: 2,
                margin: 20,
            },
            768: {
                items: 2,
                margin: 30,
                center: true,
            },
            1200: {
                items: 3,
                margin: 30,
                center: true,
                mouseDrag: false,
                dots: false,
                startPosition: 1,
                slideBy: 1,
            },
        }
    });

    /*==============================
    Select
    ==============================*/
    $('.catalog__select').select2({
        minimumResultsForSearch: Infinity
    });
    /*==============================
    Carousel
    ==============================*/
    $('.section__carousel').owlCarousel({
        mouseDrag: true,
        touchDrag: true,
        dots: true,
        loop: true,
        autoplay: false,
        smartSpeed: 600,
        margin: 20,
        autoHeight: true,
        responsive: {
            0: {
                items: 2,
            },
            576: {
                items: 3,
            },
            768: {
                items: 3,
                margin: 30,
            },
            992: {
                items: 4,
                margin: 30,
            },
            1200: {
                items: 4,
                margin: 30,
                dots: false,
                mouseDrag: false,
                slideBy: 6,
                smartSpeed: 400,
            },
        }
    });

    /*==============================
    Interview
    ==============================*/
    $('.section__interview').owlCarousel({
        mouseDrag: true,
        touchDrag: true,
        dots: true,
        loop: true,
        autoplay: false,
        smartSpeed: 600,
        margin: 20,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            768: {
                items: 2,
                margin: 30,
            },
            992: {
                items: 3,
                margin: 30,
            },
            1200: {
                items: 3,
                margin: 30,
                dots: false,
                mouseDrag: false,
                slideBy: 3,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
            },
        }
    });

    /*==============================
    Series
    ==============================*/
    $('.section__series').owlCarousel({
        mouseDrag: true,
        touchDrag: true,
        dots: true,
        loop: true,
        autoplay: false,
        smartSpeed: 600,
        margin: 20,
        autoHeight: true,
        responsive: {
            0: {
                items: 2,
            },
            576: {
                items: 3,
            },
            768: {
                items: 3,
                margin: 20,
            },
            992: {
                items: 4,
                margin: 20,
            },
            1200: {
                items: 5,
                margin: 20,
                dots: false,
                mouseDrag: false,
            },
            1440: {
                items: 5,
                margin: 20,
                dots: false,
                mouseDrag: false,
            },
        }
    });

    /*==============================
    Live
    ==============================*/
    $('.section__live').owlCarousel({
        mouseDrag: true,
        touchDrag: true,
        dots: true,
        loop: true,
        autoplay: false,
        smartSpeed: 600,
        margin: 20,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            768: {
                items: 2,
                margin: 30,
            },
            992: {
                items: 3,
                margin: 30,
            },
            1200: {
                items: 3,
                margin: 30,
                dots: false,
                mouseDrag: false,
                slideBy: 3,
            },
        }
    });

    /*==============================
    Partners
    ==============================*/
    $('.partners').owlCarousel({
        mouseDrag: false,
        touchDrag: false,
        dots: false,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        smartSpeed: 600,
        margin: 20,
        responsive: {
            0: {
                items: 2,
            },
            576: {
                items: 2,
                margin: 30,
            },
            768: {
                items: 3,
                margin: 30,
            },
            992: {
                items: 4,
                margin: 30,
            },
            1200: {
                items: 6,
                margin: 30,
            },
        }
    });

    /*==============================
    Navigation
    ==============================*/
    $('.section__nav--prev, .home__nav--prev').on('click', function() {
        var carouselId = $(this).attr('data-nav');
        $(carouselId).trigger('prev.owl.carousel');
    });
    $('.section__nav--next, .home__nav--next').on('click', function() {
        var carouselId = $(this).attr('data-nav');
        $(carouselId).trigger('next.owl.carousel');
    });

    /*==============================
    Bg
    ==============================*/
    $('.section--full-bg').each(function() {
        if ($(this).attr("data-bg")) {
            $(this).css({
                'background': 'url(' + $(this).data('bg') + ')',
                'background-position': 'center center',
                'background-repeat': 'no-repeat',
                'background-size': 'cover'
            });
        }
    });

    $('.section__bg').each(function() {
        if ($(this).attr("data-bg")) {
            $(this).css({
                'background': 'url(' + $(this).data('bg') + ')',
                'background-position': 'top center',
                'background-repeat': 'no-repeat',
                'background-size': 'cover'
            });
        }
    });

    /*==============================
    Player
    ==============================*/
    let player;
    function initializePlayer() {
        if ($('#player').length) {
            player = new Plyr('#player',{
                i18n: {
                    quality: 'Chất lượng',
                    speed: 'Tốc độ',
                    normal: 'Bình thường'
                }
            });
        } else {
            return false;
        }
        return false;
    }
    $(window).on('load', initializePlayer);
    /*==============================
    Modal
    ==============================*/
    $('.open-video').magnificPopup({
        disableOn: 500,
        fixedContentPos: true,
        type: 'iframe',
        preloader: false,
        removalDelay: 300,
        mainClass: 'mfp-fade',
        callbacks: {
            open: function() {
                if ($(window).width() > 1200) {
                    $('.header').css('margin-left', "-" + (getScrollBarWidth() / 2) + "px");
                }
            },
            close: function() {
                if ($(window).width() > 1200) {
                    $('.header').css('margin-left', 0);
                }
            }
        }
    });

    $('.open-modal').magnificPopup({
        fixedContentPos: true,
        fixedBgPos: true,
        overflowY: 'auto',
        type: 'inline',
        preloader: false,
        focus: '#username',
        modal: false,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in',
    });

    $(document).on('click', '.modal__btn--apply, .modal__btn--dismiss', function(e) {
        e.preventDefault();
        $.magnificPopup.close();
    });
    

    function getScrollBarWidth() {
        var $outer = $('<div>').css({
                visibility: 'hidden',
                width: 100,
                overflow: 'scroll'
            }).appendTo('body'),
            widthWithScroll = $('<div>').css({
                width: '100%'
            }).appendTo($outer).outerWidth();
        $outer.remove();
        return 100 - widthWithScroll;
    };

    /*==============================
    Scrollbar
    ==============================*/
    var Scrollbar = window.Scrollbar;

    if ($('.header__nav-menu--scroll').length) {
        Scrollbar.init(document.querySelector('.header__nav-menu--scroll'), {
            damping: 0.1,
            renderByPixels: true,
            alwaysShowTracks: true,
            continuousScrolling: true
        });
    }

    if ($('.dashbox__table-wrap--1').length) {
        Scrollbar.init(document.querySelector('.dashbox__table-wrap--1'), {
            damping: 0.1,
            renderByPixels: true,
            alwaysShowTracks: true,
            continuousScrolling: true
        });
    }

    if ($('.dashbox__table-wrap--2').length) {
        Scrollbar.init(document.querySelector('.dashbox__table-wrap--2'), {
            damping: 0.1,
            renderByPixels: true,
            alwaysShowTracks: true,
            continuousScrolling: true
        });
    }
     /*==============================
    Bonus
    ==============================*/
 
    
    
    
    if(document.querySelector(".page-404__btn")){
        document.querySelector(".page-404__btn").addEventListener("click",()=>{
            window.history.back();
        })
    }
    
    
    
    function messageBySession() {
        if(sessionStorage.getItem("message")){
            let storedMessage = JSON.parse(sessionStorage.getItem("message"));
            let msg = storedMessage[0];
            let status = storedMessage[1];
            
            let template = `
                <div class="message_box ${status}">
                ${msg}
                <svg class="hide_message" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                </div>
            `
            document.querySelector('.message__container').insertAdjacentHTML('beforeend', template)
        }
        
        if(document.querySelector('.message_box')){
            const hide_message = document.querySelectorAll('.hide_message');
            const message_box = document.querySelectorAll('.message_box');
            hide_message.forEach((e,index)=>{
                e.addEventListener("click",()=>{
                    message_box[index].remove();
                    if(sessionStorage.getItem("message")) sessionStorage.removeItem("message")
                })
            })
            message_box.forEach((e)=>{
                e.addEventListener("animationend",()=>{
                    e.remove();
                    if(sessionStorage.getItem("message")) sessionStorage.removeItem("message")
                })
            })
        }
    }
    messageBySession();
    
    function add__message(message, status) {
        sessionStorage.setItem('message', JSON.stringify([message, status]));
        messageBySession();
    }
    
    document.addEventListener('click', (e) => {
        if(e.target && e.target.closest(".isLogin__false")){
            add__message("Vui lòng đăng nhập để sử dụng tính năng này!", "error")
        }
        if(e.target && e.target.closest(".isBan")){
            add__message("Bạn đã bị cấm không được dùng tính năng này!", "error")
        }
    })
    
    function lazy__image(){
        const images = document.querySelectorAll("img:not(.not__lazy)");
    
        // Tạo một IntersectionObserver duy nhất
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                const img = entry.target;
                
                if (entry.isIntersecting) {
                    const realSrc = img.getAttribute("data-src"); // Lấy URL của ảnh thật
                    if (realSrc) {
                        img.src = realSrc; // Thay thế ảnh placeholder bằng ảnh thật
                    }
                    observer.unobserve(img); // Ngừng quan sát sau khi ảnh đã được tải
                }
            });
        });
    
        // Duyệt qua tất cả ảnh và thực hiện lazy load
        images.forEach((img) => {
            // Nếu ảnh chưa có data-src, thiết lập data-src và đặt ảnh placeholder
            if (!img.getAttribute('data-src')) {
                img.setAttribute("data-src", img.src); // Lưu URL của ảnh thật trong `data-src`
                img.setAttribute("src", "/../images/storage/lazy_image.svg"); // Đặt ảnh placeholder
            }
    
            // Nếu ảnh chưa có kích thước, lấy kích thước của ảnh thật (nếu có)
            if (!img.width) {
                const realImage = new Image();
                realImage.src = img.getAttribute("data-src"); // Lấy ảnh thật từ data-src
                
                realImage.onload = () => {
                    // Lấy kích thước ảnh thật và gán cho ảnh placeholder
                    img.width = realImage.width;
                };
            }
    
            // Quan sát từng ảnh với IntersectionObserver
            observer.observe(img);
        });
    }
    lazy__image();
    
    if(document.querySelector('.header__form-input')){
        let debounceTimer;
        let input = document.querySelector('.header__form-input');
        const header__form__result = document.querySelector(".header__form-result");
        
        input.addEventListener("input", (e) => {
            if (e.target.value.trim().length > 0) {
                clearTimeout(debounceTimer);

                header__form__result.innerHTML = `
                    <a>
                        <div class="item">
                            <div style="background-color:#223b65;width:80px;height:40px;border-radius:5px"></div>
                            <p style="width:100%;height:100%;"><span style="background-color:#223b65;width:100%;height:10px;border-radius:5px"> </span><span style="background-color:#223b65;width:60%;height:10px;border-radius:5px"> </span></p>
                        </div>
                    </a>
                `;
                header__form__result.style.display = "flex";

                debounceTimer = setTimeout(() => {
                    fetchMovies(e.target.value);
                }, 300);
            }else{
                header__form__result.innerHTML = "";
                header__form__result.style.display = "none";
            }
        });
        function fetchMovies(value) {
            fetch(`/search/ajax/${value}`,{
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    header__form__result.innerHTML = "";
                    header__form__result.style.display = "flex";
                    if(data.movies.length > 0){
                        data.movies.forEach(movie => {
                            let template = `
                                <a href="/movie/${movie.id}">
                                    <div class="item">
                                        <img src="/${movie.thumbnail}" alt="">
                                        <p>${movie.title}<span>${movie.release_year}</span></p>
                                    </div>
                                </a>
                            `
                            header__form__result.innerHTML += template;
                            lazy__image();
                        })
                    }else{
                        header__form__result.innerText = "Không có dữ liệu!";
                    }
                }
            })
            .catch(error => {
                console.error(error);
            });
        }
    }
    //Category and notification nav
    if(document.querySelector(".header__nav-menu-category")){
        const header__nav_link_notification = document.querySelector(".header__nav-link--notification");
        header__nav_link_notification.addEventListener('click',()=>{
            if(header__nav_link_notification.classList.contains("dot")){
                fetch(`/notification/update/status`,{
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .catch(error => {
                    console.error(error);
                });
                header__nav_link_notification.classList.remove("dot")
            }
        })
        nav__ajax();
        setInterval(()=>{
            nav__ajax()
        },10000)
    }
    function nav__ajax() {
        const header__nav_menu_category = document.querySelector(".header__nav-menu-category");
        const header__nav_menu_notification = document.querySelector(".header__nav-menu-notification");
        const header__nav_link_notification = document.querySelector(".header__nav-link--notification");
        fetch(`/nav/ajax`,{
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                header__nav_menu_notification.innerHTML = "";
                header__nav_menu_category.innerHTML = "";
                data.categories.forEach(category => {
                    const categoryItem = `
                            <li>
                                <a href="/category/${category.id}">${category.name}</a>
                            </li>
                    ` 
                    header__nav_menu_category.innerHTML += categoryItem; 
                })
                if(data.isLogin){
                    if(data.notifications.length > 0){
                        data.notifications.forEach(notification => {
                            const notificationItem = `${notification.id_movie ? `
                                        <a href="/movie/${notification.id_movie}">
                                            ${notification.content}
                                            <p>
                                                ${(notification.id_send_user) ? notification.send_user.name : "Hệ Thống"}
                                                <span>${new Date(notification.created_at).toLocaleString('vi-VN')}</span>
                                            </p>
                                        </a>
                                    ` : `
                                        <li>
                                            ${notification.content}
                                            <p>
                                                ${(notification.id_send_user) ? notification.send_user.name : "Hệ Thống"}
                                                <span>${new Date(notification.created_at).toLocaleString('vi-VN')}</span>
                                            </p>
                                        </li>
                                    `}`;
                            header__nav_menu_notification.innerHTML += notificationItem; 
                        })
                    }else{
                        const notificationItem = `
                            <li>
                                Không có dữ liệu!
                            </li>
                        ` 
                        header__nav_menu_notification.innerHTML = notificationItem; 
                    }
                
                    if(data.isCheck){
                        header__nav_link_notification.classList.add("dot");
                    }
                }else{
                    header__nav_link_notification.classList.add("isLogin__false");
                }
            }
        })
        .catch(error => {
            console.error(error);
        });
    }
    
    if(document.querySelector('.change__server__btn')){
        let change__server__btn = document.querySelectorAll('.change__server__btn');
        change__server__btn.forEach((e)=>{
            e.addEventListener('click',()=>{
                let server = e.getAttribute("server");
                let currentUrl = new URL(window.location.href);
    
                if (server !== 'server 1') {
                    currentUrl.searchParams.set('server', server);
                    window.location.href = currentUrl.toString();
                } else {
                    currentUrl.searchParams.delete('server');
                    window.location.href = currentUrl.toString();
                }
            })
        })
    }
    
    if(document.querySelector('.watch__later__button') != null){
        const watch__later__button = document.querySelectorAll('.watch__later__button');
        watch__later__button.forEach((button) => {
            button.addEventListener('click', () => {
                let id = button.getAttribute('id_movie');

                if(button.classList.contains('active')){
                    button.classList.remove('active');
                    button.disabled = true;
                    button.title = "Thêm vào danh sách xem sau";
                }else{
                    button.classList.add('active')
                    button.disabled = true;
                    button.title = "Xoá khỏi xem sau";
                }
                
                fetch(`/movie/watch_later/${id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        button.disabled = false;
                    }
                })
                .catch(error => {
                    console.error(error);
                });
            });
        })
    }
    
    if (document.querySelector('#copy__url')) {
        if(document.querySelector('#information__movie').getAttribute("user__premium") == "true"){
            let plyrSettings = localStorage.getItem('plyr');
            if(plyrSettings){
                plyrSettings = JSON.parse(plyrSettings);
                plyrSettings.quality = 2160;
            }else{
                plyrSettings = { quality: 2160 };
            }
            localStorage.setItem('plyr', JSON.stringify(plyrSettings));
        }
    
        const copy__url__button = document.querySelector('#copy__url');
        copy__url__button.addEventListener('click',(e)=>{
            navigator.clipboard.writeText(window.location.href)
            .then(() => {
                copy__url__button.innerHTML = "";
                copy__url__button.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m438-240 226-226-58-58-169 169-84-84-57 57 142 142ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z"/></svg>
                Đã sao chép vô Clipboard!
                `;
            })
            .catch(error => {
                console.error("Lỗi khi sao chép URL: ", error);
            });
        })
    }
    
    if(document.querySelector('#like__button') != null){
        const like__button = document.querySelector('#like__button');
        like__button.addEventListener('click', () => {

            let id = document.querySelector("#information__movie").getAttribute('id_movie');

            if(like__button.classList.contains('active')){
                like__button.classList.remove('active');
                like__button.disabled = true;
                document.querySelector("#likes").innerHTML = Number(document.querySelector("#likes").textContent) - 1;
            }else{
                like__button.classList.add('active')
                like__button.disabled = true;
                document.querySelector("#likes").innerHTML = Number(document.querySelector("#likes").textContent) + 1;
            }
            fetch(`/movie/like/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    like__button.disabled = false;
                }
            })
            .catch(error => {
                console.error(error);
            });
        });
    }
    
    if(document.querySelector('#watch__later__button') != null){
        const watch__later__button = document.querySelector('#watch__later__button');
        watch__later__button.addEventListener('click', () => {
    
            let id = document.querySelector("#information__movie").getAttribute('id_movie');

            if(watch__later__button.classList.contains('active')){
                watch__later__button.classList.remove('active');
                watch__later__button.disabled = true;
                document.querySelector("#watch__later__text").innerText = "Xem sau";
            }else{
                watch__later__button.classList.add('active')
                watch__later__button.disabled = true;
                document.querySelector("#watch__later__text").innerText = "Đã thêm xem sau";
            }

            fetch(`/movie/watch_later/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
    
                    if(data.check > 0){
                        watch__later__button.className = "";
                        watch__later__button.title = "Thêm vào danh sách xem sau";
                        document.querySelector("#watch__later__text").innerText = "Xem sau";
                    }else{
                        watch__later__button.className = "active";
                        watch__later__button.title = "Xoá khỏi xem sau";
                        document.querySelector("#watch__later__text").innerText = "Đã thêm xem sau";
                    }
    
                    watch__later__button.disabled = false;
                }
            })
            .catch(error => {
                console.error(error);
            });
        });
    }
    
    if (document.querySelector('#modal-delete')) {
        let id_remove = null;
        let type_remove = null;
    
        document.addEventListener('click', (event) => {
            let button = event.target.closest('.remove__btn');
            if (button) {
                id_remove = button.getAttribute('id_remove');
                type_remove = button.getAttribute('type_remove');
            }
        });
    
        function remove() {
            if (!id_remove || !type_remove) return;

            let item = document.querySelector(`.item__remove[id_remove="${id_remove}"][type_remove="${type_remove}"]`);

            setTimeout(() => {
                if (type_remove === "comment" && item.nextElementSibling) {
                    item.nextElementSibling.remove();
                }
                item.remove();
            }, 500);
    
            fetch(`/${type_remove}/remove/${id_remove}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    let item = document.querySelector(`.item__remove[id_remove="${id_remove}"][type_remove="${type_remove}"]`);
                    
                    if (item) {
                        if (type_remove === "comment" && item.nextElementSibling) {
                            item.nextElementSibling.remove();                    
                        }
                        item.remove();
                        comment__count();                    
                    }
    
                }
            })
            .catch(error => {
                console.error("Lỗi khi xóa:", error);
            })
            .finally(() => {
                id_remove = null;
                type_remove = null;
            });
        }
    
        document.querySelector('#modal__remove__btn').addEventListener('click', remove);
    }
    
    if(document.querySelector('.views__movie')){
        let count = document.querySelector('.views__movie');
        let id_movie = document.querySelector('#information__movie').getAttribute("id_movie");
        setTimeout(()=>{
            fetch(`/movie/update-view/${id_movie}`,{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    count.innerText = Number(count.textContent) + 1;
                }
            })
            .catch(error => {
                console.error(error);
            });
        }, 10000)
    }
    
    if (document.querySelector(".comment__submit__btn")) {
        let comment__submit__btn = document.querySelector(".comment__submit__btn");
        let reply__comment__submit__btn = document.querySelector(".reply__comment__submit__btn");
        let comment__content = document.querySelector("#comment__content");
        let comment__error = document.querySelector("#comment__error");
        let comments__list = document.querySelector(".comments__list");
    
        comment__submit__btn.addEventListener("click",(button)=>{
            let id = button.target.getAttribute('id_movie');
    
            if(comment__content.value != ""){
                comment__error.style.display = "none";
                document.querySelector('#loader').style.display = 'flex';
           
                fetch(`/movie/${id}/comment/add`,{
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ comment__content: comment__content.value })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let template = `<li class="comments__item item__remove" id_remove="${data.comment.id}" type_remove="comment">
                                            <div class="comments__autor">
                                                <div>
                                                    <img
                                                        class="comments__avatar"
                                                        src="${data.user.image}"
                                                        alt=""
                                                    />
                                                    <span class="comments__name"
                                                        >${data.user.name}</span
                                                    >
                                                    <span class="comments__time"
                                                        >${data.comment.created_at}</span
                                                    >
                                                </div>
                                                <a href="#modal-delete" class="open-modal comments__delete__btn remove__btn"  id_remove="${data.comment.id}" type_remove="comment">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                                                </a>
                                            </div>
                                            <p class="comments__text">
                                                ${data.comment.content}
                                            </p>
                                            <div class="comments__actions">
                                                <span></span>
                                                <button type="button" class="reply__comment__btn" name_user=" ${data.user.name}" id_user=" ${data.user.id}" id_comment=" ${data.comment.id}">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="512"
                                                        height="512"
                                                        viewBox="0 0 512 512"
                                                    >
                                                        <polyline
                                                            points="400 160 464 224 400 288"
                                                            style="
                                                                fill: none;
                                                                stroke-linecap: round;
                                                                stroke-linejoin: round;
                                                                stroke-width: 32px;
                                                            "
                                                        />
                                                        <path
                                                            d="M448,224H154C95.24,224,48,273.33,48,332v20"
                                                            style="
                                                                fill: none;
                                                                stroke-linecap: round;
                                                                stroke-linejoin: round;
                                                                stroke-width: 32px;
                                                            "
                                                        /></svg
                                                    ><span>Trả Lời</span>
                                                </button>
                                            </div>
                                        </li>
                                        <div class="reply__comments__container"></div>`;
                        comments__list.insertAdjacentHTML('afterbegin', template);
                        let newComment = comments__list.querySelector('.comments__item');
                        newComment.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center',    
                            inline: 'nearest'      
                        });
                        comment__count();
                        comment__content.value = "";
                    }else{
                        console.log("Thêm bình luận không thành công");
                    }
                })
                .catch(error => {
                    console.error(error);
                })
                .finally(() => {
                    document.querySelector('#loader').style.display = 'none';
                });
    
            }else{
                comment__error.style.display = "block";
                comment__error.innerText = "Nội dung không được để trống!"
            }
        })
    
        let user__reply__btn = document.querySelector('.user__reply__btn');
        let user__reply = document.querySelector('.user__reply');
    
        comments__list.addEventListener('click', (event) => {
            let button = event.target.closest('.reply__comment__btn');
            if (button) {
                let item = button;
                if(!item.parentElement.parentElement.querySelector('.reply__form')){
                    if(document.querySelector('.reply__form')){
                        let reply__forms = document.querySelectorAll('.reply__form');
                        reply__forms.forEach(item => {
                            if(item.querySelector('.reply__comment__submit__btn').getAttribute('id__comment') != item.getAttribute('id_comment')){
                                item.remove();
                            }
                        })
                    }
    
                    let template = `
                        <div class="reply__form">
                            <input type="text" class="sign__input" id="reply__comment__content">
                            <button type="button" class="sign__btn reply__comment__submit__btn" id_movie="${comments__list.getAttribute('id_movie')}" id_user="${item.getAttribute('id_user')}" id__comment="${item.getAttribute('id_comment')}">
                                Trả lời
                            </button>
                        </div>
                        <span style="color: #df4a32; display:none" id="reply__comment__error"></span>
                    `
                    item.parentElement.previousElementSibling.insertAdjacentHTML('afterend',template);
                    document.querySelector('#reply__comment__content').focus();
                }else{
                    item.parentElement.parentElement.querySelector('.reply__form').remove();
                }
            }
            if (event.target.closest('.open-modal')) {
                $(event.target.closest('.open-modal')).magnificPopup({
                    type: 'inline',
                    mainClass: 'my-mfp-zoom-in',
                }).magnificPopup('open');
            }
        });
    
        user__reply__btn.addEventListener('click',()=>{
            user__reply__btn.style.display = "none"
            comment__submit__btn.style.display = "flex"
            reply__comment__submit__btn.style.display = "none"
        })
    
        comments__list.addEventListener('click', (event)=>{
            if(event.target && event.target.closest('.reply__comment__submit__btn')){
                let id = event.target.getAttribute('id_movie');
                let id__user__reply = event.target.getAttribute('id_user');
                let id__comment = event.target.getAttribute('id__comment');
                let reply__comment__error = document.querySelector('#reply__comment__error');
                let reply__comment__content = document.querySelector("#reply__comment__content");

                if(reply__comment__content.value != ""){
                    reply__comment__error.style.display = "none";
                    document.querySelector('#loader').style.display = 'flex';
        
                    fetch(`/movie/${id}/reply_comment/add`,{
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ 
                            id__user__reply: id__user__reply,
                            id__comment: id__comment,
                            comment__content: reply__comment__content.value 
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            let commentParent = comments__list.querySelector(`.reply__comment__btn[id_comment="${id__comment}"]`).closest('.comments__item');
                            let replyContainer = commentParent.nextElementSibling;
                            let template = `  <li
                                                class="comments__item comments__item--answer item__remove"
                                                id_remove="${data.reply_comment.id}" type_remove="reply_comment"
                                                >
                                                <div class="comments__autor">
                                                    <div>
                                                        <img
                                                            class="comments__avatar"
                                                            src="${data.user.image}"
                                                            alt=""
                                                        />
                                                        <span class="comments__name"
                                                            >${data.user.name}</span
                                                        >
                                                        <span class="comments__time"
                                                            >${data.reply_comment.created_at}</span
                                                        >
                                                    </div>
                                                    <a href="#modal-delete" class="open-modal comments__delete__btn remove__btn"  id_remove="${data.reply_comment.id}" type_remove="reply_comment">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                                                    </a>
                                                </div>
                                                <p class="comments__text">
                                                    <span>@${data.name_user}</span>
                                                    ${data.reply_comment.content}
                                                </p>
                                                <div class="comments__actions">
                                                    <span></span>
                                                    <button type="button" class="reply__comment__btn" name_user="${data.user.name}" id_user="${data.user.id}" id_comment="${id__comment}">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="512"
                                                            height="512"
                                                            viewBox="0 0 512 512"
                                                        >
                                                            <polyline
                                                                points="400 160 464 224 400 288"
                                                                style="
                                                                    fill: none;
                                                                    stroke-linecap: round;
                                                                    stroke-linejoin: round;
                                                                    stroke-width: 32px;
                                                                "
                                                            />
                                                            <path
                                                                d="M448,224H154C95.24,224,48,273.33,48,332v20"
                                                                style="
                                                                    fill: none;
                                                                    stroke-linecap: round;
                                                                    stroke-linejoin: round;
                                                                    stroke-width: 32px;
                                                                "
                                                            /></svg
                                                        ><span>Trả Lời</span>
                                                    </button>
                                                </div>
                                            </li>`
                            replyContainer.insertAdjacentHTML('beforeend', template);
                            if(replyContainer.querySelector('.hide__reply__comments')) replyContainer.querySelector('.hide__reply__comments').remove();
                            let newReplyComment = replyContainer.lastElementChild;
                            const hide__template = `
                                <p class="hide__reply__comments"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="15px"><path d="m177-120-57-57 184-183H200v-80h240v240h-80v-104L177-120Zm343-400v-240h80v104l183-184 57 57-184 183h104v80H520Z"/></svg>
                                    Ẩn bình luận trả lời
                                </p>
                            `;
                            replyContainer.insertAdjacentHTML("beforeend",hide__template);
                            newReplyComment.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center',
                                inline: 'nearest'
                            });
                            reply__comment__content.value = "";
                            document.querySelector('.reply__form').remove();
                            reply__comment__error.remove();
                            comment__count();
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    })
                    .finally(() => {
                        document.querySelector('#loader').style.display = 'none';
                    });
        
                }else{
                    reply__comment__error.style.display = "block";
                    reply__comment__error.innerText = "Nội dung không được để trống!"
                }
            }
           
        })
    }
    function comment__count() {
        let comment__count = document.querySelector(".comment__count");
        let id = comment__count.getAttribute("id_movie");
        fetch(`/movie/comments_count/${id}`,{
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                comment__count.innerText = data.comments_count
            }
        })
        .catch(error => {
            console.error(error);
        });
    }
    
    // function movie__ajax(id) {
    //     console.log("movie ajax");
    //     const views = document.querySelector('.views__movie');
    //     fetch(`/movie/ajax/${id}`,{
    //         method: 'GET',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    //         }
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         if (data.success) {
    //             document.querySelector('#likes').innerText = data.likes;
    //             views.innerText = data.views;
    //         }
    //     })
    //     .catch(error => {
    //         console.error(error);
    //     });
    // }
    
    // if(document.querySelector(".comments__list")){
    //     setInterval(()=>{
    //         let id = document.querySelector(".comments__list").getAttribute('id_movie');
    //         movie__ajax(id);
    //         console.log("interval");
    //     },2000)
    // }
    
    let currentPage = 1; // Trang hiện tại
    const perPage = 5; // Số lượng bình luận mỗi trang
    let isLoading = false; // Biến để kiểm soát việc gọi API
    
    function lazy__load__comments(id) {
        const comments__list = document.querySelector(".comments__list");
        
        fetch(`/movie/comments/lazy_load/${id}?page=${currentPage}&per_page=${perPage}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                data.comments.data.forEach(comment => {
                    const isOwner = data.user_id === comment.user.id; 
                    const commentItem = `
                        <li class="comments__item item__remove" id_remove="${comment.id}" type_remove="comment">
                            <div class="comments__autor">
                                <div>
                                    <img class="comments__avatar" src="${comment.user.image}" alt="" />
                                    <span class="comments__name">
                                        ${comment.user.name}
                                        ${comment.user.premium ? `
                                            <svg class="svg__premium" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffe600">
                                                <path d="m387-412 35-114-92-74h114l36-112 36 112h114l-93 74 35 114-92-71-93 71ZM240-40v-309q-38-42-59-96t-21-115q0-134 93-227t227-93q134 0 227 93t93 227q0 61-21 115t-59 96v309l-240-80-240 80Zm240-280q100 0 170-70t70-170q0-100-70-170t-170-70q-100 0-170 70t-70 170q0 100 70 170t170 70ZM320-159l160-41 160 41v-124q-35 20-75.5 31.5T480-240q-44 0-84.5-11.5T320-283v124Zm160-62Z"/>
                                            </svg>
                                        `  : ""}
                                    </span>
                                    <span class="comments__time">${comment.created_at}</span>
                                </div>
                                ${data.user_login && isOwner ? `
                                    <a href="#modal-delete" class="open-modal comments__delete__btn remove__btn" id_remove="${comment.id}" type_remove="comment">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                            <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                                        </svg>
                                    </a>
                                ` : ""}
                            </div>
                            <p class="comments__text">${comment.content}</p>
                            <div class="comments__actions">
                                <span class="show__reply__comments">
                                ${ comment.reply_comments.length > 0 ?
                                    `<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="30px"><path d="M400-280v-400l200 200-200 200Z"/></svg>
                                    Hiển thị các bình luận trả lời
                                ` : ""}
                                </span>
                                <button type="button" class="reply__comment__btn" name_user="${comment.user.name}" id_user="${comment.user.id}" id_comment="${comment.id}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
                                        <polyline points="400 160 464 224 400 288" style="fill: none; stroke-linecap: round; stroke-linejoin: round; stroke-width: 32px;" />
                                        <path d="M448,224H154C95.24,224,48,273.33,48,332v20" style="fill: none; stroke-linecap: round; stroke-linejoin: round; stroke-width: 32px;" />
                                    </svg>
                                    <span>Trả Lời</span>
                                </button>
                            </div>
                        </li>
                        <div class="reply__comments__container">
                        </div>
                    `;
                    comments__list.innerHTML += commentItem; // Thêm bình luận vào cuối danh sách
                });
                currentPage++; // Tăng trang sau khi load xong
                isLoading = false;
            }
        })
        .catch(error => {
            console.error(error);
        });
    }
    
    const commentContainer = document.querySelector(".comments__list");
    // Tạo Observer để kiểm tra phần tử `comments__form`
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !isLoading) {
            isLoading = true; // Ngăn tải lặp lại
            if (commentContainer) {
                const id = commentContainer.getAttribute("id_movie"); // Lấy ID từ container
                lazy__load__comments(id);
            }
        }
    });
    
    // Theo dõi `comments__form`
    const commentsForm = document.querySelector(".comments__observer");
    if (commentsForm) {
        observer.observe(commentsForm);
    }
    
    if (commentContainer) {
        commentContainer.addEventListener("click",(e)=>{
            if(e.target && e.target.closest(".show__reply__comments")){
                let item = e.target.closest(".comments__item ");
                let reply__comments__container = item.nextElementSibling;
                let show__button = item.querySelector(".show__reply__comments");
                let id = item.getAttribute("id_remove");

                reply__comments__container.innerHTML = `
                    <li class="comments__item comments__item--answer">
                        <div class="comments__autor">
                            <div>
                                <div class="comments__avatar" style="background-color:#223b65;width:40px;height:40px;border-radius:50%"> </div>
                                <span class="comments__name" style="background-color:#223b65;width:50px;height:20px;border-radius:5px">
                                </span>
                                <span class="comments__time"></span>
                            </div>
                        </div>
                        <p class="comments__text">&nbsp;</p>
                        <div class="comments__actions">
                            <span class="show__reply__comments"></span>
                            <button style="background-color:#223b65;width:30px;height:20px;border-radius:5px"></button>
                        </div>
                    </li>
                `

                fetch(`/comment/show__reply/${id}`,{
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        reply__comments__container.innerHTML = "";
                        data.reply_comments.forEach(reply => {
                            const replyCommentItem = `
                                <li class="comments__item comments__item--answer item__remove" id_remove="${reply.id}" type_remove="reply_comment">
                                    <div class="comments__autor">
                                        <div>
                                            <span class="comments__name">
                                                ${reply.user.name}
                                                ${reply.user.premium ? `
                                                    <svg class="svg__premium" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffe600">
                                                        <path d="m387-412 35-114-92-74h114l36-112 36 112h114l-93 74 35 114-92-71-93 71ZM240-40v-309q-38-42-59-96t-21-115q0-134 93-227t227-93q134 0 227 93t93 227q0 61-21 115t-59 96v309l-240-80-240 80Zm240-280q100 0 170-70t70-170q0-100-70-170t-170-70q-100 0-170 70t-70 170q0 100 70 170t170 70ZM320-159l160-41 160 41v-124q-35 20-75.5 31.5T480-240q-44 0-84.5-11.5T320-283v124Zm160-62Z"/>
                                                    </svg>
                                                `  : ""}
                                            </span>
                                            <img class="comments__avatar" src="${reply.user.image}" alt="" />
                                            <span class="comments__time">${reply.created_at}</span>
                                        </div>
                                        ${data.user_login && data.user_id === reply.user.id ? `
                                            <a href="#modal-delete" class="open-modal comments__delete__btn remove__btn" id_remove="${reply.id}" type_remove="reply_comment">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                                    <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                                                </svg>
                                            </a>
                                        ` : ""}
                                    </div>
                                    <p class="comments__text">
                                        <span ${reply.user_reply.premium ? `class="comments__text--premium"`:""}>
                                            @${reply.user_reply.name}
                                        </span> 
                                        ${reply.content}
                                    </p>
                                    <div class="comments__actions">
                                        <span class="show__reply__comments"></span>
                                        <button type="button" class="reply__comment__btn" name_user="${reply.user.name}" id_user="${reply.user.id}" id_comment="${id}">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="512"
                                                height="512"
                                                viewBox="0 0 512 512"
                                            >
                                                <polyline
                                                    points="400 160 464 224 400 288"
                                                    style="
                                                        fill: none;
                                                        stroke-linecap: round;
                                                        stroke-linejoin: round;
                                                        stroke-width: 32px;
                                                    "
                                                />
                                                <path
                                                    d="M448,224H154C95.24,224,48,273.33,48,332v20"
                                                    style="
                                                        fill: none;
                                                        stroke-linecap: round;
                                                        stroke-linejoin: round;
                                                        stroke-width: 32px;
                                                    "
                                                /></svg
                                            ><span>Trả Lời</span>
                                        </button>
                                    </div>
                                </li>     
                            `;
                            reply__comments__container.innerHTML += replyCommentItem;
                        })
                        const hide__template = `
                            <p class="hide__reply__comments"> 
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="15px"><path d="m177-120-57-57 184-183H200v-80h240v240h-80v-104L177-120Zm343-400v-240h80v104l183-184 57 57-184 183h104v80H520Z"/></svg>
                                Ẩn bình luận trả lời
                            </p>
                        `;
                        reply__comments__container.insertAdjacentHTML("beforeend",hide__template);
                    }
                })
                .catch(error => {
                    console.error(error);
                });
              
                show__button.innerHTML = "";
            }
    
            if(e.target && e.target.closest(".hide__reply__comments")){
                let item = e.target.closest(".hide__reply__comments ").parentElement.previousElementSibling ;
                let reply__comments__container = e.target.closest(".hide__reply__comments").parentElement;
                let show__button = item.querySelector(".show__reply__comments");
                // let reply__comments__container = item.nextElementSibling;
    
                reply__comments__container.innerHTML = "";
                const template = `
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="30px"><path d="M400-280v-400l200 200-200 200Z"/></svg>
                    Hiển thị các bình luận trả lời
                `
                show__button.insertAdjacentHTML("afterbegin",template);
                item.scrollIntoView();
            }
        })
    }
    
    if(document.querySelector(".payment__information")){
        const subscription__item = document.querySelectorAll(".subscription__item");
        const subscription__item__radio = document.querySelectorAll(".subscription__item--radio");
        const subscription__duration = document.querySelector(".subscription__duration");
        const subscription__price = document.querySelector(".subscription__price");
        const subscription__name = document.querySelector(".subscription__name");
        const subscription__total = document.querySelector(".subscription__total");
    
        subscription__item.forEach((e, index)=>{
            e.addEventListener("click",()=>{
                subscription__item__radio[index].checked = true;
                subscription__duration.innerText = subscription__item__radio[index].getAttribute("duration") + " Ngày";
                subscription__price.innerText = Number(subscription__item__radio[index].getAttribute("price")).toLocaleString('vi-VN') + " VND";
                subscription__name.innerText = subscription__item__radio[index].getAttribute("subscription__name");
                subscription__total.innerText = Number(subscription__item__radio[index].getAttribute("price")).toLocaleString('vi-VN') + " VND";
            })
        })
    }
    
    if(document.querySelector('.filter__genres')){
        const filter__search = document.querySelector('.filter__search').value;
        const filter__genres = document.querySelector('.filter__genres');
        const filter__years = document.querySelector('.filter__years');
        const grades = document.querySelectorAll("input[name=grade]");
    
        $('.filter__genres').select2({
            minimumResultsForSearch: Infinity
        });
        $('.filter__years').select2({
            minimumResultsForSearch: Infinity
        });

        // Gắn sự kiện change cho Select2
        $('.filter__genres').on("change", function () {
            filter(filter__search, this, document.querySelector('.filter__years'), document.querySelectorAll("input[name=grade]:checked"));
        });
       // Gắn sự kiện change cho filter__years
        $('.filter__years').on("change", function () {
            filter(filter__search, document.querySelector('.filter__genres'), this, document.querySelectorAll("input[name=grade]:checked"));
        });

        // Gắn sự kiện click cho grades
        grades.forEach(grade => {
            grade.addEventListener("click", () => {
                filter(filter__search, filter__genres, filter__years, grade);
            });
        });
        function filter(filter__search, filter__genres, filter__years, grade) {
           
            const filter__container = document.querySelector('.filter__container');

            filter__container.innerHTML = `
                                    <div class="col-6 col-sm-4 col-lg-3 col-xl-3">
                                        <div class="card">
                                            <div class="card__cover" style="background-color:#151f30;width:100%;height:170px;border-radius:5px">
                                            </div>
                                            <h3 class="card__title" style="background-color:#151f30;width:100%;height:20px;border-radius:5px">
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-lg-3 col-xl-3">
                                        <div class="card">
                                            <div class="card__cover" style="background-color:#151f30;width:100%;height:170px;border-radius:5px">
                                            </div>
                                            <h3 class="card__title" style="background-color:#151f30;width:100%;height:20px;border-radius:5px">
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-lg-3 col-xl-3">
                                        <div class="card">
                                            <div class="card__cover" style="background-color:#151f30;width:100%;height:170px;border-radius:5px">
                                            </div>
                                            <h3 class="card__title" style="background-color:#151f30;width:100%;height:20px;border-radius:5px">
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-lg-3 col-xl-3">
                                        <div class="card">
                                            <div class="card__cover" style="background-color:#151f30;width:100%;height:170px;border-radius:5px">
                                            </div>
                                            <h3 class="card__title" style="background-color:#151f30;width:100%;height:20px;border-radius:5px">
                                            </h3>
                                        </div>
                                    </div>
            `
            

            fetch(`/movie/filter/ajax?filter__genres=${filter__genres.value}&filter__years=${filter__years.value}&grade=${grade.value}&search=${filter__search}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    filter__container.innerHTML = "";
                    if(data.movies.length > 0){
                        data.movies.forEach((movie)=>{
                            let template = `
                                    <div class="col-6 col-sm-4 col-lg-3 col-xl-3">
                                        <div class="card">
                                            <a href="/movie/${movie.id}" class="card__cover">
                                                <img src="${movie.thumbnail}" alt="" />
                                                <svg
                                                    width="22"
                                                    height="22"
                                                    viewBox="0 0 22 22"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>
                                            </a>
                                            <h3 class="card__title">
                                                <a href="/movie/${movie.id}" >${movie.title}</a>
                                            </h3>
                                            <ul class="card__list">
                                            <li>${movie.category.name}</li>
                                                <li>${movie.release_year}</li>
                                            </ul>
                                        </div>
                                    </div>
                            `
                            filter__container.innerHTML += template;
                            lazy__image();
                        })
                    }else{
                        filter__container.innerHTML = `<p style="text-align:center;color:#ffffff;margin:30px 0 0;width:100%">Không có dữ liệu!</p>`
                    }
                }
            })
            .catch(error => {
                console.error(error);
            });
        }
    }
});
   
window.addEventListener("DOMContentLoaded",()=>{
    fetch(`/check/payment`,{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.reload();
        }
    })
    .catch(error => {
        console.error(error);
    });
})

if(document.querySelector('.nav__direction')){
    const nav__direction = document.querySelectorAll('.nav__direction');
    nav__direction.forEach((e, index) => {
        e.addEventListener('click',()=>{
            sessionStorage.setItem('nav__direction',index);
        })
    })
    if(sessionStorage.getItem('nav__direction')){
        nav__direction[sessionStorage.getItem('nav__direction')].click();
    }
}else{
    if(sessionStorage.getItem('nav__direction')){
        sessionStorage.removeItem('nav__direction');
    }
}
if(document.querySelector('.show__pay__history')){
    const show__pay__history = document.querySelectorAll('.show__pay__history');
    show__pay__history.forEach(e => {
        e.addEventListener('click',()=>{
            let id = e.getAttribute('id__subscription');

            document.body.insertAdjacentHTML('beforeend', `
                    <div class="pay__history">
                        <div class="container">
                            <h2>Thông tin thanh toán</h2>
                            <table class="main__table">
                                <thead>
                                    <tr>
                                        <th>NGÀY MUA</th>
                                        <th>GIÁ GÓI</th>
                                        <th>PHƯƠNG THỨC</th>
                                        <th>MÃ GIAO DỊCH</th>
                                        <th>MÃ ĐƠN HÀNG</th>
                                    </tr>
                                </thead>
                                </tbody>
                                    <td>Đang tải...</td>
                                    <td>Đang tải...</td>
                                    <td>Đang tải...</td>
                                    <td>Đang tải...</td>
                                    <td>Đang tải...</td>
                                </tbody>
                            </table>
                        </div>
                    </div>
            `)

            fetch(`/show/pay__history/${id}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector('.pay__history').remove();
                    document.body.insertAdjacentHTML('beforeend', `
                            <div class="pay__history">
                                <div class="container">
                                    <h2>Thông tin thanh toán</h2>
                                    <table class="main__table">
                                        <thead>
                                            <tr>
                                                <th>NGÀY MUA</th>
                                                <th>GIÁ GÓI</th>
                                                <th>PHƯƠNG THỨC</th>
                                                <th>MÃ GIAO DỊCH</th>
                                            <th>MÃ ĐƠN HÀNG</th>
                                            </tr>
                                        </thead>
                                        </tbody>
                                            ${data.payments.map(payment => `
                                                <tr>
                                                    <td>
                                                        <div class="main__table-text">
                                                            ${payment.date}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="main__table-text">
                                                            ${Number(payment.amount).toLocaleString('vi-VN')} VND
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="main__table-text">
                                                            ${payment.method}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="main__table-text">
                                                            ${payment.transactionID}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="main__table-text">
                                                            ${payment.order_ref}
                                                        </div>
                                                    </td>
                                                </tr>
                                            `).join('')}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    `)
                }
            })
            .catch(error => {
                console.error(error);
            });
        })
    })
}

document.addEventListener('click',(e)=>{
    if(e.target.closest('.pay__history') && !e.target.closest('.container')){
        e.target.closest('.pay__history').remove();
    }
})

window.addEventListener('load',()=>{
    document.querySelector('#loader').style.display = "none";
})

if(document.querySelector('form.sign__form') != null){
    document.querySelector('form.sign__form').addEventListener('submit', function() {
        document.querySelector('#loader').style.display = 'flex';
    });
}