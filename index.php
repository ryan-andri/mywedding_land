<?php
require_once('configs/config.php');

// guest name
$nama_undangan = !empty($_GET["undangan"]) ? htmlspecialchars($_GET["undangan"]) : null;
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rochester" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Laila" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- css animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Main style -->
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light border-top navbar-expand fixed-bottom d-none" id="navbot">
        <ul class="navbar-nav nav-justified w-100">
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link active" id="home">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link" id="time">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link" id="ctrl-music">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pause-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M5 6.25a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5zm3.5 0a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5z" />
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link" id="gift">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                        <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link" id="comments">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                        <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </a>
            </li>
        </ul>
    </nav>

    <div class="min-vh-100 d-flex flex-column d-none" id="loading">
        <div class="flex-grow-1 d-flex align-items-center justify-content-center">
            <div class="spinner-grow" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div id="content">
        <!-- content -->
    </div>

    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- map -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Index -->
    <script type="text/javascript">
        // get id Navbar
        var navbar = document.getElementById("navbot");
        // show loading first
        loadLoading(true);
        // Main
        let screen = window.matchMedia("screen and (max-width: 780px) and (orientation: portrait)").matches;
        if (screen) {
            // audio
            var audioCtx = new(window.AudioContext || window.webkitAudioContext)();
            var source = audioCtx.createBufferSource();
            window.addEventListener('load', () => {
                let xhr = new XMLHttpRequest();
                xhr.open('GET', 'assets/music/music.mp3');
                xhr.responseType = 'arraybuffer';
                xhr.timeout = 20000; // 20 Seconds timeout, detect slow connection!
                xhr.ontimeout = () => {
                    Swal.fire({
                        text: 'Koneksi anda terlalu lambat',
                        icon: 'error',
                        allowOutsideClick: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        backdrop: '#ffffff',
                        background: '#ffffff',
                        confirmButtonText: 'Muat Ulang'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    })
                }
                xhr.onreadystatechange = () => {
                    if (xhr.readyState == XMLHttpRequest.DONE) {
                        mainContent();
                    }
                }
                xhr.addEventListener('load', () => {
                    audioCtx.decodeAudioData(xhr.response).then((audioBuffer) => {
                        source.buffer = audioBuffer;
                        source.loop = true;
                        source.connect(audioCtx.destination);
                    });
                });
                xhr.send();
            }, false);
        } else {
            // hide navbar
            showNavbar(false);
            // kill loading
            loadLoading(false);
            // contents non-responsive
            const content = document.getElementById("content");
            let main = document.createElement("div");
            main.classList.add("min-vh-100", "d-flex", "flex-column");
            let sec = document.createElement("div");
            sec.classList.add("flex-grow-1", "d-flex", "align-items-center", "justify-content-center", "text-center", "p-2");
            main.appendChild(sec);
            let letter = document.createElement("p");
            letter.innerHTML = "<strong>Buka dengan Smartphone anda untuk melihat full undangan atau Ubah orientasi layar Smartphone anda ke orientasi Portrait.</strong>";
            sec.appendChild(letter);
            content.append(main);
        }

        function ctlIcon(set) {
            const ctl = document.getElementById("ctrl-music");
            ctl.innerHTML = '';
            if (set) {
                // icon pause
                ctl.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pause-circle" viewBox="0 0 16 16">' +
                    '<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>' +
                    '<path d="M5 6.25a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5zm3.5 0a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5z"/>' +
                    '</svg>'
            } else {
                // icon play
                ctl.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-play-circle" viewBox="0 0 16 16">' +
                    '<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>' +
                    '<path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z"/>' +
                    '</svg>';
            }
        }

        function controlMusic() {
            if (audioCtx.state === "running") {
                audioCtx.suspend().then(() => {
                    ctlIcon(false);
                });
            } else if (audioCtx.state === "suspended") {
                audioCtx.resume().then(() => {
                    ctlIcon(true);
                });
            }
        }

        function loadLoading(set) {
            const loading = document.getElementById("loading");
            if (set) {
                loading.classList.remove("d-none");
            } else {
                loading.classList.add("d-none");
            }
        }

        function showNavbar(show) {
            if (show) {
                navbar.classList.remove("d-none");
            } else {
                navbar.classList.add("d-none");
            }
        }

        function showComments(res, _submit, stat) {
            // container
            const _comments = document.getElementById("comments-container");
            // avoid duplicate
            _comments.innerHTML = '';
            // show empty comments if unavailable
            if (!res['data']) {
                // create div first
                const _div = document.createElement("div");
                _div.classList.add("d-flex", "align-items-center", "justify-content-center", "mt-4");
                // append paragraph in created div
                const _p = document.createElement("p");
                _p.innerHTML = "Belum ada komentar!";
                _div.appendChild(_p);
                // append parent
                _comments.appendChild(_div);
                return;
            }
            // process data if available
            res['data'].forEach(element => {
                const _card = document.createElement("div");
                _card.classList.add("card", "border-dark", "m-2");

                const _cardBody = document.createElement("div");
                _cardBody.classList.add("ms-2", "me-2", "mt-2");
                _card.appendChild(_cardBody);

                // name
                const _title = document.createElement("div");
                _title.classList.add("float-start");
                _title.style = "font-size: 12px";
                _title.innerHTML = "<strong>" + element.nama + "</strong>";
                _cardBody.appendChild(_title);

                // presence
                const _presence = document.createElement("span");
                _presence.classList.add("float-end");
                _presence.style = "font-size: 12px";
                _presence.innerHTML = element.kehadiran;
                _title.parentNode.insertBefore(_presence, _title.nextSibling);

                // comments
                const _commentBox = document.createElement("div");
                _commentBox.classList.add("ms-2", "me-2", "mb-2");
                _commentBox.style = "font-size: 12px";
                _commentBox.innerHTML = element.komentar;
                _cardBody.parentNode.insertBefore(_commentBox, _cardBody.next)

                // append parent
                _comments.appendChild(_card);
            });

            if (_submit && (stat == 'success')) {
                document.getElementById("nama").value = '';
                document.getElementById("kehadiran").value = '';
                document.getElementById("komentar").value = '';
                Swal.fire({
                    text: "Terima Kasih telah berkomentar :)",
                    icon: 'success'
                });
            } else if (_submit && (stat == 'spam')) {
                document.getElementById("nama").value = '';
                document.getElementById("kehadiran").value = '';
                document.getElementById("komentar").value = '';
            }
        }

        async function loadComments(_submit, form) {
            // show load when submit
            if (_submit) {
                loadLoading(true);
            }
            // create POST
            let fd = new FormData();
            if (!form) {
                fd.append('nama', '');
                fd.append('kehadiran', '');
                fd.append('komentar', '');
            } else {
                fd.append('nama', form[0]);
                fd.append('kehadiran', form[1]);
                fd.append('komentar', form[2]);
            }

            await fetch('service.php', {
                body: fd,
                method: "POST"
            }).then(function(response) {
                return response.json();
            }).then(async function(data) {
                let res = await data;
                switch (res['result']) {
                    case 'spam':
                        if (_submit) {
                            Swal.fire({
                                text: "Spam detected, tunggu 30 menit setelah berkomentar!",
                                icon: 'info'
                            });
                        }
                        showComments(res, _submit, 'spam');
                        break;
                    case 'success':
                        showComments(res, _submit, 'success');
                        break;
                    case 'failed':
                        if (_submit) {
                            Swal.fire({
                                text: "Ada kesalahan, silahkan hubungi admin!",
                                icon: 'error'
                            });
                        }
                        showComments(res, _submit, 'failed');
                        break;
                    default:
                        break;
                }
                // kill loading
                if (_submit) {
                    loadLoading(false);
                }
            }).catch(function(e) {
                console.warn('Error!', e);
                // kill loading
                if (_submit) {
                    loadLoading(false);
                }
            });
        }

        // Preload Cover
        function preloadCover() {
            let img = new Image();
            img.src = 'assets/images/cover.jpg';
            return new Promise((done, fail) => {
                img.onload = () => {
                    done();
                }
                img.onerror = () => {
                    fail(new Error('Failed to load image ' + url));
                }
            });
        }

        async function fetchPages(opt) {
            document.getElementById("content").innerHTML = '';
            loadLoading(true);
            await fetch('pages/' + opt + '.html').then(function(response) {
                return response.text();
            }).then(async function(data) {
                // wait Cover
                await preloadCover();
                // wait data
                document.getElementById("content").innerHTML = await data;
                switch (opt) {
                    case 'home':
                        // create home content
                        const caption = document.getElementById("caption");
                        const tname = document.createElement("h1");
                        const tsec = document.createElement("h3");
                        tname.innerHTML = '<?php echo env('nick_wanita'); ?> & <?php echo env('nick_pria'); ?>';
                        tsec.innerHTML = 'We Are Getting Married';
                        caption.classList.add("animate__animated", "animate__slideInDown", "animate__fast");
                        caption.appendChild(tname);
                        caption.appendChild(tsec);
                        let _gname = '<?php echo $nama_undangan; ?>';
                        if (_gname) {
                            const gname = document.getElementById("gname");
                            const card = document.createElement("div");
                            card.classList.add("card", "card-guest");
                            card.classList.add("animate__animated", "animate__zoomIn", "animate__fast");
                            const _text = document.createElement("div");
                            _text.style = "font-size: 16px";
                            _text.innerHTML = _gname + '<br> dan <br> Keluarga';
                            // append child
                            card.appendChild(_text);
                            // append Parent
                            gname.appendChild(card);
                        }
                        break;
                    case 'time':
                        // bride
                        const bride = document.getElementById("bride");
                        bride.innerHTML = '<h4 class="text-beautify"><strong>' + '<?php echo env('nama_wanita'); ?>' + '</strong></h4>' +
                            '<h6>' + '<?php echo env('dt_wanita'); ?>' + '</h6>' +
                            '<h4 class="text-beautify"><strong>&</strong></h4>' +
                            '<h4 class="text-beautify"><strong>' + '<?php echo env('nama_pria'); ?>' + '</strong></h4>' +
                            '<h6>' + '<?php echo env('dt_pria'); ?>' + '</h6>';
                        // date time
                        const _date = document.getElementById("date-time");
                        _date.innerHTML = '<strong>' + '<?php echo env('tgl_akad'); ?>' + '</strong>';
                        // time akad/resepsi/address
                        const _akad = document.getElementById("time-akad");
                        _akad.innerHTML = '<?php echo env('waktu_akad'); ?>';
                        const _resepsi = document.getElementById("time-resepsi");
                        _resepsi.innerHTML = '<?php echo env('waktu_resepsi'); ?>';
                        const _address = document.getElementById("address");
                        let kediaman = document.createElement("p");
                        kediaman.innerHTML = '<strong>' + '<?php echo env('kediaman'); ?>' + '</strong>';
                        kediaman.classList.add("mb-0");
                        let alamat = document.createElement("p");
                        alamat.innerText = '<?php echo env('alamat_akad'); ?>';
                        alamat.classList.add("mb-0");
                        _address.append(kediaman, alamat);
                        // leaflet map
                        const location = [<?php echo env('lat'); ?>, <?php echo env('long'); ?>];
                        let map = L.map('lmap').setView(location, 16);
                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 22,
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        }).addTo(map);
                        L.marker(location).addTo(map);
                        // story
                        const stbox = document.getElementById("story-box");
                        stbox.innerHTML = '<?php echo env('story_box'); ?>';
                        break;
                    case 'gift':
                        const card_w = document.getElementById("card_wanita");
                        const an_w = document.getElementById("an_wanita");
                        card_w.value = '<?php echo env('card_wanita'); ?>';
                        card_w.innerText = '<?php echo env('card_wanita'); ?>';
                        an_w.innerText = 'a\/n ' + '<?php echo env('an_wanita'); ?>';
                        const card_p = document.getElementById("card_pria");
                        const an_p = document.getElementById("an_pria");
                        card_p.value = '<?php echo env('card_pria'); ?>';
                        card_p.innerText = '<?php echo env('card_pria'); ?>';
                        an_p.innerText = 'a\/n ' + '<?php echo env('an_pria'); ?>';
                        const add_gift = document.getElementById("addr_gift");
                        add_gift.value = '<?php echo env('alamat_akad'); ?>';
                        break;
                    case 'comments':
                        // load comments
                        await loadComments(false, null);
                        const f = document.getElementById("footer");
                        f.innerHTML = '<p>&copy; Ryan Andri ' + new Date().getFullYear() + '</p>';
                        break;
                    default:
                        break;
                }
                loadLoading(false);
            }).catch(function(e) {
                console.warn('Error!', e);
                loadLoading(false);
            });
        }

        async function sendData() {
            event.preventDefault();
            let nama = document.getElementById("nama").value;
            let kehadiran = document.getElementById("kehadiran").value;
            let komentar = document.getElementById("komentar").value;
            // No only Spaces
            if (nama.trim().length == 0) {
                Swal.fire({
                    text: "Kolom nama harap di isi.",
                    confirmButtonColor: '#ff8fa0'
                });
                return false;
            }
            // No only Spaces
            if (kehadiran.trim().length == 0) {
                Swal.fire({
                    text: "Kolom kehadiran harap di isi.",
                    confirmButtonColor: '#ff8fa0'
                });
                return false;
            }
            await loadComments(true, [nama, kehadiran, komentar]);
        }

        function c2cb(ids) {
            let input = document.getElementById(ids);
            let isiOSDevice = navigator.userAgent.match(/ipad|iphone/i);
            if (isiOSDevice) {
                let range = document.createRange();
                range.selectNodeContents(input);
                let selection = window.getSelection();
                selection.removeAllRanges();
                selection.addRange(range);
                input.setSelectionRange(0, 999999);
            } else {
                input.select();
            }
            document.execCommand('copy');
            Swal.fire({
                text: "Tersalin",
                confirmButtonColor: '#ff8fa0'
            });
        }

        function btnGmap() {
            window.open('<?php echo env('gmap'); ?>', '_blank');
        }
    </script>

    <!-- Bottom Navbar listener -->
    <script type="text/javascript">
        function confirmInvitation() {
            Swal.fire({
                html: '<p>Terima kasih telah menyempatkan waktunya yang berharga.</p>' +
                    '<p class ="text-beautify">~ <?php echo env('nick_wanita'); ?> & <?php echo env('nick_pria'); ?> ~</p>',
                icon: 'info',
                allowOutsideClick: false,
                showCancelButton: false,
                focusConfirm: false,
                backdrop: 'url(assets/images/bg.jpg)',
                background: '#00000000',
                confirmButtonColor: '#ff8fa0',
                confirmButtonText: 'Buka Undangan'
            }).then((result) => {
                if (result.isConfirmed) {
                    source.start();
                    ctlIcon(true);
                    fetchPages('home');
                }
            })
        }

        function animationListener() {
            let anim = document.querySelectorAll("#sanim");
            for (let i = 0; i < anim.length; i++) {
                let height = window.innerHeight;
                let top = anim[i].getBoundingClientRect().top;
                if (top <= height) {
                    anim[i].classList.add("animate__animated", "animate__flipInY", "animate__fast");
                } else {
                    anim[i].classList.remove("animate__animated", "animate__flipInY", "animate__fast");
                }
            }
        }

        function mainContent() {
            // kill loading
            loadLoading(false);
            // trigger sa
            confirmInvitation();
            // trigger navbar listner
            const nav = navbar.getElementsByClassName("nav-link");
            for (let i = 0; i < nav.length; i++) {
                nav[i].addEventListener("click", function() {
                    let current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }

            document.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', (e) => {
                    let page = link.id;
                    if (page != 'ctrl-music') {
                        fetchPages(page);
                    } else {
                        controlMusic();
                    }
                });
            });

            window.addEventListener("scroll", animationListener);

            // show navbar
            showNavbar(true);
        }

        // auto refresh when rotate screen
        window.onorientationchange = function() {
            var orientation = window.orientation;
            switch (orientation) {
                case 0:
                case 90:
                case -90:
                    window.location.reload();
                    break;
            }
        };
    </script>
</body>

</html>