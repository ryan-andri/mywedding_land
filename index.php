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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Outfit" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Main style -->
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light border-top navbar-expand fixed-bottom visible" id="navbot">
        <ul class="navbar-nav nav-justified w-100">
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link active" id="home">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link" id="time">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link" id="comments">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                        <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link" id="info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                    </svg>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Content -->
    <div id="content">
        <!-- content -->
    </div>

    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <!-- Bottom Navbar listener -->
    <script type="text/javascript">
        async function loadComments(_submit, form) {
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
            }).then(function(data) {
                const _comments = document.getElementById("comments-container");
                // avoid duplicate
                _comments.innerHTML = '';
                // proc the data
                if (data) {
                    data.forEach(element => {
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

                        // append to container
                        _comments.appendChild(_card);
                    });

                    if (_submit) {
                        document.getElementById("nama").value = '';
                        document.getElementById("kehadiran").value = '';
                        document.getElementById("komentar").value = '';
                        alert('Terima Kasih telah berkomentar :)');
                    }
                } else {
                    // create div first
                    const _div = document.createElement("div");
                    _div.classList.add("d-flex", "align-items-center", "justify-content-center", "mt-4");
                    // append paragraph in created div
                    const _p = document.createElement("p");
                    _p.innerHTML = "Belum ada komentar!";
                    _div.appendChild(_p);
                    // append all
                    _comments.appendChild(_div);
                }
            }).catch(function(e) {
                console.warn('Error!', e);
            });
        }

        async function fetchPages(opt) {
            await fetch('pages/' + opt + '.html').then(function(response) {
                return response.text();
            }).then(function(data) {

                document.getElementById("content").innerHTML = data;

                switch (opt) {
                    case 'home':
                        const caption = document.getElementById("caption");
                        const tname = document.createElement("h1");
                        const tsec = document.createElement("h3");

                        tname.innerHTML = '<?php echo env('nick_wanita'); ?> & <?php echo env('nick_pria'); ?>';
                        tsec.innerHTML = 'We Are Getting Married';
                        caption.appendChild(tname);
                        caption.appendChild(tsec);

                        let _gname = '<?php echo $nama_undangan ?>';
                        if (_gname) {
                            const gname = document.getElementById("gname");
                            const card = document.createElement("div");
                            card.innerHTML = _gname + '<br> dan <br> Keluarga';
                            card.classList.add("card", "card-guest");
                            gname.appendChild(card);
                        }
                        break;
                    case 'comments':
                        loadComments(false, null);
                        break;
                    default:
                        break;
                }
            }).catch(function(e) {
                console.warn('Error!', e);
            });
        }

        function sendData() {
            event.preventDefault();

            let nama = document.getElementById("nama").value;
            let kehadiran = document.getElementById("kehadiran").value;
            let komentar = document.getElementById("komentar").value;
            if (nama == '') {
                alert("Kolom nama harap di isi.");
                return false;
            }
            if (kehadiran == '') {
                alert("Kolom kehadiran harap di isi.");
                return false;
            }
            loadComments(true, [nama, kehadiran, komentar]);
        }

        fetchPages('home');
        document.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', (e) => {
                fetchPages(link.id)
            });
        });
    </script>

    <!-- Bottom Navbar listener -->
    <script type="text/javascript">
        let screen = window.matchMedia("(max-width: 780px)");
        if (screen) {
            let container = document.getElementById("navbot");
            let nav = container.getElementsByClassName("nav-link");
            for (let i = 0; i < nav.length; i++) {
                nav[i].addEventListener("click", function() {
                    let current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }
        }
    </script>
</body>

</html>