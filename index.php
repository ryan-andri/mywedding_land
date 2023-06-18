<?php
require_once('configs/config.php');

// guest name
$nama_undangan = !empty($_GET["undangan"]) ? $_GET["undangan"] : null;
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
                <a href="javascript:void(0)" class="nav-link" id="comments">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                        <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link" id="info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
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
                const _comments = document.getElementById("comments-container");
                // avoid duplicate
                _comments.innerHTML = '';
                // proc the data
                if (data['result']) {
                    data['data'].forEach(element => {
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

                        // presence
                        const _commentBox = document.createElement("div");
                        _commentBox.classList.add("ms-2", "me-2", "mb-2");
                        _commentBox.style = "font-size: 12px";
                        _commentBox.innerHTML = element.komentar;
                        _cardBody.parentNode.insertBefore(_commentBox, _cardBody.next)

                        // append parent
                        _comments.appendChild(_card);
                    });

                    if (_submit) {
                        document.getElementById("nama").value = '';
                        document.getElementById("kehadiran").value = '';
                        document.getElementById("komentar").value = '';
                        Swal.fire({
                            text: "Terima Kasih telah berkomentar :)"
                        });
                    }
                } else {
                    // create div first
                    const _div = document.createElement("div");
                    _div.classList.add("d-flex", "align-items-center", "justify-content-center", "mt-4");
                    // append paragraph in created div
                    const _p = document.createElement("p");
                    _p.innerHTML = "Belum ada komentar!";
                    _div.appendChild(_p);
                    // append parent
                    _comments.appendChild(_div);
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
                        // button gmap
                        const gmap = document.getElementById("btn-gmap");
                        let _a = document.createElement("a");
                        _a.innerText = 'Buka Google Map';
                        _a.href = '<?php echo env('gmap'); ?>';
                        _a.target = '_blank';
                        _a.classList.add("btn", "btn-primary", "form-control", "mt-2");
                        gmap.appendChild(_a);
                        // story
                        const stbox = document.getElementById("story-box");
                        stbox.innerHTML = '<?php echo env('story_box'); ?>';
                        break;
                    case 'comments':
                        await loadComments(false, null);
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
                    confirmButtonColor: '#ff8fa0',
                });
                return false;
            }
            // No only Spaces
            if (kehadiran.trim().length == 0) {
                Swal.fire({
                    text: "Kolom kehadiran harap di isi.",
                    confirmButtonColor: '#ff8fa0',
                });
                return false;
            }
            await loadComments(true, [nama, kehadiran, komentar]);
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
                    anim[i].classList.add("animate__animated", "animate__slideInLeft", "animate__fast");
                } else {
                    anim[i].classList.remove("animate__animated", "animate__slideInLeft", "animate__fast");
                }
            }
        }

        let screen = window.matchMedia("screen and (max-width: 780px) and (orientation: portrait)").matches;

        function mainContent() {
            // kill loading
            loadLoading(false);

            if (screen) {
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
        }

        if (!screen) {
            // hide navbar
            showNavbar(false);
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