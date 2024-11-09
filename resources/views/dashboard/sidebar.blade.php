<div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/home') ? 'active' : '' }}" href="{{ url('/dashboard/home') }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>shop </title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                    <g transform="translate(0.000000, 148.000000)">
                                        <path class="color-background opacity-6"
                                            d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                        </path>
                                        <path class="color-background"
                                            d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/berita') || request()->is('dashboard/addberita') || request()->is('dashboard/editberita/*') ? 'active' : '' }}" href="{{ url('/dashboard/berita') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>Berita</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                    <g id="office" transform="translate(153.000000, 2.000000)">
                                        <path class="color-background opacity-6"
                                            d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                        </path>
                                        <path class="color-background"
                                            d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Berita</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/kontak') ? 'active' : '' }}" href="{{ url('/dashboard/kontak') }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="17px" height="17px" id="fi_17620134" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m8.29 53.36v7.64c0 .55.45 1 1 1h20.45c.56 0 1-.45 1-1v-7.64c0-4.2-2.85-7.74-6.72-8.78 1.46-1.26 2.39-3.13 2.39-5.2 0-3.8-3.09-6.89-6.89-6.89s-6.89 3.09-6.89 6.89c0 2.07.93 3.94 2.39 5.2-3.87 1.04-6.73 4.58-6.73 8.78zm6.34-13.98c0-2.7 2.19-4.89 4.89-4.89s4.89 2.19 4.89 4.89-2.2 4.88-4.89 4.88-4.89-2.19-4.89-4.88zm2.76 6.88h4.26c3.91 0 7.09 3.19 7.09 7.1v6.64h-18.45v-6.64c0-3.91 3.19-7.1 7.1-7.1z"></path><path d="m36.44 56.45c.12.05.25.07.38.07.26 0 .51-.1.7-.29l4.07-4.06h10.46c2.02 0 3.66-1.64 3.66-3.66v-10.85c0-2.02-1.64-3.66-3.66-3.66h-16.92c-2.01 0-3.66 1.64-3.66 3.66v10.85c0 2.02 1.65 3.66 3.66 3.66h.69v3.35c0 .41.24.77.62.93zm-.07-14.56h14.45c.55 0 1 .45 1 1s-.45 1-1 1h-14.45c-.56 0-1-.45-1-1s.44-1 1-1zm-1-2.1c0-.55.44-1 1-1h2.56c.55 0 1 .45 1 1s-.45 1-1 1h-2.56c-.56 0-1-.45-1-1zm15.45 1h-8.45c-.56 0-1-.45-1-1s.44-1 1-1h8.45c.55 0 1 .45 1 1s-.45 1-1 1zm-14.45 4.19h10.73c.55 0 1 .45 1 1 0 .56-.45 1-1 1h-10.73c-.56 0-1-.44-1-1 0-.55.44-1 1-1z"></path><path d="m55.71 22.56c0-4.2-2.86-7.74-6.73-8.78 1.46-1.26 2.39-3.13 2.39-5.21 0-3.8-3.09-6.88-6.88-6.88s-6.89 3.08-6.89 6.88c0 2.08.93 3.95 2.39 5.21-3.88 1.04-6.73 4.58-6.73 8.78v7.64c0 .55.45 1 1 1h20.45c.55 0 1-.45 1-1zm-16.11-13.99c0-2.69 2.19-4.88 4.89-4.88s4.88 2.19 4.88 4.88-2.19 4.89-4.88 4.89-4.89-2.19-4.89-4.89zm14.11 20.63h-18.45v-6.64c0-3.92 3.18-7.1 7.1-7.1h4.25c3.92 0 7.1 3.18 7.1 7.1z"></path><path d="m32.53 17.71v-10.85c0-2.02-1.64-3.66-3.66-3.66h-16.92c-2.01 0-3.66 1.64-3.66 3.66v10.85c0 2.02 1.65 3.66 3.66 3.66h10.47l4.06 4.06c.19.19.45.29.71.29.13 0 .26-.02.38-.08.37-.15.62-.52.62-.92v-3.35h.68c2.02 0 3.66-1.64 3.66-3.66zm-13.12-1.23c0-.26.11-.52.29-.7.38-.37 1.05-.37 1.42 0 .19.18.29.44.29.7s-.1.52-.29.71-.45.29-.71.29-.52-.1-.71-.29c-.09-.09-.16-.2-.21-.32-.05-.13-.08-.26-.08-.39zm2-2.43c0 .55-.45 1-1 1s-1-.45-1-1v-1.01c0-.55.45-1 1-1 .84 0 1.52-.69 1.52-1.52 0-.84-.68-1.53-1.52-1.53s-1.52.69-1.52 1.53c0 .55-.45 1-1 1s-1-.45-1-1c0-1.95 1.58-3.53 3.52-3.53s3.52 1.58 3.52 3.53c0 1.59-1.06 2.94-2.52 3.37z"></path></svg>
                </div>
                <span class="nav-link-text ms-1">Kontak</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/galeri') || request()->is('dashboard/addgaleri') || request()->is('dashboard/editgaleri/*') ? 'active' : '' }}" href="{{ url('/dashboard/galeri') }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="19px" height="19px" id="fi_12578258" enable-background="new 0 0 64 64" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><g><path d="m54 18.3-32-8.8c-2.6-.7-5.3.8-6 3.4l-2.1 7.7h2.1 26.5c2.7 0 4.9 2.2 4.9 4.9v25.2 1.1c0 .4-.1.8-.2 1.2 1.5-.5 2.8-1.7 3.2-3.3l7-25.4c.7-2.6-.8-5.3-3.4-6z"></path><path d="m19.5 35.8c-.5 0-.9.2-1.3.5l-11.8 12.2v3.3c0 1.6 1.3 2.9 2.9 2.9h28l-16.5-18.3c-.4-.3-.8-.5-1.3-.6z"></path><path d="m33.2 33.5c1.2 0 2.2-1 2.2-2.2s-1-2.2-2.2-2.2-2.2 1-2.2 2.2 1 2.2 2.2 2.2z"></path><path d="m40.2 43.1c-.5 0-1 .2-1.3.7l-3.9 5.4 5 5.5h2.5c1.6 0 2.9-1.3 2.9-2.9v-2.4s-3.8-5.6-3.8-5.6c-.4-.5-.9-.7-1.4-.7z"></path><path d="m19.5 33.8c1 0 2 .5 2.7 1.2l11.3 12.6 3.6-5.1c.7-1 1.8-1.5 2.9-1.5 1.2 0 2.3.6 3 1.6l2.2 3.2v-20.3c0-1.6-1.3-2.9-2.9-2.9h-33c-1.6 0-2.9 1.3-2.9 2.9v20.2l10.4-10.7c.7-.8 1.7-1.2 2.7-1.2zm13.7-6.7c2.3 0 4.2 1.9 4.2 4.2s-1.9 4.2-4.2 4.2-4.2-1.9-4.2-4.2 1.9-4.2 4.2-4.2z"></path></g></svg>
                </div>
                <span class="nav-link-text ms-1">Galeri</span>
            </a>
        </li>
        
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/profile') ? 'active' : '' }}" href="{{ url('/dashboard/profile') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>customer-support</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                    <g transform="translate(1.000000, 0.000000)">
                                        <path class="color-background opacity-6"
                                            d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                        </path>
                                        <path class="color-background"
                                            d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                        </path>
                                        <path class="color-background"
                                            d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/account') || request()->is('dashboard/editaccount/*') ? 'active' : '' }}" href="{{ url('/dashboard/account') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>customer-support</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                    <g transform="translate(1.000000, 0.000000)">
                                        <path class="color-background opacity-6"
                                            d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                        </path>
                                        <path class="color-background"
                                            d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                        </path>
                                        <path class="color-background"
                                            d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Manage Account</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/logs') || request()->is('dashboard/detaillogs/*') ? 'active' : '' }}" href="{{ url('/dashboard/logs') }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <svg width="16px" height="16px" version="1.1" id="fi_569837" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <g>
                            <g>
                                <g>
                                    <path d="M32,464V48c0-8.837,7.163-16,16-16h240v64c0,17.673,14.327,32,32,32h64v48h32v-64c0.025-4.253-1.645-8.341-4.64-11.36
                                        l-96-96C312.341,1.645,308.253-0.024,304,0H48C21.49,0,0,21.491,0,48v416c0,26.51,21.49,48,48,48h112v-32H48
                                        C39.164,480,32,472.837,32,464z"></path>
                                    <path d="M480,320h-32v32h32v32h-64v-96h96c0-17.673-14.327-32-32-32h-64c-17.673,0-32,14.327-32,32v96c0,17.673,14.327,32,32,32
                                        h64c17.673,0,32-14.327,32-32v-32C512,334.327,497.673,320,480,320z"></path>
                                    <path d="M304,256c-35.346,0-64,28.654-64,64v32c0,35.346,28.654,64,64,64c35.346,0,64-28.654,64-64v-32
                                        C368,284.654,339.346,256,304,256z M336,352c0,17.673-14.327,32-32,32c-17.673,0-32-14.327-32-32v-32c0-17.673,14.327-32,32-32
                                        c17.673,0,32,14.327,32,32V352z"></path>
                                    <path d="M160,256h-32v144c0,8.837,7.163,16,16,16h80v-32h-64V256z"></path>
                                </g>
                            </g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        </svg>
                </div>
                <span class="nav-link-text ms-1">Logs</span>
            </a>
        </li>
    </ul>
</div>